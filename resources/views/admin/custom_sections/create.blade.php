@extends('layouts.app')

@section('title', 'Add Custom Section')
@section('subtitle', 'Create a new custom section')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
        <form action="{{ route('admin.custom_sections.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Section Name -->
                <div>
                    <label for="section_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Section Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="section_name" name="section_name" 
                           class="input-field dark:input-field @error('section_name') border-red-500 @enderror" 
                           value="{{ old('section_name') }}" 
                           placeholder="e.g., about, skills, portfolio" required>
                    @error('section_name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Title -->
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Title
                    </label>
                    <input type="text" id="title" name="title" 
                           class="input-field dark:input-field @error('title') border-red-500 @enderror" 
                           value="{{ old('title') }}" 
                           placeholder="Section title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Order -->
                <div>
                    <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Order
                    </label>
                    <input type="number" id="order" name="order" 
                           class="input-field dark:input-field @error('order') border-red-500 @enderror" 
                           value="{{ old('order', 0) }}" 
                           min="0">
                    @error('order')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Status -->
                <div>
                    <label for="is_active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" 
                               class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                               value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label for="is_active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Active
                        </label>
                    </div>
                    @error('is_active')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Content -->
            <div class="mb-6">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Content
                </label>
                <textarea id="content" name="content" rows="6" 
                          class="input-field dark:input-field @error('content') border-red-500 @enderror" 
                          placeholder="Section content...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Custom Data -->
            <div class="mb-6">
                <label for="custom_data" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Custom Data (JSON)
                </label>
                <textarea id="custom_data" name="custom_data" rows="4" 
                          class="input-field dark:input-field @error('custom_data') border-red-500 @enderror font-mono text-sm" 
                          placeholder='{"key": "value"}'>{{ old('custom_data') }}</textarea>
                @error('custom_data')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Buttons -->
            <div class="flex justify-end space-x-3 mt-8">
                <a href="{{ route('admin.custom_sections.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-5 py-2.5 rounded-xl text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-5 py-2.5 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Create Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Simple JSON validation for custom_data field
    document.getElementById('custom_data').addEventListener('blur', function(e) {
        const value = e.target.value.trim();
        if (value) {
            try {
                JSON.parse(value);
                e.target.classList.remove('border-red-500');
            } catch (error) {
                e.target.classList.add('border-red-500');
                alert('Invalid JSON format. Please check your input.');
            }
        }
    });
</script>
@endpush