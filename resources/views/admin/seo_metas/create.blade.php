@extends('layouts.app')

@section('title', 'Add SEO Metadata')
@section('subtitle', 'Create new SEO metadata entry')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Add SEO Metadata</h3>
        <a href="{{ route('admin.seo-metas.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <form action="{{ route('admin.seo-metas.store') }}" method="POST" enctype="multipart/form-data" id="seo-form">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Metable Type -->
                <div>
                    <label for="metable_type" class="block text-sm font-medium mb-2">Associated Model Type</label>
                    <select name="metable_type" id="metable_type" required
                            class="w-full input-field dark:input-field rounded-lg px-4 py-2">
                        <option value="">Select Model Type</option>
                        @foreach($modelTypes as $type => $name)
                            <option value="{{ $type }}" {{ old('metable_type') == $type ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-500 mt-1">Select the type of content this SEO data applies to</p>
                    @error('metable_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Metable ID -->
                <div>
                    <label for="metable_id" class="block text-sm font-medium mb-2">Model ID</label>
                    <input type="number" name="metable_id" id="metable_id" value="{{ old('metable_id') }}" required
                           class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                           placeholder="Enter model ID" min="1">
                    <p class="text-xs text-gray-500 mt-1">Enter the ID of the specific content item</p>
                    @error('metable_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Title -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <label for="title" class="block text-sm font-medium">Meta Title</label>
                    <span id="title-counter" class="text-xs text-gray-500">0/255 characters</span>
                </div>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                       placeholder="Enter meta title (max 255 characters)" maxlength="255">
                <p class="text-xs text-gray-500 mt-1">Ideal length is 50-60 characters for search results</p>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Description -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <label for="description" class="block text-sm font-medium">Meta Description</label>
                    <span id="description-counter" class="text-xs text-gray-500">0/255 characters</span>
                </div>
                <textarea name="description" id="description" rows="3"
                          class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                          placeholder="Enter meta description" maxlength="255">{{ old('description') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Ideal length is 150-160 characters for search results</p>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Keywords -->
            <div class="mb-6">
                <label for="keywords" class="block text-sm font-medium mb-2">Keywords</label>
                <textarea name="keywords" id="keywords" rows="2"
                          class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                          placeholder="Enter keywords, separated by commas">{{ old('keywords') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Separate with commas (e.g., "keyword1, keyword2, keyword3")</p>
                @error('keywords')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- OG Image -->
            <div class="mb-6">
                <label for="og_image" class="block text-sm font-medium mb-2">Open Graph Image</label>
                <input type="file" name="og_image" id="og_image" 
                       class="w-full input-field dark:input-field rounded-lg px-4 py-2"
                       accept="image/jpeg,image/png,image/jpg,image/gif">
                <p class="text-xs text-gray-500 mt-1">Recommended: 1200×630 pixels, max size 2MB</p>
                <div id="image-preview" class="mt-2 hidden">
                    <img id="preview" class="max-w-xs rounded-lg shadow-md" src="" alt="Image preview">
                </div>
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
                    Create SEO Entry
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counters
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const titleCounter = document.getElementById('title-counter');
    const descriptionCounter = document.getElementById('description-counter');
    const ogImageInput = document.getElementById('og_image');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview');
    
    // Update counters
    function updateCounter(input, counter) {
        counter.textContent = `${input.value.length}/255 characters`;
    }
    
    // Initialize counters
    updateCounter(titleInput, titleCounter);
    updateCounter(descriptionInput, descriptionCounter);
    
    // Add event listeners
    titleInput.addEventListener('input', () => updateCounter(titleInput, titleCounter));
    descriptionInput.addEventListener('input', () => updateCounter(descriptionInput, descriptionCounter));
    
    // Image preview
    ogImageInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            
            // Check file size (2MB limit)
            if (file.size > 2 * 1024 * 1024) {
                alert('File size exceeds 2MB limit. Please choose a smaller file.');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
            }
            
            reader.readAsDataURL(file);
        }
    });
    
    // Form validation
    document.getElementById('seo-form').addEventListener('submit', function(e) {
        const metableType = document.getElementById('metable_type').value;
        const metableId = document.getElementById('metable_id').value;
        
        if (!metableType || !metableId) {
            e.preventDefault();
            alert('Please select both a model type and enter a model ID.');
            return false;
        }
    });
});
</script>
@endsection