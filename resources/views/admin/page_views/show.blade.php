@extends('layouts.app')

@section('title', 'Page View Details')
@section('subtitle', 'Detailed information about page view')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-semibold">Page View Details</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Recorded on {{ $pageView->created_at->format('M d, Y H:i') }}</p>
        </div>
        <a href="{{ route('admin.page-views.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Basic Information Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h4 class="font-medium text-lg mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Basic Information</h4>
            
            <div class="space-y-4">
                <div>
                    <label class="text-sm text-gray-500 dark:text-gray-400">URL</label>
                    <p class="mt-1 break-words">{{ $pageView->url }}</p>
                </div>
                
                <div>
                    <label class="text-sm text-gray-500 dark:text-gray-400">IP Address</label>
                    <p class="mt-1">{{ $pageView->ip_address }}</p>
                </div>
                
                <div>
                    <label class="text-sm text-gray-500 dark:text-gray-400">User</label>
                    <p class="mt-1">
                        @if($pageView->user)
                            <div class="flex items-center mt-1">
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center mr-2">
                                    <i class="fas fa-user text-primary text-xs"></i>
                                </div>
                                <span>{{ $pageView->user->name }} ({{ $pageView->user->email }})</span>
                            </div>
                        @else
                            <span class="text-gray-500">Guest User</span>
                        @endif
                    </p>
                </div>
                
                <div>
                    <label class="text-sm text-gray-500 dark:text-gray-400">Viewed At</label>
                    <p class="mt-1">{{ $pageView->created_at->format('M d, Y H:i:s') }}</p>
                </div>
            </div>
        </div>

        <!-- Technical Details Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h4 class="font-medium text-lg mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Technical Details</h4>
            
            <div class="space-y-4">
                <div>
                    <label class="text-sm text-gray-500 dark:text-gray-400">User Agent</label>
                    <p class="mt-1 text-sm break-words">{{ $pageView->user_agent }}</p>
                </div>
                
                <div>
                    <label class="text-sm text-gray-500 dark:text-gray-400">Referrer</label>
                    <p class="mt-1 break-words">
                        @if($pageView->referrer)
                            <a href="{{ $pageView->referrer }}" target="_blank" class="text-primary hover:underline">
                                {{ $pageView->referrer }}
                            </a>
                        @else
                            <span class="text-gray-500">Direct traffic or no referrer</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex justify-end space-x-3">
        <form action="{{ route('admin.page-views.destroy', $pageView->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-red-500 hover:bg-red-500 hover:text-white transition flex items-center"
                    onclick="return confirm('Are you sure you want to delete this page view record?')">
                <i class="fas fa-trash mr-2"></i> Delete Record
            </button>
        </form>
    </div>
</div>
@endsection