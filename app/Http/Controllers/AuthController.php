<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check() && Auth::user()->email) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function dologin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email'    => 'Email tidak valid.',
            'password.required'       => 'Password tidak boleh kosong.'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect()->route('login')->with('error', 'Username atau password salah.');
    }
    
    public function logout()
    {
        DB::table('users')->where('username', Auth::user()->username)->update(['last_login_at' => date('Y-m-d H:i:s', time())]);
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
