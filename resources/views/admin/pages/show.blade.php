@extends('layouts.app')

@section('title', 'Page Details: ' . $page->title)
@section('subtitle', 'View page details and content')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Page Details</h3>
        <div class="flex space-x-2">
            <a href="{{ route('pages.show', $page->slug) }}" target="_blank"
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
                <i class="fas fa-external-link-alt mr-2"></i> View Live
            </a>
            <a href="{{ route('admin.pages.edit', $page->id) }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-blue-500 transition flex items-center">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.pages.index') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-gray-500 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Page Details -->
        <div class="lg:col-span-1">
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6 mb-6">
                <h4 class="text-lg font-medium mb-4">Page Information</h4>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Title</p>
                        <p class="font-medium">{{ $page->title }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Slug</p>
                        <p class="font-medium">/{{ $page->slug }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                        <span class="px-2 py-1 rounded-full text-xs font-medium {{ $page->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200' }}">
                            {{ $page->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Created</p>
                        <p class="font-medium">{{ $page->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Last Updated</p>
                        <p class="font-medium">{{ $page->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
            
            <!-- SEO Information -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
                <h4 class="text-lg font-medium mb-4">SEO Information</h4>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">SEO Title</p>
                        <p class="font-medium">{{ $page->seo_title ?: 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">SEO Description</p>
                        <p class="font-medium">{{ $page->seo_description ?: 'Not set' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Page Content -->
        <div class="lg:col-span-2">
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
                <h4 class="text-lg font-medium mb-4">Page Content</h4>
                
                <div class="prose max-w-none dark:prose-invert">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection