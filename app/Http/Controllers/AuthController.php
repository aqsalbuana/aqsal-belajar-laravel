<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return redirect()->route('login')->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        DB::table('users')->where('username', Auth::user()->username)->update(['last_login_at' => date('Y-m-d H:i:s', time())]);
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doregister(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:users,username',
                'name'     => 'required',
                'phone_number' => 'required|numeric',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong.',
                'username.unique' => 'Username sudah terdaftar.',
                'name.required' => 'Nama lengkap tidak boleh kosong.',
                'phone_number.required' => 'Nomer HP tidak boleh kosong.',
                'phone_number.numeric' => 'Nomer HP harus diketik angka.',
                'password.required' => 'Password tidak boleh kosong.',
                'password.confirmed' => 'Konfirmasi password tidak sama.',
                'password_confirmation.required' => 'Konfirmasi password tidak boleh kosong.',
                'email.required' => 'Email tidak boleh kosong.',
                'email.email' => 'Email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
            ]
        );
        DB::table('users')->insert([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'phone_number' => $request->post('phone_number'),
            'username' => $request->post('username'),
            'password' => Hash::make($request->post('password')),
            'group_id' => 3
        ]);
        return redirect()->route('register')->with('success', 'Registrasi akun berhasil. Silhakan login untuk memulai sesi.');
    }
}
