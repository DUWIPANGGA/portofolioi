@extends('layouts.app')

@section('title', 'Create New Skill')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Create New Skill</h3>
        <a href="{{ route('admin.skills.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Skills
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Selection -->
                <div class="col-span-1">
                    <label for="user_id" class="block mb-2 font-medium">User</label>
                    <select name="user_id" id="user_id" class="input-field dark:input-field w-full" required>
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Skill Name -->
                <div class="col-span-1">
                    <label for="name" class="block mb-2 font-medium">Skill Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                           class="input-field dark:input-field w-full" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Percentage -->
                <div class="col-span-1">
                    <label for="percentage" class="block mb-2 font-medium">Percentage (0-100)</label>
                    <input type="number" name="percentage" id="percentage" value="{{ old('percentage') }}" 
                           min="0" max="100" class="input-field dark:input-field w-full" required>
                    @error('percentage')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Skill Level (Enum) -->
                <div class="col-span-1">
                    <label for="level" class="block mb-2 font-medium">Skill Level (Enum)</label>
                    <select name="level" id="level" class="input-field dark:input-field w-full" required>
                        @foreach($skillLevels as $levelEnum)
                            <option value="{{ $levelEnum->value }}" {{ old('level', 'advanced') === $levelEnum->value ? 'selected' : '' }}>
                                {{ $levelEnum->label() }} ({{ $levelEnum->value }})
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-500 mt-1">Pilih tingkat kemahiran: Beginner, Intermediate, Advanced, Expert, Master</p>
                    @error('level')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Category -->
                <div class="col-span-1">
                    <label for="category" class="block mb-2 font-medium">Category</label>
                    <input type="text" name="category" id="category" value="{{ old('category') }}" 
                           class="input-field dark:input-field w-full">
                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Icon -->
                <div class="col-span-1">
                    <label for="icon" class="block mb-2 font-medium">Icon (Font Awesome class)</label>
                    <input type="text" name="icon" id="icon" value="{{ old('icon') }}" 
                           placeholder="fas fa-code" class="input-field dark:input-field w-full">
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Logo Image URL -->
                <div class="col-span-1">
                    <label for="image" class="block mb-2 font-medium">Logo Image URL</label>
                    <input type="text" name="image" id="image" value="{{ old('image') }}"
                           placeholder="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
                           class="input-field dark:input-field w-full"
                           oninput="document.getElementById('imagePreview').src = this.value;">
                    <p class="text-xs text-gray-500 mt-1">Link logo/ikon teknologi (SVG/PNG). Kosongkan untuk pakai icon Font Awesome.</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-2 w-10 h-10 border rounded-lg items-center justify-center bg-white" id="imagePreviewBox" style="{{ old('image') ? 'display:flex' : 'display:none' }}">
                        <img id="imagePreview" src="{{ old('image') }}" alt="preview" class="w-6 h-6 object-contain" onload="this.parentElement.style.display='flex'" onerror="this.parentElement.style.display='none'">
                    </div>
                </div>
                
                <!-- Order -->
                <div class="col-span-1">
                    <label for="order" class="block mb-2 font-medium">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order') }}" 
                           class="input-field dark:input-field w-full">
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-8 flex justify-end">
                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    <i class="fas fa-save mr-2"></i> Create Skill
                </button>
            </div>
        </form>
    </div>
</div>
@endsection