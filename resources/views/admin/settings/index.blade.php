@extends('layouts.app')

@section('title', 'Settings Management')
@section('subtitle', 'Manage your website settings')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Settings</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $settings->flatten()->count() }} setting entries</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.settings.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search settings..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($settings->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-cog text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No settings found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    No settings have been configured yet.
                </p>
            </div>
        @else
            <!-- Settings grouped by category -->
            @foreach($settings as $group => $groupSettings)
                <div class="border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                    <div class="bg-gray-50 dark:bg-gray-800 px-6 py-3">
                        <h4 class="font-medium text-gray-800 dark:text-gray-200">{{ ucfirst($group) }} Settings</h4>
                    </div>
                    
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($groupSettings as $setting)
                            <div class="px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                    <div class="flex-1">
                                        <div class="font-medium">{{ $setting->key }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                            {{ Str::limit($setting->value, 100) }}
                                        </div>
                                    </div>
                                    
                                    <div class="flex space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.settings.edit', $setting->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-blue-500 hover:bg-blue-500 hover:text-white transition flex items-center"
                                           title="Edit">
                                            <i class="fas fa-edit mr-2"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection