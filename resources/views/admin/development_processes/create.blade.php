@extends('layouts.app')

@section('title', 'Add Development Process Step')

@section('content')
<div class="section">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Add New Process Step</h3>
        <a href="{{ route('admin.development_processes.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
        @include('admin.development_processes._form', [
            'formAction' => route('admin.development_processes.store'),
            'method' => 'POST',
            'process' => null,
            'buttonText' => 'Create Step'
        ])
    </div>
</div>
@endsection