<?php

namespace App\Http\Controllers;

use App\Mail\AuthCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // VIEW FUNCTION?
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    // MAIN FUNCTION?
    public function registerAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20|confirmed',
        ]);
        $authCode = random_int(1000, 9999);
        $avatarUrl = 'https://api.dicebear.com/7.x/adventurer/svg?seed=' . urlencode($request->email);
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $authCode,
            'otp_expiry_at' => now()->addMinutes(5),
            'avatar' => $avatarUrl,
        ]);
        try {
            Mail::to($request->email)->send(new AuthCodeMail($authCode));
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the authentication email. Please try again.');
        }
        return redirect('verify_otp')->with('success', 'Registration successful! Please check your email for the verification code.');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate(['auth_code' => 'required|max:4']);
        $otp = $request->auth_code;
        $user = User::where('otp', $otp)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Invalid verification code...');
        }
        if (now() > $user->otp_expiry_at) {
            return redirect()->back()->with('error', 'This OTP has expired...');
        }
        $user->otp = null;
        $user->isVerified = true;
        $user->otp_expiry_at = null;
        $user->save();
        return redirect('/')->with('success', 'Account verified successful, kindly login and explore...');
    }

    public function resendVerifyOTP(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        $user = User::where('email', $request->email)->first();
        if ($user->isVerified) {
            return redirect()->back()->with('error', 'Account has already been verified...');
        }
        $authCode = random_int(1000, 9999);
        $user->update([
            'otp' => $authCode,
            'otp_expiry_at' => now()->addMinutes(5),
        ]);
        try {
            Mail::to($request->email)->send(new AuthCodeMail($authCode));
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the authentication email. Please try again.');
        }
        return redirect('verify_otp')->with('success', 'Verification code has been resent! Please check your email for the verification code.');
    }
    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        if (!$user->isVerified) {
            return redirect()->back()->with('error', 'Your account has not been verified yet. Please check your email.');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
        Auth::login($user);
        if ($user->role === 'student') {
            return redirect('home')->with('success', 'Welcome back, ' . $user->name . '!');
        }
        return redirect('admin')->with('success', 'Welcome back, ' . $user->name . '!');
    }

    public function forgetPassword(Request $request)
    {
        // dd($request->email);
        $request->validate(['email' => 'required|email|exists:users,email']);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Account Not found');
        }
        if (!$user->isVerified) {
            return redirect()->back()->with('error', 'Activate your account...');
        }
        $resetPass = random_int(1000, 9999);
        $user->password_reset_otp = $resetPass;
        $user->password_reset_otp_expire_at = now()->addMinutes(5);
        $user->save();
        try {
            Mail::to($request->email)->send(new AuthCodeMail($resetPass));
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the reset password OTP. Please try again.');
        }
        return redirect('/reset_password')->with('success', 'Enter the OTP to reset your password now, it\'s expire in 5min...');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            "password_code" => "required|string|max:4",
            'password' => 'required|string|min:6|max:20|confirmed',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Account Not found');
        }
        if ($request->password_code !== $user->password_reset_otp && now() > $user->password_reset_otp_expire_at) {
            return redirect()->back()->with('error', 'Invaild or expired code...');
        }
        $user->password = Hash::make($request->password);
        $user->password_reset_otp_expire_at = null;
        $user->password_reset_otp = null;
        $user->save();
        return redirect('/')->with('success', 'Password reset, kindly login...');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}
