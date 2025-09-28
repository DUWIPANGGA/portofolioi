@extends('layouts.app')

@section('title', 'User Profile')
@section('subtitle', 'User profile details')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">User Profile</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->name }}</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.users.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-arrow-left mr-2"></i> Back to Users
            </a>
            <a href="{{ route('admin.profiles.edit', $user->profile) }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-edit mr-2"></i> Edit Profile
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6 md:col-span-1">
            <div class="text-center">
                @if(isset($profile->avatar) && $profile->avatar)
                <img src="{{ Storage::url($profile->avatar) }}" alt="Avatar" class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
                @else
                <div class="w-32 h-32 rounded-full neumorph dark:neumorph-dark mx-auto mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-user text-4xl"></i>
                </div>
                @endif

                <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                @if(isset($profile->title) && $profile->title)
                <p class="text-primary">{{ $profile->title }}</p>
                @endif

                @if(isset($profile->location) && $profile->location)
                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    <i class="fas fa-map-marker-alt mr-2"></i> {{ $profile->location }}
                </p>
                @endif

                @if(isset($profile->phone) && $profile->phone)
                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    <i class="fas fa-phone mr-2"></i> {{ $profile->phone }}
                </p>
                @endif
                @php
                $decodedSocialLinks = is_string($profile->social_links ?? null)
                ? json_decode($profile->social_links, true)
                : ($profile->social_links ?? []);
                @endphp

                <!-- Social Links -->
                @if(isset($profile->social_links) && !empty(array_filter($profile->social_links)))
                <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-medium mb-3">Social Links</h4>
                    <div class="flex justify-center space-x-3">
                        @foreach($profile->social_links as $platform => $url)
                        @if($url)
                        <a href="{{ $url }}" target="_blank" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition" title="{{ ucfirst($platform) }}">
                            <i class="fab fa-{{ $platform }}"></i>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- CV Download -->
                @if(isset($profile->cv_path) && $profile->cv_path)
                <div class="mt-6">
                    <a href="{{ Storage::url($profile->cv_path) }}" target="_blank" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                        <i class="fas fa-download mr-2"></i> Download CV
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Bio and Details -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6 md:col-span-2">
            <h3 class="text-lg font-semibold mb-4">About</h3>

            @if(isset($profile->bio) && $profile->bio)
            <div class="prose dark:prose-invert max-w-none">
                {!! nl2br(e($profile->bio)) !!}
            </div>
            @else
            <p class="text-gray-500 dark:text-gray-400 italic">No bio information available.</p>
            @endif

            <!-- Additional Information -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">User Information</h4>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Joined:</strong> {{ $user->created_at->format('M d, Y') }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Profile Details</h4>
                    <p><strong>Last Updated:</strong>
                        @if(isset($profile->updated_at))
                        {{ $profile->updated_at->format('M d, Y') }}
                        @else
                        Never
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
