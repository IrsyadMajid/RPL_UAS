<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
        {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');//Lokasi Admin
        }

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            Session::put('login_step', 'login2');
            return redirect()->route('login2');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function showLogin2Form()
    {
        if (Session::get('login_step') !== 'login2' && !Auth::check()) {
            return redirect()->route('login');
        }
        return view('auth.login2');
    }

    public function showLogin3Form()
    {
        if (Session::get('login_step') !== 'login3' && !Auth::check()) {
            return redirect()->route('login');
        }
        return view('auth.login3');
    }

    public function showLogin4Form()
    {
        if (Session::get('login_step') !== 'login4' && !Auth::check()) {
            return redirect()->route('login');
        }
        return view('auth.login4');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function showForgotForm()
    {
        return view('auth.lupaPassword');
    }

    public function handleForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        return redirect()->route('resetPasswordForm')->with('email', $request->email);
    }

    public function showResetPasswordForm()
    {
        $email = session('email');

        if (!$email) {
            return redirect()->route('lupaPassword')->withErrors('Email tidak ditemukan. Silakan coba lagi.');
        }

        return view('auth.lupaPassword1', compact('email'));
    }

    public function resetPasswordManual(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil diubah.');
    }

    public function logout(Request $request)
        {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
