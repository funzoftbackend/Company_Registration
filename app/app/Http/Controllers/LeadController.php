<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Lead;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('user')->get();
        
        return view('lead.index', compact('leads'));
    }

    public function create()
    {
        $applications = Application::all();
        $users = User::where('user_role','employee')->get();
        return view('lead.create',compact('users','applications'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'leads_created_by' => 'required',
            'application_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $lead = new Lead();
        $lead->leads_created_by = $request->leads_created_by;
        $lead->application_id = $request->application_id;
        $lead->save();
        if($lead){
        return redirect()->route('lead.index')->with('success', 'Lead created successfully.');
        }else{
        return redirect()->route('lead.index')->with('error', 'Error While Saving Lead.');  
        }
    }
    

    public function show(Lead $lead)
    {
        return view('lead.show', compact('Lead'));
    }

    public function edit()
    {
        $lead_id = $_GET['lead_id'];
        $lead = Lead::find($lead_id);
        $users = User::where('user_role','employee')->get();
        $applications = Application::all();
        return view('lead.edit', compact('users','lead','applications'));
    }

    public function update(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'leads_created_by' => 'required',
            'application_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'leads_created_by' => $request->leads_created_by,
            'application_id' => $request->application_id,
        ];
        $lead->update($data);
        return redirect()->route('lead.index')->with('success', 'Lead Updated successfully.');
    }

    public function destroy(Lead $lead)
    {
       
        $lead->delete();
        return redirect()->route('lead.index')->with('success', 'Lead deleted successfully.');
    }
}
