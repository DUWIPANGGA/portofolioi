<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
   public function index()
{
    $user = Auth::user()->load('profile');

    $profile = $user->profile()->firstOrCreate(
        ['user_id' => $user->id], 
        [
            'bio'    => '',
            'alamat' => '',
        ]
    );

    return view('admin.profiles.index', compact('user', 'profile'));
}

    // Show method to display user profile
    public function show(User $user)
    {
        $user->load('profile');

        return view('admin.profiles.show', compact('user'));
    }

public function edit()
{
    $user = Auth::user();
    $user->load('profile');

    return view('admin.profiles.edit', compact('user'));
}

public function update(Request $request, Profile $profile)
{
    $user = Auth::user();

    $request->validate([
        'title'         => 'nullable|string|max:255',
        'bio'           => 'nullable|string',
        'avatar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'phone'         => 'nullable|string|max:20',
        'location'      => 'nullable|string|max:255',
        'cv'            => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        'social_links'  => 'nullable|array',
        'social_links.*'=> 'nullable|url'
    ]);

    $profileData = $request->except(['avatar', 'cv', 'social_links']);

    if ($request->hasFile('avatar')) {
        if ($user->profile && $user->profile->avatar) {
            Storage::disk('public')->delete($user->profile->avatar);
        }
        $profileData['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }

    if ($request->hasFile('cv')) {
        if ($user->profile && $user->profile->cv_path) {
            Storage::disk('public')->delete($user->profile->cv_path);
        }
        $profileData['cv_path'] = $request->file('cv')->store('cvs', 'public');
    }

    if ($request->has('social_links')) {
        $profileData['social_links'] = json_encode(array_filter($request->social_links));
    }

        $profile->update($profileData);


    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
}

}
