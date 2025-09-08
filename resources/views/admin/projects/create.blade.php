@extends('layouts.app')

@section('title', 'Create New Project')
@section('subtitle', 'Add a new project to your portfolio')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Project Title -->
                <div>
                    <label for= "title" class="block mb-2 font-medium">Project Title *</label>
                    <input type="text" name="title" id="title" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Project Slug -->
                <div>
                    <label for="slug" class="block mb-2 font-medium">Project Slug *</label>
                    <input type="text" name="slug" id="slug" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('slug') }}" required>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Project Image -->
                <div>
                    <label for="image_path" class="block mb-2 font-medium">Project Image *</label>
                    <input type="file" name="image_path" id="image_path" 
                           class="w-full input-field dark:input-field" required>
                    @error('image_path')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Featured Image -->
                <div>
                    <label for="featured_image_path" class="block mb-2 font-medium">Featured Image</label>
                    <input type="file" name="featured_image_path" id="featured_image_path" 
                           class="w-full input-field dark:input-field">
                    @error('featured_image_path')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Project Date -->
                <div>
                    <label for="project_date" class="block mb-2 font-medium">Project Date *</label>
                    <input type="date" name="project_date" id="project_date" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('project_date') }}" required>
                    @error('project_date')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Client -->
                <div>
                    <label for="client" class="block mb-2 font-medium">Client</label>
                    <input type="text" name="client" id="client" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('client') }}">
                    @error('client')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block mb-2 font-medium">Description *</label>
                <textarea name="description" id="description" rows="5" 
                          class="w-full input-field dark:input-field" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- URLs -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="demo_url" class="block mb-2 font-medium">Demo URL</label>
                    <input type="url" name="demo_url" id="demo_url" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('demo_url') }}">
                    @error('demo_url')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="case_study_url" class="block mb-2 font-medium">Case Study URL</label>
                    <input type="url" name="case_study_url" id="case_study_url" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('case_study_url') }}">
                    @error('case_study_url')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Technologies -->
            <div class="mb-6">
                <label class="block mb-2 font-medium">Technologies Used</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                    @foreach($technologies as $tech)
                        <div class="flex items-center">
                            <input type="checkbox" name="technologies[]" id="tech_{{ $tech->id }}" 
                                   value="{{ $tech->id }}" class="mr-2 rounded text-primary">
                            <label for="tech_{{ $tech->id }}">{{ $tech->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('technologies')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.projects.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Create Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection