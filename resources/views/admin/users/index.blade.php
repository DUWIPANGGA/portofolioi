@extends('layouts.app')

@section('title', 'Users Management')
@section('subtitle', 'List of all users')

@section('content')
<div class="neumorph-3d dark:neumorph-3d-dark p-6 rounded-2xl mb-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold">Users List</h3>
        <a href="{{ route('admin.users.create') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-lg text-sm hover:text-primary transition">
            <i class="fas fa-plus mr-1"></i> Add New User
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                    <th class="pb-3">Name</th>
                    <th class="pb-3">Email</th>
                    <th class="pb-3">Role</th>
                    <th class="pb-3">Joined</th>
                    <th class="pb-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($users as $user)
                <tr>
                    <td class="py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full overflow-hidden mr-3 neumorph dark:neumorph-dark">
                                @if ($user->profile && $user->profile->avatar)
    <img 
        src="{{ asset('storage/' . $user->profile->avatar) }}" 
        alt="Profile" 
        class="w-full h-full object-cover rounded-full"
    >
@else
    <div class="w-full h-full rounded-full neumorph-btn flex items-center justify-center bg-gray-100">
        <i class="fas fa-user text-gray-400 text-3xl"></i>
    </div>
@endif

                            </div>
                            <div>
                                <p class="font-medium">{{ $user->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">{{ $user->email }}</td>
                    <td class="py-4">
                        <span class="px-2 py-1 text-xs neumorph-btn dark:neumorph-btn-dark rounded-full 
                            @if($user->role === 'admin') text-purple-500 @else text-blue-500 @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="py-4">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="py-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.users.show', $user->id) }}" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                <i class="fas fa-eye text-xs"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center hover:text-yellow-500 transition">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center hover:text-red-500 transition">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center mt-4">
        <p class="text-sm text-gray-500 dark:text-gray-400">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users</p>
        <div class="flex space-x-2">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection