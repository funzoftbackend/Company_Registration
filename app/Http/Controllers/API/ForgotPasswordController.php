<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ResetPasswordMail;

class ForgotPasswordController extends Controller
{
    public function showforgotpassword()
    {
        return view('forgot-password');
    }
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $code = mt_rand(1000, 9999);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['email' => $user->email, 'code' => $code]
        );
        Mail::to($user->email)->send(new ResetPasswordMail($code));

        return response()->json(['message' => 'Code sent to your email']);
    }
    public function resendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        $code = mt_rand(1000, 9999);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['email' => $user->email, 'code' => $code]
        );
        Mail::to($user->email)->send(new ResetPasswordMail($code));
    
        return response()->json(['message' => 'Code sent to your email']);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:4',
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (!$reset) {
            return response()->json(['message' => 'Invalid code'], 422);
        }

        return response()->json(['message' => 'Code verified']);
    }
}

