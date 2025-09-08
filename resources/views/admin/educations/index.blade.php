@extends('layouts.app')

@section('title', 'Education Management')
@section('subtitle', 'Manage your education history')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Education History</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $educations->total() }} education entries</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.educations.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search education..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.educations.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Add Education
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($educations->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-graduation-cap text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No education entries found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search'))
                        No education matches your search criteria. Try a different search term.
                    @else
                        You haven't added any education history yet. Get started by adding your first entry.
                    @endif
                </p>
                <a href="{{ route('admin.educations.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Education
                </a>
            </div>
        @else
            <!-- Education Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Degree
                                    @include('partials.sort-icon', ['field' => 'degree'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Institution
                                    @include('partials.sort-icon', ['field' => 'institution'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Period
                                    @include('partials.sort-icon', ['field' => 'start_date'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($educations as $education)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Degree -->
                                <td class="px-6 py-4">
                                    <div class="font-medium">{{ $education->degree }}</div>
                                    @if($education->field_of_study)
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $education->field_of_study }}
                                        </div>
                                    @endif
                                </td>
                                
                                <!-- Institution -->
                                <td class="px-6 py-4">
                                    {{ $education->institution }}
                                </td>
                                
                                <!-- Period -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 rounded-full bg-primary mr-2"></div>
                                        {{ $education->start_date->format('M Y') }} - {{ $education->end_date->format('M Y') }}
                                    </div>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.educations.show', $education->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.educations.edit', $education->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.educations.destroy', $education->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this education entry?')">
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
            @if($educations->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $educations->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection