@extends('layouts.app')

@section('title', 'Create Form Submission')
@section('subtitle', 'Add a new form submission')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Create New Form Submission</h3>
        <a href="{{ route('admin.form-submissions.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-500 hover:text-white transition">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <form action="{{ route('admin.form-submissions.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Form Type -->
                <div class="col-span-1">
                    <label for="form_type" class="block text-sm font-medium mb-2">Form Type *</label>
                    <input type="text" name="form_type" id="form_type" value="{{ old('form_type') }}" 
                           class="w-full input-field dark:input-field @error('form_type') error-field @enderror" 
                           placeholder="e.g., Contact Form, Application Form" required>
                    @error('form_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Status -->
                <div class="col-span-1">
                    <label for="is_processed" class="block text-sm font-medium mb-2">Status</label>
                    <select name="is_processed" id="is_processed" 
                            class="w-full input-field dark:input-field @error('is_processed') error-field @enderror">
                        <option value="0" {{ old('is_processed', 0) == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ old('is_processed') == 1 ? 'selected' : '' }}>Processed</option>
                    </select>
                    @error('is_processed')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Form Data -->
            <div class="mb-6">
                <label for="json_data" class="block text-sm font-medium mb-2">Form Data (JSON) *</label>
                <textarea name="data" id="json_data" rows="10" 
                          class="w-full input-field dark:input-field @error('data') error-field @enderror font-mono text-sm" 
                          placeholder='{"name": "John Doe", "email": "john@example.com", "message": "Hello..."}' 
                          required>{{ old('data', '{}') }}</textarea>
                @error('data')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Enter valid JSON data representing the form submission.
                </p>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.form-submissions.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-500 hover:text-white transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    Create Submission
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Simple JSON validation
document.getElementById('json_data').addEventListener('blur', function(e) {
    try {
        const jsonData = JSON.parse(e.target.value);
        e.target.value = JSON.stringify(jsonData, null, 2);
        e.target.classList.remove('error-field');
    } catch (error) {
        e.target.classList.add('error-field');
        alert('Invalid JSON format: ' + error.message);
    }
});
</script>
@endsection