<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the email belongs to an admin
        $user = User::where('email', $credentials['email'])->first();
        if ($user && strpos($user->email, '@Admin.com') !== false) {
            // Log in the admin directly
            Auth::login($user);
            return redirect('/');
        } elseif (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return back()->withErrors(['loginError' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}

