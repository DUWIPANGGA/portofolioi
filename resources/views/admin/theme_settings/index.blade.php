@extends('layouts.app')

@section('title', 'Theme Settings')
@section('subtitle', 'Manage theme customization')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Theme Settings</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Customize your website appearance</p>
        </div>
        
        <a href="{{ route('admin.theme-settings.edit', $themeSetting->id) }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition flex items-center justify-center whitespace-nowrap">
            <i class="fas fa-palette mr-2"></i> Customize Theme
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Current Settings Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
            <h4 class="text-lg font-medium mb-4">Current Settings</h4>
            
            <div class="space-y-4">
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Primary Color</span>
                    <div class="flex items-center gap-2 mt-1">
                        <div class="w-6 h-6 rounded" style="background-color: {{ $themeSetting->primary_color }}"></div>
                        <span>{{ $themeSetting->primary_color }}</span>
                    </div>
                </div>
                
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Secondary Color</span>
                    <div class="flex items-center gap-2 mt-1">
                        <div class="w-6 h-6 rounded" style="background-color: {{ $themeSetting->secondary_color }}"></div>
                        <span>{{ $themeSetting->secondary_color }}</span>
                    </div>
                </div>
                
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Font Family</span>
                    <p class="mt-1">{{ $themeSetting->font_family }}</p>
                </div>
                
                <div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Neumorphism Effects</span>
                    <p class="mt-1">
                        <span class="px-2 py-1 rounded-full text-xs font-medium {{ $themeSetting->enable_neumorphism ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200' }}">
                            {{ $themeSetting->enable_neumorphism ? 'Enabled' : 'Disabled' }}
                        </span>
                    </p>
                </div>
            </div>
            
            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.theme-settings.edit', $themeSetting->id) }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center justify-center w-full">
                    <i class="fas fa-edit mr-2"></i> Edit Settings
                </a>
            </div>
        </div>
        
        <!-- Preview Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
            <h4 class="text-lg font-medium mb-4">Theme Preview</h4>
            
            <div class="space-y-6">
                <!-- Light Mode Preview -->
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Light Mode</h5>
                    <div class="neumorph-3d rounded-xl p-4 bg-white">
                        <div class="flex gap-2 mb-3">
                            <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-800">Active</span>
                            <span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-800">Inactive</span>
                        </div>
                        <button class="neumorph-btn px-4 py-2 rounded-xl mr-2 text-sm">Button</button>
                        <button class="px-4 py-2 rounded-xl border text-sm">Secondary</button>
                    </div>
                </div>
                
                <!-- Dark Mode Preview -->
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Dark Mode</h5>
                    <div class="neumorph-3d-dark rounded-xl p-4 bg-dark-100">
                        <div class="flex gap-2 mb-3">
                            <span class="px-3 py-1 rounded-full text-xs bg-green-900 text-green-200">Active</span>
                            <span class="px-3 py-1 rounded-full text-xs bg-gray-900 text-gray-200">Inactive</span>
                        </div>
                        <button class="neumorph-btn-dark px-4 py-2 rounded-xl mr-2 text-sm">Button</button>
                        <button class="px-4 py-2 rounded-xl border border-gray-600 text-sm">Secondary</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Last Updated -->
    <div class="mt-6 neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
        <div class="flex justify-between items-center">
            <div>
                <h4 class="text-lg font-medium mb-1">Last Updated</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $themeSetting->updated_at->format('F j, Y \a\t g:i A') }}
                </p>
            </div>
            <div class="text-right">
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                    Active
                </span>
            </div>
        </div>
    </div>
</div>
@endsection