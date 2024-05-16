<?php
namespace App\Http\Controllers;
use App\Models\DomainSteps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::where('id','!=',$user->id)->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $country_steps = DomainSteps::distinct()->pluck('name');
        return view('user.create',compact('country_steps'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'user_role' => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // $imageName = time().'.'.$request->passport_one_img->extension();
        // $request->passport_one_img->move(public_path('img'), $imageName);
    
        // $imagePath = 'img/'.$imageName; 
        // $imageName1 = time().'.'.$request->passport_two_img->extension();
        // $request->passport_two_img->move(public_path('img'), $imageName1);
    
        // $imagePath1 = 'img/'.$imageName1;    
        $user = new User();
        $password = Str::random(8);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        // $user->mobile_no = $request->mobile_no;
        // $user->country = $request->country;
        // $user->package_name = $request->package_name;
        // $user->package_price = $request->package_price;
        // $user->passport_one_img = $imagePath;
        // $user->passport_two_img = $imagePath1;
        // $user->amount = $request->amount;
        // $user->amount_type = $request->amount_type;
        $user->password = bcrypt($password);
        $user->save();
        Mail::to($user->email)->send(new UserEmail($user->email, $password, url('login')));
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }
    

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit()
    {
        $user_id = $_GET['user_id'];
        $user = User::find($user_id);
        $country_steps = DomainSteps::distinct()->pluck('name');
        return view('user.edit', compact('user','country_steps'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'user_role' => 'required',
           
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'user_role' => $request->user_role,
            // 'mobile_no' => $request->mobile_no,
            // 'country' => $request->country,
            // 'package_name' => $request->package_name,
            // 'package_price' => $request->package_price,
            // 'amount' => $request->amount,
            // 'amount_type' => $request->amount_type,
        ];
    
        // Check if new image files are provided
        // if ($request->hasFile('passport_one_img')) {
        //     $imageName = time().'.'.$request->passport_one_img->extension();
        //     $request->passport_one_img->move(public_path('img'), $imageName);
        //     $data['passport_one_img'] = 'img/'.$imageName;
        // }
    
        // if ($request->hasFile('passport_two_img')) {
        //     $imageName1 = time().'.'.$request->passport_two_img->extension();
        //     $request->passport_two_img->move(public_path('img'), $imageName1);
        //     $data['passport_two_img'] = 'img/'.$imageName1;
        // }
    
        $user->update($data);
    
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }
    

    public function destroy(User $user)
    {
       
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
