@extends('layouts.app')

@section('title', 'View Custom Section')
@section('subtitle', 'Section details')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Section Details</h3>
        <a href="{{ route('admin.custom_sections.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <div>
                <h4 class="text-lg font-medium">{{ $customSection->section_name }}</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400">Created: {{ $customSection->created_at->format('M d, Y') }}</p>
            </div>
            <span class="px-3 py-1 text-xs font-medium rounded-full 
                @if($customSection->is_active) bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 
                @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                {{ $customSection->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>
        
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="space-y-4">
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Section Name</h5>
                    <p class="text-gray-900 dark:text-white">{{ $customSection->section_name }}</p>
                </div>
                
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Title</h5>
                    <p class="text-gray-900 dark:text-white">{{ $customSection->title ?: 'N/A' }}</p>
                </div>
                
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Order</h5>
                    <p class="text-gray-900 dark:text-white">{{ $customSection->order }}</p>
                </div>
                
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Last Updated</h5>
                    <p class="text-gray-900 dark:text-white">{{ $customSection->updated_at->format('M d, Y H:i') }}</p>
                </div>
            </div>
            
            <!-- Content and Custom Data -->
            <div class="space-y-4">
                @if($customSection->content)
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Content</h5>
                    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                        <p class="text-gray-900 dark:text-white whitespace-pre-wrap">{{ $customSection->content }}</p>
                    </div>
                </div>
                @endif
                
                @if($customSection->custom_data)
                <div>
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Custom Data</h5>
                    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg overflow-x-auto">
                        <pre class="text-sm text-gray-900 dark:text-white"><code>{{ json_encode($customSection->custom_data, JSON_PRETTY_PRINT) }}</code></pre>
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
            <a href="{{ route('admin.custom_sections.edit', $customSection->id) }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900 transition flex items-center">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <form action="{{ route('admin.custom_sections.destroy', $customSection->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900 transition flex items-center"
                        onclick="return confirm('Are you sure you want to delete this section?')">
                    <i class="fas fa-trash mr-2"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection