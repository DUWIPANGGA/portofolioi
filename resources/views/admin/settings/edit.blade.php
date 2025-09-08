@extends('layouts.app')

@section('title', 'Edit Setting')
@section('subtitle', 'Update setting value')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Edit Setting</h3>
        <a href="{{ route('admin.settings.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Settings
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6 mb-6">
                <!-- Key Field (Read-only) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Setting Key</label>
                    <input type="text" value="{{ $setting->key }}" 
                           class="w-full input-field dark:input-field bg-gray-100 dark:bg-gray-700 cursor-not-allowed" 
                           readonly>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Setting key cannot be modified.</p>
                </div>
                
                <!-- Value Field -->
                <div>
                    <label for="value" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Setting Value</label>
                    <textarea name="value" id="value" rows="6" 
                              class="w-full input-field dark:input-field @error('value') border-red-500 @enderror" 
                              required>{{ old('value', $setting->value) }}</textarea>
                    @error('value')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.settings.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Update Setting
                </button>
            </div>
        </form>
    </div>
</div>
@endsection