<?php
namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::with('company')->get();
        return view('partner.index', compact('partners'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('partner.create',compact('companies'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'name' => 'required',
            'passport_url' => 'required',
            'designation' => 'required'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $partner = new Partner();
        $partner->company_id = $request->company_id;
        $partner->name = $request->name;
        $partner->passport_url = $request->passport_url;
        $partner->designation = $request->designation;
        $partner->save();
        if($partner){
        return redirect()->route('partner.index')->with('success', 'Partner created successfully.');
        }else{
        return redirect()->route('partner.index')->with('error', 'Error While Saving partner.');  
        }
    }
    

    public function show(Partner $partner)
    {
        return view('partner.show', compact('Partner'));
    }

    public function edit()
    {
        $partner_id = $_GET['partner_id'];
        $partner = Partner::find($partner_id);
        $companies = Company::all();
        return view('partner.edit', compact('companies','partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'name' => 'required',
            'passport_url' => 'required',
            'designation' => 'required'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'company_id' => $request->company_id,
            'name' => $request->name,
            'passport_url' => $request->passport_url,
            'designation' => $request->designation
        ];
        $partner->update($data);
        return redirect()->route('partner.index')->with('success', 'Partner Updated successfully.');
    }

    public function destroy(Partner $partner)
    {
       
        $partner->delete();
        return redirect()->route('partner.index')->with('success', 'Partner deleted successfully.');
    }
}
