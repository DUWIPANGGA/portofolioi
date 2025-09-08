@extends('layouts.app')

@section('title', 'Create New User')
@section('subtitle', 'Add a new user to the system')

@section('content')
<div class="neumorph-3d dark:neumorph-3d-dark p-6 rounded-2xl mb-6">
    <h3 class="text-xl font-bold mb-6">User Information</h3>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Name -->
            <div>
                <label for="name" class="block mb-2 font-medium">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                    class="w-full input-field dark:input-field @error('name') border-red-500 @enderror" 
                    placeholder="John Doe" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block mb-2 font-medium">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                    class="w-full input-field dark:input-field @error('email') border-red-500 @enderror" 
                    placeholder="john@example.com" required>
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-2 font-medium">Password</label>
                <input type="password" id="password" name="password" 
                    class="w-full input-field dark:input-field @error('password') border-red-500 @enderror" 
                    placeholder="••••••••" required>
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block mb-2 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                    class="w-full input-field dark:input-field" 
                    placeholder="••••••••" required>
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block mb-2 font-medium">Role</label>
                <select id="role" name="role" 
                    class="w-full input-field dark:input-field @error('role') border-red-500 @enderror" required>
                    <option value="">Select Role</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div>
                <label for="avatar" class="block mb-2 font-medium">Profile Picture</label>
                <div class="neumorph-btn dark:neumorph-btn-dark p-4 rounded-xl">
                    <input type="file" id="avatar" name="avatar" 
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
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
                Create User
            </button>
        </div>
    </form>
</div>
@endsection