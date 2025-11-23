<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {   
        $users = User::with('profile')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'sometimes|string|in:admin,user'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $profile = $user->profile ?? new Profile();
        return view('admin.users.edit', compact('user', 'profile'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi data user
        $userValidated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'sometimes|string|in:admin,user'
        ]);

        // Validasi data profile
        $profileValidated = $request->validate([
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'social_links' => 'nullable|array',
            'social_links.*' => 'nullable|url'
        ]);

        // Update user data
        if ($request->filled('password')) {
            $userValidated['password'] = Hash::make($userValidated['password']);
        } else {
            unset($userValidated['password']);
        }
        $user->update($userValidated);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->profile && $user->profile->avatar) {
                Storage::delete($user->profile->avatar);
            }
            
            $path = $request->file('avatar')->store('avatars', 'public');
            $profileValidated['avatar'] = $path;
        }

        // Handle social links
        if ($request->has('social_links')) {
            $profileValidated['social_links'] = json_encode(array_filter($request->social_links));
        }

        // Update or create profile
        if ($user->profile) {
            $user->profile->update($profileValidated);
        } else {
            $profileValidated['user_id'] = $user->id;
            Profile::create($profileValidated);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}