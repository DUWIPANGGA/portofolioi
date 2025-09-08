@extends('layouts.app')

@section('title', 'Create New Page')
@section('subtitle', 'Add a new page to your website')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Create New Page</h3>
        <a href="{{ route('admin.pages.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Pages
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium mb-2">Page Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" 
                           class="w-full input-field dark:input-field @error('title') is-invalid @enderror" 
                           placeholder="Enter page title" required>
                    @error('title')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium mb-2">Slug</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-500">/</span>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" 
                               class="w-full input-field dark:input-field pl-6 @error('slug') is-invalid @enderror" 
                               placeholder="page-slug" required>
                    </div>
                    @error('slug')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Status -->
                <div>
                    <label for="is_active" class="block text-sm font-medium mb-2">Status</label>
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" 
                               class="mr-2 rounded border-gray-300 text-primary focus:ring-primary" 
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label for="is_active" class="text-sm">Active (published)</label>
                    </div>
                </div>
                
                <!-- SEO Title -->
                <div>
                    <label for="seo_title" class="block text-sm font-medium mb-2">SEO Title</label>
                    <input type="text" id="seo_title" name="seo_title" value="{{ old('seo_title') }}" 
                           class="w-full input-field dark:input-field @error('seo_title') is-invalid @enderror" 
                           placeholder="Optional SEO title">
                    @error('seo_title')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- SEO Description -->
                <div>
                    <label for="seo_description" class="block text-sm font-medium mb-2">SEO Description</label>
                    <textarea id="seo_description" name="seo_description" rows="3"
                              class="w-full input-field dark:input-field @error('seo_description') is-invalid @enderror" 
                              placeholder="Optional SEO description">{{ old('seo_description') }}</textarea>
                    @error('seo_description')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <!-- Content -->
            <div class="mb-6">
                <label for="content" class="block text-sm font-medium mb-2">Page Content</label>
                <textarea id="content" name="content" rows="12"
                          class="w-full input-field dark:input-field @error('content') is-invalid @enderror" 
                          placeholder="Write your page content here..." required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.pages.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-gray-500 transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Create Page
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Simple slug generation from title
document.getElementById('title').addEventListener('keyup', function() {
    const title = this.value;
    const slugField = document.getElementById('slug');
    
    if (!slugField.value || slugField.value === '') {
        slugField.value = title.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
    }
});
</script>
@endsection