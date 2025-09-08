<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neumorphism 3D Portfolio</title>
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
                            300: '#0f3460',
                        },
                        light: '#f5f6fa',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
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
                        'neumorph-btn-active-dark': 'inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-2': 'float 4s ease-in-out infinite',
                        'float-3': 'float 5s ease-in-out infinite',
                        'pulse-slow': 'pulse 6s infinite',
                        'spin-slow': 'spin 20s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            cursor: none;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            overflow-x: hidden;
            transition: background-color 0.3s ease;
        }
        
        body.dark {
            background-color: #1a1a2e;
            color: #f5f6fa;
        }
        
        .cursor {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #f0f0f0;
    position: fixed;
    transform: translate(-50%, -50%);
    pointer-events: none;
    z-index: 9999;
  transition: transform 0.2s ease, left 0.4s ease, top 0.4s ease;
    box-shadow: 
        8px 8px 15px #d9d9d9,
        -8px -8px 15px #ffffff,
        0 0 0 2px rgba(108, 92, 231, 0.1);
    mix-blend-mode: multiply;
}

        
        body.dark .cursor {
            mix-blend-mode: screen;
        }
        
        
.cursor-follower {
    width: 15px;
    height: 15px;
    border-radius: 50%; 
    background: #f0f0f0;
    position: fixed;
    transform: translate(-50%, -50%);
    pointer-events: none;
    z-index: 9998;
    transition: all 0.7s ease;
    box-shadow: 
        5px 5px 10px #d9d9d9,
        -5px -5px 10px #ffffff,
        0 0 0 1px rgba(162, 155, 254, 0.1);
          will-change: transform;

}

.cursor-active {
    transform: translate(-50%, -50%) scale(1.5);
    background: #f0f0f0;
    box-shadow: 
        12px 12px 25px #d9d9d9,
        -12px -12px 25px #ffffff,
        0 0 0 3px rgba(108, 92, 231, 0.3);
}

.cursor-follower-active {
    animation: none;
    transform: translate(-50%, -50%) scale(0.5);
    box-shadow: 
        3px 3px 6px #d9d9d9,
        -3px -3px 6px #ffffff,
        0 0 0 1px rgba(162, 155, 254, 0.2);
}
        
        .neumorph {
            border-radius: 20px;
            background: #f0f0f0;
            box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
            transition: all 0.3s ease;
        }
        
        .dark .neumorph {
            background: #16213e;
            box-shadow: 20px 20px 60px #0a0a0f, -20px -20px 60px #2a2a4d;
        }
        
        .neumorph-3d {
            border-radius: 20px;
            background: #f0f0f0;
            box-shadow: 15px 15px 30px #d9d9d9, -15px -15px 30px #ffffff, 0 0 0 3px rgba(108, 92, 231, 0.2);
            transition: all 0.3s ease;
        }
        
        .dark .neumorph-3d {
            background: #16213e;
            box-shadow: 15px 15px 30px #0a0a0f, -15px -15px 30px #2a2a4d, 0 0 0 3px rgba(108, 92, 231, 0.2);
        }
        
        .neumorph-hover:hover {
            box-shadow: 10px 10px 20px #d9d9d9, -10px -10px 20px #ffffff, 0 0 0 3px rgba(108, 92, 231, 0.3);
            transform: translateY(-5px);
        }
        
        .dark .neumorph-hover:hover {
            box-shadow: 10px 10px 20px #0a0a0f, -10px -10px 20px #2a2a4d, 0 0 0 3px rgba(108, 92, 231, 0.3);
        }
        
        .neumorph-btn {
            border-radius: 10px;
            background: #f0f0f0;
            box-shadow: 5px 5px 10px #d9d9d9, -5px -5px 10px #ffffff;
            transition: all 0.2s ease;
        }
        
        .dark .neumorph-btn {
            background: #16213e;
            box-shadow: 5px 5px 10px #0a0a0f, -5px -5px 10px #2a2a4d;
            color: #f5f6fa;
        }
        
        .neumorph-btn:active {
            box-shadow: inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff;
        }
        
        .dark .neumorph-btn:active {
            box-shadow: inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d;
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .section {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .section-visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .skill-bar {
            height: 10px;
            border-radius: 5px;
            background: #f0f0f0;
            box-shadow: inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff;
            overflow: hidden;
        }
        
        .dark .skill-bar {
            background: #16213e;
            box-shadow: inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d;
        }
        
        .skill-progress {
            height: 100%;
            background: linear-gradient(90deg, #6c5ce7, #a29bfe);
            border-radius: 5px;
            transition: width 1.5s ease;
        }
        
        .project-card:hover .project-overlay {
            opacity: 1;
            transform: translateY(0);
        }
        
        .project-overlay {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6c5ce7, #a29bfe);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .input-field {
            border-radius: 10px;
            background: #f0f0f0;
            box-shadow: inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
        }
        
        .dark .input-field {
            background: #16213e;
            box-shadow: inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d;
            color: #f5f6fa;
        }
        
        .input-field:focus {
            box-shadow: inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff, 0 0 0 2px rgba(108, 92, 231, 0.3);
        }
        
        .dark .input-field:focus {
            box-shadow: inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d, 0 0 0 2px rgba(108, 92, 231, 0.3);
        }
        
        .dark-mode-toggle {
            position: relative;
            width: 50px;
            height: 24px;
        }
        
        .dark-mode-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .dark-mode-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f0f0f0;
            box-shadow: inset 3px 3px 5px #d9d9d9, inset -3px -3px 5px #ffffff;
            transition: .4s;
            border-radius: 34px;
        }
        
        .dark .dark-mode-slider {
            background-color: #16213e;
            box-shadow: inset 3px 3px 5px #0a0a0f, inset -3px -3px 5px #2a2a4d;
        }
        
        .dark-mode-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: #6c5ce7;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .dark-mode-slider:before {
            transform: translateX(26px);
            background-color: #a29bfe;
        }
        
        .dark .text-gray-600 {
            color: #a1a1aa;
        }
        
        .dark .bg-white.bg-opacity-50 {
            background-color: rgba(26, 26, 46, 0.7);
        }
        .dark-mode .cursor {
    background: #2d3436;
    box-shadow: 
        8px 8px 15px #1e2223,
        -8px -8px 15px #3c4649,
        0 0 0 2px rgba(108, 92, 231, 0.2);
}

.dark-mode .cursor-follower {
    background: #2d3436;
    box-shadow: 
        5px 5px 10px #1e2223,
        -5px -5px 10px #3c4649,
        0 0 0 1px rgba(162, 155, 254, 0.2);
}

.dark-mode .cursor-active {
    background: #2d3436;
    box-shadow: 
        12px 12px 25px #1e2223,
        -12px -12px 25px #3c4649,
        0 0 0 3px rgba(108, 92, 231, 0.4);
}

.dark-mode .cursor-follower-active {
    box-shadow: 
        3px 3px 6px #1e2223,
        -3px -3px 6px #3c4649,
        0 0 0 1px rgba(162, 155, 254, 0.3);
}
.cursor-follower-idle {
  animation: revolve 4s linear infinite;
  transform-origin: 30px 30px;
  transform-box: fill-box;
}
@keyframes revolve {
    0% {
        transform: rotate(0deg) translateX(100px) rotate(0deg);
    }
    100% {
        transform: rotate(360deg) translateX(100px) rotate(-360deg);
    }
}



.neumorph-text {
    color: #6c5ce7;
    text-shadow: 
        2px 2px 4px rgba(0, 0, 0, 0.1),
        -2px -2px 4px rgba(255, 255, 255, 0.8);
}

.dark-mode .neumorph-text {
    color: #a29bfe;
    text-shadow: 
        2px 2px 4px rgba(0, 0, 0, 0.3),
        -2px -2px 4px rgba(255, 255, 255, 0.1);
}
.neumorph-text-3d {
    position: relative;
    color: #6c5ce7;
}

.neumorph-text-3d::before {
    content: attr(data-text);
    position: absolute;
    color: transparent;
    text-shadow: 
        4px 4px 6px rgba(0, 0, 0, 0.1),
        -4px -4px 6px rgba(255, 255, 255, 0.8);
    z-index: -1;
}
.neumorph-text-gradient {
    background: linear-gradient(145deg, #e0e0e0, #ffffff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 
        2px 2px 4px rgba(0, 0, 0, 0.05),
        -2px -2px 4px rgba(255, 255, 255, 0.8);
}/* Cursor Particles Container */
.cursor-follower {
  position: fixed;
  width: 20px;
  height: 20px;
  pointer-events: none;
  z-index: 9998;
  transform: translate(-50%, -50%);
}

/* Individual Particles */
.cursor-particle {
  position: absolute;
  width: 6px;
  height: 6px;
  background-color: rgba(162, 155, 254, 0.9);
  border-radius: 50%;
  filter: drop-shadow(0 0 2px rgba(108, 92, 231, 0.5));
  animation: particle-float 3s infinite ease-in-out;
  will-change: transform;
  opacity: 0;
}

/* Particle Positioning - Fixed your original positions */
.cursor-particle:nth-child(1) {
  top: 0;
  left: 50%;
  transform: translate(-50%, -10px);
  animation-delay: 0s;
}

.cursor-particle:nth-child(2) {
  top: 100%;
  left: 50%;
  transform: translate(-50%, 10px);
  animation-delay: 0.5s;
}

.cursor-particle:nth-child(3) {
  top: 50%;
  left: 0;
  transform: translate(-10px, -50%);
  animation-delay: 1s;
}

.cursor-particle:nth-child(4) {
  top: 50%;
  left: 100%;
  transform: translate(10px, -50%);
  animation-delay: 1.5s;
}

/* Enhanced Animation */
@keyframes particle-float {
  0%, 100% { 
    transform: translate(-50%, -50%) translateY(0) scale(1);
    opacity: 0.8;
  }
  50% { 
    transform: translate(-50%, -50%) translateY(-12px) scale(1.3);
    opacity: 1;
  }
}

/* Active State */
.cursor-active ~ .cursor-follower .cursor-particle {
  background-color: rgba(192, 185, 254, 0.9);
  animation: particle-active 2s infinite ease-in-out;
}

@keyframes particle-active {
  0%, 100% { 
    transform: translate(-50%, -50%) scale(1.2);
  }
  50% { 
    transform: translate(-50%, -50%) scale(1.6);
  }
}
.scrolling-text-container {
            width: 100%;
            overflow: hidden;
            position: relative;
            padding: 1.5rem 0;
        }
        
        .scrolling-text-track {
            display: flex;
            white-space: nowrap;
            will-change: transform;
            animation: scroll 30s linear infinite;
        }
        
        .scrolling-text {
            display: inline-flex;
            align-items: center;
            height: 50%;
            margin: 0 1.5rem;
            padding: 1.2rem 2rem;
            border-radius: 50px;
            background: #e0e5ec;
            box-shadow: 
                8px 8px 16px #bebebe,
                -8px -8px 16px #ffffff;
            font-size: 1.2rem;
            font-weight: 600;
            color: #6c5ce7;
  transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .scrolling-text i {
            margin-right: 0.8rem;
            font-size: 1.4rem;
        }
        
        .scrolling-text:hover {
            transform: translateY(-5px);
            box-shadow: 
                12px 12px 24px #bebebe,
                -12px -12px 24px #ffffff;
            color: #a29bfe;
        }
        
        .scrolling-text.checked {
            color: #00b894;
            position: relative;
        }
        
        .scrolling-text.checked::after {
            content: '✓';
            position: absolute;
            top: -8px;
            right: -8px;
            width: 20px;
            height: 20px;
            background: #00b894;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            box-shadow: 
                3px 3px 6px #bebebe,
                -3px -3px 6px #ffffff;
        }
        
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        /* Pause animation on hover */
        .scrolling-text-container:hover .scrolling-text-track {
            animation-play-state: paused;
        }
        
.dark-mode .scrolling-text {
    background: #2d3436;
    box-shadow: 
        8px 8px 16px #1e2223,
        -8px -8px 16px #3c4649;
    color: #a29bfe;
}

.dark-mode .scrolling-text:hover {
    box-shadow: 
        12px 12px 24px #1e2223,
        -12px -12px 24px #3c4649;
    color: #6c5ce7;
}

.dark-mode .scrolling-text.checked {
    color: #55efc4;
}

.dark-mode .scrolling-text.checked::after {
    background: #55efc4;
    box-shadow: 
        3px 3px 6px #1e2223,
        -3px -3px 6px #3c4649;
}

/* Update the keyframes for dark mode */
@keyframes scroll-dark {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
        /* Gradient overlay for fading effect */
        /* .scrolling-text-container::before,
        .scrolling-text-container::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100px;
            z-index: 2;
            pointer-events: none;
        } */
        
        .scrolling-text-container::before {
            left: 0;
            background: linear-gradient(90deg, #e0e5ec 30%, transparent);
        }
        
        .scrolling-text-container::after {
            right: 0;
            background: linear-gradient(90deg, transparent, #e0e5ec 70%);
        }
    </style>
</head>
<body class="min-h-screen text-dark">
    <!-- Custom Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower">
        <div class="cursor-particle"></div>
    <div class="cursor-particle"></div>
        <div class="cursor-particle"></div>
    <div class="cursor-particle"></div>
    </div>
    <!-- Navigation -->
    <nav class="fixed w-full z-50 py-4 px-6 backdrop-blur-sm">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gradient">Portfolio</a>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#home" class="nav-link font-medium hover:text-primary transition">Home</a>
                <a href="#about" class="nav-link font-medium hover:text-primary transition">About</a>
                <a href="#skills" class="nav-link font-medium hover:text-primary transition">Skills</a>
                <a href="#projects" class="nav-link font-medium hover:text-primary transition">Projects</a>
                <a href="#contact" class="nav-link font-medium hover:text-primary transition">Contact</a>
                <label class="dark-mode-toggle ml-4">
                    <input type="checkbox" id="darkModeToggle">
                    <span class="dark-mode-slider"></span>
                </label>
            </div>
            <div class="md:hidden flex items-center space-x-4">
                <label class="dark-mode-toggle">
                    <input type="checkbox" id="darkModeToggleMobile">
                    <span class="dark-mode-slider"></span>
                </label>
                <button class="text-xl neumorph-btn w-10 h-10 flex items-center justify-center" id="mobileMenuButton">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="hidden absolute left-0 right-0 top-20 bg-white bg-opacity-90 dark:bg-dark-200 dark:bg-opacity-90 backdrop-blur-sm p-4 shadow-lg" id="mobileMenu">
            <div class="flex flex-col space-y-4">
                <a href="#home" class="nav-link font-medium hover:text-primary transition">Home</a>
                <a href="#about" class="nav-link font-medium hover:text-primary transition">About</a>
                <a href="#skills" class="nav-link font-medium hover:text-primary transition">Skills</a>
                <a href="#projects" class="nav-link font-medium hover:text-primary transition">Projects</a>
                <a href="#contact" class="nav-link font-medium hover:text-primary transition">Contact</a>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center px-4 py-20">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="section">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 ">Hi, I'm <span class="text-gradient">Alex</span></h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-6 neumorph-text">Frontend Developer</h2>
                <p class="text-lg mb-8 text-gray-600 dark:text-gray-400 ">I create beautiful, interactive web experiences with modern technologies and innovative design.</p>
                <div class="flex space-x-4">
                    <a href="#projects" class="neumorph-btn px-6 py-3 font-medium text-primary hover:text-white hover:bg-primary transition-all duration-300">View Work</a>
                    <a href="#contact" class="neumorph-btn px-6 py-3 font-medium hover:text-primary transition-all duration-300">Contact Me</a>
                </div>
                <div class="flex space-x-4 mt-8">
                    <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-github text-xl"></i></a>
                    <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-linkedin-in text-xl"></i></a>
                    <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-twitter text-xl"></i></a>
                    <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-dribbble text-xl"></i></a>
                </div>
            </div>
            <div class="relative section" style="transition-delay: 0.2s">
                <div class="neumorph-3d w-full max-w-md h-96 rounded-3xl overflow-hidden relative">
                    <div class="absolute w-full h-full bg-gradient-to-br from-primary to-secondary opacity-10"></div>
                    <div class="absolute w-32 h-32 rounded-full bg-primary opacity-10 -top-10 -left-10"></div>
                    <div class="absolute w-64 h-64 rounded-full bg-secondary opacity-10 -bottom-20 -right-20"></div>
                </div>
                <div class="absolute -top-10 -right-10 w-24 h-24 neumorph rounded-full flex items-center justify-center animate-spin-slow">
                    <div class="w-16 h-16 neumorph-inset dark:neumorph-inset-dark rounded-full"></div>
                </div>
                <div class="absolute -bottom-10 -left-10 w-20 h-20 neumorph rounded-full flex items-center justify-center animate-float">
                    <div class="w-12 h-12 neumorph-inset dark:neumorph-inset-dark rounded-full"></div>
                </div>
                <div class="absolute top-1/2 -right-16 w-16 h-16 neumorph rounded-2xl rotate-45 animate-float-2"></div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="about" class="py-20 px-4 bg-white bg-opacity-50 dark:bg-dark-100 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">About <span class="text-gradient">Me</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Get to know me better</p>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold mb-4">Who am I?</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">I'm a passionate frontend developer with 5 years of experience creating modern web applications. I specialize in React, Vue.js, and interactive UI design.</p>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">My approach combines technical expertise with an eye for design, resulting in applications that are both functional and visually stunning.</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Name:</h4>
                                <p class="text-gray-600 dark:text-gray-400">Alex Johnson</p>
                            </div>
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Email:</h4>
                                <p class="text-gray-600 dark:text-gray-400">alex@example.com</p>
                            </div>
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Experience:</h4>
                                <p class="text-gray-600 dark:text-gray-400">5+ Years</p>
                            </div>
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Location:</h4>
                                <p class="text-gray-600 dark:text-gray-400">San Francisco, CA</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold mb-6">My Experience</h3>
                        <div class="space-y-6">
                            <div class="flex">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold">Senior Frontend Developer</h4>
                                    <p class="text-gray-600 dark:text-gray-400 mb-2">TechCorp • 2020 - Present</p>
                                    <p class="text-gray-600 dark:text-gray-400">Led a team of 5 developers to build enterprise-level web applications using React and TypeScript.</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold">Frontend Developer</h4>
                                    <p class="text-gray-600 dark:text-gray-400 mb-2">WebSolutions • 2018 - 2020</p>
                                    <p class="text-gray-600 dark:text-gray-400">Developed responsive websites and web applications for various clients using Vue.js and Tailwind CSS.</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold">UI Designer</h4>
                                    <p class="text-gray-600 dark:text-gray-400 mb-2">DesignStudio • 2016 - 2018</p>
                                    <p class="text-gray-600 dark:text-gray-400">Created user interfaces and prototypes for mobile and web applications using Figma and Adobe XD.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Skills Section -->
    <section id="skills" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">My <span class="text-gradient">Skills</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Technologies I work with</p>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Technical Skills</h3>
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>HTML/CSS</span>
                                    <span>95%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 95%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>JavaScript</span>
                                    <span>90%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 90%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>React</span>
                                    <span>85%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 85%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>Vue.js</span>
                                    <span>80%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 80%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>Node.js</span>
                                    <span>75%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Professional Skills</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="w-24 h-24 neumorph rounded-full flex items-center justify-center mx-auto mb-4 relative">
                                    <svg class="w-full h-full" viewBox="0 0 36 36">
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#f0f0f0"
                                          stroke-width="3"
                                          stroke-dasharray="100, 100"
                                        />
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="url(#gradient)"
                                          stroke-width="3"
                                          stroke-dasharray="95, 100"
                                          stroke-linecap="round"
                                          transform="rotate(-90 18 18)"
                                          class="animate-draw"
                                          style="animation: draw 1.5s ease-in-out forwards"
                                        />
                                        <defs>
                                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" stop-color="#6c5ce7" />
                                                <stop offset="100%" stop-color="#a29bfe" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <span class="absolute text-xl font-bold text-gradient">95%</span>
                                </div>
                                <h4 class="font-bold">Creativity</h4>
                            </div>
                            <div class="text-center">
                                <div class="w-24 h-24 neumorph rounded-full flex items-center justify-center mx-auto mb-4 relative">
                                    <svg class="w-full h-full" viewBox="0 0 36 36">
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#f0f0f0"
                                          stroke-width="3"
                                          stroke-dasharray="100, 100"
                                        />
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="url(#gradient)"
                                          stroke-width="3"
                                          stroke-dasharray="90, 100"
                                          stroke-linecap="round"
                                          transform="rotate(-90 18 18)"
                                          class="animate-draw"
                                          style="animation: draw 1.5s ease-in-out forwards"
                                        />
                                    </svg>
                                    <span class="absolute text-xl font-bold text-gradient">90%</span>
                                </div>
                                <h4 class="font-bold">Teamwork</h4>
                            </div>
                            <div class="text-center">
                                <div class="w-24 h-24 neumorph rounded-full flex items-center justify-center mx-auto mb-4 relative">
                                    <svg class="w-full h-full" viewBox="0 0 36 36">
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#f0f0f0"
                                          stroke-width="3"
                                          stroke-dasharray="100, 100"
                                        />
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="url(#gradient)"
                                          stroke-width="3"
                                          stroke-dasharray="85, 100"
                                          stroke-linecap="round"
                                          transform="rotate(-90 18 18)"
                                          class="animate-draw"
                                          style="animation: draw 1.5s ease-in-out forwards"
                                        />
                                    </svg>
                                    <span class="absolute text-xl font-bold text-gradient">85%</span>
                                </div>
                                <h4 class="font-bold">Communication</h4>
                            </div>
                            <div class="text-center">
                                <div class="w-24 h-24 neumorph rounded-full flex items-center justify-center mx-auto mb-4 relative">
                                    <svg class="w-full h-full" viewBox="0 0 36 36">
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#f0f0f0"
                                          stroke-width="3"
                                          stroke-dasharray="100, 100"
                                        />
                                        <path d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="url(#gradient)"
                                          stroke-width="3"
                                          stroke-dasharray="80, 100"
                                          stroke-linecap="round"
                                          transform="rotate(-90 18 18)"
                                          class="animate-draw"
                                          style="animation: draw 1.5s ease-in-out forwards"
                                        />
                                    </svg>
                                    <span class="absolute text-xl font-bold text-gradient">80%</span>
                                </div>
                                <h4 class="font-bold">Problem Solving</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="scrolling-text-container transition-delay: 0.2s">
            <div class="scrolling-text-track">
                <!-- Duplicate items for seamless looping -->
                <div class="scrolling-text"><i class="fab fa-html5"></i>HTML5</div>
                <div class="scrolling-text"><i class="fab fa-css3-alt"></i>CSS3</div>
                <div class="scrolling-text"><i class="fab fa-js"></i>JavaScript</div>
                <div class="scrolling-text checked"><i class="fab fa-react"></i>React</div>
                <div class="scrolling-text"><i class="fab fa-vuejs"></i>Vue.js</div>
                <div class="scrolling-text"><i class="fab fa-node-js"></i>Node.js</div>
                <div class="scrolling-text checked"><i class="fab fa-python"></i>Python</div>
                <div class="scrolling-text"><i class="fas fa-database"></i>MongoDB</div>
                <div class="scrolling-text checked"><i class="fas fa-fire"></i>Firebase</div>
                <div class="scrolling-text"><i class="fab fa-figma"></i>Figma</div>
                <div class="scrolling-text"><i class="fas fa-mobile-alt"></i>Responsive Design</div>
                <div class="scrolling-text checked"><i class="fas fa-bolt"></i>Performance</div>
                
                <!-- Duplicate items for seamless looping -->
                <div class="scrolling-text"><i class="fab fa-html5"></i>HTML5</div>
                <div class="scrolling-text"><i class="fab fa-css3-alt"></i>CSS3</div>
                <div class="scrolling-text"><i class="fab fa-js"></i>JavaScript</div>
                <div class="scrolling-text checked"><i class="fab fa-react"></i>React</div>
                <div class="scrolling-text"><i class="fab fa-vuejs"></i>Vue.js</div>
                <div class="scrolling-text"><i class="fab fa-node-js"></i>Node.js</div>
                <div class="scrolling-text checked"><i class="fab fa-python"></i>Python</div>
                <div class="scrolling-text"><i class="fas fa-database"></i>MongoDB</div>
                <div class="scrolling-text checked"><i class="fas fa-fire"></i>Firebase</div>
                <div class="scrolling-text"><i class="fab fa-figma"></i>Figma</div>
                <div class="scrolling-text"><i class="fas fa-mobile-alt"></i>Responsive Design</div>
                <div class="scrolling-text checked"><i class="fas fa-bolt"></i>Performance</div>
            </div>
        </div>
    <!-- Projects Section -->
    <section id="projects" class="py-20 px-4 bg-white bg-opacity-50 dark:bg-dark-100 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">My <span class="text-gradient">Projects</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Some of my recent work</p>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-project-diagram text-6xl text-primary opacity-30"></i>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-bold mb-2">E-commerce Platform</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">A modern e-commerce platform built with React, Node.js, and MongoDB.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">React</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Node.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">MongoDB</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="#" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                View Project <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Project 2 -->
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-mobile-alt text-6xl text-primary opacity-30"></i>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-bold mb-2">Mobile Dashboard</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">A responsive admin dashboard for mobile applications with analytics.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Vue.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Tailwind</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Chart.js</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="#" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                View Project <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Project 3 -->
                <div class="section" style="transition-delay: 0.3s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-chart-line text-6xl text-primary opacity-30"></i>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-bold mb-2">Data Visualization</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Interactive data visualization tool for financial markets analysis.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">D3.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">TypeScript</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">WebGL</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="#" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                View Project <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12 section">
                <a href="#" class="neumorph-btn px-6 py-3 font-medium inline-flex items-center hover:text-primary transition">
                    View All Projects <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">Get In <span class="text-gradient">Touch</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Let's work together</p>
            
            <div class="grid md:grid-cols-2 gap-12">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Email</h4>
                                    <p class="text-gray-600 dark:text-gray-400">alex@example.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Phone</h4>
                                    <p class="text-gray-600 dark:text-gray-400">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Location</h4>
                                    <p class="text-gray-600 dark:text-gray-400">San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="font-bold mb-4">Follow Me</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-github"></i></a>
                                <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold mb-6">Send Me a Message</h3>
                        <form class="space-y-6">
                            <div>
                                <label for="name" class="block mb-2 font-medium">Your Name</label>
                                <input type="text" id="name" class="w-full input-field px-4 py-3 focus:outline-none" placeholder="John Doe">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 font-medium">Your Email</label>
                                <input type="email" id="email" class="w-full input-field px-4 py-3 focus:outline-none" placeholder="john@example.com">
                            </div>
                            <div>
                                <label for="subject" class="block mb-2 font-medium">Subject</label>
                                <input type="text" id="subject" class="w-full input-field px-4 py-3 focus:outline-none" placeholder="Project Inquiry">
                            </div>
                            <div>
                                <label for="message" class="block mb-2 font-medium">Message</label>
                                <textarea id="message" rows="5" class="w-full input-field px-4 py-3 focus:outline-none" placeholder="Hello, I would like to..."></textarea>
                            </div>
                            <button type="submit" class="neumorph-btn px-6 py-3 font-medium text-white bg-primary hover:bg-primary-dark transition">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="py-8 px-4 bg-white bg-opacity-50 dark:bg-dark-100 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <a href="#" class="text-2xl font-bold text-gradient">Portfolio</a>
                </div>
                <div class="flex space-x-6 mb-4 md:mb-0">
                    <a href="#home" class="hover:text-primary transition">Home</a>
                    <a href="#about" class="hover:text-primary transition">About</a>
                    <a href="#skills" class="hover:text-primary transition">Skills</a>
                    <a href="#projects" class="hover:text-primary transition">Projects</a>
                    <a href="#contact" class="hover:text-primary transition">Contact</a>
                </div>
                <div class="text-gray-600 dark:text-gray-400 text-sm">
                    &copy; 2023 My Portfolio. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    
    <script>
       // Dark Mode Toggle
const darkModeToggle = document.getElementById('darkModeToggle');
const darkModeToggleMobile = document.getElementById('darkModeToggleMobile');
function updateScrollingTextForDarkMode(isDark) {
    if (isDark) {
        document.querySelector('.scrolling-text-container').classList.add('dark-mode');
        scrollingTextTrack.style.animationName = 'scroll-dark';
    } else {
        document.querySelector('.scrolling-text-container').classList.remove('dark-mode');
        scrollingTextTrack.style.animationName = 'scroll';
    }
}
if (localStorage.getItem('darkMode') === 'enabled') {
    
    document.body.classList.add('dark');
    if (darkModeToggle) darkModeToggle.checked = true;
    if (darkModeToggleMobile) darkModeToggleMobile.checked = true;
}

// Call this function when toggling dark mode
// Check for saved user preference
document.addEventListener('DOMContentLoaded', () => {
    updateScrollingTextForDarkMode(localStorage.getItem('darkMode'));
});
// Toggle function
function toggleDarkMode(isDark) {
    updateScrollingTextForDarkMode(isDark);
    if (isDark) {
            document.body.classList.add('dark');
            localStorage.setItem('darkMode', 'enabled');
    } else {
        document.body.classList.remove('dark');
        localStorage.setItem('darkMode', 'disabled');
    }
}

// Desktop toggle
if (darkModeToggle) {
    darkModeToggle.addEventListener('change', () => {
        toggleDarkMode(darkModeToggle.checked);
        if (darkModeToggleMobile) darkModeToggleMobile.checked = darkModeToggle.checked;
    });
}

// Mobile toggle
if (darkModeToggleMobile) {
    darkModeToggleMobile.addEventListener('change', () => {
        toggleDarkMode(darkModeToggleMobile.checked);
        if (darkModeToggle) darkModeToggle.checked = darkModeToggleMobile.checked;
    });
}// Custom Cursor with Perfect Idle Transition
const cursor = document.querySelector('.cursor');
const cursorFollower = document.querySelector('.cursor-follower');

let isIdle = false;
let idleTimer;
let animationFrame;

// Position tracking
let pos = { x: 0, y: 0 };
let followerPos = { x: 0, y: 0 };
const angle = { current: 0, target: 0 };
const radius =200;

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

// Scroll Animations
const sections = document.querySelectorAll('.section');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('section-visible');
        }
    });
}, { threshold: 0.1 });

sections.forEach(section => {
    observer.observe(section);
});

// Smooth Scrolling for Anchor Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Animate Skill Bars on Scroll
const skillBars = document.querySelectorAll('.skill-progress');
const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const width = entry.target.style.width;
            entry.target.style.width = '0';
            setTimeout(() => {
                entry.target.style.width = width;
            }, 100);
        }
    });
}, { threshold: 0.5 });

skillBars.forEach(bar => {
    skillObserver.observe(bar);
});

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
const scrollingTexts = document.querySelectorAll('.scrolling-text');
        
        scrollingTexts.forEach(text => {
            text.addEventListener('click', () => {
                // Toggle checked state
                text.classList.toggle('checked');
                
                // Add temporary active effect
                text.style.transform = 'translateY(-5px) scale(0.95)';
                text.style.boxShadow = 'inset 5px 5px 10px #bebebe, inset -5px -5px 10px #ffffff';
                
                setTimeout(() => {
                    text.style.transform = text.classList.contains('checked') 
                        ? 'translateY(-5px)' 
                        : '';
                    text.style.boxShadow = text.classList.contains('checked')
                        ? '12px 12px 24px #bebebe, -12px -12px 24px #ffffff'
                        : '8px 8px 16px #bebebe, -8px -8px 16px #ffffff';
                }, 200);
            });
        });
        
        // Pause animation when user interacts with the track
        const track = document.querySelector('.scrolling-text-track');
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
        const scrollingTextTrack = document.querySelector('.scrolling-text-track');


</script>
</body>
</html>