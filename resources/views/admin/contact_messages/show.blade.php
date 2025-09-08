@extends('layouts.app')

@section('title', 'View Message')
@section('subtitle', 'Contact message details')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Message Details</h3>
        <a href="{{ route('admin.contact-messages.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Messages
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Message Content -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6 lg:col-span-2">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h4 class="text-lg font-semibold">{{ $contactMessage->subject ?: '(No Subject)' }}</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Received {{ $contactMessage->created_at->diffForHumans() }}
                    </p>
                </div>
                @if(!$contactMessage->is_read)
                    <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-bold leading-none text-white bg-blue-500 rounded-full">Unread</span>
                @endif
            </div>

            <div class="prose dark:prose-invert max-w-none">
                <p class="whitespace-pre-wrap">{{ $contactMessage->message }}</p>
            </div>
        </div>

        <!-- Sender Details -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h4 class="text-lg font-semibold mb-4">Sender Information</h4>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Name</p>
                    <p class="font-medium">{{ $contactMessage->name }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Email</p>
                    <p class="font-medium">
                        <a href="mailto:{{ $contactMessage->email }}" class="text-primary hover:underline">
                            {{ $contactMessage->email }}
                        </a>
                    </p>
                </div>
                
                @if($contactMessage->budget_range)
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Budget Range</p>
                    <p class="font-medium">{{ $contactMessage->budget_range }}</p>
                </div>
                @endif
                
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Received</p>
                    <p class="font-medium">{{ $contactMessage->created_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
            </div>
            
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 flex space-x-3">
                <a href="mailto:{{ $contactMessage->email }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center flex-1">
                    <i class="fas fa-reply mr-2"></i> Reply
                </a>
                
                <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-red-500 hover:bg-red-500 hover:text-white transition flex items-center justify-center"
                            onclick="return confirm('Are you sure you want to delete this message?')">
                        <i class="fas fa-trash mr-2"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection