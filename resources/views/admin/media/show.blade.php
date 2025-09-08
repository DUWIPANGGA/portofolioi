<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
            , theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#3B82F6'
                            , light: '#93C5FD'
                            , dark: '#1D4ED8'
                        }
                        , dark: {
                            100: '#1E293B'
                            , 200: '#334155'
                            , 300: '#475569'
                        }
                    }
                    , boxShadow: {
                        'neumorph': '8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff'
                        , 'neumorph-dark': '8px 8px 16px #0f172a, -8px -8px 16px #334155'
                        , 'neumorph-inset': 'inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff'
                        , 'neumorph-inset-dark': 'inset 4px 4px 8px #0f172a, inset -4px -4px 8px #334155'
                        , 'neumorph-3d': '12px 12px 24px #d1d9e6, -12px -12px 24px #ffffff'
                        , 'neumorph-3d-dark': '12px 12px 24px #0f172a, -12px -12px 24px #334155'
                    }
                }
            }
        }

    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #E6E9EF;
            transition: background-color 0.3s;
        }

        body.dark {
            background-color: #0F172A;
        }

        .neumorph {
            border-radius: 16px;
            background: #E6E9EF;
            box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
        }

        .neumorph-dark {
            border-radius: 16px;
            background: #1E293B;
            box-shadow: 8px 8px 16px #0f172a, -8px -8px 16px #334155;
        }

        .neumorph-btn {
            border-radius: 12px;
            background: #E6E9EF;
            box-shadow: 5px 5px 10px #d1d9e6, -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
        }

        .neumorph-btn:hover {
            box-shadow: 3px 3px 6px #d1d9e6, -3px -3px 6px #ffffff;
        }

        .neumorph-btn:active {
            box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
        }

        .neumorph-btn-dark {
            border-radius: 12px;
            background: #1E293B;
            box-shadow: 5px 5px 10px #0f172a, -5px -5px 10px #334155;
            transition: all 0.3s ease;
        }

        .neumorph-btn-dark:hover {
            box-shadow: 3px 3px 6px #0f172a, -3px -3px 6px #334155;
        }

        .neumorph-btn-dark:active {
            box-shadow: inset 4px 4px 8px #0f172a, inset -4px -4px 8px #334155;
        }

        .neumorph-input {
            border-radius: 12px;
            background: #E6E9EF;
            box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
        }

        .neumorph-input-dark {
            border-radius: 12px;
            background: #1E293B;
            box-shadow: inset 4px 4px 8px #0f172a, inset -4px -4px 8px #334155;
        }

        .neumorph-card {
            border-radius: 16px;
            background: #E6E9EF;
            box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
            transition: all 0.3s ease;
        }

        .neumorph-card:hover {
            box-shadow: 4px 4px 8px #d1d9e6, -4px -4px 8px #ffffff;
            transform: translateY(2px);
        }

        .neumorph-card-dark {
            border-radius: 16px;
            background: #1E293B;
            box-shadow: 8px 8px 16px #0f172a, -8px -8px 16px #334155;
            transition: all 0.3s ease;
        }

        .neumorph-card-dark:hover {
            box-shadow: 4px 4px 8px #0f172a, -4px -4px 8px #334155;
            transform: translateY(2px);
        }

        .dot {
            transition: all 0.3s ease;
        }

        .toggle-checkbox:checked~.dot {
            transform: translateX(100%);
        }

        .grid-view {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
        }

        .list-view table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .list-view tr {
            border-radius: 12px;
            background: #E6E9EF;
            box-shadow: 5px 5px 10px #d1d9e6, -5px -5px 10px #ffffff;
        }

        .dark .list-view tr {
            background: #1E293B;
            box-shadow: 5px 5px 10px #0f172a, -5px -5px 10px #334155;
        }

    </style>
</head>
<body class="ease-in-out duration-300">
    <!-- Header -->
    <header class="sticky top-0 z-10">
        <div class="neumorph dark:neumorph-dark py-4 px-8 flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Media Manager</h1>
                <span class="ml-4 text-sm text-gray-600 dark:text-gray-400">128 files • 2.4 GB used</span>
            </div>

            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search media..." class="neumorph-input dark:neumorph-input-dark py-2 px-4 pl-10 w-64 text-gray-700 dark:text-white focus:outline-none">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>

                <div class="flex gap-2">
                    <button id="gridViewBtn" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-primary">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button id="listViewBtn" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400">
                        <i class="fas fa-list"></i>
                    </button>
                </div>

                <button id="themeToggle" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
        </div>
    </header>

    <div class="container mx-auto p-6">
        <!-- Upload section -->
        <div class="neumorph dark:neumorph-dark rounded-2xl p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Upload Files</h2>

            <div class="flex items-center gap-4">
                <div class="relative flex-1">
                    <input type="file" id="fileUpload" class="absolute opacity-0 w-full h-full cursor-pointer">
                    <div class="neumorph-input dark:neumorph-input-dark py-3 px-4 text-gray-500 dark:text-gray-400 flex items-center justify-between">
                        <span>Select files to upload</span>
                        <i class="fas fa-cloud-upload-alt text-primary"></i>
                    </div>
                </div>

                <input type="text" placeholder="Optional name" class="neumorph-input dark:neumorph-input-dark py-3 px-4 w-1/3 text-gray-700 dark:text-white focus:outline-none">

                <button class="neumorph-btn dark:neumorph-btn-dark px-6 py-3 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                    <i class="fas fa-upload mr-2"></i> Upload
                </button>
            </div>

            <div class="mt-4 text-sm text-red-600">Error message would appear here</div>
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
        <div id="gridView" class="grid-view">
            @forelse($media as $file)
            <div class="neumorph-card dark:neumorph-card-dark p-4 cursor-pointer">
                <div class="relative h-40 mb-4 rounded-xl overflow-hidden">
                    @if(Str::startsWith($file->mime_type, 'image/'))
                                <img src="{{ asset('storage/' . $file->path) }}" alt="Preview" class="w-full h-full object-cover">
                            @else
                                <span class="text-gray-500">📄 {{ strtoupper(pathinfo($file->name, PATHINFO_EXTENSION)) }}</span>
                            @endif
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition flex items-center justify-center opacity-0 hover:opacity-100">
                        <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white bg-primary">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-medium text-gray-800 dark:text-white truncate">{{ $file->name }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ number_format($file->size / 1024, 2) }} KB</p>
                    </div>
                    <div class="dropdown relative">
                        <button class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <form action="{{ route('admin.media.destroy', $file) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Delete this file?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                    </div>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-gray-500">No files uploaded yet.</td>
            </tr>
            @endforelse
        </div>
        {{ $media->links() }}
        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <div class="neumorph dark:neumorph-dark rounded-xl inline-flex items-center p-2">
                <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 mr-2">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center bg-primary text-white mx-1">1</button>
                <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 mx-1">2</button>
                <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 mx-1">3</button>
                <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 ml-2">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
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
</body>
</html>
