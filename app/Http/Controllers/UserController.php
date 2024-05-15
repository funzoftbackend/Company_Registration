<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $country_steps = CountryBusinessSteps::distinct()->all();
        return view('user.create',compact('country_steps'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
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
            return back()->withErrors($validator)->withInput();
        }
        $imageName = time().'.'.$request->passport_one_img->extension();
        $request->passport_one_img->move(public_path('img'), $imageName);
    
        $imagePath = 'img/'.$imageName; 
        $imageName1 = time().'.'.$request->passport_two_img->extension();
        $request->passport_two_img->move(public_path('img'), $imageName1);
    
        $imagePath1 = 'img/'.$imageName1;    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        $user->mobile_no = $request->mobile_no;
        $user->country = $request->country;
        $user->package_name = $request->package_name;
        $user->package_price = $request->package_price;
        $user->passport_one_img = $imagePath;
        $user->passport_two_img = $imagePath1;
        $user->amount = $request->amount;
        $user->amount_type = $request->amount_type;
        $user->save();
    
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
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'user_role' => 'required',
            'mobile_no' => 'required',
            'country' => 'required',
            'package_name' => 'required',
            'package_price' => 'required',
            'amount' => 'required',
            'amount_type' => 'required',
            'passport_one_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'passport_two_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'user_role' => $request->user_role,
            'mobile_no' => $request->mobile_no,
            'country' => $request->country,
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
            'amount' => $request->amount,
            'amount_type' => $request->amount_type,
        ];
    
        // Check if new image files are provided
        if ($request->hasFile('passport_one_img')) {
            $imageName = time().'.'.$request->passport_one_img->extension();
            $request->passport_one_img->move(public_path('img'), $imageName);
            $data['passport_one_img'] = 'img/'.$imageName;
        }
    
        if ($request->hasFile('passport_two_img')) {
            $imageName1 = time().'.'.$request->passport_two_img->extension();
            $request->passport_two_img->move(public_path('img'), $imageName1);
            $data['passport_two_img'] = 'img/'.$imageName1;
        }
    
        $user->update($data);
    
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }
    

    public function destroy(User $user)
    {
       
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
