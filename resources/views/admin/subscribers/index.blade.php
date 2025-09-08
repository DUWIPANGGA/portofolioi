@extends('layouts.app')

@section('title', 'Subscribers Management')
@section('subtitle', 'Manage your newsletter subscribers')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Subscribers</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $subscribers->total() }} subscriber entries</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.subscribers.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search subscribers..." 
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
            
            <!-- Export Button -->
            <button type="button" 
                   class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap"
                   onclick="exportSubscribers()">
                <i class="fas fa-download mr-2"></i> Export
            </button>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($subscribers->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-users text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No subscribers found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search') || request()->has('status'))
                        No subscribers match your criteria. Try a different search term or filter.
                    @else
                        You don't have any subscribers yet.
                    @endif
                </p>
            </div>
        @else
            <!-- Subscribers Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Email
                                    @include('partials.sort-icon', ['field' => 'email'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Status
                                    @include('partials.sort-icon', ['field' => 'is_active'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Subscribed At
                                    @include('partials.sort-icon', ['field' => 'created_at'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($subscribers as $subscriber)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Email -->
                                <td class="px-6 py-4">
                                    <div class="font-medium">{{ $subscriber->email }}</div>
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $subscriber->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200' }}">
                                        {{ $subscriber->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                
                                <!-- Created At -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $subscriber->created_at->format('M d, Y H:i') }}
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- Toggle Status Button -->
                                        <form action="{{ route('admin.subscribers.toggle-status', $subscriber->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center {{ $subscriber->is_active ? 'text-gray-500 hover:bg-gray-500' : 'text-green-500 hover:bg-green-500' }} hover:text-white transition"
                                                    title="{{ $subscriber->is_active ? 'Deactivate' : 'Activate' }}">
                                                <i class="fas {{ $subscriber->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }} text-xs"></i>
                                            </button>
                                        </form>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this subscriber?')">
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
            @if($subscribers->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $subscribers->links() }}
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

function exportSubscribers() {

}
</script>
@endsection