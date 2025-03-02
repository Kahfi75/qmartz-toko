<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Login pengguna menggunakan Laravel Auth
            Auth::login($user);

            // Buat notifikasi login berdasarkan level pengguna
            $role = ($user->level == 1) ? 'Admin' : 'Kasir';
            session()->flash('success', "Login berhasil! Anda masuk sebagai $role.");

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }


    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
