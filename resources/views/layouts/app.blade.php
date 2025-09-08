<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Config -->
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
        <link rel="stylesheet" href="{{ asset('main.css') }}">

    <!-- Custom Styles -->
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
    
    <!-- Additional CSS -->
    @stack('styles')
</head>
<body class="min-h-screen bg-light text-dark dark:text-light dark:bg-dark-100 font-sans">
    <!-- Custom Cursor -->
    @include('partials.ui-kit')
    
    @include('layouts.error')
    <!-- Main Layout -->
    <div class="flex h-screen overflow-hidden">
        @include('layouts.sidebar')
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between h-16 px-4 neumorph-inset dark:neumorph-inset-dark">
                <button id="openMobileSidebar" class="md:hidden neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-bars"></i>
                </button>
                
                <!-- Search Bar -->
                <div class="flex-1 max-w-md mx-4">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="w-full input-field pl-10 pr-4 py-2 dark:input-field">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                    </div>
                </div>
                
                <!-- User Controls -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-xl flex items-center justify-center relative">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggleMobile" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-xl flex items-center justify-center">
                        <i class="fas fa-moon"></i>
                    </button>
                    
                    <!-- User Profile (Desktop) -->
                    <div class="hidden md:flex items-center">
                        <div class="w-8 h-8 rounded-full overflow-hidden mr-2 neumorph dark:neumorph-dark">
                            <img src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset('storage/'.Auth::user()->profile->avatar) : asset('assets/default-avatar.png') }}" alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <span class="font-medium">{{ Auth::user()->name ?? 'User' }}</span>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4">
                <!-- Page Header -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold">@yield('title', 'Dashboard')</h2>
                    <p class="text-gray-600 dark:text-gray-400">@yield('subtitle', 'Welcome back!')</p>
                </div>
                
                <!-- Content Section -->
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
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
                    toggleDarkMode(!document.body.classList.contains('dark'));
                    if (darkModeToggleMobile) {
                        darkModeToggleMobile.checked = document.body.classList.contains('dark');
                    }
                });
            }
            
            // Mobile toggle
            if (darkModeToggleMobile) {
                darkModeToggleMobile.addEventListener('click', () => {
                    toggleDarkMode(!document.body.classList.contains('dark'));
                    if (darkModeToggle) {
                        darkModeToggle.checked = document.body.classList.contains('dark');
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
    
    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>