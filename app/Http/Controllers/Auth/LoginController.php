<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('LoginView');    }

    public function login(Request $request)
    {
        // Validate the email and password fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in with email and password
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $role = Auth::user()->role;

            // Redirect based on the user's role
            if ($role === 'admin') {
                return redirect()->route('dashboard');
            } else if ($role === 'user') {
                return redirect()->route('home');
            }
        }

        // Redirect back with an error if login fails
        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ]);
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); 
    }
}