<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Login Page
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view("auth.login");
    }

    // Process Login
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:5"
        ]);

        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Show Register Page - SEMUA ORANG BISA AKSES
    public function showRegister()
    {
        // Jika sudah login, redirect ke dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view("auth.register");
    }

    // Process Register - SEMUA ORANG BISA REGISTER
    // Process Register
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:5|confirmed"
        ]);

        // Buat user baru dengan role default 'user'
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => "user"  // Default role user
        ]);

        // Auto login setelah register
        Auth::login($user);

        return redirect('/');  // Redirect ke landing page (bukan admin dashboard)
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
