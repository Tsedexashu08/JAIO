<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function Account(): View
    {
        return view('AccountPage');
    }

    public function SideBar(Request $request): View
    {
        return view('Side-bar', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('edit', [
            'user' => $request->user(),
        ]);
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
     * Update the user's profile picture
     */
    public function updateProfilePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $request->user();

        // Store the image if it exists
        if ($request->hasFile('profile_picture')) {
            // Deleting old profile picture if it exists.
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $profilePicPath = $request->file('profile_picture')->store('profile_pics', 'public');
            $user->profile_picture = $profilePicPath;
        }

        $user->save();

        return Redirect::route('account')->with('status', 'Profile picture updated successfully!');
    }
    public function updateotherprofile($id, Request $request){
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);

        // Store the image if it exists
        if ($request->hasFile('profile_picture')) {
            // Deleting old profile picture if it exists.
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $profilePicPath = $request->file('profile_picture')->store('profile_pics', 'public');
            $user->profile_picture = $profilePicPath;
        }

        $user->save();

        return Redirect::route('users')->with('status', 'Profile picture updated successfully!');
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
