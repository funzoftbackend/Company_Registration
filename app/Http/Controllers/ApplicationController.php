<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Company;
use App\Models\Partner;
use App\Models\ApplicationReason;
use App\Models\Application;
use App\Models\DomainSteps;
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
        if($user->user_role != 'superadmin'){
        $applications = Application::with('user')->where('status',$user->user_role)->get();
        }
        else{
           $applications = Application::with('user')->get(); 
        }
        return view('application.index', compact('applications'));
    }

    public function create()
    {
        $users = User::where('user_role','employee')->get();
        $domains = ServiceDomain::all();
        return view('application.create',compact('users','domains'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required',
            'payment_status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $status = DomainSteps::first();
        $application = new Application();
        $application->user_id = $request->user_id;
        $application->type = $request->type;
        $application->payment_status = $request->payment_status;
        $application->status = $status->name;
        $application->save();
        return redirect()->route('application.index')->with('success', 'Application created successfully.');
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
        $selectedapplication = Application::find($application->id);
        $domain = ServiceDomain::find($selectedapplication);
        $countryDomain = CountryDomain::where('country_id',$user->country)->where('domain_id',$domain->id);
        $currentStep = DomainSteps::select('id')->where('name', $selectedapplication->status)->where('country_domain_id', $countryDomain->id)->first();
        $current_id = $currentStep->id;
        $next_id = $current_id + 1;
        $nextStep = DomainSteps::select('name')->find($next_id);
        $selectedapplication->status = $nextStep->name;
        $selectedapplication->save();
        return redirect()->route('application.index')->with('success', 'Application Forwarded Successfully.');
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
            $selectedapplication->status = 'rejected';
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
            'payment_status' => 'required',
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
