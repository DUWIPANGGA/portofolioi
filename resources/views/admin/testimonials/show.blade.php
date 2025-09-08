@extends('layouts.app')

@section('title', 'View Testimonial')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Testimonial Details</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">View client testimonial information</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="{{ route('admin.testimonials.index') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-arrow-left mr-2"></i> Back to Testimonials
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            <!-- Client Info Card -->
            <div class="neumorph-inset dark:neumorph-inset-dark rounded-xl p-6">
                <div class="flex flex-col items-center mb-4">
                    <div class="w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 overflow-hidden">
                        @if($testimonial->client_avatar)
                            <img src="{{ Storage::url($testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <i class="fas fa-user text-gray-500 dark:text-gray-400 text-3xl"></i>
                            </div>
                        @endif
                    </div>
                    <h4 class="text-xl font-semibold">{{ $testimonial->client_name }}</h4>
                    <p class="text-gray-500 dark:text-gray-400">{{ $testimonial->client_position }}</p>
                    <p class="text-sm text-primary">{{ $testimonial->client_company }}</p>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Rating:</span>
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-500' : 'text-gray-300 dark:text-gray-600' }}"></i>
                            @endfor
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Featured:</span>
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $testimonial->is_featured ? 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                            {{ $testimonial->is_featured ? 'Yes' : 'No' }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Order:</span>
                        <span class="font-medium">{{ $testimonial->order ?? 'Not set' }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Created:</span>
                        <span class="font-medium">{{ $testimonial->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial Content Card -->
            <div class="md:col-span-2 neumorph-inset dark:neumorph-inset-dark rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold">Testimonial Content</h4>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" 
                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                           title="Edit">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="prose dark:prose-invert max-w-none">
                    <blockquote class="border-l-4 border-primary pl-4 italic">
                        {{ $testimonial->content }}
                    </blockquote>
                </div>
                
                <!-- Preview Card -->
                <div class="mt-8">
                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Preview</h5>
                    <div class="neumorph-inset dark:neumorph-inset-dark rounded-xl p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full neumorph dark:neumorph-dark overflow-hidden flex-shrink-0">
                                @if($testimonial->client_avatar)
                                    <img src="{{ Storage::url($testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h6 class="font-medium">{{ $testimonial->client_name }}</h6>
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-500' : 'text-gray-300 dark:text-gray-600' }} text-xs"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                                    {{ $testimonial->client_position }}, {{ $testimonial->client_company }}
                                </p>
                                <p class="text-sm italic">
                                    "{{ Str::limit($testimonial->content, 150) }}"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection