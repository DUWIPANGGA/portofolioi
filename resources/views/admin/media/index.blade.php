@extends('layouts.app')

@section('title', 'Media Management')

@section('content')

    <div class="container mx-auto p-6">
        <div class="neumorph dark:neumorph-dark rounded-2xl p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Upload Files</h2>

            <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4">
                @csrf

                <!-- Input File -->
                <div class="relative flex-1">
                    <input type="file" id="fileUpload" name="file" class="absolute opacity-0 w-full h-full cursor-pointer">
                    <div class="neumorph-input dark:neumorph-input-dark py-3 px-4 text-gray-500 dark:text-gray-400 flex items-center justify-between">
                        <span>Select files to upload</span>
                        <i class="fas fa-cloud-upload-alt text-primary"></i>
                    </div>
                </div>

                <!-- Optional Name -->
                <input type="text" name="name" placeholder="Optional name" class="neumorph-input dark:neumorph-input-dark py-3 px-4 w-1/3 text-gray-700 dark:text-white focus:outline-none">

                <!-- Submit -->
                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-6 py-3 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    <i class="fas fa-upload mr-2"></i> Upload
                </button>
            </form>

            @if ($errors->any())
            <div class="mt-4 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
            @endif
        </div>


        <!-- Media display section -->
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Your Files</h2>

            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600 dark:text-gray-400">Sort by:</span>
                <select class="neumorph-input dark:neumorph-input-dark py-2 px-4 text-gray-700 dark:text-white focus:outline-none">
                    <option>Newest first</option>
                    <option>Oldest first</option>
                    <option>Name A-Z</option>
                    <option>Name Z-A</option>
                    <option>Largest first</option>
                    <option>Smallest first</option>
                </select>
            </div>
        </div>

        <!-- Grid View -->
<div id="gridView" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
    @forelse($media as $file)
    <div class="neumorph-card dark:neumorph-card-dark p-4 cursor-pointer">
        <div class="relative h-32 mb-4 rounded-xl overflow-hidden">
            @if(Str::startsWith($file->mime_type, 'image/'))
            <img src="{{ asset('storage/' . $file->path) }}" alt="Preview" class="w-full h-full object-cover">
            @else
            <span class="text-gray-500 flex items-center justify-center h-full">📄 {{ strtoupper(pathinfo($file->name, PATHINFO_EXTENSION)) }}</span>
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition flex items-center justify-center opacity-0 hover:opacity-100">
                <a href="{{ asset('storage/' . $file->path) }}" download
                   class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white bg-primary">
                    <i class="fas fa-download"></i>
                </a>
            </div>
        </div>
        <div class="flex justify-between items-start">
            <div>
                <h3 class="font-medium text-gray-800 dark:text-white truncate max-w-[120px]">{{ $file->name }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ number_format($file->size / 1024, 2) }} KB</p>
            </div>
            <form action="{{ route('admin.media.destroy', $file) }}" method="POST"
                  onsubmit="return confirm('Delete this file?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-600">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    @empty
    <p class="col-span-full text-center text-gray-500">No files uploaded yet.</p>
    @endforelse
</div>


        <!-- List View (hidden by default) -->
        <div id="listView" class="list-view hidden">
            <table>
                <tbody>
                    @forelse($media as $file)
                    <tr class="p-4">
                        <td class="p-4 w-16">
                            @if(Str::startsWith($file->mime_type, 'image/'))
                            <img src="{{ asset('storage/' . $file->path) }}" alt="Preview" class="w-12 h-12 object-cover rounded">
                            @else
                            <span class="text-gray-500">📄</span>
                            @endif
                        </td>
                        <td class="p-4 text-gray-800 dark:text-white">{{ $file->name }}</td>
                        <td class="p-4 text-gray-600 dark:text-gray-400">{{ number_format($file->size / 1024, 2) }} KB</td>
                        <td class="p-4 text-right">
                            <a href="{{ asset('storage/' . $file->path) }}" download class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary">
                                <i class="fas fa-download"></i>
                            </a>
                            <form action="{{ route('admin.media.destroy', $file) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Delete this file?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">No files uploaded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $media->links('vendor.pagination.neumorphic') }}

    </div>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            const icon = themeToggle.querySelector('i');

            if (html.classList.contains('dark')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        });

        // View toggle functionality
        const gridViewBtn = document.getElementById('gridViewBtn');
        const listViewBtn = document.getElementById('listViewBtn');
        const gridView = document.getElementById('gridView');
        const listView = document.getElementById('listView');

        gridViewBtn.addEventListener('click', () => {
            gridView.classList.remove('hidden');
            listView.classList.add('hidden');
            gridViewBtn.classList.replace('text-gray-600', 'text-primary');
            gridViewBtn.classList.replace('dark:text-gray-400', 'dark:text-primary');
            listViewBtn.classList.replace('text-primary', 'text-gray-600');
            listViewBtn.classList.replace('dark:text-primary', 'dark:text-gray-400');
        });

        listViewBtn.addEventListener('click', () => {
            gridView.classList.add('hidden');
            listView.classList.remove('hidden');
            listViewBtn.classList.replace('text-gray-600', 'text-primary');
            listViewBtn.classList.replace('dark:text-gray-400', 'dark:text-primary');
            gridViewBtn.classList.replace('text-primary', 'text-gray-600');
            gridViewBtn.classList.replace('dark:text-primary', 'dark:text-gray-400');
        });

    </script>
@endsection
