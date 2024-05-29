<?php
namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{
    public function index()
    {
        $companies = company::all();
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        $applications = Application::all();
        return view('company.create',compact('applications'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'capital' => 'required|string',
            'currency' => 'required|string',
            'number_of_partners' => 'required|string',
            'owner_nationality' => 'required|string',
            'company_type' => 'required|string',
            'financial_year_ending_date' => 'required|date',
            'status' => 'required|string',
            'suggested_names' => 'required|string',
            'activities' => 'required|string',
            'application_id' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $company = new Company();
        $company->name = $request->name;
        $company->capital = $request->capital;
        $company->currency = $request->currency;
        $company->number_of_partners = $request->number_of_partners;
        $company->owner_nationality = $request->owner_nationality;
        $company->company_type = $request->company_type;
        $company->financial_year_ending_date = $request->financial_year_ending_date;
        $company->status = $request->status;
        $company->suggested_names = $request->suggested_names;
        $company->activities = $request->activities;
        $company->application_id = $request->application_id;
        $company->save();
    
        return redirect()->route('company.index')->with('success', 'Company created successfully.');
    }
    

    public function show(company $company)
    {
        return view('company.show', compact('company'));
    }

    public function edit()
    {
        $company_id = $_GET['company_id'];
        $company = company::find($company_id);
        $applications = Application::all();
        return view('company.edit', compact('applications','company'));
    }

    
public function update(Request $request, Company $company)
{
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'capital' => 'required|string',
        'currency' => 'required|string',
        'number_of_partners' => 'required|string',
        'owner_nationality' => 'required|string',
        'company_type' => 'required|string',
        'financial_year_ending_date' => 'required|date',
        'status' => 'required|string',
        'suggested_names' => 'required|string',
        'activities' => 'required|string',
        'application_id' => 'required|numeric',
    ]);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $data = [
        'name' => $request->name,
        'capital' => $request->capital,
        'currency' => $request->currency,
        'number_of_partners' => $request->number_of_partners,
        'owner_nationality' => $request->owner_nationality,
        'company_type' => $request->company_type,
        'financial_year_ending_date' => $request->financial_year_ending_date,
        'status' => $request->status,
        'suggested_names' => $request->suggested_names,
        'activities' => $request->activities,
        'application_id' => $request->application_id,
    ];
   
    $company->update($data);

    return redirect()->route('company.index')->with('success', 'Company Updated successfully.');
}

    public function destroy(company $company)
    {
       
        $company->delete();
        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }
}
