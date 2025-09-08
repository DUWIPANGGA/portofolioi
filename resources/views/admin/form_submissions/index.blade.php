@extends('layouts.app')

@section('title', 'Form Submissions Management')
@section('subtitle', 'Manage your form submissions')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Form Submissions</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $submissions->total() }} submission entries</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.form-submissions.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search submissions..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Filter by Processed Status -->
            <div class="flex items-center gap-2">
                <select name="status_filter" id="status_filter" class="input-field dark:input-field py-2" onchange="filterByStatus(this.value)">
                    <option value="">All Status</option>
                    <option value="processed" {{ request('status') === 'processed' ? 'selected' : '' }}>Processed</option>
                    <option value="unprocessed" {{ request('status') === 'unprocessed' ? 'selected' : '' }}>Unprocessed</option>
                </select>
            </div>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.form-submissions.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Add Submission
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($submissions->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-file-alt text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No form submissions found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search') || request()->has('status'))
                        No submissions match your criteria. Try a different search term or filter.
                    @else
                        You haven't received any form submissions yet.
                    @endif
                </p>
                <a href="{{ route('admin.form-submissions.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Submission
                </a>
            </div>
        @else
            <!-- Submissions Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-left">
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Form Type
                                    @include('partials.sort-icon', ['field' => 'form_type'])
                                </div>
                            </th>
                            <th class="px-6 py-4 font-medium">Data Preview</th>
                            <th class="px-6 py-4 font-medium">
                                <div class="flex items-center">
                                    Status
                                    @include('partials.sort-icon', ['field' => 'is_processed'])
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
                        @foreach($submissions as $submission)
                            <tr class="hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                                <!-- Form Type -->
                                <td class="px-6 py-4">
                                    <div class="font-medium">{{ $submission->form_type }}</div>
                                </td>
                                
                                <!-- Data Preview -->
                                <td class="px-6 py-4">
                                    <div class="max-w-xs truncate">
                                        @if(is_array($submission->data))
                                            @foreach(array_slice($submission->data, 0, 2) as $key => $value)
                                                <span class="text-xs bg-gray-100 dark:bg-dark-300 rounded px-1 py-0.5 mr-1">
                                                    {{ $key }}: {{ is_array($value) ? json_encode($value) : substr($value, 0, 20) }}{{ strlen($value) > 20 ? '...' : '' }}
                                                </span>
                                            @endforeach
                                            @if(count($submission->data) > 2)
                                                <span class="text-xs text-gray-500">+{{ count($submission->data) - 2 }} more</span>
                                            @endif
                                        @else
                                            <span class="text-xs text-gray-500">No data</span>
                                        @endif
                                    </div>
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $submission->is_processed ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                        {{ $submission->is_processed ? 'Processed' : 'Pending' }}
                                    </span>
                                </td>
                                
                                <!-- Created At -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $submission->created_at->format('M d, Y H:i') }}
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admin.form-submissions.show', $submission->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                           title="View">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.form-submissions.edit', $submission->id) }}" 
                                           class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                           title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <!-- Mark as Processed/Unprocessed Button -->
                                        <form action="{{ route('admin.form-submissions.update', $submission->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="form_type" value="{{ $submission->form_type }}">
                                            <input type="hidden" name="data" value="{{ json_encode($submission->data) }}">
                                            <input type="hidden" name="is_processed" value="{{ $submission->is_processed ? 0 : 1 }}">
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center {{ $submission->is_processed ? 'text-yellow-500 hover:bg-yellow-500' : 'text-green-500 hover:bg-green-500' }} hover:text-white transition"
                                                    title="{{ $submission->is_processed ? 'Mark as Pending' : 'Mark as Processed' }}">
                                                <i class="fas {{ $submission->is_processed ? 'fa-undo' : 'fa-check' }} text-xs"></i>
                                            </button>
                                        </form>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.form-submissions.destroy', $submission->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this form submission?')">
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
            @if($submissions->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $submissions->links() }}
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