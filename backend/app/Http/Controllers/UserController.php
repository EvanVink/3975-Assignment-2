<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve user by email
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            
            if ($user->is_approved) { // Assuming `is_approved` exists in your `users` table
                Auth::login($user);
                Session::put('userName', $user->email);
                Session::put('role', $user->role);
                Session::put('name', $user->first_name . " " . $user->last_name);

                // Redirect based on role
                return ($user->role === 'admin') ? redirect('/admin/dashboard') : redirect('/');
            } else {
                return redirect('/pending');
            }
        } else {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }
    }


    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    public function register(Request $request)
    {
        // Validate user input
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',  // Uppercase
                'regex:/[a-z]/',  // Lowercase
                'regex:/[0-9]/',  // Number
                'regex:/[!@#$%^&*(),.?":{}|<>]/' // Special character
            ]
        ]);

        // Create user and hash password
        $user = User::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'contributor', 
            'is_approved' => 0
        ]);

        // Redirect to pending page
        return redirect()->route('pending');
    }
}
