<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        // Checking if the user is an admin
        if (Auth::user()->Role !== 'admin') {
            return redirect('/unauthorized');
        }


        $users = User::all();

        
        return view('admin.adminPage', compact('users'));
    }

    public function updateUserStatus(Request $request)
    {
        $updated = User::where('Username', $request->Username)
        ->update(['IsApproved' => (bool)$request->IsApproved]);
    
        if ($updated) {
            return redirect("/admin")->with('success', 'User status updated successfully.');
        }
    
        return redirect("/admin")->with('error', 'User not found or status unchanged.');
    }
}
