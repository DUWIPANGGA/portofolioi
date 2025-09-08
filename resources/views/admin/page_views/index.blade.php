@extends('layouts.app')

@section('title', 'Page Views Management')
@section('subtitle', 'Track and analyze page views')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Page Views</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $pageViews->total() }} view entries</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.page-views.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search page views..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Filter Options -->
            <div class="flex items-center gap-2">
                <select name="url_filter" id="url_filter" class="input-field dark:input-field py-2" onchange="filterByUrl(this.value)">
                    <option value="">All URLs</option>
                    @foreach($uniqueUrls as $url)
                        <option value="{{ $url }}" {{ request('url') === $url ? 'selected' : '' }}>{{ Str::limit($url, 30) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($pageViews->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-eye text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No page views recorded</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search') || request()->has('url'))
                        No page views match your criteria. Try a different search term or filter.
                    @else
                        No page views have been recorded yet.
                    @endif
                </p>
            </div>
        @else
            <!-- Page Views Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    URL
                                    @include('partials.sort-icon', ['field' => 'url'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">User</th>
                            <th class="px-6 py-4 font-medium">IP Address</th>
                            <th class="px-6 py-4 font-medium">User Agent</th>
                            <th class="px-6 py-4 font-medium">Referrer</th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Viewed At
                                    @include('partials.sort-icon', ['field' => 'created_at'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($pageViews as $pageView)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- URL -->
                                <td class="px-6 py-4">
                                    <div class="max-w-xs truncate font-medium" title="{{ $pageView->url }}">
                                        {{ Str::limit($pageView->url, 40) }}
                                    </div>
                                </td>
                                
                                <!-- User -->
                                <td class="px-6 py-4">
                                    @if($pageView->user)
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center mr-2">
                                                <i class="fas fa-user text-primary text-xs"></i>
                                            </div>
                                            <span>{{ $pageView->user->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-500">Guest</span>
                                    @endif
                                </td>
                                
                                <!-- IP Address -->
                                <td class="px-6 py-4">
                                    <span class="text-xs bg-gray-100 dark:bg-dark-300 rounded px-2 py-1">
                                        {{ $pageView->ip_address }}
                                    </span>
                                </td>
                                
                                <!-- User Agent -->
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="text-xs truncate" title="{{ $pageView->user_agent }}">
                                        {{ Str::limit($pageView->user_agent, 30) }}
                                    </div>
                                </td>
                                
                                <!-- Referrer -->
                                <td class="px-6 py-4 max-w-xs">
                                    @if($pageView->referrer)
                                        <div class="text-xs truncate" title="{{ $pageView->referrer }}">
                                            {{ Str::limit($pageView->referrer, 30) }}
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-500">Direct</span>
                                    @endif
                                </td>
                                
                                <!-- Created At -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $pageView->created_at->format('M d, Y H:i') }}
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.page-views.show', $pageView->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View Details">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.page-views.destroy', $pageView->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this page view record?')">
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
            @if($pageViews->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $pageViews->links() }}
                </div>
            @endif
        @endif
    </div>
</div>

<script>
function filterByUrl(url) {
    const urlParams = new URL(window.location.href);
    if (url) {
        urlParams.searchParams.set('url', url);
    } else {
        urlParams.searchParams.delete('url');
    }
    window.location.href = urlParams.toString();
}
</script>
@endsection