@extends('layouts.app')

@section('title', 'Service Details')
@section('subtitle', 'View service information')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Service Details</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.services.edit', $service->id) }}" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center">
                    <i class="fas fa-edit text-sm"></i>
                </a>
                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center text-red-500">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <div class="flex items-center space-x-4">
                <div class="neumorph dark:neumorph-dark w-16 h-16 rounded-xl flex items-center justify-center text-3xl">
                    <i class="{{ $service->icon }}"></i>
                </div>
                <div>
                    <h4 class="text-lg font-semibold">{{ $service->title }}</h4>
                    <p class="text-gray-600 dark:text-gray-400">Order: {{ $service->order ?? 'Not set' }}</p>
                </div>
            </div>

            <div>
                <h4 class="font-medium mb-2">Description</h4>
                <p class="text-gray-700 dark:text-gray-300">{{ $service->description }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h4 class="font-medium mb-2">Created At</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $service->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <h4 class="font-medium mb-2">Updated At</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $service->updated_at->format('M d, Y H:i') }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.services.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-lg">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection