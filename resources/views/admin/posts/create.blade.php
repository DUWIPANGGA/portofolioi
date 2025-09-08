@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Create New Post</h3>
        <a href="{{ route('admin.posts.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Posts
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block mb-2 font-medium">Post Title*</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" 
                           class="input-field dark:input-field w-full" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Slug -->
                <div>
                    <label for="slug" class="block mb-2 font-medium">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" 
                           class="input-field dark:input-field w-full">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Leave blank to auto-generate from title</p>
                    @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block mb-2 font-medium">Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image" 
                           class="input-field dark:input-field w-full">
                    @error('featured_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block mb-2 font-medium">Excerpt*</label>
                    <textarea name="excerpt" id="excerpt" rows="3" 
                              class="input-field dark:input-field w-full" required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Content -->
                <div>
                    <label for="content" class="block mb-2 font-medium">Content*</label>
                    <textarea name="content" id="content" rows="10" 
                              class="input-field dark:input-field w-full" required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Category -->
                    <div>
                        <label for="category" class="block mb-2 font-medium">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category') }}" 
                               class="input-field dark:input-field w-full">
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block mb-2 font-medium">Tags</label>
                        <input type="text" name="tags" id="tags" value="{{ old('tags') }}" 
                               class="input-field dark:input-field w-full" placeholder="comma, separated, values">
                        @error('tags')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Reading Time -->
                    <div>
                        <label for="reading_time" class="block mb-2 font-medium">Reading Time (minutes)</label>
                        <input type="number" name="reading_time" id="reading_time" value="{{ old('reading_time') }}" 
                               min="1" class="input-field dark:input-field w-full">
                        @error('reading_time')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Publish Status -->
                    <div>
                        <label class="block mb-2 font-medium">Publish Status</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="is_published" value="1" 
                                       class="form-radio text-primary" {{ old('is_published') == '1' ? 'checked' : '' }}>
                                <span class="ml-2">Published</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="is_published" value="0" 
                                       class="form-radio" {{ old('is_published', '0') == '0' ? 'checked' : '' }}>
                                <span class="ml-2">Draft</span>
                            </label>
                        </div>
                        @error('is_published')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Publish Date -->
                    <div>
                        <label for="published_at" class="block mb-2 font-medium">Publish Date</label>
                        <input type="datetime-local" name="published_at" id="published_at" 
                               value="{{ old('published_at') }}" class="input-field dark:input-field w-full">
                        @error('published_at')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mt-8 flex justify-end">
                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    <i class="fas fa-save mr-2"></i> Create Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection