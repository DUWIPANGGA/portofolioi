@extends('layouts.app')

@section('title', 'Theme Settings')
@section('subtitle', 'Customize your website appearance')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Theme Settings</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Customize the look and feel of your website</p>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <form action="{{ route('admin.theme-settings.update', $themeSetting->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Light Mode Colors -->
                <div class="space-y-6">
                    <h4 class="text-lg font-medium border-b border-gray-200 dark:border-gray-700 pb-2">Light Mode Colors</h4>
                    
                    <!-- Primary Color -->
                    <div>
                        <label for="primary_color" class="block text-sm font-medium mb-2">Primary Color</label>
                        <div class="flex items-center gap-3">
                            <input type="color" id="primary_color" name="primary_color" 
                                   value="{{ old('primary_color', $themeSetting->primary_color) }}"
                                   class="w-12 h-12 rounded cursor-pointer">
                            <input type="text" value="{{ old('primary_color', $themeSetting->primary_color) }}"
                                   class="input-field dark:input-field px-4 py-2 flex-1"
                                   oninput="document.getElementById('primary_color').value = this.value">
                        </div>
                        @error('primary_color')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Secondary Color -->
                    <div>
                        <label for="secondary_color" class="block text-sm font-medium mb-2">Secondary Color</label>
                        <div class="flex items-center gap-3">
                            <input type="color" id="secondary_color" name="secondary_color" 
                                   value="{{ old('secondary_color', $themeSetting->secondary_color) }}"
                                   class="w-12 h-12 rounded cursor-pointer">
                            <input type="text" value="{{ old('secondary_color', $themeSetting->secondary_color) }}"
                                   class="input-field dark:input-field px-4 py-2 flex-1"
                                   oninput="document.getElementById('secondary_color').value = this.value">
                        </div>
                        @error('secondary_color')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Dark Mode Colors -->
                <div class="space-y-6">
                    <h4 class="text-lg font-medium border-b border-gray-200 dark:border-gray-700 pb-2">Dark Mode Colors</h4>
                    
                    <!-- Dark Mode Primary -->
                    <div>
                        <label for="dark_mode_primary" class="block text-sm font-medium mb-2">Primary Color (Dark)</label>
                        <div class="flex items-center gap-3">
                            <input type="color" id="dark_mode_primary" name="dark_mode_primary" 
                                   value="{{ old('dark_mode_primary', $themeSetting->dark_mode_primary) }}"
                                   class="w-12 h-12 rounded cursor-pointer">
                            <input type="text" value="{{ old('dark_mode_primary', $themeSetting->dark_mode_primary) }}"
                                   class="input-field dark:input-field px-4 py-2 flex-1"
                                   oninput="document.getElementById('dark_mode_primary').value = this.value">
                        </div>
                        @error('dark_mode_primary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Dark Mode Secondary -->
                    <div>
                        <label for="dark_mode_secondary" class="block text-sm font-medium mb-2">Secondary Color (Dark)</label>
                        <div class="flex items-center gap-3">
                            <input type="color" id="dark_mode_secondary" name="dark_mode_secondary" 
                                   value="{{ old('dark_mode_secondary', $themeSetting->dark_mode_secondary) }}"
                                   class="w-12 h-12 rounded cursor-pointer">
                            <input type="text" value="{{ old('dark_mode_secondary', $themeSetting->dark_mode_secondary) }}"
                                   class="input-field dark:input-field px-4 py-2 flex-1"
                                   oninput="document.getElementById('dark_mode_secondary').value = this.value">
                        </div>
                        @error('dark_mode_secondary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <!-- Font Family -->
                <div>
                    <label for="font_family" class="block text-sm font-medium mb-2">Font Family</label>
                    <select id="font_family" name="font_family" 
                            class="w-full input-field dark:input-field px-4 py-2">
                        <option value="Inter, sans-serif" {{ old('font_family', $themeSetting->font_family) == 'Inter, sans-serif' ? 'selected' : '' }}>Inter</option>
                        <option value="Roboto, sans-serif" {{ old('font_family', $themeSetting->font_family) == 'Roboto, sans-serif' ? 'selected' : '' }}>Roboto</option>
                        <option value="Open Sans, sans-serif" {{ old('font_family', $themeSetting->font_family) == 'Open Sans, sans-serif' ? 'selected' : '' }}>Open Sans</option>
                        <option value="Poppins, sans-serif" {{ old('font_family', $themeSetting->font_family) == 'Poppins, sans-serif' ? 'selected' : '' }}>Poppins</option>
                        <option value="Montserrat, sans-serif" {{ old('font_family', $themeSetting->font_family) == 'Montserrat, sans-serif' ? 'selected' : '' }}>Montserrat</option>
                        <option value="Lato, sans-serif" {{ old('font_family', $themeSetting->font_family) == 'Lato, sans-serif' ? 'selected' : '' }}>Lato</option>
                        <option value="Nunito, sans-serif" {{ old('font_family', $themeSetting->font_family) == 'Nunito, sans-serif' ? 'selected' : '' }}>Nunito</option>
                    </select>
                    @error('font_family')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Neumorphism Toggle -->
                <div>
                    <label class="block text-sm font-medium mb-2">UI Effects</label>
                    <div class="flex items-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="enable_neumorphism" value="1" 
                                   class="sr-only peer" 
                                   {{ old('enable_neumorphism', $themeSetting->enable_neumorphism) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                            <span class="ml-3 text-sm font-medium">Enable Neumorphism Effects</span>
                        </label>
                    </div>
                    @error('enable_neumorphism')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Preview Section -->
            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h4 class="text-lg font-medium mb-4">Live Preview</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Light Mode Preview -->
                    <div class="neumorph-3d rounded-xl p-4 bg-white">
                        <h5 class="font-medium mb-3">Light Mode Preview</h5>
                        <div class="flex gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-800">Active</span>
                            <span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-800">Inactive</span>
                        </div>
                        <button class="neumorph-btn px-4 py-2 rounded-xl mr-2">Primary Button</button>
                        <button class="px-4 py-2 rounded-xl border">Secondary Button</button>
                    </div>
                    
                    <!-- Dark Mode Preview -->
                    <div class="neumorph-3d-dark rounded-xl p-4 bg-dark-100">
                        <h5 class="font-medium mb-3 text-white">Dark Mode Preview</h5>
                        <div class="flex gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-xs bg-green-900 text-green-200">Active</span>
                            <span class="px-3 py-1 rounded-full text-xs bg-gray-900 text-gray-200">Inactive</span>
                        </div>
                        <button class="neumorph-btn-dark px-4 py-2 rounded-xl mr-2">Primary Button</button>
                        <button class="px-4 py-2 rounded-xl border border-gray-600">Secondary Button</button>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    <i class="fas fa-save mr-2"></i> Save Settings
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Update preview colors in real-time
function updatePreview() {
    const primaryColor = document.getElementById('primary_color').value;
    const secondaryColor = document.getElementById('secondary_color').value;
    const darkPrimary = document.getElementById('dark_mode_primary').value;
    const darkSecondary = document.getElementById('dark_mode_secondary').value;
    
    // Update light mode preview
    document.querySelectorAll('.neumorph-3d:not(.neumorph-3d-dark) .neumorph-btn').forEach(btn => {
        btn.style.backgroundColor = primaryColor;
    });
    
    // Update dark mode preview
    document.querySelectorAll('.neumorph-3d-dark .neumorph-btn-dark').forEach(btn => {
        btn.style.backgroundColor = darkPrimary;
    });
}

// Add event listeners to color inputs
document.querySelectorAll('input[type="color"]').forEach(input => {
    input.addEventListener('input', updatePreview);
});

// Initial update
updatePreview();
</script>
@endsection