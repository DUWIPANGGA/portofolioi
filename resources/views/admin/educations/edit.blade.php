@extends('layouts.app')

@section('title', 'Edit Education')
@section('subtitle', 'Update education details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-3xl mx-auto">
        <h3 class="text-xl font-semibold mb-6">Edit Education</h3>

        <form action="{{ route('admin.educations.update', $education->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Degree -->
                <div class="md:col-span-2">
                    <label for="degree" class="block mb-2 font-medium">Degree*</label>
                    <input type="text" id="degree" name="degree" value="{{ old('degree', $education->degree) }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('degree')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Institution -->
                <div class="md:col-span-2">
                    <label for="institution" class="block mb-2 font-medium">Institution / Nama Sekolah / Kampus*</label>
                    <input type="text" id="institution" name="institution" value="{{ old('institution', $education->institution) }}" 
                           class="w-full input-field dark:input-field" required>
                    @error('institution')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Logo Kampus / Sekolah -->
                <div class="md:col-span-2">
                    <label class="block mb-2 font-medium">
                        <i class="fas fa-university text-primary mr-1"></i> Logo Kampus / Sekolah <span class="text-gray-400 text-xs font-normal">(opsional)</span>
                    </label>

                    @if($education->logo_url)
                        <div class="mb-3 p-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50/70 dark:bg-gray-800/40 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img src="{{ $education->logo_url }}" alt="{{ $education->institution }}" class="w-14 h-14 object-contain rounded-lg border p-1 bg-white">
                                <div>
                                    <p class="text-xs font-bold text-gray-800 dark:text-gray-200">Logo Saat Ini</p>
                                    <p class="text-[11px] text-gray-500 truncate max-w-xs">{{ $education->logo }}</p>
                                </div>
                            </div>
                            <label class="flex items-center gap-1.5 text-xs text-red-600 cursor-pointer hover:underline font-semibold">
                                <input type="checkbox" name="remove_logo" value="1" class="w-4 h-4 text-red-600 rounded">
                                <span>Hapus Logo</span>
                            </label>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800/30">
                        <!-- Upload File -->
                        <div>
                            <span class="text-xs font-semibold text-gray-500 block mb-1.5">Ganti File Logo Baru:</span>
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-3 text-center hover:border-primary transition bg-white dark:bg-gray-800">
                                <input type="file" id="logo" name="logo" accept="image/*" class="hidden" onchange="previewLogoFile(event)">
                                <label for="logo" class="cursor-pointer block">
                                    <div id="logoPreviewBox" class="hidden mb-2">
                                        <img id="logoPreview" src="" alt="Preview Logo Baru" class="w-16 h-16 object-contain mx-auto rounded-lg border p-1 bg-white">
                                    </div>
                                    <div id="logoPlaceholder">
                                        <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                                        <p class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                            {{ $education->logo ? 'Upload Logo Baru' : 'Pilih logo dari komputer' }}
                                        </p>
                                        <p class="text-[10px] text-gray-400 mt-0.5">PNG, SVG, JPG, WEBP maks 4MB</p>
                                    </div>
                                </label>
                            </div>
                            @error('logo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Atau Input URL Logo -->
                        <div>
                            <span class="text-xs font-semibold text-gray-500 block mb-1.5">Atau Gunakan URL Gambar:</span>
                            <input type="url" name="logo_url" id="logo_url" 
                                   value="{{ old('logo_url', str_starts_with($education->logo ?? '', 'http') ? $education->logo : '') }}"
                                   placeholder="https://example.com/logo-kampus.png"
                                   class="w-full input-field dark:input-field text-sm"
                                   oninput="previewLogoUrl(this.value)">
                            <p class="text-[11px] text-gray-400 mt-1">Masukkan link gambar logo kampus/sekolah</p>
                            @error('logo_url')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <div id="logoUrlPreviewBox" class="mt-2 hidden">
                                <span class="text-[10px] text-gray-400 block mb-1">Preview URL:</span>
                                <img id="logoUrlPreview" src="" alt="URL Preview" class="w-12 h-12 object-contain rounded-lg border p-1 bg-white">
                            </div>
                        </div>
                    </div>
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

                <!-- GPA / IPK -->
                <div>
                    <label for="gpa" class="block mb-2">IPK / GPA <span class="text-gray-400 text-xs font-normal">(opsional)</span></label>
                    <input type="number" id="gpa" name="gpa" value="{{ old('gpa', $education->gpa) }}"
                           step="0.01" min="0" max="100"
                           class="w-full input-field dark:input-field" placeholder="e.g. 3.85">
                    @error('gpa')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GPA Max -->
                <div>
                    <label for="gpa_max" class="block mb-2">Skala Maks <span class="text-gray-400 text-xs font-normal">(default 4.00)</span></label>
                    <input type="number" id="gpa_max" name="gpa_max" value="{{ old('gpa_max', $education->gpa_max ?? '4.00') }}"
                           step="0.01" min="0" max="100"
                           class="w-full input-field dark:input-field" placeholder="4.00 atau 100">
                    @error('gpa_max')
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