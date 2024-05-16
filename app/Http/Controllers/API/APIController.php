<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Designation;
use App\Models\CompanyType;
use App\Models\Partner;
use App\Models\Country;
use App\Models\CountryDomain;
use App\Models\ServiceDomain;
use App\Models\DomainSteps;
use App\Models\Service;
use App\Mail\UserEmail;
use App\Models\Application;
use App\Models\Transaction;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class APIController extends Controller
{
    public function login(Request $request)
    {
       
       $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
         if ($validator->fails()) {
             $errors = $validator->errors();

            if ($errors->has('email')) {
                return response()->json(['success' => 'false','message' => $errors->first('email')], 422);
            }
        
            if ($errors->has('password')) {
                return response()->json(['success' => 'false','message' => $errors->first('password')], 422);
            }
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            // The user's credentials are correct
            return response()->json(['user' => $user,'success' => 'true','message' => 'Login Successful','token' => $token], 200);
        } else {
            // The user's credentials are incorrect
            return response()->json(['success' => 'false','message' => 'Invalid Email or Password'], 401);
        }
    }
  public function logout(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            // Invalidate the user's session
            Session::invalidate();
        
            // Clear the user's remember token
            $user->setRememberToken(null);
        
            // Save the user to update the remember token
            $user->save();
        
            // Optionally, you can logout from Sanctum if you're using it
            auth()->user()->tokens()->delete();
        }

        return response()->json(['success' => 'true','message' => 'Logged Out Successfully'], 200);
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile_no' => 'required',
            'country_id' => 'required',
            // 'passport_one_img' => 'required',
            // 'passport_two_img' => 'required',

        ]);
         if ($validator->fails()) {
             return response()->json(['success' => 'false','message' => $validator->errors()->first()], 422);
        }
        $user = new User();
        $password = Str::random(8);
        $user->name = $request->name;
        $user->mobile_no = $request->mobile_no;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        $user->country_id = $request->country_id;
        $user->password = bcrypt($password);
        $user->save();
        Mail::to($user->email)->send(new UserEmail($user->email, $password, url('login')));
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['user' => $user, 'success' => 'true','message' => 'User Saved Successfully','token' => $token]);
    }
    public function update_country(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
        ]);
         if ($validator->fails()) {
            if ($errors->has('country_id')) {
                return response()->json(['success' => 'false','message' => $errors->first('country_id')], 422);
            }
        }
        $user = Auth::user();
        $user->country_id = $request->country_id;
        $user->save();
        return response()->json([ 'success' => 'true','message' => 'Country Updated Successfully']);
    }
    public function upload_passport_url_image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image_file' => 'required',
        ]);
         if ($validator->fails()) {
            if ($errors->has('image_file')) {
                return response()->json(['success' => 'false','message' => $errors->first('image_file')], 422);
            }
        }
        $imageName = time().'.'.$request->image_file->extension();
        $request->image_file->move(public_path('passport'), $imageName);
    
        $imagePath = 'passport/'.$imageName; 
        return response()->json([ 'success' => 'true','image_url'=> $imagePath,'message' => 'Passport Url Updated Successfully']);
    }
    public function update_package(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
        ]);
         if ($validator->fails()) {
            if ($errors->has('package_name')) {
                return response()->json(['message' => $errors->first('package_name')], 422);
            }
        }
        $user = Auth::user();
        $user->package_name = $request->package_name;
        $user->save();
        return response()->json(['success' => 'true', 'message' => 'Package Name Updated Successfully']);
    }
    public function update_payment_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
            'application_id' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => 'false','message' => $validator->errors()->first()], 422);
        }
        $application = Application::find($request->application_id);
        if (!$application) {
            return response()->json(['success' => 'false','message' => 'Application not found'], 404);
        }
        $application->payment_status = $request->value;
        $application->save();
        return response()->json(['success' => 'true','message' => 'Payment Status Updated Successfully']);
    } 
   
    public function save_transaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'method' => 'required',
            'tid' => 'required',
            'currency' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false','message' => $validator->errors()->first()], 422);
        }
            $user = Auth::user();
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $request->amount;
            $transaction->method = $request->method;
            $transaction->tid = $request->tid;
            $transaction->currency = $request->currency;
            $transaction->save();
            if($transaction){
        return response()->json(['success' => 'true','message' => 'Transaction Saved Successfully']);
            }
            else{
            return response()->json(['success' => 'false']);
            }
    } 
    public function get_available_designations(Request $request)
    {
        $designations = Designation::all();
            if($designations){
            return response()->json(['success' => 'true','designations' => $designations,'message' => 'Designations Fetched Successfully']);
            }
            else{
            return response()->json(['success' => 'false','message' => 'Error Fetching Designations']);
            }
    } 
    public function get_available_company_types(Request $request)
    {
        $company_types = CompanyType::all();
            if($company_types){
            return response()->json(['success' => 'true','company_types' => $company_types,'message' => 'Company Types Fetched Successfully']);
            }
            else{
            return response()->json(['success' => 'false','message' => 'Error Fetching Company Types']);
            }
    } 
    public function edit_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile_no' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $data = [
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
        ];
        $user = Auth::user();
        $update = $user->update($data);
        if($update){
            return response()->json(['user'=> $user,'success' => 'true','message' => 'User Profile Updated Successfully']);
            }
            else{
            return response()->json(['user'=>$user,'success' => 'false','message' => 'Error Updating User Profile']);
            }
    } 
    public function save_details(Request $request)
    {
        $user = Auth::user();
        if ($request->application_type == "company_registration") {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'capital' => 'required|string',
                'country_id' => 'required|string',
                'currency' => 'required|string',
                'number_of_partners' => 'required|string',
                'owner_nationality' => 'required|string',
                'company_type' => 'required|string',
                'financial_year_ending_date' => 'required|date',
                'status' => 'required|string',
                'suggested_names' => 'required|string',
                'activities' => 'required|string',
                'partners_name' => 'required|string',
                'partners_url' => 'required|string',
                'partners_designation' => 'required|string',
                'type_id' => 'required',
                // 'payment_status' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'message' => $validator->errors()->first()], 422);
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
            $application->payment_status = $request->payment_status;
            $application->status = $status->name;
            $application->save();
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
            $partnersNames = explode(',', $request->partners_name);
            $partnersURLs = explode(',', $request->partners_url);
            $partnersDesignations = explode(',', $request->partners_designation);
            foreach ($partnersNames as $index => $partnerName) {
                if($partnersDesignations[$index] != 'Others'){
                $designation = Designation::firstOrCreate(['name' => $partnersDesignations[$index]]);
                }
                $partner = new Partner();
                $partner->company_id = $company->id;
                $partner->name = $partnerName;
                $partner->passport_url = $partnersURLs[$index];
                $partner->designation = $partnersDesignations[$index];
                $partner->save();
            }
    
            return response()->json(['application_id' => $application->id, 'success' => 'true', 'message' => 'Details Saved Successfully']);
        } else {
            return response()->json(['success' => 'false', 'message' => 'Application Type Not Defined or Enter Valid Application Type']);
        }
    }
    public function save_user_detail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'user_role' => 'required',
            'mobile_no' => 'required',
            'country' => 'required',
            'package_name' => 'required',
            'package_price' => 'required',
            // 'passport_one_img' => 'required',
            // 'passport_two_img' => 'required',
            'amount' => 'required',
            'amount_type' => 'required',
        ]);
        
        if ($validator->fails()) {
             return response()->json(['errors' => $validator->errors()], 422);
        }
        $imageName = time().'.'.$request->passport_one_img->extension();
        $request->passport_one_img->move(public_path('img'), $imageName);
    
        $imagePath = 'img/'.$imageName; 
        $imageName1 = time().'.'.$request->passport_two_img->extension();
        $request->passport_two_img->move(public_path('img'), $imageName1);
    
        $imagePath1 = 'img/'.$imageName1;    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_role' => $request->user_role,
            'mobile_no' => $request->mobile_no,
            'country' => $request->country,
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
            'passport_one_img' => $imagePath,
            'passport_two_img' => $imagePath1,
            'amount' => $request->amount,
            'amount_type' => $request->amount_type,
        ]);
        return response()->json(['success' => 'true','message' => 'User Details Saved Successfully']);
    }
    public function get_applications()
    {
        $user = Auth::user();
        $applications = Application::with('user','company')->where('user_id',$user->id)->get();
        foreach($applications as $application){
            $domain = ServiceDomain::find($application->type);
            $countryDomain = CountryDomain::where('domain_id',$domain->id)->where('country_id',$user->country_id)->first();
            $application->steps = DomainSteps::where('country_domain_id',$countryDomain->id)->get();
        }
        return response()->json(['application' => $applications,'success' => 'true','message' => 'Application Details Fetched Successfully']);
    }
      public function get_application_by_id(Request $request)
    {
        $selectedapplication = Application::find($request->id);
        $domain = ServiceDomain::find($selectedapplication->type);
            $countryDomain = CountryDomain::where('domain_id',$domain->id)->where('country_id',$user->country_id)->first();
            $selectedapplication->steps = DomainSteps::where('country_domain_id',$countryDomain->id)->get();
        $company = Company::where('application_id',$selectedapplication->id)->first();
        $partners = Partner::where('company_id',$company->id)->get();
        $user = User::find($selectedapplication->user_id);
        return response()->json(['application' => $selectedapplication,'partners' => $partners,'user' =>$user,'company'=> $company,'selectedapplication' => $selectedapplication,'success' => 'true','message' => 'Application Details Fetched Successfully']);
    }
    public function get_countries()
    {
        $countries = Country::all();
        return response()->json(['countries' => $countries,'success' => 'true','message' => 'Countries Fetched Successfully']);
    }
     public function get_services()
    {
        $services = Service::with('domains')->get();
        
        return response()->json(['services' => $services,'success' => 'true','message' => 'Services Fetched Successfully']);
    }
   
}
