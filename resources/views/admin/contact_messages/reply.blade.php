@extends('layouts.app')

@section('title', 'Reply to Message')
@section('subtitle', 'Send response to contact message')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Reply to Message</h3>
        <a href="{{ route('admin.contact_messages.show', $contactMessage->id) }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Message
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Reply Form -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6 lg:col-span-2">
            <form action="{{ route('admin.contact_messages.reply', $contactMessage->id) }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label for="to" class="block text-sm font-medium mb-2">To</label>
                    <input type="text" id="to" value="{{ $contactMessage->name }} <{{ $contactMessage->email }}>" 
                           class="w-full input-field dark:input-field" readonly>
                </div>
                
                <div class="mb-6">
                    <label for="subject" class="block text-sm font-medium mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" required 
                           class="w-full input-field dark:input-field @error('subject') border-red-500 @enderror" 
                           value="{{ old('subject', 'Re: ' . $contactMessage->subject) }}">
                    @error('subject')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium mb-2">Your Response *</label>
                    <textarea id="message" name="message" rows="8" required 
                              class="w-full input-field dark:input-field @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex space-x-4">
                    <button type="submit" 
                            class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition font-medium flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i> Send Response
                    </button>
                    
                    <a href="{{ route('admin.contact_messages.show', $contactMessage->id) }}" 
                       class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition font-medium">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Original Message -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h4 class="text-lg font-semibold mb-4">Original Message</h4>
            
            <div class="mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">From</p>
                <p class="font-medium">{{ $contactMessage->name }} &lt;{{ $contactMessage->email }}&gt;</p>
            </div>
            
            @if($contactMessage->subject)
            <div class="mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Subject</p>
                <p class="font-medium">{{ $contactMessage->subject }}</p>
            </div>
            @endif
            
            @if($contactMessage->budget_range)
            <div class="mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Budget Range</p>
                <p class="font-medium">{{ $contactMessage->budget_range }}</p>
            </div>
            @endif
            
            <div class="mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Received</p>
                <p class="font-medium">{{ $contactMessage->created_at->format('F j, Y \a\t g:i A') }}</p>
            </div>
            
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Message</p>
                <div class="prose dark:prose-invert max-w-none bg-gray-50 dark:bg-dark-700 p-4 rounded-lg">
                    <p class="whitespace-pre-wrap">{{ $contactMessage->message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection