@extends('layouts.app')

@section('title', 'Profile Management')
@section('subtitle', 'Manage user profiles')

@section('content')

<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Edit Profile</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->name }}</p>
        </div>
        {{-- {{ dd($user); }} --}}
        <div class="flex gap-3">
            <a href="{{ route('admin.users.show', $user) }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-arrow-left mr-2"></i> Back to User
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
<form action="{{ route('admin.profiles.update', $user->profile->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Title -->
                    <div>   
                        <label for="title" class="block text-sm font-medium mb-2">Professional Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $user->profile->title ?? '') }}"
                               class="w-full input-field dark:input-field px-4 py-2">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Bio -->
                    <div>
                        <label for="bio" class="block text-sm font-medium mb-2">Bio</label>
                        <textarea id="bio" name="bio" rows="5"
                                  class="w-full input-field dark:input-field px-4 py-2">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium mb-2">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                               class="w-full input-field dark:input-field px-4 py-2">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium mb-2">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $profile->location ?? '') }}"
                               class="w-full input-field dark:input-field px-4 py-2">
                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Avatar -->
                    <div>
                        <label for="avatar" class="block text-sm font-medium mb-2">Profile Picture</label>
                        @if(isset($profile->avatar) && $profile->avatar)
                            <div class="mb-3">
                                <img src="{{ Storage::url($profile->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full object-cover">
                            </div>
                        @endif
                        <input type="file" id="avatar" name="avatar" 
                               class="w-full input-field dark:input-field px-4 py-2">
                        @error('avatar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- CV -->
                    <div>
                        <label for="cv" class="block text-sm font-medium mb-2">CV/Resume</label>
                        @if(isset($profile->cv_path) && $profile->cv_path)
                            <div class="mb-3">
                                <a href="{{ Storage::url($profile->cv_path) }}" target="_blank" 
                                   class="text-primary hover:underline flex items-center">
                                    <i class="fas fa-file-pdf mr-2"></i> View Current CV
                                </a>
                            </div>
                        @endif
                        <input type="file" id="cv" name="cv" 
                               class="w-full input-field dark:input-field px-4 py-2">
                        @error('cv')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Social Links -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Social Links</label>
                        <div class="space-y-3">
                            @php
                                $socialLinks = isset($profile->social_links) ? $profile->social_links : [];
                                $platforms = ['linkedin', 'twitter', 'github', 'facebook', 'instagram', 'website'];
                            @endphp
                            
                            @foreach($platforms as $platform)
                                <div>
                                    <label for="social_{{ $platform }}" class="block text-xs text-gray-500 mb-1 capitalize">
                                        <i class="fab fa-{{ $platform }} mr-1"></i> {{ $platform }}
                                    </label>
                                    <input type="url" id="social_{{ $platform }}" name="social_links[{{ $platform }}]" 
                                           value="{{ old("social_links.$platform", $socialLinks[$platform] ?? '') }}"
                                           placeholder="https://{{ $platform }}.com/username"
                                           class="w-full input-field dark:input-field px-4 py-2 text-sm">
                                </div>
                            @endforeach
                        </div>
                        @error('social_links.*')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="mt-8 flex justify-end">
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    <i class="fas fa-save mr-2"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection