<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Company;
use App\Models\Application;
use App\Models\Lead;
use App\Models\Transaction;
use App\Models\Country;
use App\Models\Partner;
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
    if($user->user_role == "superadmin"){
    $totalapplications = Application::all()->count();
    }
    else{
    $totalapplications = Application::where('user_id',$user->id)->count();    
    }
    
    $totalleads = Lead::all()->count();
    return view('dashboard.index',compact('totalpartners','totalcountries','user','totaltransactions','totalusers','totalapplications','totalleads','totalcompanies'));
    }  
}
