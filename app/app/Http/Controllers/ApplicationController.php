<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Company;
use App\Models\Partner;
use App\Models\ApplicationReason;
use App\Models\Application;
use App\Models\DomainSteps;
use App\Models\CountryDomain;
use App\Models\ServiceDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ApplicationController extends Controller
{
   public function index()
    {
        $user = Auth::user();
        $applications = Application::with('user')->get();
        foreach ($applications as $application) {
            $application_done_by = User::find($application->user_id);
            $countryDomain = CountryDomain::where('domain_id', $application->type)
                            ->where('country_id', $user->user_role != 'Super Admin' ? $user->country_id : $application_done_by->country_id)
                            ->first();
    
            if ($countryDomain) {
                $status = DomainSteps::find($application->status);
                $application->status = $status ? $status->name : null;
                $application->type = ServiceDomain::select('name')->find($application->type);
            }
        }
    
        // Filter applications based on user role and status
        $filteredApplications = $applications->filter(function($application) use ($user) {
            if ($user->user_role != 'Super Admin') {
                return $application->status == $user->user_role;
            } else {
                // Add any specific condition for Super Admin if required
                return true;
            }
        });
    
        return view('application.index', ['applications' => $filteredApplications]);
    }

    public function filterApplications(Request $request)
    {
        $user = Auth::user();
        $applicationsQuery = Application::with('user');
        
        if ($request->filter == 'rejected') {
            $applicationsQuery->where('is_rejected', 1);
        } elseif ($request->filter == 'not_rejected') {
            $applicationsQuery->where('is_rejected', 0);
        }
    
        $applications = $applicationsQuery->get();
    
        foreach ($applications as $application) {
            $application_done_by = User::find($application->user_id);
            $countryDomain = CountryDomain::where('domain_id', $application->type)
                            ->where('country_id', $user->user_role != 'Super Admin' ? $user->country_id : $application_done_by->country_id)
                            ->first();
    
            if ($countryDomain) {
                $status = DomainSteps::find($application->status);
                $application->status = $status ? $status->name : null;
                $application->type = ServiceDomain::select('name')->find($application->type);
            }
        }
    
        $filteredApplications = $applications->filter(function($application) use ($user) {
            if ($user->user_role != 'Super Admin') {
                return $application->status == $user->user_role;
            } else {
                return true;
            }
        });
    
        return response()->json($filteredApplications);
    }

    public function create()
    {
        $users = User::where('user_role',NULL)->get();
        $user = Auth::user();
        $domains = ServiceDomain::all();
        return view('application.create',compact('user','users','domains'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();
        $domain = ServiceDomain::find($request->type);
        if($user->user_role != 'Lead Manager'){
        $user = User::find($request->user_id);
        }
        $countrydomain = CountryDomain::where('domain_id',$domain->id)->where('country_id',$user->country_id)->first();
        $status = DomainSteps::where('country_domain_id',$countrydomain->id)->first();
        $application = new Application();
        $application->user_id = $user->id;   
        $application->type = $request->type;
        $application->payment_status = $request->payment_status;
        $application->status = $status->id;
        $application->save();
        if($user->user_role != 'Lead Manager'){
        return redirect()->route('application.index')->with('success', 'Application created successfully.');
        }else{
        return redirect()->route('lead.index')->with('success', 'Application created successfully.');
        }
    }
    

    public function show(application $application)
    {
        $selectedapplication = Application::find($application->id);
        $company = Company::where('application_id',$application->id)->first();
        $partners = Partner::where('company_id',$company->id)->get();
        $user = User::find($selectedapplication->user_id);
        return view('application.show', compact('partners','user','company','selectedapplication'));
    }
    public function proceed(application $application)
    {
        $user = Auth::user();
        $selectedapplication = Application::find($application->id);
        $currentStep = DomainSteps::select('id','country_domain_id')->where('id', $selectedapplication->status)->first();
        $laststep = DomainSteps::where('country_domain_id',$currentStep->country_domain_id)->latest()->first();
        $current_id = $currentStep->id;
        $next_id = $current_id + 1;
        if($currentStep->id < $laststep->id){
        $nextStep = DomainSteps::find($next_id);
        $selectedapplication->status = $nextStep->id;
        $selectedapplication->save();
        }else{
          return redirect()->route('application.enter_crn', ['application' => $application->id]);
        }
        return redirect()->route('application.index')->with('success', 'Application Forwarded Successfully.');
    }
        public function enterCrnForm(Application $application)
    {
        return view('application.enter_crn', compact('application'));
    }

    public function saveCrn(Request $request, Application $application)
    {
        $request->validate([
            'CRN' => 'required',
        ]);
        $company = Company::where('application_id', $application->id)->first();
        $company->CRN = $request->CRN;
        $company->status = 'registered';
        $company->save();
    
        return redirect()->route('application.index')->with('success', 'Company Registered Successfully.');
    }
     public function reject(Request $request)
    {
        $validatedData = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'reason' => 'required|string',
        ]);
        ApplicationReason::create([
            'application_id' => $validatedData['application_id'],
            'reason' => $validatedData['reason'],
        ]);
            $selectedapplication = Application::find($validatedData['application_id']);
            $selectedapplication->is_rejected = 1;
            $selectedapplication->save();
        return redirect()->route('application.index')->with('success', 'Application Rejected Successfully.');
    }
    public function edit()
    {
        $application_id = $_GET['application_id'];
        $application = Application::find($application_id);
        $users = User::where('user_role','employee')->get();
        $domains = ServiceDomain::all();
        return view('application.edit', compact('users','domains','application'));
    }

    public function update(Request $request, Application $application)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'user_id' => $request->user_id,
            'type' => $request->type,
            'payment_status' => $request->payment_status
        ];
        $application->update($data);
        return redirect()->route('application.index')->with('success', 'Application Updated successfully.');
    }

    public function destroy(Application $application)
    {
       
        $application->delete();
        return redirect()->route('application.index')->with('success', 'Application deleted successfully.');
    }
}
