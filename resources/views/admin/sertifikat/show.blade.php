@extends('layouts.app')

@section('title', 'Certificate Details')
@section('subtitle', 'View certificate details')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Certificate Details</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.sertifikat.edit', $certificate->id) }}" 
                   class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                   title="Edit">
                    <i class="fas fa-edit text-sm"></i>
                </a>
                <form action="{{ route('admin.sertifikat.destroy', $certificate->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                            title="Delete"
                            onclick="return confirm('Are you sure you want to delete this certificate?')">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Certificate Image -->
            <div class="lg:col-span-1">
                @if($certificate->image)
                    <img src="{{ Storage::url($certificate->image) }}" 
                         alt="{{ $certificate->title }}"
                         class="w-full rounded-xl neumorph-inset dark:neumorph-inset-dark">
                @else
                    <div class="w-full h-64 rounded-xl neumorph-inset dark:neumorph-inset-dark flex items-center justify-center text-primary">
                        <i class="fas fa-certificate text-8xl"></i>
                    </div>
                @endif
            </div>

            <!-- Certificate Details -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Header -->
                <div>
                    <h4 class="text-2xl font-bold mb-2">{{ $certificate->title }}</h4>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ $certificate->issuer }}</p>
                </div>

                <!-- Status Badges -->
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $certificate->status_badge }}">
                        {{ ucfirst($certificate->status) }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $certificate->is_active ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                        {{ $certificate->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <!-- Dates -->
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Issue Date:</span>
                        <span class="font-medium">{{ $certificate->issue_date->format('F d, Y') }}</span>
                    </div>
                    @if($certificate->expiry_date)
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Expiry Date:</span>
                        <span class="font-medium {{ $certificate->is_expired ? 'text-red-500' : 'text-green-500' }}">
                            {{ $certificate->expiry_date->format('F d, Y') }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Duration:</span>
                        <span class="font-medium">{{ $certificate->duration }}</span>
                    </div>
                    @endif
                </div>

                <!-- Credential Info -->
                @if($certificate->credential_id || $certificate->credential_url)
                <div class="space-y-3">
                    @if($certificate->credential_id)
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Credential ID:</span>
                        <span class="font-medium">{{ $certificate->credential_id }}</span>
                    </div>
                    @endif
                    @if($certificate->credential_url)
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Credential URL:</span>
                        <a href="{{ $certificate->credential_url }}" target="_blank" 
                           class="font-medium text-primary hover:underline">
                            View Credential
                        </a>
                    </div>
                    @endif
                </div>
                @endif

                <!-- Description -->
                @if($certificate->description)
                <div>
                    <h5 class="font-medium mb-2">Description</h5>
                    <div class="prose dark:prose-invert max-w-none">
                        {!! nl2br(e($certificate->description)) !!}
                    </div>
                </div>
                @endif

                <!-- Meta Info -->
                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600 dark:text-gray-400">Display Order:</span>
                            <p>{{ $certificate->order }}</p>
                        </div>
                        <div>
                            <span class="text-gray-600 dark:text-gray-400">Last Updated:</span>
                            <p>{{ $certificate->updated_at->format('M d, Y \a\t h:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('admin.sertifikat.index') }}"
               class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl">
                Back to Certificates
            </a>
        </div>
    </div>
</div>
@endsection