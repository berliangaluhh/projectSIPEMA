<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show registration page.
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nim' => 'required|string|max:50|unique:users',
            'program_studi' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'no_telepon' => $request->no_telepon,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa', // default role
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    /**
     * Show login page.
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboardadmin');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show forget password page.
     */
    public function showForgetPassword()
    {
        return view('pengguna.forgetpassword');
    }

    /**
     * Handle forget password request.
     */
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Simulating password recovery link email sending
        return back()->with('status', 'Tautan pemulihan sandi telah dikirimkan ke email Anda!');
    }
}
