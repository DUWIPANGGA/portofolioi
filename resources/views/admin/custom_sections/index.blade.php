@extends('layouts.app')

@section('title', 'Custom Sections Management')
@section('subtitle', 'Manage your custom sections')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Custom Sections</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $sections->total() }} section entries</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.custom_sections.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search sections..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.custom_sections.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Add Section
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($sections->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-layer-group text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No custom sections found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search'))
                        No sections match your search criteria. Try a different search term.
                    @else
                        You haven't added any custom sections yet. Get started by adding your first section.
                    @endif
                </p>
                <a href="{{ route('admin.custom_sections.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Section
                </a>
            </div>
        @else
            <!-- Sections Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Section Name
                                    @include('partials.sort-icon', ['field' => 'section_name'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Title
                                    @include('partials.sort-icon', ['field' => 'title'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Order
                                    @include('partials.sort-icon', ['field' => 'order'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                Status
                            </th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($sections as $section)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Section Name -->
                                <td class="px-6 py-4">
                                    <div class="font-medium">{{ $section->section_name }}</div>
                                </td>
                                
                                <!-- Title -->
                                <td class="px-6 py-4">
                                    {{ $section->title ?: 'N/A' }}
                                </td>
                                
                                <!-- Order -->
                                <td class="px-6 py-4">
                                    {{ $section->order }}
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.custom_sections.toggleActive', $section->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="relative inline-flex items-center cursor-pointer">
                                            <div class="w-10 h-6 rounded-full transition-colors duration-200 ease-in-out 
                                                @if($section->is_active) bg-primary @else bg-gray-300 dark:bg-gray-600 @endif">
                                                <div class="dot absolute top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200 ease-in-out 
                                                    @if($section->is_active) transform translate-x-5 @else left-1 @endif">
                                                </div>
                                            </div>
                                            <span class="ml-2 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $section->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </button>
                                    </form>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.custom_sections.show', $section->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.custom_sections.edit', $section->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.custom_sections.destroy', $section->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this section?')">
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
            @if($sections->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $sections->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection