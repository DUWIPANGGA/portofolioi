<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Duwipangga</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("main.css") }}">
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
</head>
<body class="min-h-screen text-dark">
    {{-- {{ dd($user); }} --}}
    <!-- Custom Cursor -->
    @include('partials.ui-kit')
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center px-4 py-20">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="section">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Hi, I'm <span class="text-gradient">duwipangga</span></h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-6 neumorph-text">Frontend Developer & UI Specialist</h2>
                <p class="text-lg mb-8 text-gray-600 dark:text-gray-400">I create beautiful, interactive web experiences with modern technologies and innovative design. With 5+ years of experience, I bridge the gap between design and technology.</p>
                <div class="flex space-x-4">
                    <a href="#projects" class="neumorph-btn px-6 py-3 font-medium text-primary hover:text-white hover:bg-primary transition-all duration-300">View My Work</a>
                    <a href="#contact" class="neumorph-btn px-6 py-3 font-medium hover:text-primary transition-all duration-300">Hire Me</a>
                </div>
                <div class="mt-8 flex items-center space-x-6">
                    <div class="flex space-x-4">
                        <a href="https://github.com/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-github text-xl"></i></a>
                        <a href="https://linkedin.com/in/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-linkedin-in text-xl"></i></a>
                        <a href="https://twitter.com/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="https://dribbble.com/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-dribbble text-xl"></i></a>
                    </div>
                    <a href="/alex-johnson-cv.pdf" download class="text-sm font-medium text-primary hover:underline flex items-center">
                        <i class="fas fa-download mr-2"></i> Download CV
                    </a>
                </div>
            </div>
            <div class="relative section" style="transition-delay: 0.2s">
                <!-- Main Profile Card -->
                <div class=" neumorph-3d w-full max-w-md h-[450px] rounded-3xl overflow-hidden relative transform rotate-3 hover:rotate-0 transition-transform duration-500 ">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-secondary/10">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48Y2lyY2xlIGN4PSIzMCIgY3k9IjMwIiByPSIxIiBmaWxsPSJoc2xhKDIxMCwgODAlLCA2MCUsIDAuMSkiLz48L3N2Zz4=')]"></div>
                    </div>

                    <!-- Profile Image Container -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-8 w-40 h-40 neumorph rounded-full overflow-hidden border-4 border-white dark:border-dark-100 z-10 shadow-lg">
                        <img src="{{ asset('assets/main.jpg') }}" alt="Profile Photo" class="w-full h-full object-cover">
                    </div>

                    <!-- Profile Content -->
                    <div class="absolute inset-0 flex flex-col items-center justify-end pb-8 pt-24 px-6 text-center">
                        <!-- Name and Title -->
                        <h2 class="text-2xl font-bold mb-1">Duwipangga</h2>
                        <p class="text-primary font-medium mb-4">Frontend Developer</p>

                        <!-- Short Bio -->
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Creating beautiful digital experiences with modern web technologies</p>

                        <!-- Social Links -->
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 neumorph-btn rounded-full flex items-center justify-center hover:text-primary transition">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="w-10 h-10 neumorph-btn rounded-full flex items-center justify-center hover:text-primary transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-10 h-10 neumorph-btn rounded-full flex items-center justify-center hover:text-primary transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 neumorph-btn rounded-full flex items-center justify-center hover:text-primary transition">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-primary/10 animate-pulse"></div>
                    <div class="absolute bottom-6 left-6 w-12 h-12 rounded-lg bg-secondary/10 rotate-45"></div>
                </div>

                <!-- Floating Decorations -->
                <div class="absolute -top-10 -right-10 w-24 h-24 neumorph rounded-full flex items-center justify-center animate-spin-slow">
                    <div class="w-16 h-16 neumorph-inset dark:neumorph-inset-dark rounded-full flex items-center justify-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10"></div>
                    </div>
                </div>

                <div class="absolute -bottom-10 -left-10 w-20 h-20 neumorph rounded-full flex items-center justify-center animate-float">
                    <div class="w-12 h-12 neumorph-inset dark:neumorph-inset-dark rounded-full flex items-center justify-center">
                        <i class="fas fa-code text-primary text-lg"></i>
                    </div>
                </div>

                <div class="absolute top-1/2 -right-16 w-16 h-16 neumorph rounded-2xl rotate-45 animate-float-2 flex items-center justify-center">
                    <i class="fab fa-react text-primary text-xl"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section - Enhanced with more personal details -->
    <section id="about" class="py-20 px-4 bg-white bg-opacity-50 dark:bg-dark-100 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">About <span class="text-gradient">Me</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Get to know the person behind the code</p>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold mb-4">Personal Profile</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">I'm a passionate frontend developer with 5 years of experience creating modern web applications. My journey began in graphic design, which gives me a unique perspective on creating interfaces that are both technically sound and visually compelling.</p>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">When I'm not coding, you can find me hiking in the Bay Area, experimenting with photography, or contributing to open-source projects that make web development more accessible.</p>

                        <div class="mb-6">
                            <h4 class="font-bold mb-2">My Development Approach:</h4>
                            <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400 space-y-2">
                                <li>Mobile-first, responsive design principles</li>
                                <li>Performance optimization as a priority</li>
                                <li>Clean, maintainable code with documentation</li>
                                <li>Continuous integration and testing</li>
                                <li>Accessibility compliance (WCAG 2.1)</li>
                            </ul>
                        </div>

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
                        <h3 class="text-2xl font-bold mb-6">Professional Journey</h3>
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
                                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400 space-y-1 text-sm">
                                        <li>Led a team of 5 developers to build enterprise-level web applications</li>
                                        <li>Implemented design system that reduced development time by 30%</li>
                                        <li>Optimized application performance, achieving 95+ Lighthouse scores</li>
                                        <li>Mentored junior developers in React best practices</li>
                                    </ul>
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
                                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400 space-y-1 text-sm">
                                        <li>Developed 15+ responsive websites for clients across industries</li>
                                        <li>Created reusable component library that improved consistency</li>
                                        <li>Integrated REST APIs with Vue.js frontends</li>
                                        <li>Conducted client training sessions on CMS usage</li>
                                    </ul>
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
                                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400 space-y-1 text-sm">
                                        <li>Designed interfaces for mobile and web applications</li>
                                        <li>Created design systems and style guides</li>
                                        <li>Conducted user research and usability testing</li>
                                        <li>Collaborated with developers to ensure design fidelity</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold mb-4">Education & Certifications</h4>
                            <div class="space-y-4">
                                <div>
                                    <h5 class="font-semibold">B.S. Computer Science</h5>
                                    <p class="text-gray-600 dark:text-gray-400">Stanford University • 2012 - 2016</p>
                                </div>
                                <div>
                                    <h5 class="font-semibold">Frontend Development Nanodegree</h5>
                                    <p class="text-gray-600 dark:text-gray-400">Udacity • 2018</p>
                                </div>
                                <div>
                                    <h5 class="font-semibold">Accessibility Fundamentals</h5>
                                    <p class="text-gray-600 dark:text-gray-400">Deque University • 2021</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section - Enhanced with more technical details -->
    <section id="skills" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">My <span class="text-gradient">Expertise</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Technologies I work with and services I offer</p>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Technical Skills</h3>
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="flex items-center"><i class="fab fa-html5 text-orange-500 mr-2"></i> HTML5</span>
                                    <span>95%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 95%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="flex items-center"><i class="fab fa-css3-alt text-blue-500 mr-2"></i> CSS3/Sass</span>
                                    <span>95%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 95%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="flex items-center"><i class="fab fa-js text-yellow-400 mr-2"></i> JavaScript (ES6+)</span>
                                    <span>90%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 90%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="flex items-center"><i class="fab fa-react text-blue-400 mr-2"></i> React.js</span>
                                    <span>85%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 85%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="flex items-center"><i class="fab fa-vuejs text-green-500 mr-2"></i> Vue.js</span>
                                    <span>80%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 80%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="flex items-center"><i class="fab fa-node-js text-green-600 mr-2"></i> Node.js</span>
                                    <span>75%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold mb-4">Additional Technologies</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">TypeScript</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Next.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">GraphQL</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Tailwind CSS</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Redux</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Jest</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Cypress</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Webpack</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Git</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Firebase</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">MongoDB</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Services & Capabilities</h3>

                        <div class="space-y-6">
                            <div class="neumorph-btn p-4 rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-4 text-primary">
                                        <i class="fas fa-laptop-code text-2xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-2">Custom Web Development</h4>
                                        <p class="text-gray-600 dark:text-gray-400">Bespoke website and web application development tailored to your specific business needs and user requirements.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="neumorph-btn p-4 rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-4 text-primary">
                                        <i class="fas fa-mobile-alt text-2xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-2">Responsive UI Development</h4>
                                        <p class="text-gray-600 dark:text-gray-400">Creation of interfaces that work flawlessly across all devices and screen sizes with a mobile-first approach.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="neumorph-btn p-4 rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-4 text-primary">
                                        <i class="fas fa-tachometer-alt text-2xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-2">Performance Optimization</h4>
                                        <p class="text-gray-600 dark:text-gray-400">Improving load times and responsiveness through code optimization, lazy loading, and modern techniques.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="neumorph-btn p-4 rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-4 text-primary">
                                        <i class="fas fa-universal-access text-2xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-2">Accessibility Compliance</h4>
                                        <p class="text-gray-600 dark:text-gray-400">Building inclusive web experiences that meet WCAG 2.1 standards for users with disabilities.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold mb-4">Development Process</h4>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-5 h-5 rounded-full bg-primary flex items-center justify-center">
                                            <span class="text-white text-xs">1</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold">Discovery & Planning</h5>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">Requirements gathering, user stories, and technical specifications.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-5 h-5 rounded-full bg-primary flex items-center justify-center">
                                            <span class="text-white text-xs">2</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold">Design & Prototyping</h5>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">Wireframing, UI design, and interactive prototypes.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-5 h-5 rounded-full bg-primary flex items-center justify-center">
                                            <span class="text-white text-xs">3</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold">Development</h5>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">Agile development with regular milestones and demos.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-5 h-5 rounded-full bg-primary flex items-center justify-center">
                                            <span class="text-white text-xs">4</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold">Testing & QA</h5>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">Unit testing, integration testing, and user acceptance testing.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="mr-3 mt-1">
                                        <div class="w-5 h-5 rounded-full bg-primary flex items-center justify-center">
                                            <span class="text-white text-xs">5</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold">Deployment & Maintenance</h5>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">CI/CD pipeline setup and ongoing support.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scrolling Tech Stack -->
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

    <!-- Projects Section - Enhanced with case study links -->
    <section id="projects" class="py-20 px-4 bg-white bg-opacity-50 dark:bg-dark-100 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">Project <span class="text-gradient">Portfolio</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Selected works demonstrating my capabilities</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="ecommerce-project.jpg" alt="E-commerce Platform" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                            <div class="absolute top-4 right-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full bg-white dark:bg-dark-100">Featured</span>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold">E-commerce Platform</h3>
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full">2022</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">A modern e-commerce platform with product customization features, real-time inventory, and secure checkout.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">React</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Node.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">MongoDB</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Stripe API</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <i class="fas fa-chart-line mr-2"></i>
                                <span>Increased conversion by 35%</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0 flex justify-between items-center">
                            <a href="ecommerce-case-study.html" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                Case Study <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                            <a href="https://ecommerce-demo.example.com" target="_blank" class="text-sm text-primary hover:underline flex items-center">
                                Live Demo <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="dashboard-project.jpg" alt="Analytics Dashboard" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold">Analytics Dashboard</h3>
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full">2021</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">A responsive admin dashboard for business analytics with customizable widgets and data visualization.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Vue.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Tailwind</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">Chart.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">REST API</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <i class="fas fa-clock mr-2"></i>
                                <span>Reduced data load time by 60%</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0 flex justify-between items-center">
                            <a href="dashboard-case-study.html" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                Case Study <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                            <a href="https://dashboard-demo.example.com" target="_blank" class="text-sm text-primary hover:underline flex items-center">
                                Live Demo <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="section" style="transition-delay: 0.3s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="data-vis-project.jpg" alt="Data Visualization Tool" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold">Financial Data Visualization</h3>
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full">2020</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Interactive data visualization tool for financial markets with real-time updates and historical analysis.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">D3.js</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">TypeScript</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">WebGL</span>
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">WebSockets</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <i class="fas fa-users mr-2"></i>
                                <span>Used by 50+ financial analysts</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0 flex justify-between items-center">
                            <a href="datavis-case-study.html" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                Case Study <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                            <a href="https://datavis-demo.example.com" target="_blank" class="text-sm text-primary hover:underline flex items-center">
                                Live Demo <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 section">
                <a href="projects.html" class="neumorph-btn px-6 py-3 font-medium inline-flex items-center hover:text-primary transition">
                    View All Projects <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">
                Client <span class="text-gradient">Testimonials</span>
            </h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">
                What people say about working with me
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 rounded-full overflow-hidden mr-4 neumorph">
                                <img src="client1.jpg" alt="Sarah Johnson" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold">Sarah Johnson</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">
                                    Product Manager, TechCorp
                                </p>
                            </div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 mb-6">
                            <i class="fas fa-quote-left text-primary opacity-50 mr-2"></i>
                            Alex transformed our e-commerce platform with his technical expertise and attention to detail.
                            His React implementation improved our performance metrics by 40% and his collaborative approach
                            made the entire process seamless.
                            <i class="fas fa-quote-right text-primary opacity-50 ml-2"></i>
                        </div>
                        <div class="flex">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 rounded-full overflow-hidden mr-4 neumorph">
                                <img src="client2.jpg" alt="Michael Chen" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold">Michael Chen</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">CTO, DataInsights</p>
                            </div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 mb-6">
                            <i class="fas fa-quote-left text-primary opacity-50 mr-2"></i>
                            Working with Alex on our data visualization tool was a game-changer. His deep knowledge of
                            D3.js and performance optimization techniques resulted in a product that our clients love.
                            He's both a skilled developer and a great communicator.
                            <i class="fas fa-quote-right text-primary opacity-50 ml-2"></i>
                        </div>
                        <div class="flex">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="section" style="transition-delay: 0.3s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 rounded-full overflow-hidden mr-4 neumorph">
                                <img src="client3.jpg" alt="Emily Rodriguez" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold">Emily Rodriguez</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">
                                    Design Director, CreativeAgency
                                </p>
                            </div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 mb-6">
                            <i class="fas fa-quote-left text-primary opacity-50 mr-2"></i>
                            As a designer, I particularly appreciate Alex's ability to translate complex designs into
                            pixel-perfect implementations. His Vue.js components are not only beautiful but also highly
                            reusable. He's my go-to developer for any frontend project.
                            <i class="fas fa-quote-right text-primary opacity-50 ml-2"></i>
                        </div>
                        <div class="flex">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section - Enhanced with more options -->
    <section id="contact" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">Let's <span class="text-gradient">Connect</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Get in touch for project inquiries or collaboration opportunities</p>

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
                                    <a href="mailto:alex@example.com" class="text-sm text-primary hover:underline">Send email</a>
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
                                    <a href="tel:+15551234567" class="text-sm text-primary hover:underline">Call me</a>
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
                                    <a href="https://maps.google.com?q=San+Francisco" target="_blank" class="text-sm text-primary hover:underline">View on map</a>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Availability</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Available for freelance work</p>
                                    <a href="https://calendly.com/alexjohnson" target="_blank" class="text-sm text-primary hover:underline">Schedule a call</a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="font-bold mb-4">Follow Me</h4>
                            <div class="flex space-x-4">
                                <a href="https://github.com/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-github"></i></a>
                                <a href="https://linkedin.com/in/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://twitter.com/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                                <a href="https://dribbble.com/alexjohnson" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-dribbble"></i></a>
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
                                <input type="text" id="name" class="w-full input-field px-4 py-3 focus:outline-none" placeholder="John Doe" required>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 font-medium">Your Email</label>
                                <input type="email" id="email" class="w-full input-field px-4 py-3 focus:outline-none" placeholder="john@example.com" required>
                            </div>
                            <div>
                                <label for="subject" class="block mb-2 font-medium">Subject</label>
                                <select id="subject" class="w-full input-field px-4 py-3 focus:outline-none">
                                    <option value="">Select a subject</option>
                                    <option value="project">Project Inquiry</option>
                                    <option value="collaboration">Collaboration Opportunity</option>
                                    <option value="job">Job Offer</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="budget" class="block mb-2 font-medium">Project Budget (USD)</label>
                                <input type="range" id="budget" min="1000" max="50000" step="1000" class="w-full" value="10000">
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    <span>$1k</span>
                                    <span id="budget-value">$10k</span>
                                    <span>$50k+</span>
                                </div>
                            </div>
                            <div>
                                <label for="message" class="block mb-2 font-medium">Message</label>
                                <textarea id="message" rows="5" class="w-full input-field px-4 py-3 focus:outline-none" placeholder="Tell me about your project..." required></textarea>
                            </div>
                            <div class="flex items-center">
                                <input id="consent" type="checkbox" class="w-4 h-4 text-primary rounded focus:ring-primary border-gray-300 dark:border-gray-600" required>
                                <label for="consent" class="ml-2 block text-sm text-gray-600 dark:text-gray-400">I consent to having my data processed according to the <a href="#" class="text-primary hover:underline">privacy policy</a></label>
                            </div>
                            <button type="submit" class="w-full neumorph-btn px-6 py-3 font-medium text-white bg-gradient-to-br from-primary to-secondary hover:from-primary-dark hover:to-secondary-dark transition-all duration-300 rounded-xl">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-20 px-4 bg-white bg-opacity-50 dark:bg-dark-100 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">Latest <span class="text-gradient">Articles</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Thoughts on frontend development and design</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article 1 -->
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="blog-react.jpg" alt="React Performance Optimization" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full">React</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">May 15, 2023</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Advanced React Performance Optimization Techniques</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Explore advanced strategies to optimize your React applications, from memoization to concurrent rendering patterns.</p>
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <i class="far fa-clock mr-2"></i>
                                <span>8 min read</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="react-performance-article.html" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                Read Article <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="blog-design.jpg" alt="Design Systems" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full">Design Systems</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">April 2, 2023</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Building Scalable Design Systems for Frontend Developers</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">A practical guide to creating and maintaining design systems that scale with your product and team.</p>
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <i class="far fa-clock mr-2"></i>
                                <span>6 min read</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="design-systems-article.html" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                Read Article <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="section" style="transition-delay: 0.3s">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="blog-accessibility.jpg" alt="Web Accessibility" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full">Accessibility</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">March 10, 2023</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Beyond the Basics: Advanced Web Accessibility Patterns</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Going beyond ARIA labels to implement truly inclusive web experiences with complex interactive components.</p>
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <i class="far fa-clock mr-2"></i>
                                <span>10 min read</span>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="accessibility-article.html" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                Read Article <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 section">
                <a href="blog.html" class="neumorph-btn px-6 py-3 font-medium inline-flex items-center hover:text-primary transition">
                    View All Articles <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    @include('partials.footer')


    <script>
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const darkModeToggleMobile = document.getElementById('darkModeToggleMobile');
        const scrollingTextTrack = document.querySelector('.scrolling-text-track');
        const scrollingTextContainer = document.querySelector('.scrolling-text-container');

        // Initialize dark mode from localStorage
        function initializeDarkMode() {
            const isDark = localStorage.getItem('darkMode') === 'enabled';

            if (isDark) {
                document.body.classList.add('dark');
                if (darkModeToggle) darkModeToggle.checked = true;
                if (darkModeToggleMobile) darkModeToggleMobile.checked = true;
            }

            updateScrollingTextForDarkMode(isDark);
        }

        // Update scrolling text for dark mode
        function updateScrollingTextForDarkMode(isDark) {
            if (!scrollingTextContainer || !scrollingTextTrack) return;

            if (isDark) {
                scrollingTextContainer.classList.add('dark-mode');
                scrollingTextTrack.style.animationName = 'scroll-dark';
            } else {
                scrollingTextContainer.classList.remove('dark-mode');
                scrollingTextTrack.style.animationName = 'scroll';
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

            updateScrollingTextForDarkMode(isDark);
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

            // Budget range display
            const budgetSlider = document.getElementById('budget');
            const budgetValue = document.getElementById('budget-value');
            if (budgetSlider && budgetValue) {
                budgetSlider.addEventListener('input', () => {
                    const value = parseInt(budgetSlider.value);
                    if (value >= 50000) {
                        budgetValue.textContent = '$50k+';
                    } else {
                        budgetValue.textContent = `$${value/1000}k`;
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
            const scrollingTexts = document.querySelectorAll('.scrolling-text');
            scrollingTexts.forEach(text => {
                text.addEventListener('click', () => {
                    // Toggle checked state
                    text.classList.toggle('checked');

                    // Add temporary active effect
                    text.style.transform = 'translateY(-5px) scale(0.95)';
                    text.style.boxShadow = 'inset 5px 5px 10px #bebebe, inset -5px -5px 10px #ffffff';

                    setTimeout(() => {
                        text.style.transform = text.classList.contains('checked') ?
                            'translateY(-5px)' :
                            '';
                        text.style.boxShadow = text.classList.contains('checked') ?
                            '12px 12px 24px #bebebe, -12px -12px 24px #ffffff' :
                            '8px 8px 16px #bebebe, -8px -8px 16px #ffffff';
                    }, 200);
                });
            });

            // Form submission
            const contactForm = document.querySelector('#contact form');
            if (contactForm) {
                contactForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    // Here you would typically send the form data to a server
                    alert('Thank you for your message! I will get back to you soon.');
                    contactForm.reset();
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
            let pos = {
                x: 0
                , y: 0
            };
            let followerPos = {
                x: 0
                , y: 0
            };
            const angle = {
                current: 0
                , target: 0
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

        // Scroll Animations
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
</body>
</html>
    