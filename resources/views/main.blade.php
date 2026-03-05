<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | {{ $user->name }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <link rel="icon" href="assets/logo.svg" type="image/png" />

    <script>
        tailwind.config = {
            darkMode: 'class'
            , theme: {
                extend: {
                    colors: {
                        primary: '#6c5ce7'
                        , secondary: '#a29bfe'
                        , dark: {
                            100: '#1a1a2e'
                            , 200: '#16213e'
                            , 300: '#0f3460'
                        }
                        , light: '#f5f6fa'
                    }
                    , fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                    , boxShadow: {
                        'neumorph': '20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff'
                        , 'neumorph-dark': '20px 20px 60px #0a0a0f, -20px -20px 60px #2a2a4d'
                        , 'neumorph-inset': 'inset 10px 10px 20px #d9d9d9, inset -10px -10px 20px #ffffff'
                        , 'neumorph-inset-dark': 'inset 10px 10px 20px #0a0a0f, inset -10px -10px 20px #2a2a4d'
                        , 'neumorph-3d': '15px 15px 30px #d9d9d9, -15px -15px 30px #ffffff, 0 0 0 3px rgba(108, 92, 231, 0.2)'
                        , 'neumorph-3d-dark': '15px 15px 30px #0a0a0f, -15px -15px 30px #2a2a4d, 0 0 0 3px rgba(108, 92, 231, 0.2)'
                        , 'neumorph-btn': '5px 5px 10px #d9d9d9, -5px -5px 10px #ffffff'
                        , 'neumorph-btn-dark': '5px 5px 10px #0a0a0f, -5px -5px 10px #2a2a4d'
                        , 'neumorph-btn-active': 'inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff'
                        , 'neumorph-btn-active-dark': 'inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d'
                    }
                    , animation: {
                        'float': 'float 6s ease-in-out infinite'
                        , 'float-2': 'float 4s ease-in-out infinite'
                        , 'float-3': 'float 5s ease-in-out infinite'
                        , 'pulse-slow': 'pulse 6s infinite'
                        , 'spin-slow': 'spin 20s linear infinite'
                    }
                    , keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            }
                            , '50%': {
                                transform: 'translateY(-20px)'
                            }
                        }
                    }
                }
            }
        }

    </script>
</head>
<body class="min-h-screen w-full bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300">
    <!-- Custom Cursor -->
    {{-- {{ dd($user); }} --}}
    @include('partials.ui-kit')

    @include('partials.navbar')

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex px-4 pt-24 overflow-hidden">
<div class="skill-scroll-container absolute top-8 -right-5 -z-[100] -translate-y-1/2 rotate-[10deg]">
    <div class="skill-scroll-track skill-tilt-2">
        @foreach($user->skills as $skill)
        <div class="skill-scroll-item skill-no-interaction">
            @if($skill->icon)
            <i class="{{ $skill->icon }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $skill->name }}</span>
        </div>
        @endforeach
        
        <!-- Duplicate for seamless looping -->
        @foreach($user->skills as $skill)
        <div class="skill-scroll-item skill-no-interaction">
            @if($skill->icon)
            <i class="{{ $skill->icon }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $skill->name }}</span>
        </div>
        @endforeach
    </div>
</div>
<div class="skill-scroll-container absolute bottom-2 left-5 -z-[100] -translate-y-1/2 rotate-[5deg]">
    <div class="skill-scroll-track-right skill-tilt-2">
        @foreach($user->skills as $skill)
        <div class="skill-scroll-item skill-no-interaction">
            @if($skill->icon)
            <i class="{{ $skill->icon }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $skill->name }}</span>
        </div>
        @endforeach
        
        <!-- Duplicate for seamless looping -->
        @foreach($user->skills as $skill)
        <div class="skill-scroll-item skill-no-interaction">
            @if($skill->icon)
            <i class="{{ $skill->icon }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $skill->name }}</span>
        </div>
        @endforeach
    </div>
</div>
        <div class="max-w-6xl w-full mx-auto grid md:grid-cols-2 gap-12 relative z-10 items-stretch">
            <div class="section flex flex-col justify-center pb-20">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Hi, I'm <br><span class="text-gradient">{{ $user->name }}</span></h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-6">{{ optional($user->profile)->tagline ?? 'Embedded & Full Stack Developer' }}</h2>
                <p class="text-lg mb-8 text-gray-600 dark:text-gray-400">
                    {{ optional($user->profile)->hero_bio ?? 'I create beautiful, interactive web and embedded experiences that bridge the physical and digital worlds.' }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="neumorph-btn px-6 py-3 font-medium hover:text-primary transition">View My Work</a>
                    <a href="#contact" class="neumorph-btn px-6 py-3 font-medium hover:text-primary transition">Hire Me</a>
                </div>
                <div class="mt-8 flex flex-wrap items-center gap-6">
                    <div class="flex">
                        @if(optional($user->profile)->social_links)
                        @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                        @foreach($socialLinks as $platform => $url)
                        @if($url)
                        <a href="{{ $url }}" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition">
                            <i class="fab fa-{{ $platform }} text-xl"></i>
                        </a>
                        @endif
                        @endforeach
                        @else
                        <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-github text-xl"></i></a>
                        <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-linkedin-in text-xl"></i></a>
                        @endif
                    </div>
                    @if(optional($user->profile)->cv_path)
                    <a href="{{ asset('storage/' . $user->profile->cv_path) }}" download class="text-sm font-medium text-primary hover:underline flex items-center">
                        <i class="fas fa-download mr-2"></i> Download CV
                    </a>
                    @endif
                </div>
            </div>
            <!-- Right: Profile Image (centered vertically) -->
            <div class="section flex items-center justify-center" style="transition-delay: 0.2s">
                <div class="relative">
                    <!-- Outer glow ring -->
                    <div class="absolute inset-0 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 blur-2xl scale-110"></div>

                    <!-- Neumorphic container -->
                    <div class="relative w-72 h-72 md:w-80 md:h-80 rounded-full neumorph-3d flex items-center justify-center overflow-hidden p-2">
                        <div class="w-full h-full rounded-full overflow-hidden">
                            @if(optional($user->profile)->avatar)
                            <img src="{{ asset('storage/' . $user->profile->avatar) }}"
                                 alt="Profile Photo"
                                 class="w-full h-full object-cover object-top">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                <i class="fas fa-user text-6xl text-primary/50"></i>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Floating decoration dots -->
                    <div class="absolute -top-3 -right-3 w-7 h-7 rounded-full neumorph-btn flex items-center justify-center text-primary text-xs">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="absolute -bottom-3 -left-3 w-7 h-7 rounded-full neumorph-btn flex items-center justify-center text-secondary text-xs">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="absolute top-1/2 -right-5 -translate-y-1/2 w-6 h-6 rounded-full bg-primary/20 animate-pulse"></div>
                    <div class="absolute top-1/2 -left-5 -translate-y-1/2 w-4 h-4 rounded-full bg-secondary/20 animate-pulse" style="animation-delay:0.5s"></div>
                </div>
            </div>
                <!-- Floating Decorations -->
                <div class="hidden md:flex absolute top-10 right-0 w-24 h-24 neumorph rounded-full items-center justify-center animate-spin-slow">
                    <div class="w-16 h-16 neumorph-inset rounded-full flex items-center justify-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10"></div>
                    </div>
                </div>

                <div class="hidden md:flex absolute bottom-40 -left-10 w-20 h-20 neumorph rounded-full items-center justify-center animate-float z-20">
                    <div class="w-12 h-12 neumorph-inset rounded-full flex items-center justify-center">
                        <i class="fas fa-code text-primary text-lg"></i>
                    </div>
                </div>

                <div class="hidden md:flex absolute top-1/2 -right-4 w-16 h-16 neumorph rounded-2xl rotate-45 animate-float-2 items-center justify-center z-20">
                    <i class="fab fa-laravel text-primary text-xl"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="min-w-screen py-20 px-4 bg-white bg-opacity-50 dark:bg-gray-800 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">About <span class="text-gradient">Me</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Get to know the person behind the code</p>

            <div class="grid md:grid-row-2 gap-12 items-center">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 md:p-10 rounded-3xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 neumorph-inset rounded-full flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-user-circle text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold">About Me</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ optional($user->profile)->tagline ?? 'Embedded & Full Stack Developer' }}</p>
                            </div>
                        </div>

                        <div class="neumorph-inset p-5 md:p-6 rounded-2xl relative">
                            <i class="fas fa-quote-left text-primary/20 text-4xl absolute top-4 left-4"></i>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed relative z-10 pl-6 pt-2 text-base">
                                {{ optional($user->profile)->bio ?? "Hi! I'm a passionate developer who blends embedded systems and modern web technologies to build seamless full-stack experiences. From microcontrollers to cloud APIs, I love crafting solutions that are both technically robust and visually compelling." }}
                            </p>
                        </div>

                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="neumorph-btn p-4 rounded-2xl flex items-center gap-3">
                                <div class="w-10 h-10 neumorph-inset rounded-full flex items-center justify-center text-primary shrink-0">
                                    <i class="fas fa-id-card text-sm"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-0.5">Name</h4>
                                    <p class="font-semibold text-sm truncate">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="neumorph-btn p-4 rounded-2xl flex items-center gap-3">
                                <div class="w-10 h-10 neumorph-inset rounded-full flex items-center justify-center text-primary shrink-0">
                                    <i class="fas fa-envelope text-sm"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-0.5">Email</h4>
                                    <p class="font-semibold text-sm truncate">{{ $user->email }}</p>
                                </div>
                            </div>
                            @if(optional($user->profile)->phone)
                            <div class="neumorph-btn p-4 rounded-2xl flex items-center gap-3">
                                <div class="w-10 h-10 neumorph-inset rounded-full flex items-center justify-center text-primary shrink-0">
                                    <i class="fas fa-phone-alt text-sm"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-0.5">Phone</h4>
                                    <p class="font-semibold text-sm truncate">{{ $user->profile->phone }}</p>
                                </div>
                            </div>
                            @endif
                            @if(optional($user->profile)->location)
                            <div class="neumorph-btn p-4 rounded-2xl flex items-center gap-3">
                                <div class="w-10 h-10 neumorph-inset rounded-full flex items-center justify-center text-primary shrink-0">
                                    <i class="fas fa-map-marker-alt text-sm"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-0.5">Location</h4>
                                    <p class="font-semibold text-sm truncate">{{ $user->profile->location }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="relative mt-10 journey-section">
                    <h3 class="text-2xl font-bold mb-10 text-center">Professional Journey</h3>

                    <!-- Timeline container: single col on mobile, zig-zag on md+ -->
                    <div class="relative">
                        <!-- Center line — animated dashed scrolling upward (md+ only) -->
                        <div class="hidden md:block absolute left-1/2 inset-y-0 -translate-x-1/2 overflow-hidden" style="width:3px;">
                            <div class="timeline-dash-line w-full"></div>
                        </div>

                        @forelse($user->experiences as $index => $experience)
                        <div class="timeline-item mb-8 flex flex-col md:flex-row md:items-center w-full
                            {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                            data-delay="{{ $index * 150 }}">

                            <!-- Card -->
                            <div class="w-full md:w-[calc(50%-2rem)] {{ $index % 2 == 0 ? 'md:mr-8 tl-slide-left' : 'md:ml-8 tl-slide-right' }}">
                                <div class="neumorph-3d p-5 rounded-2xl hover:-translate-y-1 transition-transform duration-300">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-9 h-9 neumorph-inset rounded-lg flex items-center justify-center text-primary shrink-0">
                                            <i class="fas fa-briefcase text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-base leading-tight">{{ $experience->position }}</h4>
                                            <p class="text-primary text-xs font-semibold">{{ $experience->company }}</p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2 flex items-center gap-1">
                                        <i class="fas fa-calendar text-primary/60"></i>
                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} —
                                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                        @if($experience->is_current ?? false)
                                        <span class="ml-1 text-xs px-2 py-0.5 rounded-full bg-green-500/20 text-green-600 font-semibold">Current</span>
                                        @endif
                                    </p>
                                    @if($experience->description)
                                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">{{ $experience->description }}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Center dot — only md+ -->
                            <div class="hidden md:flex relative w-10 h-10 items-center justify-center shrink-0 z-10">
                                <!-- Pulse ring -->
                                <div class="absolute inset-0 rounded-full bg-primary/20 animate-ping" style="animation-duration:2s"></div>
                                <div class="relative w-10 h-10 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                    <i class="fas fa-briefcase text-xs"></i>
                                </div>
                            </div>

                            <!-- Spacer for opposite side -->
                            <div class="hidden md:block w-[calc(50%-2rem)]"></div>

                        </div>
                        @empty
                        <p class="text-gray-500 text-center">No experience added yet.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Education Journey -->
                <div class="relative mt-16">
                    <h3 class="text-2xl font-bold mb-10 text-center flex items-center justify-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-500 text-sm">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        Education Journey
                    </h3>

                    <div class="relative">
                        <!-- Dashed scrolling line (md+) -->
                        <div class="hidden md:block absolute left-1/2 inset-y-0 -translate-x-1/2 overflow-hidden" style="width:3px;">
                            <div class="edu-dash-line w-full"></div>
                        </div>

                        @forelse($user->educations as $index => $education)
                        <div class="edu-timeline-item mb-8 flex flex-col md:flex-row md:items-center w-full
                            {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                            data-delay="{{ $index * 150 }}">

                            <!-- Card -->
                            <div class="w-full md:w-[calc(50%-2rem)] {{ $index % 2 == 0 ? 'md:mr-8 edu-slide-left' : 'md:ml-8 edu-slide-right' }}">
                                <div class="neumorph-3d p-5 rounded-2xl hover:-translate-y-1 transition-transform duration-300 border-l-4 border-emerald-400/40">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0"
                                             style="background: rgba(52,211,153,0.12);">
                                            <i class="fas fa-graduation-cap text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-base leading-tight">{{ $education->degree }}</h4>
                                            <p class="text-emerald-600 dark:text-emerald-400 text-xs font-semibold">{{ $education->institution }}</p>
                                        </div>
                                    </div>
                                    @if($education->field_of_study)
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2 flex items-center gap-1">
                                        <i class="fas fa-book text-emerald-500/60"></i>
                                        {{ $education->field_of_study }}
                                    </p>
                                    @endif
                                    @if($education->gpa)
                                    <div class="inline-flex items-center gap-1.5 mb-2 px-2.5 py-1 rounded-full text-xs font-bold"
                                         style="background:rgba(52,211,153,0.12); color:#059669;">
                                        <i class="fas fa-star text-xs"></i>
                                        IPK {{ number_format($education->gpa, 2) }}
                                        <span class="opacity-60 font-normal">/ {{ number_format($education->gpa_max ?? 4.00, 2) }}</span>
                                    </div>
                                    @endif
                                    <p class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                        <i class="fas fa-calendar text-emerald-500/60"></i>
                                        {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }}
                                        —
                                        {{ \Carbon\Carbon::parse($education->end_date)->format('Y') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Center dot (md+) -->
                            <div class="hidden md:flex relative w-10 h-10 items-center justify-center shrink-0 z-10">
                                <div class="absolute inset-0 rounded-full animate-ping" style="background:rgba(52,211,153,0.20); animation-duration:2.5s;"></div>
                                <div class="relative w-10 h-10 neumorph-btn rounded-full flex items-center justify-center text-emerald-500">
                                    <i class="fas fa-graduation-cap text-xs"></i>
                                </div>
                            </div>

                            <!-- Spacer -->
                            <div class="hidden md:block w-[calc(50%-2rem)]"></div>

                        </div>
                        @empty
                        <p class="text-gray-500 text-center">No education added yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">My <span class="text-gradient">Expertise</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Technologies I work with and services I offer</p>

            <!-- Technical Skills - Full Width with category grouping -->
            <div class="section mb-8" style="transition-delay: 0.1s">
                <div class="neumorph-3d p-8 rounded-3xl">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 neumorph-inset rounded-full flex items-center justify-center text-primary shrink-0">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Technical Skills</h3>
                    </div>

                    @php
                        $skillsByCategory = $user->skills->groupBy('category');
                        $categoryLabels = [
                            'embedded' => ['label' => 'Embedded & IoT', 'icon' => 'fa-microchip'],
                            'mobile'   => ['label' => 'Mobile Dev', 'icon' => 'fa-mobile-alt'],
                            'frontend' => ['label' => 'Frontend', 'icon' => 'fa-paint-brush'],
                            'backend'  => ['label' => 'Backend', 'icon' => 'fa-server'],
                            'database' => ['label' => 'Database', 'icon' => 'fa-database'],
                            'design'   => ['label' => 'Design', 'icon' => 'fa-pen-nib'],
                            'tool'     => ['label' => 'Tools & DevOps', 'icon' => 'fa-tools'],
                        ];
                    @endphp

                    @if($skillsByCategory->isEmpty())
                    <p class="text-gray-500">No skills added yet.</p>
                    @else
                    <div class="space-y-6">
                        @foreach($skillsByCategory as $category => $skills)
                        @php $cat = $categoryLabels[$category] ?? ['label' => ucfirst($category), 'icon' => 'fa-star']; @endphp
                        <div>
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas {{ $cat['icon'] }} text-primary text-sm"></i>
                                <h4 class="text-sm font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">{{ $cat['label'] }}</h4>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($skills as $skill)
                                <div class="neumorph-btn px-4 py-2 rounded-full flex items-center gap-2 text-sm hover:-translate-y-0.5 transition-transform duration-200">
                                    @if($skill->icon)
                                    <i class="{{ $skill->icon }} text-primary text-xs"></i>
                                    @endif
                                    <span class="font-medium">{{ $skill->name }}</span>
                                    <span class="text-xs text-primary font-bold">{{ $skill->percentage }}%</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- Services & Capabilities -->
            <div class="section" style="transition-delay: 0.2s">
                <div class="neumorph-3d p-8 rounded-3xl">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 neumorph-inset rounded-full flex items-center justify-center text-primary shrink-0">
                            <i class="fas fa-concierge-bell"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Services & Capabilities</h3>
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($user->services as $service)
                        <div class="neumorph-btn p-5 rounded-2xl flex items-start gap-4 hover:-translate-y-1 transition-transform duration-300">
                            <div class="w-12 h-12 neumorph-inset rounded-xl flex items-center justify-center text-primary shrink-0">
                                @if($service->icon)
                                <i class="{{ $service->icon }} text-xl"></i>
                                @else
                                <i class="fas fa-laptop-code text-xl"></i>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">{{ $service->title }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">{{ $service->description }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 col-span-3">No services added yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scrolling Tech Stack -->
    <div class="scrolling-text-container section">
        <div class="scrolling-text-track">
            @foreach($user->skills as $skill)
            <div class="scrolling-text">
                @if($skill->icon)
                <i class="{{ $skill->icon }}"></i>
                @endif
                {{ $skill->name }}
            </div>
            @endforeach
            <!-- Duplicate for seamless looping -->
            @foreach($user->skills as $skill)
            <div class="scrolling-text">
                @if($skill->icon)
                <i class="{{ $skill->icon }}"></i>
                @endif
                {{ $skill->name }}
            </div>
            @endforeach
        </div>
    </div>
<!-- Certificates Section -->
<section id="certificates" class="py-20 px-4 bg-white bg-opacity-50 dark:bg-gray-800 dark:bg-opacity-70">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">
            My <span class="text-gradient">Certifications</span>
        </h2>
        <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">
            Certificates I’ve earned from various competitions, activities, and training programs.
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($user->certificates as $certificate)
            @php
                $certData = [
                    'title'          => $certificate->title,
                    'issuer'         => $certificate->issuer,
                    'issue_date'     => $certificate->issue_date
                        ? \Carbon\Carbon::parse($certificate->issue_date)->format('d M Y')
                        : null,
                    'expiry_date'    => $certificate->expiry_date
                        ? \Carbon\Carbon::parse($certificate->expiry_date)->format('d M Y')
                        : null,
                    'credential_id'  => $certificate->credential_id,
                    'credential_url' => $certificate->credential_url,
                    'description'    => $certificate->description,
                    'image'          => $certificate->image ? asset('storage/'.$certificate->image) : null,
                    'is_active'      => $certificate->is_active,
                ];
            @endphp
            <div class="section cursor-pointer" onclick="openCertModal(this)" data-cert='{{ json_encode($certData) }}'>
                <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col transition-transform duration-300 hover:-translate-y-1">
                    <!-- Image area -->
                    <div class="relative h-52 overflow-hidden bg-gradient-to-br from-primary/10 to-secondary/10">
                        @if($certificate->image)
                        <img src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-certificate text-6xl text-primary/50"></i>
                        </div>
                        @endif
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-primary/80 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-semibold flex items-center gap-2 text-sm">
                                <i class="fas fa-expand"></i> View Details
                            </span>
                        </div>
                        @if($certificate->is_active)
                        <div class="absolute top-3 left-3">
                            <span class="text-xs px-2.5 py-1 rounded-full bg-green-500/90 text-white font-semibold">✓ Active</span>
                        </div>
                        @endif
                    </div>

                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold mb-1 line-clamp-2">{{ $certificate->title }}</h3>
                        <p class="text-primary text-sm font-medium mb-2">{{ $certificate->issuer }}</p>
                        @if($certificate->issue_date)
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ \Carbon\Carbon::parse($certificate->issue_date)->format('M Y') }}
                            @if($certificate->expiry_date)
                            — {{ \Carbon\Carbon::parse($certificate->expiry_date)->format('M Y') }}
                            @else
                            — No Expiry
                            @endif
                        </p>
                        @endif
                        @if($certificate->description)
                        <p class="text-gray-500 dark:text-gray-400 text-xs mt-2 line-clamp-2">{{ $certificate->description }}</p>
                        @endif
                    </div>
                    <div class="px-5 pb-4 flex items-center gap-2 text-xs text-gray-500">
                        <i class="fas fa-mouse-pointer text-primary"></i>
                        <span>Click to view details</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <div class="neumorph-3d p-8 rounded-3xl inline-block">
                    <i class="fas fa-certificate text-6xl text-gray-400 dark:text-gray-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">No Certificates Yet</h3>
                </div>
            </div>
            @endforelse
        </div>

        <!-- View All Button -->
        {{-- @if($user->certificates->count() > 0)
        <div class="text-center mt-12 section">
            <a href="{{ route('portfolio.certificates', $user->name) }}" 
               class="neumorph-btn px-8 py-3 font-medium hover:text-primary transition inline-flex items-center">
                View All Certificates <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        @endif --}}
    </div>
</section>

<!-- ═══ PROJECT DETAIL MODAL ═══ -->
<div id="projectModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden p-4" onclick="if(event.target===this)closeProjectModal()">
    <div class="neumorph-3d rounded-3xl w-full max-w-2xl max-h-[92vh] overflow-y-auto relative" onclick="event.stopPropagation()">
        <!-- Close -->
        <button onclick="closeProjectModal()" class="absolute top-4 right-4 neumorph-btn w-10 h-10 rounded-full flex items-center justify-center hover:text-primary transition z-10">
            <i class="fas fa-times"></i>
        </button>
        <div id="projectModalContent" class="p-0">
            <!-- Populated by JS -->
        </div>
    </div>
</div>

<!-- ═══ CERTIFICATE DETAIL MODAL ═══ -->
<div id="certificateModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden p-4" onclick="if(event.target===this)closeCertificateModal()">
    <div class="neumorph-3d rounded-3xl w-full max-w-2xl max-h-[92vh] overflow-y-auto relative" onclick="event.stopPropagation()">
        <button onclick="closeCertificateModal()" class="absolute top-4 right-4 neumorph-btn w-10 h-10 rounded-full flex items-center justify-center hover:text-primary transition z-10">
            <i class="fas fa-times"></i>
        </button>
        <div id="certModalContent" class="p-0">
            <!-- Populated by JS -->
        </div>
    </div>
</div>
    <!-- Projects Section -->
    <section id="projects" class="py-20 px-4 bg-white bg-opacity-50 dark:bg-gray-800 dark:bg-opacity-70">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">Project <span class="text-gradient">Portfolio</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Selected works demonstrating my capabilities</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($user->projects as $project)
                @php
                    $pTechIds = is_string($project->technologies)
                        ? json_decode($project->technologies, true)
                        : ($project->technologies ?? []);
                    $pTechs = !empty($pTechIds)
                        ? \App\Models\Technology::whereIn('id',$pTechIds)->pluck('name')->toArray()
                        : [];
                    $projectData = [
                        'id'           => $project->id,
                        'title'        => $project->title,
                        'description'  => $project->description,
                        'image'        => $project->image_path ? asset('storage/'.$project->image_path) : null,
                        'date'         => $project->project_date ? \Carbon\Carbon::parse($project->project_date)->format('F Y') : null,
                        'client'       => $project->client,
                        'demo_url'     => $project->demo_url,
                        'case_url'     => $project->case_study_url,
                        'is_featured'  => $project->is_featured,
                        'technologies' => $pTechs,
                    ];
                @endphp
                <div class="section cursor-pointer" onclick="openProjectModal(this)" data-project='{{ json_encode($projectData) }}'>
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col transition-transform duration-300 hover:-translate-y-1">
                        <div class="relative h-48 overflow-hidden">
                            @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                <i class="fas fa-code text-5xl text-primary/40"></i>
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-10"></div>
                            @if($project->is_featured)
                            <div class="absolute top-3 right-3">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">⭐ Featured</span>
                            </div>
                            @endif
                            <!-- View detail overlay -->
                            <div class="absolute inset-0 bg-primary/80 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-semibold flex items-center gap-2 text-sm">
                                    <i class="fas fa-expand"></i> View Details
                                </span>
                            </div>
                        </div>
                        <div class="p-5 flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold line-clamp-1">{{ $project->title }}</h3>
                                @if($project->project_date)
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full shrink-0 ml-2">
                                    {{ \Carbon\Carbon::parse($project->project_date)->format('Y') }}
                                </span>
                                @endif
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-2">{{ $project->description }}</p>
                            @if(!empty($pTechs))
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_slice($pTechs, 0, 4) as $t)
                                <span class="text-xs px-2.5 py-1 neumorph-btn rounded-full">{{ $t }}</span>
                                @endforeach
                                @if(count($pTechs) > 4)
                                <span class="text-xs px-2.5 py-1 neumorph-btn rounded-full text-gray-400">+{{ count($pTechs)-4 }}</span>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="px-5 pb-4 flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-mouse-pointer text-primary"></i>
                            <span>Click to view details</span>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-gray-600 dark:text-gray-400 col-span-3 text-center">No projects added yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 px-4 overflow-hidden">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">
                Client <span class="text-gradient">Testimonials</span>
            </h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">
                What people say about working with me
            </p>
        </div>

        <!-- Horizontal Scroll Wrapper -->
        <div class="relative">
            <!-- Fade edges -->
            <div class="absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-gray-100 dark:from-gray-900 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-gray-100 dark:from-gray-900 to-transparent z-10 pointer-events-none"></div>

            <!-- Scroll track -->
            <div id="testimonialsTrack" class="flex gap-6 cursor-grab select-none py-4"
                 style="overflow-x: auto; scroll-behavior: auto; -webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
                
                @forelse($user->testimonials as $testimonial)
                <div class="testimonial-card neumorph-3d p-7 rounded-3xl flex-shrink-0" style="width: 360px;">
                    <!-- Header -->
                    <div class="flex items-center mb-5">
                        <div class="w-14 h-14 rounded-full overflow-hidden mr-4 neumorph shrink-0">
                            @if($testimonial->client_avatar)
                            <img src="{{ asset('storage/' . $testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/30 to-secondary/30 flex items-center justify-center">
                                <i class="fas fa-user text-xl text-primary"></i>
                            </div>
                            @endif
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="font-bold truncate">{{ $testimonial->client_name }}</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-xs truncate">
                                {{ $testimonial->client_position }}@if($testimonial->client_company), {{ $testimonial->client_company }}@endif
                            </p>
                        </div>
                        @if($testimonial->is_featured)
                        <div class="ml-auto shrink-0">
                            <span class="text-xs px-2 py-1 neumorph-btn rounded-full text-primary font-bold">★ Featured</span>
                        </div>
                        @endif
                    </div>

                    <!-- Quote -->
                    <div class="relative mb-5">
                        <i class="fas fa-quote-left text-primary/20 text-3xl absolute -top-2 -left-1"></i>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed pl-6 line-clamp-5">
                            {{ $testimonial->content }}
                        </p>
                    </div>

                    <!-- Stars -->
                    <div class="flex gap-0.5">
                        @for($i = 0; $i < 5; $i++)
                        <i class="fas fa-star text-sm {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"></i>
                        @endfor
                        <span class="text-xs text-gray-400 ml-2 mt-0.5">{{ $testimonial->rating }}/5</span>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 mx-auto">No testimonials yet.</p>
                @endforelse

                <!-- Duplicate for seamless loop -->
                @foreach($user->testimonials as $testimonial)
                <div class="testimonial-card neumorph-3d p-7 rounded-3xl flex-shrink-0" style="width: 360px;">
                    <div class="flex items-center mb-5">
                        <div class="w-14 h-14 rounded-full overflow-hidden mr-4 neumorph shrink-0">
                            @if($testimonial->client_avatar)
                            <img src="{{ asset('storage/' . $testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/30 to-secondary/30 flex items-center justify-center">
                                <i class="fas fa-user text-xl text-primary"></i>
                            </div>
                            @endif
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="font-bold truncate">{{ $testimonial->client_name }}</h4>
                            <p class="text-gray-500 dark:text-gray-400 text-xs truncate">
                                {{ $testimonial->client_position }}@if($testimonial->client_company), {{ $testimonial->client_company }}@endif
                            </p>
                        </div>
                        @if($testimonial->is_featured)
                        <div class="ml-auto shrink-0">
                            <span class="text-xs px-2 py-1 neumorph-btn rounded-full text-primary font-bold">★ Featured</span>
                        </div>
                        @endif
                    </div>
                    <div class="relative mb-5">
                        <i class="fas fa-quote-left text-primary/20 text-3xl absolute -top-2 -left-1"></i>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed pl-6 line-clamp-5">
                            {{ $testimonial->content }}
                        </p>
                    </div>
                    <div class="flex gap-0.5">
                        @for($i = 0; $i < 5; $i++)
                        <i class="fas fa-star text-sm {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"></i>
                        @endfor
                        <span class="text-xs text-gray-400 ml-2 mt-0.5">{{ $testimonial->rating }}/5</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">Let's <span class="text-gradient">Connect</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Get in touch for project inquiries or collaboration opportunities</p>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Left: Contact Info -->
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d rounded-3xl p-8 flex flex-col gap-5 h-full">
                        <h3 class="text-2xl font-bold mb-2">Contact Information</h3>

                        <!-- Email -->
                        <a href="mailto:{{ $user->email }}" class="neumorph-btn p-4 rounded-2xl flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                            <div class="w-12 h-12 neumorph-inset rounded-xl flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-0.5">Email</h4>
                                <p class="font-semibold text-sm truncate">{{ $user->email }}</p>
                            </div>
                            <i class="fas fa-arrow-right text-primary/50 ml-auto text-xs"></i>
                        </a>

                        @if(optional($user->profile)->phone)
                        <a href="tel:{{ $user->profile->phone }}" class="neumorph-btn p-4 rounded-2xl flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                            <div class="w-12 h-12 neumorph-inset rounded-xl flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-0.5">Phone</h4>
                                <p class="font-semibold text-sm truncate">{{ $user->profile->phone }}</p>
                            </div>
                            <i class="fas fa-arrow-right text-primary/50 ml-auto text-xs"></i>
                        </a>
                        @endif

                        @if(optional($user->profile)->location)
                        <a href="https://maps.google.com?q={{ urlencode($user->profile->location) }}" target="_blank" class="neumorph-btn p-4 rounded-2xl flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                            <div class="w-12 h-12 neumorph-inset rounded-xl flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-0.5">Location</h4>
                                <p class="font-semibold text-sm truncate">{{ $user->profile->location }}</p>
                            </div>
                            <i class="fas fa-arrow-right text-primary/50 ml-auto text-xs"></i>
                        </a>
                        @endif

                        <!-- Social Links -->
                        @if(optional($user->profile)->social_links)
                        @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                        <div class="pt-2">
                            <h4 class="text-xs text-gray-400 uppercase tracking-widest mb-3">Follow Me</h4>
                            <div class="flex flex-wrap gap-3">
                                @foreach($socialLinks as $platform => $url)
                                @if($url)
                                <a href="{{ $url }}" target="_blank"
                                   class="neumorph-btn w-11 h-11 rounded-xl flex items-center justify-center hover:text-primary transition-colors duration-200"
                                   title="{{ ucfirst($platform) }}">
                                    <i class="fab fa-{{ $platform }}"></i>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Send Me a Message</h3>
                        <form class="space-y-5" id="contactForm">
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium">Your Name</label>
                                    <input type="text" id="name" class="w-full input-field px-4 py-3" placeholder="e.g. Fulan" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium">Your Email</label>
                                    <input type="email" id="email" class="w-full input-field px-4 py-3" placeholder="fulan@example.com" required>
                                </div>
                            </div>
                            <div>
                                <label for="subject" class="block mb-2 text-sm font-medium">Subject</label>
                                <select id="subject" class="w-full input-field px-4 py-3">
                                    <option value="">Select a subject</option>
                                    <option value="project">Project Inquiry</option>
                                    <option value="collaboration">Collaboration Opportunity</option>
                                    <option value="job">Job Offer</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block mb-2 text-sm font-medium">Message</label>
                                <textarea id="message" rows="5" class="w-full input-field px-4 py-3" placeholder="Tell me about your project..." required></textarea>
                            </div>
                            <button type="submit" class="w-full neumorph-btn px-6 py-3 font-semibold text-white bg-gradient-to-br from-primary to-secondary hover:opacity-90 transition-all duration-300 rounded-xl flex items-center justify-center gap-2">
                                <i class="fas fa-paper-plane"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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

            // Form submission
            const contactForm = document.getElementById('contactForm');
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

// ── Escape helper to prevent XSS ──────────────────────────────
function esc(str) {
    return str ? String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;') : '';
}

// ═══════════════════════════════════════
//  PROJECT MODAL
// ═══════════════════════════════════════
function openProjectModal(card) {
    const d = JSON.parse(card.getAttribute('data-project'));
    const techPills = (d.technologies || []).map(t =>
        `<span class="text-xs px-3 py-1 neumorph-btn rounded-full">${esc(t)}</span>`
    ).join('');

    const imageBlock = d.image
        ? `<img src="${esc(d.image)}" alt="${esc(d.title)}" class="w-full h-64 object-cover">`
        : `<div class="w-full h-48 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
               <i class="fas fa-code text-6xl text-primary/40"></i>
           </div>`;

    const linksBlock = [
        d.demo_url ? `<a href="${esc(d.demo_url)}" target="_blank" class="neumorph-btn px-5 py-2.5 rounded-xl flex items-center gap-2 hover:text-primary transition text-sm font-medium"><i class="fas fa-external-link-alt"></i> Live Demo</a>` : '',
        d.case_url ? `<a href="${esc(d.case_url)}" target="_blank" class="neumorph-btn px-5 py-2.5 rounded-xl flex items-center gap-2 hover:text-primary transition text-sm font-medium"><i class="fas fa-book-open"></i> Case Study</a>` : '',
    ].filter(Boolean).join('');

    document.getElementById('projectModalContent').innerHTML = `
        ${imageBlock}
        <div class="p-7">
            <div class="flex items-start justify-between gap-4 mb-4">
                <h3 class="text-2xl font-bold leading-tight">${esc(d.title)}</h3>
                ${d.is_featured ? '<span class="text-xs px-3 py-1 neumorph-btn rounded-full shrink-0">⭐ Featured</span>' : ''}
            </div>
            ${d.date ? `<p class="text-sm text-gray-500 dark:text-gray-400 mb-4"><i class="fas fa-calendar mr-1"></i>${esc(d.date)}</p>` : ''}
            ${d.client ? `<div class="neumorph-btn px-4 py-2.5 rounded-xl flex items-center gap-2 mb-4 w-fit text-sm"><i class="fas fa-building text-primary"></i><span><strong>Client:</strong> ${esc(d.client)}</span></div>` : ''}
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">${esc(d.description)}</p>
            ${techPills ? `<div class="mb-6"><p class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-3">Technologies Used</p><div class="flex flex-wrap gap-2">${techPills}</div></div>` : ''}
            ${linksBlock ? `<div class="flex flex-wrap gap-3 pt-2">${linksBlock}</div>` : ''}
        </div>`;

    document.getElementById('projectModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeProjectModal() {
    document.getElementById('projectModal').classList.add('hidden');
    document.body.style.overflow = '';
}

// ═══════════════════════════════════════
//  CERTIFICATE MODAL
// ═══════════════════════════════════════
function openCertModal(card) {
    const d = JSON.parse(card.getAttribute('data-cert'));

    const imageBlock = d.image
        ? `<img src="${esc(d.image)}" alt="${esc(d.title)}" class="w-full h-56 object-cover">`
        : `<div class="w-full h-44 bg-gradient-to-br from-primary/15 to-secondary/15 flex items-center justify-center">
               <i class="fas fa-certificate text-7xl text-primary/50"></i>
           </div>`;

    const activeBadge = d.is_active
        ? '<span class="text-xs px-3 py-1 rounded-full bg-green-500/90 text-white font-semibold">✓ Active</span>'
        : '<span class="text-xs px-3 py-1 rounded-full bg-gray-400/80 text-white font-semibold">Inactive</span>';

    const datesBlock = d.issue_date ? `
        <div class="grid grid-cols-2 gap-3 mb-6">
            <div class="neumorph-btn p-3.5 rounded-xl">
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Issued</p>
                <p class="font-semibold text-sm">${esc(d.issue_date)}</p>
            </div>
            <div class="neumorph-btn p-3.5 rounded-xl">
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Expires</p>
                <p class="font-semibold text-sm">${d.expiry_date ? esc(d.expiry_date) : 'No Expiry'}</p>
            </div>
        </div>` : '';

    const credBlock = d.credential_id ? `
        <div class="neumorph-btn px-4 py-3 rounded-xl flex items-center gap-3 mb-4 text-sm">
            <i class="fas fa-fingerprint text-primary"></i>
            <div><p class="text-xs text-gray-400">Credential ID</p><p class="font-mono font-semibold">${esc(d.credential_id)}</p></div>
        </div>` : '';

    const verifyBtn = d.credential_url
        ? `<a href="${esc(d.credential_url)}" target="_blank" class="neumorph-btn px-5 py-2.5 rounded-xl flex items-center gap-2 hover:text-primary transition text-sm font-medium w-fit"><i class="fas fa-external-link-alt"></i> Verify Certificate</a>`
        : '';

    document.getElementById('certModalContent').innerHTML = `
        ${imageBlock}
        <div class="p-7">
            <div class="flex items-start justify-between gap-4 mb-2">
                <h3 class="text-2xl font-bold leading-tight">${esc(d.title)}</h3>
                ${activeBadge}
            </div>
            <p class="text-primary font-semibold mb-5">${esc(d.issuer)}</p>
            ${datesBlock}
            ${credBlock}
            ${d.description ? `<p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">${esc(d.description)}</p>` : ''}
            ${verifyBtn}
        </div>`;

    document.getElementById('certificateModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeCertificateModal() {
    document.getElementById('certificateModal').classList.add('hidden');
    document.body.style.overflow = '';
}

// Close modals with Escape key
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        closeProjectModal();
        closeCertificateModal();
    }
});

// ════════════════════════════════════════════════════
// Professional Journey — per-item slide-in on scroll
// ════════════════════════════════════════════════════
(function() {
    const tlItems = document.querySelectorAll('.timeline-item');
    if (!tlItems.length) return;

    const tlObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const item = entry.target;
                const delay = parseInt(item.dataset.delay) || 0;
                setTimeout(() => item.classList.add('show'), delay);
                tlObserver.unobserve(item); // run once
            }
        });
    }, { threshold: 0.2, rootMargin: '0px 0px -40px 0px' });

    tlItems.forEach(item => tlObserver.observe(item));
})();

// ════════════════════════════════════════════════════
// Education Journey — per-item slide-in on scroll
// ════════════════════════════════════════════════════
(function() {
    const eduItems = document.querySelectorAll('.edu-timeline-item');
    if (!eduItems.length) return;

    const eduObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const item = entry.target;
                const delay = parseInt(item.dataset.delay) || 0;
                setTimeout(() => item.classList.add('show'), delay);
                eduObserver.unobserve(item);
            }
        });
    }, { threshold: 0.2, rootMargin: '0px 0px -40px 0px' });

    eduItems.forEach(item => eduObserver.observe(item));
})();

// ============================================
// Testimonials Horizontal Auto-Scroll Carousel
// ============================================
window.addEventListener('load', function () {
    const track = document.getElementById('testimonialsTrack');
    if (!track) return;

    // Ensure the track itself has no scrollbar visible
    track.style.scrollbarWidth = 'none';
    const noScrollStyle = document.createElement('style');
    noScrollStyle.textContent = '#testimonialsTrack::-webkit-scrollbar{display:none}';
    document.head.appendChild(noScrollStyle);

    let isPaused   = false;
    let isDragging = false;
    let startX     = 0;
    let scrollStart= 0;
    let velocity   = 0;
    let lastX      = 0;
    const SPEED    = 0.7; // px per animation frame (~42px/s at 60fps)

    function getHalf() { return track.scrollWidth / 2; }

    // ─── Auto-scroll loop ───────────────────────────────────────
    function tick() {
        if (!isPaused && !isDragging) {
            track.scrollLeft += SPEED;
            if (track.scrollLeft >= getHalf()) {
                track.scrollLeft -= getHalf();
            }
        }
        requestAnimationFrame(tick);
    }
    // Small delay so the browser finishes painting first
    setTimeout(() => requestAnimationFrame(tick), 200);

    // ─── Pause on hover ─────────────────────────────────────────
    track.addEventListener('mouseenter', () => isPaused = true);
    track.addEventListener('mouseleave', () => { if (!isDragging) isPaused = false; });

    // ─── Mouse drag ─────────────────────────────────────────────
    track.addEventListener('mousedown', e => {
        isDragging  = true;
        isPaused    = true;
        startX      = e.pageX;
        scrollStart = track.scrollLeft;
        lastX       = e.pageX;
        track.style.cursor = 'grabbing';
        e.preventDefault();
    });

    document.addEventListener('mousemove', e => {
        if (!isDragging) return;
        track.scrollLeft = scrollStart - (e.pageX - startX);
        velocity = e.pageX - lastX;
        lastX    = e.pageX;
        // Keep within bounds during drag
        const h = getHalf();
        if (track.scrollLeft < 0) track.scrollLeft += h;
        if (track.scrollLeft >= h) track.scrollLeft -= h;
    });

    document.addEventListener('mouseup', () => {
        if (!isDragging) return;
        isDragging = false;
        track.style.cursor = 'grab';
        applyMomentum();
    });

    // ─── Touch drag ─────────────────────────────────────────────
    track.addEventListener('touchstart', e => {
        isPaused    = true;
        startX      = e.touches[0].pageX;
        scrollStart = track.scrollLeft;
        lastX       = e.touches[0].pageX;
    }, { passive: true });

    track.addEventListener('touchmove', e => {
        track.scrollLeft = scrollStart - (e.touches[0].pageX - startX);
        velocity = e.touches[0].pageX - lastX;
        lastX    = e.touches[0].pageX;
        const h = getHalf();
        if (track.scrollLeft < 0) track.scrollLeft += h;
        if (track.scrollLeft >= h) track.scrollLeft -= h;
    }, { passive: true });

    track.addEventListener('touchend', () => applyMomentum(), { passive: true });

    // ─── Momentum flick after release ───────────────────────────
    function applyMomentum() {
        let m = velocity * 2.5;
        const flick = setInterval(() => {
            track.scrollLeft -= m;
            m *= 0.90;
            const h = getHalf();
            if (track.scrollLeft < 0) track.scrollLeft += h;
            if (track.scrollLeft >= h) track.scrollLeft -= h;
            if (Math.abs(m) < 0.4) {
                clearInterval(flick);
                isPaused = false;
            }
        }, 16);
    }
});
    </script>
</body>
</html>
