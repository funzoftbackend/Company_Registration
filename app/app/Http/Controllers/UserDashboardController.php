<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\DomainSteps;
use App\Models\CountryDomain;
use App\Models\ServiceDomain;
use App\Models\Company;
use App\Models\Application;
use App\Models\Lead;
use App\Models\Transaction;
use App\Models\Country;
use App\Models\Partner;
use App\Models\Service;
class UserDashboardController extends Controller
{
    public function index()
    {
   
    $user = Auth::user();
    $totaltransactions = Transaction::all()->count();
    $totalpartners = Partner::all()->count();
    $totalusers = User::all()->count();
    $totalcompanies = Company::all()->count();
    $totalcountries = Country::all()->count();
    $totalservices = Service::all()->count();
     if ($user->user_role == "Super Admin") {
            $totalapplications = Application::all()->count();
        } else {
            $applications = Application::all();
            foreach ($applications as $application) {
                $application_done_by = User::find($application->user_id);
                $countryDomain = CountryDomain::where('domain_id', $application->type)
                                ->where('country_id', $user->country_id)
                                ->first();
    
                if ($countryDomain) {
                    $status = DomainSteps::find($application->status);
                    $application->status = $status ? $status->name : null;
                    $application->type = ServiceDomain::select('name')->find($application->type);
                }
            }
            $filteredApplications = $applications->filter(function($application) use ($user) {
                return $application->status == $user->user_role;
            });
            $totalapplications = $filteredApplications->count();
        }
    
    $totalleads = Lead::all()->count();
    return view('dashboard.index',compact('totalservices','totalpartners','totalcountries','user','totaltransactions','totalusers','totalapplications','totalleads','totalcompanies'));
    }  
}
