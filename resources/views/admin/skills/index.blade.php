@extends('layouts.app')

@section('title', 'Skills Management')
@section('subtitle', 'Manage all skills')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">All Skills</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $skills->total() }} skills found</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.skills.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search skills..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.skills.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> New Skill
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($skills->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-code text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No skills found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search'))
                        No skills match your search criteria. Try a different search term.
                    @else
                        You haven't created any skills yet. Get started by adding your first skill.
                    @endif
                </p>
                <a href="{{ route('admin.skills.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Create Skill
                </a>
            </div>
        @else
            <!-- Skills Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Icon & Name
                                    @include('partials.sort-icon', ['field' => 'name'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    User
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Percentage
                                    @include('partials.sort-icon', ['field' => 'percentage'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Category
                                    @include('partials.sort-icon', ['field' => 'category'])
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
                        @foreach($skills as $skill)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Skill Info -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if($skill->icon)
                                        <div class="w-10 h-10 rounded-full neumorph dark:neumorph-dark mr-3 overflow-hidden flex-shrink-0 flex items-center justify-center">
                                            <i class="{{ $skill->icon }} text-lg"></i>
                                        </div>
                                        @endif
                                        <div>
                                            <p class="font-medium">{{ $skill->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- User -->
                                <td class="px-6 py-4">
                                    {{ $skill->user->name }}
                                </td>
                                
                                <!-- Percentage -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-24 mr-2">
                                            <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                                <div class="h-full bg-primary" style="width: {{ $skill->percentage }}%"></div>
                                            </div>
                                        </div>
                                        <span class="text-sm">{{ $skill->percentage }}%</span>
                                    </div>
                                </td>
                                
                                <!-- Category -->
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs neumorph-btn dark:neumorph-btn-dark capitalize">
                                        {{ $skill->category ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                
                                <!-- Order -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $skill->order ?? '-' }}
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.skills.show', $skill->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.skills.edit', $skill->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this skill?')">
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
            @if($skills->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $skills->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection