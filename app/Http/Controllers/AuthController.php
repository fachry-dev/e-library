<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show landing page.
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
 /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            // Cek apakah password sudah menggunakan format bcrypt (dimulai dengan $2y$)
            if (str_starts_with($user->password, '$2y$')) {
                // Login normal menggunakan bcrypt
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('dashboard.index');
                }
            } else {
                // Verifikasi password lama (contoh ini mengasumsikan password disimpan tanpa hashing)
                // Ganti ini dengan metode verifikasi yang sesuai dengan aplikasi Anda
                $oldPasswordValid = ($request->password === $user->password); 
                if ($oldPasswordValid) {
                    // Update password ke bcrypt
                    $user->password = Hash::make($request->password);
                    $user->save();
                    
                    // Login user
                    Auth::login($user);
                    return redirect()->route('dashboard.index');
                }
            }
        }
        
        return redirect()->back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak sesuai.',
        ])->onlyInput('email');
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
   * Handle the registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Pastikan password di-hash dengan Bcrypt
            'role' => 'user', // Default role adalah user
        ]);

        Auth::login($user); // Login pengguna yang baru mendaftar
        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil! Selamat datang!');
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke home atau login page
    }
}
