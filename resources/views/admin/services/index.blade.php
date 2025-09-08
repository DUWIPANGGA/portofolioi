@extends('layouts.app')

@section('title', 'Services Management')
@section('subtitle', 'Manage your services')

@section('content')
<div class="section">
    <div class="neumorph-3d dark:neumorph-3d-dark p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Services List</h3>
            <a href="{{ route('admin.services.create') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b dark:border-gray-700">
                        <th class="text-left py-3 px-4">Order</th>
                        <th class="text-left py-3 px-4">Title</th>
                        <th class="text-left py-3 px-4">Icon</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-dark-200">
                        <td class="py-3 px-4">{{ $service->order }}</td>
                        <td class="py-3 px-4">{{ $service->title }}</td>
                        <td class="py-3 px-4 text-2xl">
                            <i class="{{ $service->icon }}"></i>
                        </td>
                        <td class="py-3 px-4 flex space-x-2">
                            <a href="{{ route('admin.services.show', $service->id) }}" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-lg flex items-center justify-center text-red-500">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 px-4 text-center">No services found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($services->hasPages())
        <div class="mt-6">
            {{ $services->links() }}
        </div>
        @endif
    </div>
</div>
@endsection