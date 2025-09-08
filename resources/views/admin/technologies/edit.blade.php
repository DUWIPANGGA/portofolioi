@extends('layouts.app')

@section('title', 'Edit Technology')
@section('subtitle', 'Update technology details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
        <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 font-medium">Technology Name *</label>
                    <input type="text" name="name" id="name" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('name', $technology->name) }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Icon -->
                <div>
                    <label for="icon" class="block mb-2 font-medium">Icon Class *</label>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full neumorph dark:neumorph-dark mr-3 flex items-center justify-center">
                            <i class="{{ $technology->icon }}"></i>
                        </div>
                        <input type="text" name="icon" id="icon" 
                               class="flex-1 input-field dark:input-field" 
                               value="{{ old('icon', $technology->icon) }}" required>
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Use Font Awesome icon classes (e.g., "fab fa-js")
                    </p>
                    @error('icon')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Category -->
                <div>
                    <label for="category" class="block mb-2 font-medium">Category *</label>
                    <select name="category" id="category" 
                            class="w-full input-field dark:input-field" required>
                        <option value="">Select a category</option>
                        <option value="frontend" {{ old('category', $technology->category) == 'frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="backend" {{ old('category', $technology->category) == 'backend' ? 'selected' : '' }}>Backend</option>
                        <option value="database" {{ old('category', $technology->category) == 'database' ? 'selected' : '' }}>Database</option>
                        <option value="devops" {{ old('category', $technology->category) == 'devops' ? 'selected' : '' }}>DevOps</option>
                        <option value="mobile" {{ old('category', $technology->category) == 'mobile' ? 'selected' : '' }}>Mobile</option>
                        <option value="other" {{ old('category', $technology->category) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Order -->
                <div>
                    <label for="order" class="block mb-2 font-medium">Display Order</label>
                    <input type="number" name="order" id="order" 
                           class="w-full input-field dark:input-field" 
                           value="{{ old('order', $technology->order) }}">
                    @error('order')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Status -->
            <div class="mb-6">
                <label class="flex items-center">
<input type="hidden" name="is_checked" value="0"> {{-- default 0 kalau unchecked --}}
<input type="checkbox" 
       name="is_checked" 
       id="is_checked" 
       value="1"
       class="rounded text-primary mr-2" 
       {{ old('is_checked', $technology->is_checked) ? 'checked' : '' }}>

                    <span>Active Technology</span>
                </label>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Active technologies will be available for selection in projects
                </p>
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.technologies.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Update Technology
                </button>
            </div>
        </form>
    </div>
</div>
@endsection