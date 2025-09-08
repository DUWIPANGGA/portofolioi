@extends('layouts.app')

@section('title', 'View Form Submission')
@section('subtitle', 'Form submission details')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Form Submission Details</h3>
        <div class="flex space-x-2">
            <a href="{{ route('admin.form-submissions.edit', $formSubmission->id) }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-blue-500 hover:bg-blue-500 hover:text-white transition">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.form-submissions.index') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-500 hover:text-white transition">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Submission Details -->
        <div class="lg:col-span-2">
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
                <h4 class="text-lg font-medium mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Submission Information</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Form Type</p>
                        <p class="font-medium">{{ $formSubmission->form_type }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Status</p>
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $formSubmission->is_processed ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                            {{ $formSubmission->is_processed ? 'Processed' : 'Pending' }}
                        </span>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Submitted On</p>
                        <p class="font-medium">{{ $formSubmission->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Last Updated</p>
                        <p class="font-medium">{{ $formSubmission->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
                
                <h4 class="text-lg font-medium mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Form Data</h4>
                
                <div class="bg-gray-50 dark:bg-dark-300 rounded-lg p-4">
                    @if(is_array($formSubmission->data) && count($formSubmission->data) > 0)
                        <div class="space-y-3">
                            @foreach($formSubmission->data as $key => $value)
                                <div class="border-b border-gray-200 dark:border-gray-700 pb-3 last:border-0 last:pb-0">
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 capitalize mb-1">{{ str_replace('_', ' ', $key) }}</p>
                                    @if(is_array($value))
                                        <pre class="text-sm bg-white dark:bg-dark-400 p-2 rounded overflow-x-auto">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                                    @else
                                        <p class="text-sm text-gray-900 dark:text-gray-100 break-words">{{ $value }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400 text-center py-4">No form data available</p>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Actions Sidebar -->
        <div>
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6 mb-6">
                <h4 class="text-lg font-medium mb-4">Submission Actions</h4>
                
                <div class="space-y-3">
                    <!-- Toggle Processed Status -->
                    <form action="{{ route('admin.form-submissions.update', $formSubmission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="form_type" value="{{ $formSubmission->form_type }}">
                        <input type="hidden" name="data" value="{{ json_encode($formSubmission->data) }}">
                        <input type="hidden" name="is_processed" value="{{ $formSubmission->is_processed ? 0 : 1 }}">
                        <button type="submit" class="w-full neumorph-btn dark:neumorph-btn-dark py-2 rounded-xl text-center transition {{ $formSubmission->is_processed ? 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' : 'bg-green-100 text-green-800 hover:bg-green-200' }}">
                            <i class="fas {{ $formSubmission->is_processed ? 'fa-undo' : 'fa-check' }} mr-2"></i>
                            {{ $formSubmission->is_processed ? 'Mark as Pending' : 'Mark as Processed' }}
                        </button>
                    </form>
                    
                    <!-- Edit Button -->
                    <a href="{{ route('admin.form-submissions.edit', $formSubmission->id) }}" 
                       class="block neumorph-btn dark:neumorph-btn-dark py-2 rounded-xl text-center text-blue-600 hover:bg-blue-100 transition">
                        <i class="fas fa-edit mr-2"></i> Edit Submission
                    </a>
                    
                    <!-- Delete Button -->
                    <form action="{{ route('admin.form-submissions.destroy', $formSubmission->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full neumorph-btn dark:neumorph-btn-dark py-2 rounded-xl text-center text-red-600 hover:bg-red-100 transition"
                                onclick="return confirm('Are you sure you want to delete this form submission?')">
                            <i class="fas fa-trash mr-2"></i> Delete Submission
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- JSON View -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden p-6">
                <h4 class="text-lg font-medium mb-4">Raw JSON</h4>
                <div class="bg-gray-900 rounded-lg p-3 overflow-x-auto">
                    <pre class="text-xs text-green-400">{{ json_encode($formSubmission, JSON_PRETTY_PRINT) }}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection