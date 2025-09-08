@extends('layouts.app')

@section('title', 'View Development Process Step')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Process Step #{{ $developmentProcess->step_number }}</h3>
        <a href="{{ route('admin.development_processes.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Step Details -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6 lg:col-span-2">
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold">{{ $developmentProcess->title }}</h4>
                    <span class="neumorph dark:neumorph-dark px-3 py-1 rounded-full text-sm font-medium">
                        Step #{{ $developmentProcess->step_number }}
                    </span>
                </div>
                
                <div class="prose dark:prose-invert max-w-none">
                    <p class="text-gray-700 dark:text-gray-300">{{ $developmentProcess->description }}</p>
                </div>
            </div>
            
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <div class="flex items-center mr-4">
                    <i class="fas fa-user-circle mr-2"></i>
                    <span>Created by: {{ $developmentProcess->user->name ?? 'System' }}</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    <span>Updated: {{ $developmentProcess->updated_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
        
        <!-- Actions Sidebar -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6 h-fit">
            <h4 class="text-lg font-semibold mb-4">Actions</h4>
            
            <div class="space-y-3">
                <a href="{{ route('admin.development_processes.edit', $developmentProcess->id) }}" 
                   class="w-full neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition">
                    <i class="fas fa-edit mr-2"></i> Edit Step
                </a>
                
                <form action="{{ route('admin.development_processes.destroy', $developmentProcess->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                            onclick="return confirm('Are you sure you want to delete this process step?')">
                        <i class="fas fa-trash mr-2"></i> Delete Step
                    </button>
                </form>
            </div>
            
            <!-- Step Navigation -->
            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                <h4 class="text-md font-medium mb-3">Navigate Steps</h4>
                
                <div class="space-y-2">
                    @php
                        $prevStep = \App\Models\DevelopmentProcess::where('step_number', '<', $developmentProcess->step_number)
                            ->orderBy('step_number', 'desc')
                            ->first();
                        
                        $nextStep = \App\Models\DevelopmentProcess::where('step_number', '>', $developmentProcess->step_number)
                            ->orderBy('step_number', 'asc')
                            ->first();
                    @endphp
                    
                    @if($prevStep)
                        <a href="{{ route('admin.development_processes.show', $prevStep->id) }}" 
                           class="flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-primary transition">
                            <i class="fas fa-arrow-left mr-2"></i> 
                            Step #{{ $prevStep->step_number }}: {{ Str::limit($prevStep->title, 30) }}
                        </a>
                    @endif
                    
                    @if($nextStep)
                        <a href="{{ route('admin.development_processes.show', $nextStep->id) }}" 
                           class="flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-primary transition">
                            Step #{{ $nextStep->step_number }}: {{ Str::limit($nextStep->title, 30) }}
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection