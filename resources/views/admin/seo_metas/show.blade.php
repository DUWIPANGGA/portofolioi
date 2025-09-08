@extends('layouts.app')

@section('title', 'SEO Metadata Details')
@section('subtitle', 'View SEO metadata details')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">SEO Metadata Details</h3>
        <a href="{{ route('admin.seo-metas.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Associated Model -->
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Associated Model</h4>
                    <p class="font-medium">{{ class_basename($seoMeta->metable_type) }} (ID: {{ $seoMeta->metable_id }})</p>
                </div>
                
                <!-- Created At -->
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Created</h4>
                    <p>{{ $seoMeta->created_at->format('M d, Y H:i') }}</p>
                </div>
            </div>
            
            <!-- Title -->
            <div class="mb-6">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Meta Title</h4>
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-lg">
                    <p>{{ $seoMeta->title ?? 'Not set' }}</p>
                </div>
            </div>
            
            <!-- Description -->
            <div class="mb-6">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Meta Description</h4>
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-lg">
                    <p>{{ $seoMeta->description ?? 'Not set' }}</p>
                </div>
            </div>
            
            <!-- Keywords -->
            <div class="mb-6">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Keywords</h4>
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-lg">
                    <p>{{ $seoMeta->keywords ?? 'Not set' }}</p>
                </div>
            </div>
            
            <!-- OG Image -->
            <div class="mb-6">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Open Graph Image</h4>
                <div class="neumorph-inset dark:neumorph-inset-dark p-4 rounded-lg">
                    @if($seoMeta->og_image)
                        <img src="{{ asset('storage/' . $seoMeta->og_image) }}" alt="OG Image" class="max-w-full h-auto rounded-lg max-h-64">
                    @else
                        <p>No image uploaded</p>
                    @endif
                </div>
            </div>
            
            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.seo-metas.edit', $seoMeta->id) }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-blue-500 text-white hover:bg-blue-600 transition flex items-center">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <form action="{{ route('admin.seo-metas.destroy', $seoMeta->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600 transition flex items-center"
                            onclick="return confirm('Are you sure you want to delete this SEO entry?')">
                        <i class="fas fa-trash mr-2"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection