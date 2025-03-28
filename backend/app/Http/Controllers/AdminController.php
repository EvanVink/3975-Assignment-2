<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        // Checking if the user is logged in
        if (!Auth::check()) {
            return redirect('/unauthorized');
        }

        // Checking if the user is an admin
        if (User::user()->role !== 'admin') {
            return redirect('/unauthorized');
        }

        
        
        return view('admin.adminPage');
    }

    public function updateUserStatus(Request $request)
    {
        $user = User::where('Username', $request->Username)->first(); // Get user by username

        if ($user) {
            $user->IsApproved = $request->IsApproved; // Update approval status
            $user->update(); // Save the updated user
            // dd($user);
            return redirect("/dashboard")->with('success', 'User status updated successfully.');
        }

        return redirect("/dashboard")->with('error', 'User not found.');
    }
}
