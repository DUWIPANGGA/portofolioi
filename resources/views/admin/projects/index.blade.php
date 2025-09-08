@extends('layouts.app')

@section('title', 'Projects Management')
@section('subtitle', 'Manage all portfolio projects')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">All Projects</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $projects->total() }} projects found</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.projects.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search projects..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.projects.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> New Project
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($projects->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-folder-open text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No projects found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search'))
                        No projects match your search criteria. Try a different search term.
                    @else
                        You haven't created any projects yet. Get started by adding your first project.
                    @endif
                </p>
                <a href="{{ route('admin.projects.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Create Project
                </a>
            </div>
        @else
            <!-- Projects Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Project
                                    @include('partials.sort-icon', ['field' => 'title'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Technologies
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Date
                                    @include('partials.sort-icon', ['field' => 'project_date'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Status
                                    @include('partials.sort-icon', ['field' => 'status'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($projects as $project)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Project Info -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full neumorph dark:neumorph-dark mr-3 overflow-hidden flex-shrink-0">
                                            <img src="{{ $project->image_path ? asset('storage/'.$project->image_path) : asset('assets/default-project.png') }}" 
                                                 alt="{{ $project->title }}" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-medium">{{ $project->title }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ $project->client ?? 'No client specified' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- Technologies -->
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-1">
                                        @if(is_array($project->technologies) && count($project->technologies) > 0)
    @foreach(array_slice($project->technologies, 0, 3) as $techId)
        <span class="px-2 py-1 text-xs rounded-full neumorph-btn dark:neumorph-btn-dark">
            {{ \App\Models\Technology::find($techId)?->name ?? 'Unknown' }}
        </span>
    @endforeach
    @if(count($project->technologies) > 3)
        <span class="px-2 py-1 text-xs rounded-full neumorph-btn dark:neumorph-btn-dark">
            +{{ count($project->technologies) - 3 }} more
        </span>
    @endif
@else
    <span class="text-xs text-gray-500 dark:text-gray-400">No technologies</span>
@endif

                                    </div>
                                </td>
                                
                                <!-- Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm">
                                        {{ $project->project_date->format('M d, Y') }}
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $project->project_date->diffForHumans() }}
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusClasses = [
                                            'draft' => 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200',
                                            'in_progress' => 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200',
                                            'completed' => 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200',
                                            'archived' => 'bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200'
                                        ];
                                        $statusClass = $statusClasses[$project->status] ?? $statusClasses['draft'];
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusClass }}">
                                        {{ Str::title(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.projects.show', $project->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this project?')">
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
            @if($projects->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $projects->appends(request()->query())->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection