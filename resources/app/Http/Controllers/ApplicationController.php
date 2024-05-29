<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Company;
use App\Models\Partner;
use App\Models\ApplicationReason;
use App\Models\Application;
use App\Models\Designation;
use App\Models\DomainSteps;
use App\Models\CompanyType;
use App\Models\Transaction;
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
    public function save_details(Request $request)
    {
        
        $user = Auth::user();
        $domain = ServiceDomain::find($request->type_id);
        if ($domain->service_id == 1) {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'capital' => 'required',
                'country_id' => 'required',
                'currency' => 'required',
                'number_of_partners' => 'required|integer',
                'owner_nationality' => 'required|string',
                'company_type' => 'required|string',
                'financial_year_ending_date' => 'required',
                'suggested_names' => 'required|string',
                'activities' => 'required|string',
                'partners_name' => 'required|array',
                'partners_name.*' => 'required|string',
                'partner_nationality' => 'required|array',
                'partner_nationality.*' => 'required|string',
                'partner_passport_no' => 'required|array',
                'partner_passport_no.*' => 'required|string',
                'partner_passport_date_of_expiry' => 'required|array',
                'partner_passport_date_of_expiry.*' => 'required|date',
                'partner_date_of_birth' => 'required|array',
                'partner_date_of_birth.*' => 'required|date',
                'partner_passport_date_of_issue' => 'required|array',
                'partner_passport_date_of_issue.*' => 'required|date',
                'partners_url' => 'required|array',
                'partners_url.*' => 'required',
                'partners_designation' => 'required|array',
                'partners_designation.*' => 'required|string',
                'type_id' => 'required|integer',
                // 'payment_status' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            if($request->company_type != 'Others'){
            $companyType = CompanyType::firstOrCreate(['name' => $request->company_type]);
            }
            $user = Auth::user();
            $domain = ServiceDomain::find($request->type_id);
            $countrydomain = CountryDomain::where('domain_id',$domain->id)->where('country_id',$user->country_id)->first();
            $status = DomainSteps::where('country_domain_id',$countrydomain->id)->first();
            $application = new Application();
            $application->user_id = $user->id;
            $application->type = $request->type_id;
            $application->status = $status->id;
            $application->save();
            
            $latest_transaction = Transaction::where('user_id',$user->id)->latest()->first();
            if($latest_transaction){
            $latest_transaction->application_id = $application->id;
            $latest_transaction->save();
            }
            $company = new Company();
            $company->name = $request->company_name;
            $company->capital = $request->capital;
            $company->currency = $request->currency;
            $company->number_of_partners = $request->number_of_partners;
            $company->owner_nationality = $request->owner_nationality;
            $company->company_type = $request->company_type;
            $company->financial_year_ending_date = $request->financial_year_ending_date;
            $company->status = $request->status;
            $company->suggested_names = $request->suggested_names;
            $company->activities = $request->activities;
            $company->application_id = $application->id;
            $company->save();
    
            // Save partners
            $partnersNames = $request->partners_name;
            $partnersURLs = $request->partners_url;
            $partnersDesignations = $request->partners_designation;
            $partner_nationality = $request->partner_nationality;
            $partner_date_of_birth = $request->partner_date_of_birth;
            $partner_passport_no = $request->partner_passport_no;
            $partner_passport_date_of_expiry = $request->partner_passport_date_of_expiry;
            $partner_passport_date_of_issue = $request->partner_passport_date_of_issue;
            foreach ($partnersNames as $index => $partnerName) {
                if($partnersDesignations[$index] != 'Others'){
                $designation = Designation::firstOrCreate(['name' => $partnersDesignations[$index]]);
                }
                $partner = new Partner();
                $partner->company_id = $company->id;
                $partner->name = $partnerName;
                $partner->passport_url = $partnersURLs[$index];
                $partner->nationality = $partner_nationality[$index];
                $partner->DOB = $partner_date_of_birth[$index];
                $partner->passport_number = $partner_passport_no[$index];
                $partner->passport_date_of_expiry = $partner_passport_date_of_expiry[$index];
                $partner->passport_date_of_issue = $partner_passport_date_of_issue[$index];
                $partner->designation = $partnersDesignations[$index];
                $partner->save();
            }
    
            return redirect()->route('lead.index')->with('success', 'Application Submitted Successfully.');
        }else{
           $validator = Validator::make($request->all(), [
                'CRN' => 'required',
                'type_id' => 'required'
            ],[
                'CRN' => 'Please Enter Company Registration Number first'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with(['error' => 'false', 'message' => $validator->errors()->first()], 422);
            }
            $company = Company::where('CRN',$request->CRN)->first();
            if($company){
            $user = Auth::user();
            $domain = ServiceDomain::find($request->type_id);
            $countrydomain = CountryDomain::where('domain_id',$domain->id)->where('country_id',$user->country_id)->first();
            $status = DomainSteps::where('country_domain_id',$countrydomain->id)->first();
            $application = new Application();
            $application->user_id = $user->id;
            $application->type = $request->type_id;
            $application->status = $status->id;
            $application->save(); 
            return redirect()->route('lead.index')->with('success', 'Application Submitted Successfully.');
            }
            return redirect()->route('manager_domain_check',['type' => $request->type_id])->with('error', 'CRN number not verified.');
        }
       
    }
    public function manager_domain_check(Request $request){
        $user = Auth::user();
        $type = $_GET['type'];
        $payment_status = $_GET['payment_status'];
       return view('application.manager-create-application', ['type' => $type,'payment_status' => $payment_status,'user' => $user]);
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
