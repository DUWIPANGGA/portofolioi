@extends('layouts.app')

@section('title', 'Pages Management')
@section('subtitle', 'Manage your website pages')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Pages</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $pages->total() }} page entries</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.pages.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search pages..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Filter by Status -->
            <div class="flex items-center gap-2">
                <select name="status_filter" id="status_filter" class="input-field dark:input-field py-2" onchange="filterByStatus(this.value)">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.pages.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> New Page
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($pages->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-file-alt text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No pages found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search') || request()->has('status'))
                        No pages match your criteria. Try a different search term or filter.
                    @else
                        You haven't created any pages yet.
                    @endif
                </p>
                <a href="{{ route('admin.pages.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Create Page
                </a>
            </div>
        @else
            <!-- Pages Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Title
                                    @include('partials.sort-icon', ['field' => 'title'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">Slug</th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Status
                                    @include('partials.sort-icon', ['field' => 'is_active'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Created At
                                    @include('partials.sort-icon', ['field' => 'created_at'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($pages as $page)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Title -->
                                <td class="px-6 py-4">
                                    <div class="font-medium">{{ $page->title }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">
                                        {{ Str::limit(strip_tags($page->content), 50) }}
                                    </div>
                                </td>
                                
                                <!-- Slug -->
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">/{{ $page->slug }}</div>
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $page->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200' }}">
                                        {{ $page->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                
                                <!-- Created At -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $page->created_at->format('M d, Y H:i') }}
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.pages.show', $page->slug) }}" target="_blank"
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.pages.edit', $page->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <!-- Toggle Status Button -->
                                        <form action="{{ route('admin.pages.toggle-status', $page->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center {{ $page->is_active ? 'text-gray-500 hover:bg-gray-500' : 'text-green-500 hover:bg-green-500' }} hover:text-white transition"
                                                    title="{{ $page->is_active ? 'Deactivate' : 'Activate' }}">
                                                <i class="fas {{ $page->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }} text-xs"></i>
                                            </button>
                                        </form>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this page?')">
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
            @if($pages->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $pages->links() }}
                </div>
            @endif
        @endif
    </div>
</div>

<script>
function filterByStatus(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}
</script>
@endsection