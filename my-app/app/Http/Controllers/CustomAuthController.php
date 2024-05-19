<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (strpos($user->email, '@Admin.com') !== false) {
                // Redirect to homepage
                return redirect('/');
            } else {
                Auth::logout();
                return back()->withErrors(['loginError' => 'Access restricted to admins only']);
            }
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

