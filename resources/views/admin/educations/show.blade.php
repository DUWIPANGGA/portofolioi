@extends('layouts.app')

@section('title', 'Education Details')
@section('subtitle', 'View education details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-card-3d p-6 max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Education Details</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.educations.edit', $education->id) }}" 
                   class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                   title="Edit">
                    <i class="fas fa-edit text-sm"></i>
                </a>
                <form action="{{ route('admin.educations.destroy', $education->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                            title="Delete"
                            onclick="return confirm('Are you sure you want to delete this education entry?')">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <!-- Header -->
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4 border-b border-gray-200 dark:border-gray-700 pb-6">
                <div class="w-16 h-16 rounded-xl neumorph dark:neumorph-dark flex items-center justify-center text-2xl text-primary">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h4 class="text-2xl font-bold">{{ $education->degree }}</h4>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ $education->institution }}</p>
                </div>
            </div>

            <!-- Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @if($education->field_of_study)
                <div>
                    <h5 class="font-medium mb-2">Field of Study</h5>
                    <p>{{ $education->field_of_study }}</p>
                </div>
                @endif
                
                <div>
                    <h5 class="font-medium mb-2">Duration</h5>
                    <p>
                        {{ $education->start_date->format('M Y') }} - {{ $education->end_date->format('M Y') }}
                        <span class="text-gray-500 dark:text-gray-400 ml-2">
                            ({{ $education->start_date->diffInYears($education->end_date) }} years)
                        </span>
                    </p>
                </div>
                
                <div>
                    <h5 class="font-medium mb-2">Display Order</h5>
                    <p>{{ $education->order ?? 'Not specified' }}</p>
                </div>
                
                <div>
                    <h5 class="font-medium mb-2">Last Updated</h5>
                    <p>{{ $education->updated_at->format('M d, Y \a\t h:i A') }}</p>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('admin.educations.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl">
                    Back to Education List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection