<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Duwipangga</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          darkMode: 'class',
          theme: {
            extend: {
              colors: {
                primary: '#6c5ce7',
                secondary: '#a29bfe',
                dark: {
                  100: '#1a1a2e',
                  200: '#16213e',
                  300: '#0f3460'
                },
                light: '#f5f6fa'
              },
              fontFamily: {
                sans: ['Poppins', 'sans-serif']
              },
              boxShadow: {
                'neumorph': '20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff',
                'neumorph-dark': '20px 20px 60px #0a0a0f, -20px -20px 60px #2a2a4d',
                'neumorph-inset': 'inset 10px 10px 20px #d9d9d9, inset -10px -10px 20px #ffffff',
                'neumorph-inset-dark': 'inset 10px 10px 20px #0a0a0f, inset -10px -10px 20px #2a2a4d',
                'neumorph-3d': '15px 15px 30px #d9d9d9, -15px -15px 30px #ffffff, 0 0 0 3px rgba(108, 92, 231, 0.2)',
                'neumorph-3d-dark': '15px 15px 30px #0a0a0f, -15px -15px 30px #2a2a4d, 0 0 0 3px rgba(108, 92, 231, 0.2)',
                'neumorph-btn': '5px 5px 10px #d9d9d9, -5px -5px 10px #ffffff',
                'neumorph-btn-dark': '5px 5px 10px #0a0a0f, -5px -5px 10px #2a2a4d',
                'neumorph-btn-active': 'inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff',
                'neumorph-btn-active-dark': 'inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d'
              },
              animation: {
                'float': 'float 6s ease-in-out infinite',
                'float-2': 'float 4s ease-in-out infinite',
                'float-3': 'float 5s ease-in-out infinite',
                'pulse-slow': 'pulse 6s infinite',
                'spin-slow': 'spin 20s linear infinite'
              },
              keyframes: {
                float: {
                  '0%, 100%': { transform: 'translateY(0)' },
                  '50%': { transform: 'translateY(-20px)' }
                }
              }
            }
          }
        }
    </script>
    <style>
        .text-gradient {
            background: linear-gradient(90deg, #6c5ce7 0%, #a29bfe 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .chart-container {
            height: 300px;
        }
        
        .skill-bar {
            height: 8px;
            background: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .skill-progress {
            height: 100%;
            background: linear-gradient(90deg, #6c5ce7 0%, #a29bfe 100%);
            border-radius: 4px;
            transition: width 1s ease-in-out;
        }
        
        .dark .skill-bar {
            background: #2a2a4d;
        }
        
        .section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .section-visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .neumorph-hover:hover {
            transform: translateY(-5px);
            box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff, 0 0 0 3px rgba(108, 92, 231, 0.3);
        }
        
        .dark .neumorph-hover:hover {
            box-shadow: 20px 20px 60px #0a0a0f, -20px -20px 60px #2a2a4d, 0 0 0 3px rgba(108, 92, 231, 0.3);
        }
        
        .input-field {
            background: #f5f6fa;
            border-radius: 12px;
            box-shadow: inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff;
        }
        
        .dark .input-field {
            background: #1a1a2e;
            box-shadow: inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d;
        }
        
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
        <link rel="stylesheet" href="{{ asset('main.css') }}">

</head>
<body class="min-h-screen bg-light  text-dark dark:text-light font-sans">
    <!-- Dashboard Layout -->
    @include('partials.ui-kit')
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-light border-r border-gray-200 ">
            <div class="flex items-center justify-center h-16 px-4 neumorph-inset ">
                <h1 class="text-xl font-bold text-gradient">Duwipangga</h1>
            </div>
            <div class="flex flex-col flex-grow p-4 overflow-y-auto">
                <div class="space-y-2">
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl text-primary font-medium">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-chart-line mr-3"></i>
                        Analytics
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-project-diagram mr-3"></i>
                        Projects
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-users mr-3"></i>
                        Team
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-calendar-alt mr-3"></i>
                        Calendar
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-cog mr-3"></i>
                        Settings
                    </a>
                </div>
                
                <div class="mt-auto pt-4">
                    <div class="neumorph-3d  p-4 rounded-xl">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full overflow-hidden mr-3 neumorph ">
                                <img src="{{ asset('assets/main.jpg') }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold">Alex Johnson</h4>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Admin</p>
                            </div>
                        </div>
                        <div class="mt-3 flex justify-between">
                            <button class="neumorph-btn  px-3 py-1 rounded-lg text-sm hover:text-primary transition">
                                <i class="fas fa-sign-out-alt mr-1"></i> Logout
                            </button>
                            <button id="darkModeToggle" class="neumorph-btn  px-3 py-1 rounded-lg text-sm hover:text-primary transition">
                                <i class="fas fa-moon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Sidebar -->
        <div id="mobileSidebar" class="md:hidden fixed inset-0 z-50 bg-black bg-opacity-50 hidden">
            <div class="absolute left-0 top-0 h-full w-64 bg-light shadow-lg">
                <div class="flex items-center justify-between h-16 px-4 neumorph-inset ">
                    <h1 class="text-xl font-bold text-gradient">Duwipangga</h1>
                    <button id="closeMobileSidebar" class="neumorph-btn  w-8 h-8 rounded-full flex items-center justify-center">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="p-4 space-y-2">
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl text-primary font-medium">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-chart-line mr-3"></i>
                        Analytics
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-project-diagram mr-3"></i>
                        Projects
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-users mr-3"></i>
                        Team
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-calendar-alt mr-3"></i>
                        Calendar
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 neumorph-btn  rounded-xl hover:text-primary transition">
                        <i class="fas fa-cog mr-3"></i>
                        Settings
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between h-16 px-4 neumorph-inset ">
                <button id="openMobileSidebar" class="md:hidden neumorph-btn  w-10 h-10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="flex-1 max-w-md mx-4">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="w-full input-field pl-10 pr-4 py-2">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-500 "></i>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="neumorph-btn  w-10 h-10 rounded-xl flex items-center justify-center relative">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <button id="darkModeToggleMobile" class="neumorph-btn  w-10 h-10 rounded-xl flex items-center justify-center">
                        <i class="fas fa-moon"></i>
                    </button>
                    <div class="hidden md:flex items-center">
                        <div class="w-8 h-8 rounded-full overflow-hidden mr-2 neumorph ">
                            <img src="{{ asset('assets/main.jpg') }}" alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <span class="font-medium">Alex</span>
                    </div>
                </div>
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold">Dashboard Overview</h2>
                    <p class="text-gray-600 dark:text-gray-400">Welcome back, Alex! Here's what's happening today.</p>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="neumorph-3d  p-6 rounded-2xl section">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400">Total Projects</p>
                                <h3 class="text-3xl font-bold mt-1">24</h3>
                            </div>
                            <div class="neumorph-btn  w-12 h-12 rounded-xl flex items-center justify-center text-primary">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm text-green-500">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>12% from last month</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="neumorph-3d  p-6 rounded-2xl section" style="transition-delay: 0.1s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400">Active Tasks</p>
                                <h3 class="text-3xl font-bold mt-1">15</h3>
                            </div>
                            <div class="neumorph-btn  w-12 h-12 rounded-xl flex items-center justify-center text-primary">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm text-red-500">
                                <i class="fas fa-arrow-down mr-1"></i>
                                <span>5% from last week</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="neumorph-3d  p-6 rounded-2xl section" style="transition-delay: 0.2s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400">Team Members</p>
                                <h3 class="text-3xl font-bold mt-1">8</h3>
                            </div>
                            <div class="neumorph-btn  w-12 h-12 rounded-xl flex items-center justify-center text-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm text-green-500">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>2 new members</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="neumorph-3d  p-6 rounded-2xl section" style="transition-delay: 0.3s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400">Revenue</p>
                                <h3 class="text-3xl font-bold mt-1">$12,450</h3>
                            </div>
                            <div class="neumorph-btn  w-12 h-12 rounded-xl flex items-center justify-center text-primary">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm text-green-500">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>23% from last quarter</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Main Chart -->
                    <div class="lg:col-span-2 neumorph-3d  p-6 rounded-2xl section">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold">Project Progress</h3>
                            <div class="flex space-x-2">
                                <button class="neumorph-btn  px-3 py-1 rounded-lg text-xs hover:text-primary transition">Weekly</button>
                                <button class="neumorph-btn  px-3 py-1 rounded-lg text-xs hover:text-primary transition">Monthly</button>
                                <button class="neumorph-btn  px-3 py-1 rounded-lg text-xs bg-primary text-white">Yearly</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <!-- Chart would be rendered here with Chart.js or similar -->
                            <div class="w-full h-full flex items-center justify-center bg-gray-100 rounded-xl">
                                <p class="text-gray-500 dark:text-gray-400">Project Progress Chart</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Progress Stats -->
                    <div class="neumorph-3d  p-6 rounded-2xl section" style="transition-delay: 0.2s">
                        <h3 class="font-bold mb-4">Project Completion</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">Website Redesign</span>
                                    <span class="text-sm">75%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 75%" data-width="75%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">Mobile App</span>
                                    <span class="text-sm">45%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 45%" data-width="45%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">Dashboard UI</span>
                                    <span class="text-sm">90%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 90%" data-width="90%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">API Integration</span>
                                    <span class="text-sm">60%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 60%" data-width="60%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <h4 class="font-bold mb-3">Recent Activity</h4>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-8 h-8 rounded-full bg-primary bg-opacity-20 flex items-center justify-center">
                                            <i class="fas fa-check text-primary text-xs"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm">Task "Login Page Design" completed</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-8 h-8 rounded-full bg-green-500 bg-opacity-20 flex items-center justify-center">
                                            <i class="fas fa-plus text-green-500 text-xs"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm">New project "E-commerce Site" added</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">5 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-8 h-8 rounded-full bg-blue-500 bg-opacity-20 flex items-center justify-center">
                                            <i class="fas fa-comment text-blue-500 text-xs"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm">New comment on "API Documentation"</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Projects Table -->
                <div class="neumorph-3d  p-6 rounded-2xl mb-6 section">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold">Recent Projects</h3>
                        <button class="neumorph-btn  px-4 py-2 rounded-lg text-sm hover:text-primary transition">
                            <i class="fas fa-plus mr-1"></i> Add Project
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-gray-600 dark:text-gray-400 border-b border-gray-200">
                                    <th class="pb-3">Project</th>
                                    <th class="pb-3">Team</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Progress</th>
                                    <th class="pb-3">Due Date</th>
                                    <th class="pb-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 ">
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-xl neumorph-btn  mr-3 flex items-center justify-center text-primary">
                                                <i class="fas fa-globe"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">Website Redesign</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">Client: TechCorp</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex -space-x-2">
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="px-2 py-1 text-xs neumorph-btn  rounded-full text-green-500">Active</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="w-16 h-2 bg-gray-200  rounded-full mr-2">
                                                <div class="h-full rounded-full bg-gradient-to-r from-primary to-secondary" style="width: 75%"></div>
                                            </div>
                                            <span class="text-xs">75%</span>
                                        </div>
                                    </td>
                                    <td class="text-sm">Jun 15, 2023</td>
                                    <td>
                                        <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-xl neumorph-btn  mr-3 flex items-center justify-center text-primary">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">Mobile App</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">Client: StartupX</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex -space-x-2">
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="px-2 py-1 text-xs neumorph-btn  rounded-full text-yellow-500">Pending</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="w-16 h-2 bg-gray-200 rounded-full mr-2">
                                                <div class="h-full rounded-full bg-gradient-to-r from-primary to-secondary" style="width: 45%"></div>
                                            </div>
                                            <span class="text-xs">45%</span>
                                        </div>
                                    </td>
                                    <td class="text-sm">Jul 30, 2023</td>
                                    <td>
                                        <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-xl neumorph-btn  mr-3 flex items-center justify-center text-primary">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">Analytics Dashboard</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">Internal Project</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex -space-x-2">
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/women/55.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/women/78.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="px-2 py-1 text-xs neumorph-btn  rounded-full text-green-500">Active</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="w-16 h-2 bg-gray-200  rounded-full mr-2">
                                                <div class="h-full rounded-full bg-gradient-to-r from-primary to-secondary" style="width: 90%"></div>
                                            </div>
                                            <span class="text-xs">90%</span>
                                        </div>
                                    </td>
                                    <td class="text-sm">May 28, 2023</td>
                                    <td>
                                        <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-xl neumorph-btn  mr-3 flex items-center justify-center text-primary">
                                                <i class="fas fa-plug"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">API Integration</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">Client: DataSystems</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex -space-x-2">
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div class="w-8 h-8 rounded-full overflow-hidden neumorph ">
                                                <img src="https://randomuser.me/api/portraits/men/88.jpg" alt="" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="px-2 py-1 text-xs neumorph-btn  rounded-full text-blue-500">In Review</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="w-16 h-2 bg-gray-200 rounded-full mr-2">
                                                <div class="h-full rounded-full bg-gradient-to-r from-primary to-secondary" style="width: 60%"></div>
                                            </div>
                                            <span class="text-xs">60%</span>
                                        </div>
                                    </td>
                                    <td class="text-sm">Jun 5, 2023</td>
                                    <td>
                                        <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Showing 1 to 4 of 24 projects</p>
                        <div class="flex space-x-2">
                            <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center bg-primary text-white">1</button>
                            <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">2</button>
                            <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">3</button>
                            <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Team Members -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="neumorph-3d  p-6 rounded-2xl section">
                        <h3 class="font-bold mb-4">Team Members</h3>
                        <div class="space-y-4">
                            <div class="flex items-center p-3 neumorph-btn  rounded-xl">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-3 neumorph ">
                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-medium">Sarah Johnson</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">UI/UX Designer</p>
                                </div>
                                <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                            <div class="flex items-center p-3 neumorph-btn  rounded-xl">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-3 neumorph ">
                                    <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-medium">Michael Chen</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Frontend Developer</p>
                                </div>
                                <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                            <div class="flex items-center p-3 neumorph-btn  rounded-xl">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-3 neumorph ">
                                    <img src="https://randomuser.me/api/portraits/women/67.jpg" alt="" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-medium">Emily Rodriguez</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Backend Developer</p>
                                </div>
                                <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                            <div class="flex items-center p-3 neumorph-btn  rounded-xl">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-3 neumorph ">
                                    <img src="https://randomuser.me/api/portraits/men/89.jpg" alt="" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-medium">David Kim</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Project Manager</p>
                                </div>
                                <button class="neumorph-btn  w-8 h-8 rounded-lg flex items-center justify-center hover:text-primary transition">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                        </div>
                        
                        <button class="w-full mt-4 neumorph-btn  px-4 py-2 rounded-lg text-sm hover:text-primary transition">
                            <i class="fas fa-plus mr-1"></i> Add Team Member
                        </button>
                    </div>
                    
                    <!-- Upcoming Tasks -->
                    <div class="neumorph-3d  p-6 rounded-2xl section" style="transition-delay: 0.2s">
                        <h3 class="font-bold mb-4">Upcoming Tasks</h3>
                        <div class="space-y-4">
                            <div class="p-3 neumorph-btn  rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <input type="checkbox" class="neumorph-btn  rounded">
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-medium">Design Review Meeting</h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Discuss the new UI components with the design team</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-500 dark:text-gray-400">
                                            <i class="far fa-calendar mr-1"></i>
                                            <span>Today, 2:00 PM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 neumorph-btn  rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <input type="checkbox" class="neumorph-btn  rounded">
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-medium">API Documentation</h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Complete the API documentation for the new endpoints</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-500 dark:text-gray-400">
                                            <i class="far fa-calendar mr-1"></i>
                                            <span>Tomorrow, 10:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 neumorph-btn  rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <input type="checkbox" class="neumorph-btn  rounded">
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-medium">Client Presentation</h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Prepare slides for the quarterly review with TechCorp</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-500 dark:text-gray-400">
                                            <i class="far fa-calendar mr-1"></i>
                                            <span>Jun 12, 3:30 PM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 neumorph-btn  rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <input type="checkbox" class="neumorph-btn  rounded">
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-medium">Code Deployment</h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Deploy the latest version to production</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-500 dark:text-gray-400">
                                            <i class="far fa-calendar mr-1"></i>
                                            <span>Jun 15, 9:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button class="w-full mt-4 neumorph-btn  px-4 py-2 rounded-lg text-sm hover:text-primary transition">
                            <i class="fas fa-plus mr-1"></i> Add New Task
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const darkModeToggleMobile = document.getElementById('darkModeToggleMobile');
        
        // Initialize dark mode from localStorage
        function initializeDarkMode() {
            const isDark = localStorage.getItem('darkMode') === 'enabled';
            
            if (isDark) {
                document.body.classList.add('dark');
                if (darkModeToggle) darkModeToggle.checked = true;
                if (darkModeToggleMobile) darkModeToggleMobile.checked = true;
            }
        }
        
        // Toggle dark mode function
        function toggleDarkMode(isDark) {
            if (isDark) {
                document.body.classList.add('dark');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                document.body.classList.remove('dark');
                localStorage.setItem('darkMode', 'disabled');
            }
        }
        
        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initializeDarkMode();
            
            // Desktop toggle
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', () => {
                    toggleDarkMode(darkModeToggle.checked);
                    if (darkModeToggleMobile) {
                        darkModeToggleMobile.checked = darkModeToggle.checked;
                    }
                });
            }
            
            // Mobile toggle
            if (darkModeToggleMobile) {
                darkModeToggleMobile.addEventListener('click', () => {
                    toggleDarkMode(darkModeToggleMobile.checked);
                    if (darkModeToggle) {
                        darkModeToggle.checked = darkModeToggleMobile.checked;
                    }
                });
            }
            
            // Mobile sidebar toggle
            const mobileSidebar = document.getElementById('mobileSidebar');
            const openMobileSidebar = document.getElementById('openMobileSidebar');
            const closeMobileSidebar = document.getElementById('closeMobileSidebar');
            
            if (openMobileSidebar) {
                openMobileSidebar.addEventListener('click', () => {
                    mobileSidebar.classList.remove('hidden');
                });
            }
            
            if (closeMobileSidebar) {
                closeMobileSidebar.addEventListener('click', () => {
                    mobileSidebar.classList.add('hidden');
                });
            }
            
            // Animate sections on scroll
            const sections = document.querySelectorAll('.section');
            if (sections.length > 0) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('section-visible');
                        }
                    });
                }, {
                    threshold: 0.1
                });
                
                sections.forEach(section => {
                    observer.observe(section);
                });
            }
            
            // Animate skill bars on scroll
            const skillBars = document.querySelectorAll('.skill-progress');
            if (skillBars.length > 0) {
                const skillObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const width = entry.target.getAttribute('data-width') || '100%';
                            entry.target.style.width = '0';
                            setTimeout(() => {
                                entry.target.style.width = width;
                            }, 100);
                        }
                    });
                }, {
                    threshold: 0.5
                });
                
                skillBars.forEach(bar => {
                    skillObserver.observe(bar);
                });
            }
        });
        // Custom Cursor with Perfect Idle Transition
const cursor = document.querySelector('.cursor');
const cursorFollower = document.querySelector('.cursor-follower');

if (cursor && cursorFollower) {
    let isIdle = false;
    let idleTimer;
    let animationFrame;

    // Position tracking
    let pos = { x: 0, y: 0 };
    let followerPos = { x: 0, y: 0 };
    const angle = { current: 0, target: 0 };
    const radius = 200;

    // Smoothing factors
    const smoothFactor = 0.2;
    const rotationSpeed = 0.05;

    function updateCursorPosition(e) {
        pos.x = e.clientX;
        pos.y = e.clientY;
        if (!isIdle) {
            angle.target = 0;
        }
    }

    function animate() {
        // Smooth follow for normal state
        if (!isIdle) {
            followerPos.x += (pos.x - followerPos.x) * smoothFactor;
            followerPos.y += (pos.y - followerPos.y) * smoothFactor;
            angle.current += (angle.target - angle.current) * rotationSpeed;
        }
        // Circular motion for idle state
        else {
            angle.target += rotationSpeed;
            angle.current = angle.target;
            followerPos.x = pos.x + Math.cos(angle.current) * radius;
            followerPos.y = pos.y + Math.sin(angle.current) * radius;
        }

        // Apply transformations
        cursor.style.transform = `translate(${pos.x}px, ${pos.y}px)`;
        cursorFollower.style.transform = `translate(${followerPos.x}px, ${followerPos.y}px)`;

        animationFrame = requestAnimationFrame(animate);
    }

    function handleIdleState() {
        isIdle = false;
        clearTimeout(idleTimer);

        idleTimer = setTimeout(() => {
            isIdle = true;
            angle.target = angle.current; // Maintain current angle when entering idle
        }, 2000);
    }

    // Initialize
    document.addEventListener('mousemove', (e) => {
        updateCursorPosition(e);
        handleIdleState();
    });

    // Start animation loop
    animate();

    // Cleanup on page exit
    window.addEventListener('beforeunload', () => {
        cancelAnimationFrame(animationFrame);
    });

    // Hover effects
    const hoverElements = document.querySelectorAll('a, button, .neumorph-hover, .input-field, .neumorph-btn');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('cursor-active');
            cursorFollower.classList.add('cursor-follower-active');
        });

        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('cursor-active');
            cursorFollower.classList.remove('cursor-follower-active');
        });
    });
}

    </script>
</body>
</html>