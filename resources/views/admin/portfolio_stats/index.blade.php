<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Stats Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .neumorph-btn {
            background: #e6e9ef;
            box-shadow: 5px 5px 10px #b8b9be, -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
        }
        .neumorph-btn:hover {
            box-shadow: inset 5px 5px 10px #b8b9be, inset -5px -5px 10px #ffffff;
        }
        .neumorph-btn-dark {
            background: #2d3748;
            box-shadow: 5px 5px 10px #252f3f, -5px -5px 10px #353f51;
            transition: all 0.3s ease;
        }
        .neumorph-btn-dark:hover {
            box-shadow: inset 5px 5px 10px #252f3f, inset -5px -5px 10px #353f51;
        }
        .input-field {
            background: #e6e9ef;
            box-shadow: inset 3px 3px 6px #b8b9be, inset -3px -3px 6px #ffffff;
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            outline: none;
            box-shadow: inset 4px 4px 8px #b8b9be, inset -4px -4px 8px #ffffff;
        }
        .input-field-dark {
            background: #4a5568;
            box-shadow: inset 3px 3px 6px #424b5c, inset -3px -3px 6px #525f74;
            color: #f7fafc;
        }
        .input-field-dark:focus {
            box-shadow: inset 4px 4px 8px #424b5c, inset -4px -4px 8px #525f74;
        }
        .neumorph-3d {
            background: #e6e9ef;
            border-radius: 1rem;
            box-shadow: 10px 10px 20px #b8b9be, -10px -10px 20px #ffffff;
        }
        .neumorph-3d-dark {
            background: #2d3748;
            box-shadow: 10px 10px 20px #252f3f, -10px -10px 20px #353f51;
        }
        .section {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .stat-card {
            background: #e6e9ef;
            border-radius: 1rem;
            box-shadow: 5px 5px 10px #b8b9be, -5px -5px 10px #ffffff;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 8px 8px 15px #b8b9be, -8px -8px 15px #ffffff;
        }
        .stat-card-dark {
            background: #2d3748;
            box-shadow: 5px 5px 10px #252f3f, -5px -5px 10px #353f51;
        }
        .stat-card-dark:hover {
            box-shadow: 8px 8px 15px #252f3f, -8px -8px 15px #353f51;
        }
        .dark-mode-toggle {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1000;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300">
    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle neumorph-btn dark:neumorph-btn-dark w-12 h-12 rounded-full flex items-center justify-center" onclick="toggleDarkMode()">
        <i class="fas fa-moon dark:hidden"></i>
        <i class="fas fa-sun hidden dark:block"></i>
    </button>

    <div class="section">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold">Portfolio Statistics</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage your portfolio statistics</p>
            </div>
            
            <div class="flex gap-3">
                <!-- Back to Dashboard Button -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl hover:text-primary transition flex items-center whitespace-nowrap">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Projects Completed Card -->
            <div class="stat-card dark:stat-card-dark text-center">
                <div class="w-16 h-16 rounded-full neumorph-btn dark:neumorph-btn-dark mx-auto mb-4 flex items-center justify-center text-blue-500">
                    <i class="fas fa-project-diagram text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-2">{{ $portfolioStat->projects_completed ?? 0 }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Projects Completed</p>
            </div>
            
            <!-- Happy Clients Card -->
            <div class="stat-card dark:stat-card-dark text-center">
                <div class="w-16 h-16 rounded-full neumorph-btn dark:neumorph-btn-dark mx-auto mb-4 flex items-center justify-center text-green-500">
                    <i class="fas fa-smile text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-2">{{ $portfolioStat->happy_clients ?? 0 }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Happy Clients</p>
            </div>
            
            <!-- Awards Won Card -->
            <div class="stat-card dark:stat-card-dark text-center">
                <div class="w-16 h-16 rounded-full neumorph-btn dark:neumorph-btn-dark mx-auto mb-4 flex items-center justify-center text-yellow-500">
                    <i class="fas fa-trophy text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-2">{{ $portfolioStat->awards_won ?? 0 }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Awards Won</p>
            </div>
            
            <!-- Years Experience Card -->
            <div class="stat-card dark:stat-card-dark text-center">
                <div class="w-16 h-16 rounded-full neumorph-btn dark:neumorph-btn-dark mx-auto mb-4 flex items-center justify-center text-red-500">
                    <i class="fas fa-briefcase text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-2">{{ $portfolioStat->years_experience ?? 0 }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Years Experience</p>
            </div>
        </div>

        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-6">Edit Portfolio Statistics</h2>
            
            <form action="{{ route('portfolio-stats.update', $portfolioStat->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Projects Completed Input -->
                    <div>
                        <label for="projects_completed" class="block mb-2 font-medium">Projects Completed</label>
                        <input type="number" id="projects_completed" name="projects_completed" 
                               value="{{ old('projects_completed', $portfolioStat->projects_completed) }}"
                               class="w-full input-field dark:input-field-dark" 
                               min="0" required>
                        @error('projects_completed')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Happy Clients Input -->
                    <div>
                        <label for="happy_clients" class="block mb-2 font-medium">Happy Clients</label>
                        <input type="number" id="happy_clients" name="happy_clients" 
                               value="{{ old('happy_clients', $portfolioStat->happy_clients) }}"
                               class="w-full input-field dark:input-field-dark" 
                               min="0" required>
                        @error('happy_clients')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Awards Won Input -->
                    <div>
                        <label for="awards_won" class="block mb-2 font-medium">Awards Won</label>
                        <input type="number" id="awards_won" name="awards_won" 
                               value="{{ old('awards_won', $portfolioStat->awards_won) }}"
                               class="w-full input-field dark:input-field-dark" 
                               min="0" required>
                        @error('awards_won')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Years Experience Input -->
                    <div>
                        <label for="years_experience" class="block mb-2 font-medium">Years Experience</label>
                        <input type="number" id="years_experience" name="years_experience" 
                               value="{{ old('years_experience', $portfolioStat->years_experience) }}"
                               class="w-full input-field dark:input-field-dark" 
                               min="0" required>
                        @error('years_experience')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex justify-end mt-8 gap-3">
                    <!-- Cancel Button -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl transition">
                        Cancel
                    </a>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                        Update Statistics
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Dark mode functionality
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        }
        
        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>
</html>