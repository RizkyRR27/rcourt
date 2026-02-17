<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // --- HALAMAN LOGIN ---
    public function showLogin() {
        return view('auth.login');
    }

    public function processLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Selamat Datang kembali!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // --- HALAMAN REGISTER ---
    public function showRegister() {
        return view('auth.register');
    }

    public function processRegister(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', // butuh input name="password_confirmation"
            'phone' => 'required|numeric',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default user biasa
        ]);

        Auth::login($user); // Auto login setelah daftar

        return redirect('/')->with('success', 'Akun berhasil dibuat! Silakan booking lapangan.');
    }

    // --- LOGOUT ---
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}