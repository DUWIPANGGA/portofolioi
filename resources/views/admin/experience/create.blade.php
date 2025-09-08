@extends('layouts.app')

@section('title', 'Add New Experience')
@section('subtitle', 'Add a new work experience')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-3xl mx-auto">
        <h3 class="text-xl font-semibold mb-6">Add New Work Experience</h3>

        <form action="{{ route('admin.experience.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Position -->
                <div class="md:col-span-2">
                    <label for="position" class="block mb-2">Position*</label>
                    <input type="text" id="position" name="position" value="{{ old('position') }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('position')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div class="md:col-span-2">
                    <label for="company" class="block mb-2">Company*</label>
                    <input type="text" id="company" name="company" value="{{ old('company') }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('company')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block mb-2">Description*</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full input-field dark:input-field" required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block mb-2">Start Date*</label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('start_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="block mb-2">End Date</label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" 
                           class="w-full input-field dark:input-field">
                    @error('end_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Position -->
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" id="is_current" name="is_current" value="1" 
                               class="rounded neumorph-checkbox dark:neumorph-checkbox-dark mr-2" 
                               {{ old('is_current') ? 'checked' : '' }}>
                        <span>Current Position</span>
                    </label>
                    @error('is_current')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block mb-2">Display Order</label>
                    <input type="number" id="order" name="order" value="{{ old('order') }}" 
                           class="w-full input-field dark:input-field">
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.experience.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Save Experience
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Toggle end date field based on current position checkbox
    document.getElementById('is_current').addEventListener('change', function() {
        const endDateField = document.getElementById('end_date');
        if (this.checked) {
            endDateField.disabled = true;
            endDateField.value = '';
        } else {
            endDateField.disabled = false;
        }
    });

    // Initialize the state on page load
    document.addEventListener('DOMContentLoaded', function() {
        const isCurrent = document.getElementById('is_current');
        const endDateField = document.getElementById('end_date');
        if (isCurrent.checked) {
            endDateField.disabled = true;
        }
    });
</script>
@endpush
@endsection