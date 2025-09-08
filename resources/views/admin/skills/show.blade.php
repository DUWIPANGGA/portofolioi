@extends('layouts.app')

@section('title', 'Skill Details')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Skill Details</h3>
        <div class="flex space-x-3">
            <a href="{{ route('admin.skills.edit', $skill->id) }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-blue-500 transition">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.skills.index') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Skills
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Icon Display -->
                <div class="flex-shrink-0">
                    @if($skill->icon)
                    <div class="w-24 h-24 rounded-full neumorph dark:neumorph-dark flex items-center justify-center text-3xl text-primary">
                        <i class="{{ $skill->icon }}"></i>
                    </div>
                    @endif
                </div>
                
                <!-- Skill Details -->
                <div class="flex-grow">
                    <h4 class="text-2xl font-bold mb-2">{{ $skill->name }}</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Belongs to {{ $skill->user->name }}</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Percentage -->
                        <div>
                            <h5 class="font-medium mb-2">Proficiency</h5>
                            <div class="flex items-center">
                                <div class="w-full mr-4">
                                    <div class="h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                        <div class="h-full bg-primary" style="width: {{ $skill->percentage }}%"></div>
                                    </div>
                                </div>
                                <span class="font-medium">{{ $skill->percentage }}%</span>
                            </div>
                        </div>
                        
                        <!-- Category -->
                        <div>
                            <h5 class="font-medium mb-2">Category</h5>
                            <span class="px-3 py-1 rounded-full text-sm neumorph-btn dark:neumorph-btn-dark capitalize">
                                {{ $skill->category ?? 'Uncategorized' }}
                            </span>
                        </div>
                        
                        <!-- Order -->
                        <div>
                            <h5 class="font-medium mb-2">Display Order</h5>
                            <p>{{ $skill->order ?? 'Not specified' }}</p>
                        </div>
                        
                        <!-- Created At -->
                        <div>
                            <h5 class="font-medium mb-2">Created</h5>
                            <p>{{ $skill->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection