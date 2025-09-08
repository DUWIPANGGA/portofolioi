@extends('layouts.app')

@section('title', 'Create New Technology')
@section('subtitle', 'Add a new technology to your stack')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 font-medium">Technology Name *</label>
                    <input type="text" name="name" id="name" class="w-full input-field dark:input-field" value="{{ old('name') }}" required>
                    @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label for="icon" class="block mb-2 font-medium">Icon Class *</label>
                    <div class="relative">
                        <input type="text" name="icon" id="icon" class="w-full input-field dark:input-field pl-10" value="{{ old('icon') }}" required placeholder="fas fa-icon">
                        <i class="fas fa-icons absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
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
                    <select name="category" id="category" class="w-full input-field dark:input-field" required>
                        <option value="">Select a category</option>
                        <option value="frontend" {{ old('category') == 'frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="backend" {{ old('category') == 'backend' ? 'selected' : '' }}>Backend</option>
                        <option value="database" {{ old('category') == 'database' ? 'selected' : '' }}>Database</option>
                        <option value="devops" {{ old('category') == 'devops' ? 'selected' : '' }}>DevOps</option>
                        <option value="mobile" {{ old('category') == 'mobile' ? 'selected' : '' }}>Mobile</option>
                        <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('category')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block mb-2 font-medium">Display Order</label>
                    <input type="number" name="order" id="order" class="w-full input-field dark:input-field" value="{{ old('order') }}">
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
       {{ old('is_checked', true) ? 'checked' : '' }}>

                    <span>Active Technology</span>
                </label>

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Active technologies will be available for selection in projects
                </p>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.technologies.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition">
                    Cancel
                </a>
                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Create Technology
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
