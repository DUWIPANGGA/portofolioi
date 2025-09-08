@extends('layouts.app')

@section('title', $technology->name)
@section('subtitle', 'Technology Details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        <!-- Technology Header -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                <div class="w-20 h-20 rounded-full neumorph dark:neumorph-dark flex items-center justify-center text-3xl">
                    <i class="{{ $technology->icon }}"></i>
                </div>
                <div class="flex-1">
                    <h1 class="text-2xl font-bold">{{ $technology->name }}</h1>
                    <div class="flex flex-wrap gap-3 mt-2">
                        <span class="px-3 py-1 rounded-full text-sm neumorph-btn dark:neumorph-btn-dark capitalize">
                            {{ $technology->category }}
                        </span>
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $technology->is_checked ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                            {{ $technology->is_checked ? 'Active' : 'Inactive' }}
                        </span>
                        @if($technology->order)
                            <span class="px-3 py-1 rounded-full text-sm neumorph-btn dark:neumorph-btn-dark">
                                Order: {{ $technology->order }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" 
                       class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                       title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                title="Delete"
                                onclick="return confirm('Are you sure you want to delete this technology?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Technology Details -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Projects Using This Technology -->
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-xl">
                    <h3 class="font-bold mb-3 text-primary">Used in Projects</h3>
                    @if($technology->projects->count() > 0)
                        <div class="space-y-3">
                            @foreach($technology->projects->take(5) as $project)
                                <a href="{{ route('admin.projects.show', $project->id) }}" 
                                   class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                    <div class="w-8 h-8 rounded-full neumorph dark:neumorph-dark mr-3 overflow-hidden">
                                        <img src="{{ $project->image_path ? asset('storage/'.$project->image_path) : asset('assets/default-project.png') }}" 
                                             alt="{{ $project->title }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium">{{ $project->title }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $project->project_date->format('M Y') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                            @if($technology->projects->count() > 5)
                                <div class="text-center pt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        +{{ $technology->projects->count() - 5 }} more projects
                                    </p>
                                </div>
                            @endif
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">Not used in any projects yet</p>
                    @endif
                </div>
                
                <!-- Technology Information -->
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-xl">
                    <h3 class="font-bold mb-3 text-primary">Technology Information</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Icon Class</p>
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full neumorph dark:neumorph-dark mr-3 flex items-center justify-center">
                                    <i class="{{ $technology->icon }} text-sm"></i>
                                </div>
                                <code class="text-sm bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">{{ $technology->icon }}</code>
                            </div>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Created</p>
                            <p>{{ $technology->created_at->format('M d, Y') }} ({{ $technology->created_at->diffForHumans() }})</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Last Updated</p>
                            <p>{{ $technology->updated_at->format('M d, Y') }} ({{ $technology->updated_at->diffForHumans() }})</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection