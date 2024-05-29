<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Lead;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('user')->get();
        $user = Auth::user();
        return view('lead.index', compact('leads','user'));
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
            'email' => 'required|email|unique:users',
            'phone_number' => 'required'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user  = Auth::user();
        $lead = new Lead();
        $lead->leads_created_by = $user->id;
        $lead->email = $request->email;
        $lead->phone_number = $request->phone_number;
        $lead->save();
        $user = new User();
        $password = Str::random(8);
        $user->password = bcrypt($password);
        $user->mobile_no = $request->phone_number;
        $user->email = $request->email;
        $user->save();
        Mail::to($user->email)->send(new UserEmail($user->email, $password, url('login')));
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
        return view('lead.edit', compact('lead'));
    }

    public function update(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'phone_number' => 'required'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();
        $data = [
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'leads_created_by' => $user->id
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
