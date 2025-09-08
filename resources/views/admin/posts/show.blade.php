@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Post Details</h3>
        <div class="flex space-x-3">
            <a href="{{ route('admin.posts.edit', $post->id) }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-blue-500 transition">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.posts.index') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Posts
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        <!-- Featured Image -->
        @if($post->featured_image)
        <div class="h-64 w-full overflow-hidden">
            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
        @endif
        
        <div class="p-6">
            <!-- Title and Meta -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                    <span class="flex items-center">
                        <i class="fas fa-user mr-2"></i> {{ $post->user->name }}
                    </span>
                    @if($post->category)
                    <span class="flex items-center">
                        <i class="fas fa-tag mr-2"></i> {{ $post->category }}
                    </span>
                    @endif
                    @if($post->published_at)
                    <span class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i> {{ $post->published_at->format('M d, Y') }}
                    </span>
                    @endif
                    @if($post->reading_time)
                    <span class="flex items-center">
                        <i class="fas fa-clock mr-2"></i> {{ $post->reading_time }} min read
                    </span>
                    @endif
                </div>
            </div>
            
            <!-- Status Badge -->
            <div class="mb-6">
                <span class="px-3 py-1 rounded-full text-sm font-medium {{ $post->is_published ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                    {{ $post->is_published ? 'Published' : 'Draft' }}
                </span>
            </div>
            
            <!-- Excerpt -->
            <div class="mb-6 p-4 neumorph-inset dark:neumorph-inset-dark rounded-lg">
                <h4 class="font-medium mb-2">Excerpt</h4>
                <p>{{ $post->excerpt }}</p>
            </div>
            
            <!-- Content -->
            <div class="mb-6">
                <h4 class="font-medium mb-2">Content</h4>
                <div class="prose max-w-none dark:prose-invert">
                    {!! $post->content !!}
                </div>
            </div>
            
            <!-- Tags -->
            @if($post->tags && count($post->tags) > 0)
            <div class="mb-6">
                <h4 class="font-medium mb-2">Tags</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                    <span class="px-3 py-1 rounded-full text-xs neumorph-btn dark:neumorph-btn-dark">
                        {{ $tag }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- SEO Meta -->
            @if($post->seoMeta)
            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h4 class="font-medium mb-4">SEO Metadata</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Title</h5>
                        <p>{{ $post->seoMeta->title ?? $post->title }}</p>
                    </div>
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Description</h5>
                        <p>{{ $post->seoMeta->description ?? Str::limit($post->excerpt, 160) }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection