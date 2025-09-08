<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dual Panel Login - Neumorphism 3D</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Styles */
        .text-gradient {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .input-field {
            background: #f5f6fa;
            border-radius: 12px;
            box-shadow: inset 5px 5px 10px #d9dade, 
                        inset -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
        }
        
        .dark .input-field {
            background: #1a1a2e;
            box-shadow: inset 5px 5px 10px #0f0f1a, 
                        inset -5px -5px 10px #252542;
        }
        
        .neumorph {
            border-radius: 16px;
            background: #f5f6fa;
            box-shadow:  8px 8px 16px #d9dade, 
                        -8px -8px 16px #ffffff;
        }
        
        .dark .neumorph {
            background: #1a1a2e;
            box-shadow:  8px 8px 16px #0f0f1a, 
                        -8px -8px 16px #252542;
        }
        
        .neumorph-inset {
            border-radius: 16px;
            background: #f5f6fa;
            box-shadow: inset 5px 5px 10px #d9dade, 
                        inset -5px -5px 10px #ffffff;
        }
        
        .dark .neumorph-inset {
            background: #1a1a2e;
            box-shadow: inset 5px 5px 10px #0f0f1a, 
                        inset -5px -5px 10px #252542;
        }
        
        .neumorph-btn {
            border-radius: 12px;
            background: #f5f6fa;
            box-shadow:  5px 5px 10px #d9dade, 
                        -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
        }
        
        .dark .neumorph-btn {
            background: #1a1a2e;
            box-shadow:  5px 5px 10px #0f0f1a, 
                        -5px -5px 10px #252542;
        }
        
        .neumorph-btn:hover {
            transform: translateY(-2px);
            box-shadow:  8px 8px 16px #d9dade, 
                        -8px -8px 16px #ffffff;
        }
        
        .dark .neumorph-btn:hover {
            box-shadow:  8px 8px 16px #0f0f1a, 
                        -8px -8px 16px #252542;
        }
        
        .neumorph-3d {
            border-radius: 24px;
            background: #f5f6fa;
            box-shadow:  20px 20px 60px #d9dade, 
                        -20px -20px 60px #ffffff;
        }
        
        .dark .neumorph-3d {
            background: #1a1a2e;
            box-shadow:  20px 20px 60px #0f0f1a, 
                        -20px -20px 60px #252542;
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        @keyframes float-2 {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-10px) rotate(5deg);
            }
        }
        
        @keyframes float-3 {
            0%, 100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-30px) scale(1.05);
            }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-2 {
            animation: float-2 8s ease-in-out infinite;
        }
        
        .animate-float-3 {
            animation: float-3 10s ease-in-out infinite;
        }
        
        .animate-spin-slow {
            animation: spin 8s linear infinite;
        }
        
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
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
        
        /* Input error styling */
        .input-error {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100 dark:bg-dark-100 text-gray-800 dark:text-gray-200 flex items-center justify-center p-4">
    <!-- Dark Mode Toggle -->
    <div class="absolute top-4 right-4">
        <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" id="darkModeToggle" class="sr-only peer">
            <div class="w-14 h-7 neumorph-btn peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-7 after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-indigo-600"></div>
            <span class="ml-3 text-sm font-medium">
                <i class="fas fa-moon dark:hidden"></i>
                <i class="fas fa-sun hidden dark:inline-block"></i>
            </span>
        </label>
    </div>

    <!-- Dual Panel Container -->
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-3xl overflow-hidden w-full max-w-4xl">
        <div class="split-panel">
            <!-- Left Panel (Welcome/Info) -->
            <div class="panel-left flex flex-col items-center justify-center text-center">
                <div class="w-32 h-32 neumorph dark:neumorph-dark rounded-full flex items-center justify-center mx-auto mb-8 relative">
                    <div class="w-24 h-24 neumorph-inset dark:neumorph-inset-dark rounded-full flex items-center justify-center">
                        <i class="fas fa-home text-4xl text-gradient"></i>
                    </div>
                    <div class="absolute -top-3 -right-3 w-10 h-10 neumorph-btn dark:neumorph-btn-dark rounded-full flex items-center justify-center animate-spin-slow">
                        <div class="w-6 h-6 rounded-full bg-gradient-to-br from-indigo-600 to-purple-400"></div>
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
                                <i class="fas fa-bolt text-indigo-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">Fast Integration</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Works with all smart devices</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="neumorph-btn dark:neumorph-btn-dark p-2 rounded-lg mr-4">
                                <i class="fas fa-shield-alt text-indigo-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">Advanced Security</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">End-to-end encryption</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="neumorph-btn dark:neumorph-btn-dark p-2 rounded-lg mr-4">
                                <i class="fas fa-headset text-indigo-600"></i>
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
                    
                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block mb-2 font-medium">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-500 dark:text-gray-400"></i>
                                </div>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full input-field pl-10 pr-4 py-3 focus:outline-none" placeholder="your@email.com" required autofocus>
                            </div>
                            @error('email')
                                <div class="input-error mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-2 font-medium">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-500 dark:text-gray-400"></i>
                                </div>
                                <input type="password" id="password" name="password" class="w-full input-field pl-10 pr-4 py-3 focus:outline-none" placeholder="••••••••" required autocomplete="current-password">
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center toggle-password">
                                    <i class="fas fa-eye-slash text-gray-500 dark:text-gray-400 hover:text-indigo-600 cursor-pointer"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="input-error mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-indigo-600 rounded focus:ring-indigo-500 border-gray-300 dark:border-gray-700">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-600 dark:text-gray-400">Remember me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
                            @endif
                        </div>

                        <button type="submit" class="w-full neumorph-btn px-6 py-3 font-medium text-white bg-gradient-to-br from-indigo-600 to-purple-500 hover:from-indigo-700 hover:to-purple-600 transition-all duration-300 rounded-xl">
                            Login
                        </button>

                        <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                            Don't have an account? <a href="#" class="text-indigo-600 hover:underline">Sign up</a>
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
                            <a href="#" class="neumorph-btn w-full py-2 flex items-center justify-center rounded-xl hover:text-indigo-600 transition">
                                <i class="fab fa-google text-lg"></i>
                            </a>
                            <a href="#" class="neumorph-btn w-full py-2 flex items-center justify-center rounded-xl hover:text-indigo-600 transition">
                                <i class="fab fa-github text-lg"></i>
                            </a>
                            <a href="#" class="neumorph-btn w-full py-2 flex items-center justify-center rounded-xl hover:text-indigo-600 transition">
                                <i class="fab fa-twitter text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="fixed -bottom-20 -left-20 w-64 h-64 rounded-full bg-purple-400 opacity-10 animate-float-3"></div>
    <div class="fixed -top-10 -right-10 w-32 h-32 rounded-full bg-indigo-600 opacity-10 animate-float"></div>
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

        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        });

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initializeDarkMode();
            
            if (darkModeToggle) {
                darkModeToggle.addEventListener('change', () => {
                    toggleDarkMode(darkModeToggle.checked);
                });
            }
        });
    </script>
</body>
</html>