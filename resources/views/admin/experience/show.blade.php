@extends('layouts.app')

@section('title', 'Experience Details')
@section('subtitle', 'View work experience details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Experience Details</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.experience.edit', $experience->id) }}" 
                   class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                   title="Edit">
                    <i class="fas fa-edit text-sm"></i>
                </a>
                <form action="{{ route('admin.experience.destroy', $experience->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                            title="Delete"
                            onclick="return confirm('Are you sure you want to delete this experience?')">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <!-- Header -->
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4 border-b border-gray-200 dark:border-gray-700 pb-6">
                <div class="w-16 h-16 rounded-xl neumorph dark:neumorph-dark flex items-center justify-center text-2xl text-primary">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div>
                    <h4 class="text-2xl font-bold">{{ $experience->position }}</h4>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ $experience->company }}</p>
                </div>
            </div>

            <!-- Timeline -->
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-primary"></div>
                <div class="text-gray-600 dark:text-gray-400">
                    {{ $experience->start_date->format('M Y') }} - 
                    {{ $experience->is_current ? 'Present' : ($experience->end_date ? $experience->end_date->format('M Y') : 'N/A') }}
                    <span class="px-2 py-1 ml-2 rounded-full text-xs font-medium {{ $experience->is_current ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                        {{ $experience->is_current ? 'Current Position' : 'Past Experience' }}
                    </span>
                </div>
            </div>

            <!-- Description -->
            <div>
                <h5 class="font-medium mb-2">Description</h5>
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($experience->description)) !!}
                </div>
            </div>

            <!-- Meta Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <div>
                    <h5 class="font-medium mb-2">Display Order</h5>
                    <p>{{ $experience->order ?? 'Not specified' }}</p>
                </div>
                <div>
                    <h5 class="font-medium mb-2">Last Updated</h5>
                    <p>{{ $experience->updated_at->format('M d, Y \a\t h:i A') }}</p>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('admin.experience.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl">
                    Back to Experiences
                </a>
            </div>
        </div>
    </div>
</div>
@endsection