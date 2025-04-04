<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Article;  // Added this import
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Views;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function get(Request $request)
    {
        $user = $request->user();
        
        // Add debugging
        try {
            $articles = Article::where('ContributorUsername', $user->Username)->get();
            // dd($articles); // Uncomment to check what's returned
            return view('common.profile', compact('articles'));
        } catch (\Exception $e) {
            dd($e->getMessage()); // Display the error message
        }
    }

    



    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}