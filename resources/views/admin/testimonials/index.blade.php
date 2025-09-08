@extends('layouts.app')

@section('title', 'Testimonials Management')
@section('subtitle', 'Manage client testimonials')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">All Testimonials</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $testimonials->total() }} testimonials found</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.testimonials.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search testimonials..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.testimonials.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> New Testimonial
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($testimonials->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-quote-left text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No testimonials found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search'))
                        No testimonials match your search criteria. Try a different search term.
                    @else
                        You haven't created any testimonials yet. Get started by adding your first testimonial.
                    @endif
                </p>
                <a href="{{ route('admin.testimonials.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Create Testimonial
                </a>
            </div>
        @else
            <!-- Testimonials Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Client & Testimonial
                                    @include('partials.sort-icon', ['field' => 'client_name'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Position & Company
                                    @include('partials.sort-icon', ['field' => 'client_company'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Rating
                                    @include('partials.sort-icon', ['field' => 'rating'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Featured
                                    @include('partials.sort-icon', ['field' => 'is_featured'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Order
                                    @include('partials.sort-icon', ['field' => 'order'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($testimonials as $testimonial)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Client Info -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full neumorph dark:neumorph-dark mr-3 overflow-hidden flex-shrink-0">
                                            @if($testimonial->client_avatar)
                                                <img src="{{ Storage::url($testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                    <i class="fas fa-user text-gray-500 dark:text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-medium">{{ $testimonial->client_name }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">
                                                {{ Str::limit($testimonial->content, 50) }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- Position & Company -->
                                <td class="px-6 py-4">
                                    <p class="font-medium">{{ $testimonial->client_position }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $testimonial->client_company }}
                                    </p>
                                </td>
                                
                                <!-- Rating -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-500' : 'text-gray-300 dark:text-gray-600' }}"></i>
                                        @endfor
                                    </div>
                                </td>
                                
                                <!-- Featured Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $testimonial->is_featured ? 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                                        {{ $testimonial->is_featured ? 'Featured' : 'Regular' }}
                                    </span>
                                </td>
                                
                                <!-- Order -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $testimonial->order ?? '-' }}
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($testimonials->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $testimonials->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection