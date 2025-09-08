@extends('layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Edit Testimonial</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Update client testimonial information</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="{{ route('admin.testimonials.index') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-arrow-left mr-2"></i> Back to Testimonials
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Client Info Section -->
                <div class="space-y-6">
                    <h4 class="text-lg font-medium border-b border-gray-200 dark:border-gray-700 pb-2">Client Information</h4>
                    
                    <!-- Client Name -->
                    <div>
                        <label for="client_name" class="block mb-2 text-sm font-medium">Client Name *</label>
                        <input type="text" id="client_name" name="client_name" 
                               value="{{ old('client_name', $testimonial->client_name) }}"
                               class="input-field dark:input-field w-full" required>
                        @error('client_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Client Position -->
                    <div>
                        <label for="client_position" class="block mb-2 text-sm font-medium">Client Position *</label>
                        <input type="text" id="client_position" name="client_position" 
                               value="{{ old('client_position', $testimonial->client_position) }}"
                               class="input-field dark:input-field w-full" required>
                        @error('client_position')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Client Company -->
                    <div>
                        <label for="client_company" class="block mb-2 text-sm font-medium">Client Company *</label>
                        <input type="text" id="client_company" name="client_company" 
                               value="{{ old('client_company', $testimonial->client_company) }}"
                               class="input-field dark:input-field w-full" required>
                        @error('client_company')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Client Avatar -->
                    <div>
                        <label for="client_avatar" class="block mb-2 text-sm font-medium">Client Avatar</label>
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full neumorph dark:neumorph-dark overflow-hidden flex-shrink-0">
                                @if($testimonial->client_avatar)
                                    <img id="avatarPreview" src="{{ Storage::url($testimonial->client_avatar) }}" class="w-full h-full object-cover">
                                @else
                                    <div id="avatarPreview" class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500 dark:text-gray-400 text-xl"></i>
                                    </div>
                                @endif
                            </div>
                            <input type="file" id="client_avatar" name="client_avatar" 
                                   class="hidden" accept="image/*">
                            <button type="button" onclick="document.getElementById('client_avatar').click()" 
                                    class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-sm">
                                <i class="fas fa-upload mr-2"></i> Change Image
                            </button>
                        </div>
                        @if($testimonial->client_avatar)
                            <div class="mt-2 flex items-center">
                                <input type="checkbox" id="remove_avatar" name="remove_avatar" class="mr-2">
                                <label for="remove_avatar" class="text-sm text-gray-500 dark:text-gray-400">Remove current avatar</label>
                            </div>
                        @endif
                        @error('client_avatar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Testimonial Details Section -->
                <div class="space-y-6">
                    <h4 class="text-lg font-medium border-b border-gray-200 dark:border-gray-700 pb-2">Testimonial Details</h4>
                    
                    <!-- Content -->
                    <div>
                        <label for="content" class="block mb-2 text-sm font-medium">Testimonial Content *</label>
                        <textarea id="content" name="content" rows="5"
                                  class="input-field dark:input-field w-full" required>{{ old('content', $testimonial->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Rating -->
                    <div>
                        <label class="block mb-2 text-sm font-medium">Rating *</label>
                        <div class="flex items-center gap-2">
                            @for($i = 1; $i <= 5; $i++)
                                <input type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}" 
                                       {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}
                                       class="hidden peer/rating{{ $i }}">
                                <label for="rating{{ $i }}" 
                                       class="w-10 h-10 flex items-center justify-center neumorph-btn dark:neumorph-btn-dark rounded-lg cursor-pointer peer-checked/rating{{ $i }}:bg-primary peer-checked/rating{{ $i }}:text-white">
                                    {{ $i }}
                                </label>
                            @endfor
                        </div>
                        @error('rating')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Featured & Order -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Featured -->
                        <div>
                            <label for="is_featured" class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" id="is_featured" name="is_featured" 
                                           class="sr-only peer" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                                    <div class="block w-14 h-8 rounded-full bg-gray-200 dark:bg-gray-700 peer-checked:bg-primary"></div>
                                    <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition peer-checked:translate-x-6"></div>
                                </div>
                                <span class="ml-3 text-sm font-medium">Featured</span>
                            </label>
                        </div>
                        
                        <!-- Order -->
                        <div>
                            <label for="order" class="block mb-2 text-sm font-medium">Display Order</label>
                            <input type="number" id="order" name="order" 
                                   value="{{ old('order', $testimonial->order) }}"
                                   class="input-field dark:input-field w-full">
                            @error('order')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.testimonials.index') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    <i class="fas fa-save mr-2"></i> Update Testimonial
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Preview uploaded avatar
    document.getElementById('client_avatar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('avatarPreview');
                preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection