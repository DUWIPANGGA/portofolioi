@extends('layouts.app')

@section('title', 'Add New Certificate')
@section('subtitle', 'Add a new certificate')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-3xl mx-auto">
        <h3 class="text-xl font-semibold mb-6">Add New Certificate</h3>

        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block mb-2">Certificate Title*</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Issuer -->
                <div class="md:col-span-2">
                    <label for="issuer" class="block mb-2">Issuing Organization*</label>
                    <input type="text" id="issuer" name="issuer" value="{{ old('issuer') }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('issuer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Issue Date -->
                <div>
                    <label for="issue_date" class="block mb-2">Issue Date*</label>
                    <input type="date" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('issue_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Expiry Date -->
                <div>
                    <label for="expiry_date" class="block mb-2">Expiry Date</label>
                    <input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" 
                           class="w-full input-field dark:input-field">
                    @error('expiry_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Credential ID -->
                <div>
                    <label for="credential_id" class="block mb-2">Credential ID</label>
                    <input type="text" id="credential_id" name="credential_id" value="{{ old('credential_id') }}" 
                           class="w-full input-field dark:input-field">
                    @error('credential_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Credential URL -->
                <div>
                    <label for="credential_url" class="block mb-2">Credential URL</label>
                    <input type="url" id="credential_url" name="credential_url" value="{{ old('credential_url') }}" 
                           class="w-full input-field dark:input-field">
                    @error('credential_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block mb-2">Certificate Image</label>
                    <input type="file" id="image" name="image" 
                           class="w-full input-field dark:input-field"
                           accept="image/*">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-1">Max file size: 2MB. Supported formats: JPEG, PNG, JPG, GIF, SVG</p>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full input-field dark:input-field">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block mb-2">Display Order</label>
                    <input type="number" id="order" name="order" value="{{ old('order', 0) }}" 
                           class="w-full input-field dark:input-field" min="0">
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <label class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" 
                               class="rounded neumorph-checkbox dark:neumorph-checkbox-dark mr-2" 
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <span>Active Certificate</span>
                    </label>
                    @error('is_active')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.certificates.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Save Certificate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection