<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .neumorph-btn {
            background: #e6e9ef;
            box-shadow: 5px 5px 10px #c8c9cc, -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
        }
        .neumorph-btn:hover {
            box-shadow: inset 5px 5px 10px #c8c9cc, inset -5px -5px 10px #ffffff;
        }
        .neumorph-btn-dark {
            background: #2d3748;
            box-shadow: 5px 5px 10px #262f3d, -5px -5px 10px #343f53;
            transition: all 0.3s ease;
        }
        .neumorph-btn-dark:hover {
            box-shadow: inset 5px 5px 10px #262f3d, inset -5px -5px 10px #343f53;
        }
        .neumorph-3d {
            background: #e6e9ef;
            box-shadow: 10px 10px 20px #c8c9cc, -10px -10px 20px #ffffff;
            border-radius: 16px;
        }
        .neumorph-3d-dark {
            background: #2d3748;
            box-shadow: 10px 10px 20px #262f3d, -10px -10px 20px #343f53;
            border-radius: 16px;
        }
        .input-field {
            background: #e6e9ef;
            box-shadow: inset 5px 5px 10px #c8c9cc, inset -5px -5px 10px #ffffff;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            outline: none;
            box-shadow: inset 3px 3px 6px #c8c9cc, inset -3px -3px 6px #ffffff;
        }
        .input-field-dark {
            background: #2d3748;
            box-shadow: inset 5px 5px 10px #262f3d, inset -5px -5px 10px #343f53;
            color: #e2e8f0;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        .input-field-dark:focus {
            outline: none;
            box-shadow: inset 3px 3px 6px #262f3d, inset -3px -3px 6px #343f53;
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
        .file-drop-area {
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        .file-drop-area:hover, .file-drop-area.active {
            border-color: #4299e1;
            background-color: rgba(66, 153, 225, 0.05);
        }
        .pagination .page-item {
            margin: 0 0.25rem;
        }
        .pagination .page-link {
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            background: #e6e9ef;
            box-shadow: 3px 3px 6px #c8c9cc, -3px -3px 6px #ffffff;
            transition: all 0.3s ease;
        }
        .pagination .page-link:hover {
            box-shadow: inset 3px 3px 6px #c8c9cc, inset -3px -3px 6px #ffffff;
        }
        .dark .pagination .page-link {
            background: #2d3748;
            box-shadow: 3px 3px 6px #262f3d, -3px -3px 6px #343f53;
            color: #e2e8f0;
        }
        .dark .pagination .page-link:hover {
            box-shadow: inset 3px 3px 6px #262f3d, inset -3px -3px 6px #343f53;
        }
        .pagination .page-item.active .page-link {
            background: #4299e1;
            color: white;
            box-shadow: inset 3px 3px 6px #3b83c5, inset -3px -3px 6px #4aafff;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-200">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold">Media Library</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your media files</p>
            </div>
            
            <div class="flex gap-3 w-full md:w-auto">
                <!-- Upload Button -->
                <button onclick="openUploadModal()" class="neumorph-btn dark:neumorph-btn-dark px-6 py-3 rounded-xl text-primary font-medium hover:text-primary-dark transition flex items-center justify-center whitespace-nowrap">
                    <i class="fas fa-upload mr-2"></i> Upload Media
                </button>
                
                <!-- Toggle Dark/Light Mode -->
                <button id="theme-toggle" class="neumorph-btn dark:neumorph-btn-dark w-12 h-12 rounded-xl flex items-center justify-center">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:block"></i>
                </button>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-4">
                        <i class="fas fa-images text-blue-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total Files</p>
                        <h3 class="text-2xl font-bold">127</h3>
                    </div>
                </div>
            </div>
            
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-4">
                        <i class="fas fa-database text-green-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total Storage</p>
                        <h3 class="text-2xl font-bold">2.4 GB</h3>
                    </div>
                </div>
            </div>
            
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-4">
                        <i class="fas fa-file-image text-purple-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Images</p>
                        <h3 class="text-2xl font-bold">84</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <!-- Search Form -->
                <form class="w-full md:w-64">
                    <div class="relative">
                        <input type="text" placeholder="Search media..." class="w-full input-field dark:input-field-dark pl-10 pr-4 py-2">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                    </div>
                </form>
                
                <!-- Filter Buttons -->
                <div class="flex gap-2">
                    <button class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                        <i class="fas fa-image mr-2"></i> Images
                    </button>
                    <button class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                        <i class="fas fa-file-video mr-2"></i> Videos
                    </button>
                    <button class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center justify-center whitespace-nowrap">
                        <i class="fas fa-file mr-2"></i> Documents
                    </button>
                </div>
            </div>
            
            <!-- View Toggle -->
            <div class="flex gap-2">
                <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-xl flex items-center justify-center text-primary">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>

        <!-- Media Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            <!-- Media Item 1 -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden card-hover">
                <div class="relative group">
                    <img src="https://picsum.photos/seed/media1/400/300" alt="Landscape" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="flex space-x-2">
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-blue-500">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-green-500">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium truncate">mountain-landscape.jpg</h3>
                    <div class="flex justify-between items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <span>2.4 MB</span>
                        <span>Jan 12, 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- Media Item 2 -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden card-hover">
                <div class="relative group">
                    <img src="https://picsum.photos/seed/media2/400/300" alt="Portrait" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="flex space-x-2">
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-blue-500">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-green-500">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium truncate">portrait-shot.png</h3>
                    <div class="flex justify-between items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <span>1.8 MB</span>
                        <span>Feb 3, 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- Media Item 3 -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden card-hover">
                <div class="relative group">
                    <div class="w-full h-48 bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                        <i class="fas fa-file-pdf text-5xl text-red-500"></i>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="flex space-x-2">
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-blue-500">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-green-500">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium truncate">project-document.pdf</h3>
                    <div class="flex justify-between items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <span>4.2 MB</span>
                        <span>Mar 18, 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- Media Item 4 -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden card-hover">
                <div class="relative group">
                    <img src="https://picsum.photos/seed/media3/400/300" alt="City" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="flex space-x-2">
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-blue-500">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-green-500">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium truncate">cityscape-at-night.jpg</h3>
                    <div class="flex justify-between items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <span>3.1 MB</span>
                        <span>Apr 5, 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- Media Item 5 -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden card-hover">
                <div class="relative group">
                    <div class="w-full h-48 bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                        <i class="fas fa-file-video text-5xl text-purple-500"></i>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="flex space-x-2">
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-blue-500">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-green-500">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-medium truncate">product-demo.mp4</h3>
                    <div class="flex justify-between items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <span>15.7 MB</span>
                        <span>May 22, 2023</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-xl">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-xl bg-blue-500 text-white">1</a>
                <a href="#" class="neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-xl">2</a>
                <a href="#" class="neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-xl">3</a>
                <a href="#" class="neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-xl">4</a>
                <a href="#" class="neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-xl">5</a>
                <a href="#" class="neumorph-btn dark:neumorph-btn-dark px-3 py-2 rounded-xl">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>

    <!-- Upload Modal -->
    <div id="upload-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl w-full max-w-md mx-4 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Upload Media</h3>
                <button onclick="closeUploadModal()" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form id="upload-form">
                <div class="mb-6">
                    <div id="file-drop-area" class="file-drop-area">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                        <p class="text-gray-600 dark:text-gray-400">Drag & drop files here or click to browse</p>
                        <input type="file" id="file-input" class="hidden" multiple>
                        <button type="button" onclick="document.getElementById('file-input').click()" class="neumorph-btn dark:neumorph-btn-dark mt-4 px-4 py-2 rounded-xl">
                            Browse Files
                        </button>
                    </div>
                    <div id="file-list" class="mt-4 hidden">
                        <p class="font-medium mb-2">Selected files:</p>
                        <ul id="selected-files" class="text-sm text-gray-600 dark:text-gray-400"></ul>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="file-name" class="block text-sm font-medium mb-2">File Name (optional)</label>
                    <input type="text" id="file-name" class="w-full input-field dark:input-field-dark py-2 px-4" placeholder="Enter custom file name">
                </div>
                
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeUploadModal()" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl">
                        Cancel
                    </button>
                    <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-blue-500 text-white">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });

        // Upload modal functionality
        function openUploadModal() {
            document.getElementById('upload-modal').classList.remove('hidden');
        }

        function closeUploadModal() {
            document.getElementById('upload-modal').classList.add('hidden');
        }

        // File drop area functionality
        const fileDropArea = document.getElementById('file-drop-area');
        const fileInput = document.getElementById('file-input');
        const fileList = document.getElementById('file-list');
        const selectedFiles = document.getElementById('selected-files');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileDropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            fileDropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            fileDropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            fileDropArea.classList.add('active');
        }

        function unhighlight() {
            fileDropArea.classList.remove('active');
        }

        fileDropArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        fileInput.addEventListener('change', function() {
            handleFiles(this.files);
        });

        function handleFiles(files) {
            if (files.length > 0) {
                fileList.classList.remove('hidden');
                selectedFiles.innerHTML = '';
                
                for (let i = 0; i < files.length; i++) {
                    const li = document.createElement('li');
                    li.className = 'flex justify-between items-center py-1';
                    li.innerHTML = `
                        <span>${files[i].name}</span>
                        <span class="text-xs">${formatFileSize(files[i].size)}</span>
                    `;
                    selectedFiles.appendChild(li);
                }
            }
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Form submission
        document.getElementById('upload-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically handle the file upload via AJAX or let the form submit naturally
            alert('Files would be uploaded in a real application');
            closeUploadModal();
        });
    </script>
</body>
</html>