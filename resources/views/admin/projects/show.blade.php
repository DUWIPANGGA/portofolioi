@extends('layouts.app')

@section('title', $project->title)
@section('subtitle', 'Project Details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        <!-- Project Header -->
        <div class="relative">
            @if($project->featured_image_path)
                <img src="{{ asset('storage/'.$project->featured_image_path) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-r from-primary to-secondary flex items-center justify-center">
                    <h2 class="text-4xl font-bold text-white">{{ $project->title }}</h2>
                </div>
            @endif
            
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                <div class="flex items-end">
                    <div class="w-20 h-20 rounded-full overflow-hidden neumorph dark:neumorph-dark mr-4 border-2 border-white">
                        <img src="{{ asset('storage/'.$project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">{{ $project->title }}</h1>
                        <p class="text-gray-300">{{ $project->client }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Project Details -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Project Meta -->
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-xl">
                    <h3 class="font-bold mb-3 text-primary">Project Details</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-2">
                            <span class="text-gray-600 dark:text-gray-400">Date:</span>
                            <span>{{ $project->project_date->format('M d, Y') }}</span>
                        </div>
                        @if($project->demo_url)
                        <div class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-2">
                            <span class="text-gray-600 dark:text-gray-400">Demo URL:</span>
                            <a href="{{ $project->demo_url }}" target="_blank" class="text-primary hover:underline">View Demo</a>
                        </div>
                        @endif
                        @if($project->case_study_url)
                        <div class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-2">
                            <span class="text-gray-600 dark:text-gray-400">Case Study:</span>
                            <a href="{{ $project->case_study_url }}" target="_blank" class="text-primary hover:underline">View Case Study</a>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Technologies -->
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-xl">
                    <h3 class="font-bold mb-3 text-primary">Technologies Used</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->technologies as $techId)
    @php
        $tech = \App\Models\Technology::find($techId);
    @endphp
    @if($tech)
        <span class="px-3 py-1 rounded-full text-xs neumorph-btn dark:neumorph-btn-dark">
            {{ $tech->name }}
        </span>
    @endif
@endforeach

                    </div>
                </div>
                
                <!-- Actions -->
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-xl">
                    <h3 class="font-bold mb-3 text-primary">Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" 
                           class="flex items-center neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-lg w-full">
                            <i class="fas fa-edit mr-2"></i> Edit Project
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="flex items-center neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-lg w-full text-red-500"
                                    onclick="return confirm('Are you sure you want to delete this project?')">
                                <i class="fas fa-trash mr-2"></i> Delete Project
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Description -->
            <div class="neumorph-inset dark:neumorph-inset-dark p-6 rounded-xl mb-6">
                <h3 class="font-bold mb-4 text-primary">Project Description</h3>
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($project->description)) !!}
                </div>
            </div>
            
            <!-- Gallery (if applicable) -->
            @if($project->gallery_images && count($project->gallery_images) > 0)
            <div class="neumorph-inset dark:neumorph-inset-dark p-6 rounded-xl">
                <h3 class="font-bold mb-4 text-primary">Project Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($project->gallery_images as $image)
                    <div class="rounded-lg overflow-hidden neumorph dark:neumorph-dark">
                        <img src="{{ asset('storage/'.$image) }}" alt="Gallery Image" class="w-full h-32 object-cover">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection