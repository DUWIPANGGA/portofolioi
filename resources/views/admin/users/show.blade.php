    @extends('layouts.app')

    @section('title', $user->name)
    @section('subtitle', 'User Details')

    @section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- User Profile -->
        <div class="lg:col-span-1">
            <div class="neumorph-3d dark:neumorph-3d-dark p-6 rounded-2xl">
                <div class="flex flex-col items-center text-center">
                    <div class="w-32 h-32 rounded-full overflow-hidden neumorph dark:neumorph-dark mb-4">
                        <img src="{{ $user->profile?->avatar ?? asset('assets/default-avatar.png') }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $user->email }}</p>
                    <span class="px-3 py-1 neumorph-btn dark:neumorph-btn-dark rounded-full text-sm 
                        @if($user->role === 'admin') text-purple-500 @else text-blue-500 @endif">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>

                <div class="mt-6 space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Member Since</span>
                        <span class="font-medium">{{ $user->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Last Updated</span>
                        <span class="font-medium">{{ $user->updated_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Email Verified</span>
                        <span class="font-medium">
                            @if($user->email_verified_at)
                                {{ $user->email_verified_at->format('M d, Y') }}
                            @else
                                <span class="text-red-500">Not Verified</span>
                            @endif
                        </span>
                    </div>
                </div>

                <div class="mt-6 flex space-x-3">
                    <a href="{{ route('admin.users.edit', $user) }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-lg flex-1 text-center hover:text-yellow-500 transition">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-lg hover:text-red-500 transition">
                            <i class="fas fa-trash mr-2"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- User Details -->
        <div class="lg:col-span-2">
            <div class="neumorph-3d dark:neumorph-3d-dark p-6 rounded-2xl">
                <h3 class="text-xl font-bold mb-6">User Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Info -->
                    <div>
                        <h4 class="font-bold mb-4 text-primary">Personal Information</h4>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Full Name</p>
                                <p class="font-medium">{{ $user->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Email Address</p>
                                <p class="font-medium">{{ $user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Account Status</p>
                                <p class="font-medium">
                                    @if($user->email_verified_at)
                                        <span class="text-green-500">Verified</span>
                                    @else
                                        <span class="text-red-500">Not Verified</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- System Info -->
                    <div>
                        <h4 class="font-bold mb-4 text-primary">System Information</h4>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">User Role</p>
                                <p class="font-medium capitalize">{{ $user->role }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Account Created</p>
                                <p class="font-medium">{{ $user->created_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Last Updated</p>
                                <p class="font-medium">{{ $user->updated_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Data -->
                <div class="mt-8">
                    <h4 class="font-bold mb-4 text-primary">User Statistics</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="neumorph-btn dark:neumorph-btn-dark p-4 rounded-xl text-center">
                            <p class="text-2xl font-bold text-primary">{{ $user->projects->count() }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Projects</p>
                        </div>
                        <div class="neumorph-btn dark:neumorph-btn-dark p-4 rounded-xl text-center">
                            <p class="text-2xl font-bold text-primary">{{ $user->skills->count() }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Skills</p>
                        </div>
                        <div class="neumorph-btn dark:neumorph-btn-dark p-4 rounded-xl text-center">
                            <p class="text-2xl font-bold text-primary">{{ $user->experiences->count() }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Experiences</p>
                        </div>
                        <div class="neumorph-btn dark:neumorph-btn-dark p-4 rounded-xl text-center">
                            <p class="text-2xl font-bold text-primary">{{ $user->testimonials->count() }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Testimonials</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection