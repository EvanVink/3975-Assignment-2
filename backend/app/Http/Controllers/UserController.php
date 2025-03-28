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
        return view('common.login', ['showHeader' => false]);
    }

    public function showRegisterForm()
    {
        return view('common.register', ['showHeader' => false]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'Username' => 'required|string',
            'Password' => 'required',
        ]);

        // Retrieve user by email
        $user = User::where('Username', $request->email)->first();
        $password = User::where('Password', $request->password)->first();

        
        if ($user && Hash::check($request->password, $user->Password)) {
            
            if ($user->IsApproved === 1) {
                Auth::login($user);
                Session::put('userName', $user->email);
                Session::put('role', $user->Role);
                Session::put('name', $user->first_name . " " . $user->last_name);
                
                
                if ($user->Role === 'admin') {
                    return redirect('/dashboard');
                } else {
                    return redirect('/index');
                }
                
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
            'Username' => $validated['email'], // Use email as the Username
            'Password' => Hash::make($validated['password']),
            'FirstName' => $validated['firstName'],
            'LastName' => $validated['lastName'],
            'RegistrationDate' => now()->toDateString(), // Stores only the date
            'isApproved' => 0, // Assuming default is 0 for pending approval
            'Role' => 'contributor', // Default role
        ]);
        // Redirect to pending page
        return redirect()->route('/pending');
    }
}
