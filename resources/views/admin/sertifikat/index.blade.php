@extends('layouts.app')

@section('title', 'Certificates Management')
@section('subtitle', 'Manage all certificates')

@section('content')
<div class="section">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">All Certificates</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $certificates->total() }} certificates found</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.sertifikat.index') }}" class="w-full md:w-64">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search certificates..." 
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>
            
            <!-- Create New Button -->
            <a href="{{ route('admin.sertifikat.create') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> New Certificate
            </a>
        </div>
    </div>

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($certificates->isEmpty())
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    <i class="fas fa-certificate text-3xl"></i>
                </div>
                <h4 class="text-lg font-medium mb-2">No certificates found</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-4">
                    @if(request()->has('search'))
                        No certificates match your search criteria. Try a different search term.
                    @else
                        You haven't added any certificates yet. Get started by adding your first certificate.
                    @endif
                </p>
                <a href="{{ route('admin.sertifikat.create') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Certificate
                </a>
            </div>
        @else
            <!-- Certificates Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @foreach($certificates as $certificate)
                    <div class="neumorph-card dark:neumorph-card-dark rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                        <!-- Certificate Image/Icon -->
                        <div class="mb-4">
                            @if($certificate->image)
                                <img src="{{ Storage::url($certificate->image) }}" 
                                     alt="{{ $certificate->title }}"
                                     class="w-full h-48 object-cover rounded-lg neumorph-inset dark:neumorph-inset-dark">
                            @else
                                <div class="w-full h-48 rounded-lg neumorph-inset dark:neumorph-inset-dark flex items-center justify-center text-primary">
                                    <i class="fas fa-certificate text-6xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Certificate Info -->
                        <div class="space-y-3">
                            <h4 class="font-semibold text-lg line-clamp-2">{{ $certificate->title }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $certificate->issuer }}</p>
                            
                            <!-- Dates -->
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Issued: {{ $certificate->issue_date->format('M Y') }}</span>
                                @if($certificate->expiry_date)
                                    <span class="{{ $certificate->is_expired ? 'text-red-500' : 'text-green-500' }}">
                                        {{ $certificate->expiry_date->format('M Y') }}
                                    </span>
                                @endif
                            </div>

                            <!-- Status Badge -->
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $certificate->status_badge }}">
                                    {{ ucfirst($certificate->status) }}
                                </span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $certificate->is_active ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                                    {{ $certificate->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>

                            <!-- Actions -->
                            <div class="flex justify-between items-center pt-3 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.sertifikat.show', $certificate->id) }}" 
                                       class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                       title="View">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                    <a href="{{ route('admin.sertifikat.edit', $certificate->id) }}" 
                                       class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                       title="Edit">
                                        <i class="fas fa-edit text-xs"></i>
                                    </a>
                                </div>
                                
                                <form action="{{ route('admin.sertifikat.destroy', $certificate->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this certificate?')">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($certificates->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $certificates->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection