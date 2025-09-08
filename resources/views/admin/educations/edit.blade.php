@extends('layouts.app')

@section('title', 'Edit Education')
@section('subtitle', 'Update education details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-3xl mx-auto">
        <h3 class="text-xl font-semibold mb-6">Edit Education</h3>

        <form action="{{ route('admin.educations.update', $education->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Degree -->
                <div class="md:col-span-2">
                    <label for="degree" class="block mb-2">Degree*</label>
                    <input type="text" id="degree" name="degree" value="{{ old('degree', $education->degree) }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('degree')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Institution -->
                <div class="md:col-span-2">
                    <label for="institution" class="block mb-2">Institution*</label>
                    <input type="text" id="institution" name="institution" value="{{ old('institution', $education->institution) }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('institution')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field of Study -->
                <div class="md:col-span-2">
                    <label for="field_of_study" class="block mb-2">Field of Study</label>
                    <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}" 
                           class="w-full input-field dark:input-field">
                    @error('field_of_study')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block mb-2">Start Date*</label>
                    <input type="date" id="start_date" name="start_date" 
                           value="{{ old('start_date', $education->start_date->format('Y-m-d')) }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('start_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="block mb-2">End Date*</label>
                    <input type="date" id="end_date" name="end_date" 
                           value="{{ old('end_date', $education->end_date->format('Y-m-d')) }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('end_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div class="md:col-span-2">
                    <label for="order" class="block mb-2">Display Order</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $education->order) }}" 
                           class="w-full input-field dark:input-field">
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.educations.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Update Education
                </button>
            </div>
        </form>
    </div>
</div>
@endsection