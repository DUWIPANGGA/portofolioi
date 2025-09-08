@extends('layouts.app')

@section('title', 'Edit SEO Metadata')
@section('subtitle', 'Update SEO metadata entry')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Edit SEO Metadata</h3>
        <a href="{{ route('admin.seo-metas.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <form action="{{ route('admin.seo-metas.update', $seoMeta->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Associated Model (Readonly) -->
                <div>
                    <label class="block text-sm font-medium mb-2">Associated Model Type</label>
                    <div class="neumorph-inset dark:neumorph-inset-dark p-3 rounded-lg">
                        <p class="font-medium">{{ class_basename($seoMeta->metable_type) }}</p>
                    </div>
                </div>
                
                <!-- Model ID (Readonly) -->
                <div>
                    <label class="block text-sm font-medium mb-2">Model ID</label>
                    <div class="neumorph-inset dark:neumorph-inset-dark p-3 rounded-lg">
                        <p>{{ $seoMeta->metable_id }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium mb-2">Meta Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $seoMeta->title) }}"
                       class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                       placeholder="Enter meta title (max 255 characters)">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium mb-2">Meta Description</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                          placeholder="Enter meta description">{{ old('description', $seoMeta->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Keywords -->
            <div class="mb-6">
                <label for="keywords" class="block text-sm font-medium mb-2">Keywords</label>
                <textarea name="keywords" id="keywords" rows="2"
                          class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                          placeholder="Enter keywords, separated by commas">{{ old('keywords', $seoMeta->keywords) }}</textarea>
                @error('keywords')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- OG Image -->
            <div class="mb-6">
                <label for="og_image" class="block text-sm font-medium mb-2">Open Graph Image</label>
                
                @if($seoMeta->og_image)
                    <div class="mb-3">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Current Image:</p>
                        <img src="{{ asset('storage/' . $seoMeta->og_image) }}" alt="Current OG Image" class="max-w-full h-auto rounded-lg max-h-48 mb-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="remove_og_image" value="1" class="mr-2">
                            <span class="text-sm">Remove current image</span>
                        </label>
                    </div>
                @endif
                
                <input type="file" name="og_image" id="og_image" 
                       class="w-full input-field dark:input-field rounded-lg px-4 py-2">
                @error('og_image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.seo-metas.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Update SEO Entry
                </button>
            </div>
        </form>
    </div>
</div>
@endsection