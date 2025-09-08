@extends('layouts.app')

@section('title', 'Edit User')
@section('subtitle', 'Update user information')

@section('content')
<div class="neumorph-3d dark:neumorph-3d-dark p-6 rounded-2xl mb-6">
    <h3 class="text-xl font-bold mb-6">Edit User</h3>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Name -->
            <div>
                <label for="name" class="block mb-2 font-medium">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                    class="w-full input-field dark:input-field @error('name') border-red-500 @enderror" 
                    placeholder="John Doe" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block mb-2 font-medium">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                    class="w-full input-field dark:input-field @error('email') border-red-500 @enderror" 
                    placeholder="john@example.com" required>
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-2 font-medium">Password (Leave blank to keep current)</label>
                <input type="password" id="password" name="password" 
                    class="w-full input-field dark:input-field @error('password') border-red-500 @enderror" 
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block mb-2 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                    class="w-full input-field dark:input-field" 
                    placeholder="••••••••">
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block mb-2 font-medium">Role</label>
                <select id="role" name="role" 
                    class="w-full input-field dark:input-field @error('role') border-red-500 @enderror" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div>
                <label for="avatar" class="block mb-2 font-medium">Profile Picture</label>
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden neumorph dark:neumorph-dark">
                        <img src="{{ $user->profile?->avatar ?? asset('assets/default-avatar.png') }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="neumorph-btn dark:neumorph-btn-dark p-4 rounded-xl flex-grow">
                        <input type="file" id="avatar" name="avatar" 
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                    </div>
                </div>
                @error('avatar')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('admin.users.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-lg hover:text-primary transition">
                Cancel
            </a>
            <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-lg bg-primary text-white hover:bg-primary-dark transition">
                Update User
            </button>
        </div>
    </form>
</div>
@endsection