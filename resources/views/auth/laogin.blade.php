<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dual Panel Login - Neumorphism 3D</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
         <script src="{{ asset('script/tailwind-config.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('main.css') }}">

    <style>
        
        
        /* Custom Split Panel */
        .split-panel {
            display: flex;
            min-height: 600px;
        }
        
        .panel-left {
            flex: 1;
            padding: 40px;
            background: linear-gradient(135deg, rgba(108, 92, 231, 0.1), rgba(162, 155, 254, 0.05));
            border-top-left-radius: 24px;
            border-bottom-left-radius: 24px;
        }
        
        .panel-right {
            flex: 1;
            padding: 40px;
            background: #f5f6fa;
            border-top-right-radius: 24px;
            border-bottom-right-radius: 24px;
        }
        
        .dark .panel-right {
            background: #1a1a2e;
        }
        
        @media (max-width: 768px) {
            .split-panel {
                flex-direction: column;
            }
            
            .panel-left, .panel-right {
                border-radius: 0;
            }
            
            .panel-left {
                border-top-left-radius: 24px;
                border-top-right-radius: 24px;
            }
            
            .panel-right {
                border-bottom-left-radius: 24px;
                border-bottom-right-radius: 24px;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100 dark:bg-dark-100 text-gray-800 dark:text-gray-200 flex items-center justify-center p-4">
    <!-- Dark Mode Toggle -->
        @include('partial.ui-kit')
    <div class="absolute top-4 right-4">
        <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" id="darkModeToggle" class="sr-only peer">
            <div class="w-14 h-7 neumorph-btn peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-7 after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary"></div>
            <span class="ml-3 text-sm font-medium">
                <i class="fas fa-moon dark:hidden"></i>
                <i class="fas fa-sun hidden dark:inline-block"></i>
            </span>
        </label>
    </div>

    <!-- Dual Panel Container -->
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-3xl overflow-hidden w-full max-w-4xl section">
        <div class="split-panel">
            <!-- Left Panel (Welcome/Info) -->
            <div class="panel-left flex flex-col items-center justify-center text-center">
                <div class="w-32 h-32 neumorph dark:neumorph-dark rounded-full flex items-center justify-center mx-auto mb-8 relative">
                    <div class="w-24 h-24 neumorph-inset dark:neumorph-inset-dark rounded-full flex items-center justify-center">
                        <i class="fas fa-home text-4xl text-gradient"></i>
                    </div>
                    <div class="absolute -top-3 -right-3 w-10 h-10 neumorph-btn dark:neumorph-btn-dark rounded-full flex items-center justify-center animate-spin-slow">
                        <div class="w-6 h-6 rounded-full bg-gradient-to-br from-primary to-secondary"></div>
                    </div>
                </div>
                <h1 class="text-4xl font-bold mb-4 text-gradient">IT Home</h1>
                <h2 class="text-2xl font-semibold mb-2">Duwipangga</h2>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mb-8">
                    Your modern IT solution for home automation and security.
                </p>
                <div class="w-full max-w-xs">
                    <div class="relative mb-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="px-4 bg-transparent text-gray-500 dark:text-gray-400">Why choose us?</span>
                        </div>
                    </div>
                    <div class="space-y-4 text-left">
                        <div class="flex items-start">
                            <div class="neumorph-btn dark:neumorph-btn-dark p-2 rounded-lg mr-4">
                                <i class="fas fa-bolt text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">Fast Integration</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Works with all smart devices</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="neumorph-btn dark:neumorph-btn-dark p-2 rounded-lg mr-4">
                                <i class="fas fa-shield-alt text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">Advanced Security</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">End-to-end encryption</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="neumorph-btn dark:neumorph-btn-dark p-2 rounded-lg mr-4">
                                <i class="fas fa-headset text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">24/7 Support</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Dedicated team ready to help</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel (Login Form) -->
            <div class="panel-right flex flex-col justify-center">
                <div class="max-w-md mx-auto w-full">
                    <h2 class="text-2xl font-bold mb-1">Welcome Back</h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-8">Login to your IT Home account</p>
                    
                    <form class="space-y-6">
                        <div>
                            <label for="email" class="block mb-2 font-medium">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-500 dark:text-gray-400"></i>
                                </div>
                                <input type="email" id="email" class="w-full input-field pl-10 pr-4 py-3 focus:outline-none" placeholder="your@email.com" required>
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block mb-2 font-medium">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-500 dark:text-gray-400"></i>
                                </div>
                                <input type="password" id="password" class="w-full input-field pl-10 pr-4 py-3 focus:outline-none" placeholder="••••••••" required>
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-eye-slash text-gray-500 dark:text-gray-400 hover:text-primary cursor-pointer"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" type="checkbox" class="w-4 h-4 text-primary rounded focus:ring-primary border-gray-300 dark:border-gray-600">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-600 dark:text-gray-400">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-primary hover:underline">Forgot password?</a>
                        </div>

                        <button type="submit" class="w-full neumorph-btn px-6 py-3 font-medium text-white bg-gradient-to-br from-primary to-secondary hover:from-primary-dark hover:to-secondary-dark transition-all duration-300 rounded-xl">
                            Login
                        </button>

                        <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                            Don't have an account? <a href="#" class="text-primary hover:underline">Sign up</a>
                        </div>
                    </form>

                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-gray-100 dark:bg-dark-100 text-gray-500 dark:text-gray-400">Or continue with</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-3 gap-3">
                            <a href="#" class="neumorph-btn w-full py-2 flex items-center justify-center rounded-xl hover:text-primary transition">
                                <i class="fab fa-google text-lg"></i>
                            </a>
                            <a href="#" class="neumorph-btn w-full py-2 flex items-center justify-center rounded-xl hover:text-primary transition">
                                <i class="fab fa-github text-lg"></i>
                            </a>
                            <a href="#" class="neumorph-btn w-full py-2 flex items-center justify-center rounded-xl hover:text-primary transition">
                                <i class="fab fa-twitter text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="fixed -bottom-20 -left-20 w-64 h-64 rounded-full bg-secondary opacity-10 animate-float-3"></div>
    <div class="fixed -top-10 -right-10 w-32 h-32 rounded-full bg-primary opacity-10 animate-float"></div>
    <div class="fixed top-1/4 -left-16 w-16 h-16 neumorph dark:neumorph-dark rounded-2xl rotate-45 animate-float-2"></div>

    <script>
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        
        // Initialize dark mode from localStorage
        function initializeDarkMode() {
            const isDark = localStorage.getItem('darkMode') === 'enabled';
            
            if (isDark) {
                document.body.classList.add('dark');
                if (darkModeToggle) darkModeToggle.checked = true;
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
                darkModeToggle.addEventListener('change', () => {
                    toggleDarkMode(darkModeToggle.checked);
                    if (darkModeToggleMobile) {
                        darkModeToggleMobile.checked = darkModeToggle.checked;
                    }
                });
            }

            // Mobile toggle
            if (darkModeToggleMobile) {
                darkModeToggleMobile.addEventListener('change', () => {
                    toggleDarkMode(darkModeToggleMobile.checked);
                    if (darkModeToggle) {
                        darkModeToggle.checked = darkModeToggleMobile.checked;
                    }
                });
            }
            
            // Scrolling text pause functionality
            const track = document.querySelector('.scrolling-text-track');
            if (track) {
                let isPaused = false;
                
                track.addEventListener('mousedown', () => {
                    isPaused = true;
                    track.style.animationPlayState = 'paused';
                });

                document.addEventListener('mouseup', () => {
                    if (isPaused) {
                        isPaused = false;
                        track.style.animationPlayState = 'running';
                    }
                });
            }
            
            // Scrolling text click effect
            
        });

        // Custom Cursor with Perfect Idle Transition
        const cursor = document.querySelector('.cursor');
        const cursorFollower = document.querySelector('.cursor-follower');

        if (cursor && cursorFollower) {
            let isIdle = false;
            let idleTimer;
            let animationFrame;

            // Position tracking
            let pos = {
                x: 0,
                y: 0
            };
            let followerPos = {
                x: 0,
                y: 0
            };
            const angle = {
                current: 0,
                target: 0
            };
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

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll('#mobileMenu a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        }
    </script>
             {{-- <script src="{{ asset('script/cursor.js') }}"></script> --}}

</body>
</html>