@extends('layouts.app')

@section('title', 'Edit Service')
@section('subtitle', 'Update service details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-2xl mx-auto">
        <h3 class="text-xl font-semibold mb-6">Edit Service</h3>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="title" class="block mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon" class="block mb-2">Icon (Font Awesome class)</label>
                    <div class="relative">
                        <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" 
                               class="w-full input-field dark:input-field" placeholder="fas fa-icon" required>
                        <div class="absolute right-3 top-3 text-gray-500 dark:text-gray-400">
                            <i id="icon-preview" class="{{ $service->icon }}"></i>
                        </div>
                    </div>
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" 
                              class="w-full input-field dark:input-field" required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order" class="block mb-2">Order (optional)</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $service->order) }}" 
                           class="w-full input-field dark:input-field">
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4 mt-4">
                    <a href="{{ route('admin.services.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-lg">
                        Cancel
                    </a>
                    <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-lg bg-primary text-white">
                        Update Service
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Live icon preview
    document.getElementById('icon').addEventListener('input', function() {
        const preview = document.getElementById('icon-preview');
        preview.className = this.value || '{{ $service->icon }}';
    });
</script>
@endpush
@endsection