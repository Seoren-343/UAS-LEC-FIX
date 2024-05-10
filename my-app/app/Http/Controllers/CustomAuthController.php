<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();

            // Check if user's email contains "@Admin.com"
            if (strpos($user->email, '@Admin.com') !== false) {
                $user->isAdmin = true; // Set isAdmin status to true for admins
            }

            // You can add custom logic here, such as setting session variables
            return redirect('/'); // Redirect to dashboard or desired page
        } else {
            return back()->withErrors(['loginError' => 'Invalid credentials']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user

        $request->session()->invalidate(); // Invalidate the session

        return redirect('/'); // Redirect to the homepage or desired page after logout
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        // Insert new user into the "users" table
        DB::table('users')->insert([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'isAdmin' => false, // Set default isAdmin status to false
        ]);

        // Redirect to login page after successful registration
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
}

