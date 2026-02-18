<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // --- HALAMAN LOGIN ---
    public function showLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
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
    public function showRegister()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => ['required', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'phone.regex' => 'Format nomor tidak valid. Gunakan format Indonesia (contoh: 081234567890).',
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
    // app/Http/Controllers/AuthController.php

    public function logout(Request $request)
    {
        Auth::logout(); // Hapus sesi login

        $request->session()->invalidate(); // Matikan session lama

        $request->session()->regenerateToken(); // Buat token baru (keamanan)

        return redirect('/')->with('success', 'Anda berhasil keluar. Sampai jumpa!');
    }
}
