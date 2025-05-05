<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use Illuminate\suppport\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Buat file login.blade.php di views/auth
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    {
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]) ->onlyInput('email');
        }
    }
    
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Buat file register.blade.php di views/auth
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role is user
        ]);

        Auth::login('$user');
        return redirect('dashboard');
        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }
   
    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to home or login page
    }
}
