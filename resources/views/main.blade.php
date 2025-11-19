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
    <section id="home" class="min-h-screen flex items-center justify-center px-4 py-20 pt-24">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="section">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Hi, I'm <span class="text-gradient">{{ $user->name }}</span></h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-6">Embedded & Full Stack Developer</h2>
                <p class="text-lg mb-8 text-gray-600 dark:text-gray-400">
                    {{ $user->profile->bio ?? 'I create beautiful, interactive web experiences with modern technologies and innovative design.' }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="neumorph-btn px-6 py-3 font-medium hover:text-primary transition">View My Work</a>
                    <a href="#contact" class="neumorph-btn px-6 py-3 font-medium hover:text-primary transition">Hire Me</a>
                </div>
                <div class="mt-8 flex flex-wrap items-center gap-6">
                    <div class="flex">
                        @if($user->profile->social_links)
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
                    @if($user->profile->cv_path)
                    <a href="{{ asset('storage/' . $user->profile->cv_path) }}" download class="text-sm font-medium text-primary hover:underline flex items-center">
                        <i class="fas fa-download mr-2"></i> Download CV
                    </a>
                    @endif
                </div>
            </div>
            <div class="section" style="transition-delay: 0.2s">
                <!-- Main Profile Card -->
                <div class="neumorph-3d w-full max-w-md h-[450px] rounded-3xl overflow-hidden relative transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-secondary/10">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48Y2lyY2xlIGN4PSIzMCIgY3k9IjMwIiByPSIxIiBmaWxsPSJoc2xhKDIxMCwgODAlLCA2MCUsIDAuMSkiLz48L3N2Zz4=')]"></div>
                    </div>

                    <!-- Profile Image Container -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-8 w-40 h-40 neumorph rounded-full overflow-hidden border-4 border-white dark:border-gray-800 z-10 shadow-lg">
                        @if($user->profile->avatar)
                        <img src="{{ asset('storage/' . $user->profile->avatar) }}" alt="Profile Photo" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-user text-4xl text-gray-500"></i>
                        </div>
                        @endif
                    </div>

                    <!-- Profile Content -->
                    <div class="absolute inset-0 flex flex-col items-center justify-end pb-8 pt-24 px-6 text-center">
                        <!-- Name and Title -->
                        <h2 class="text-2xl font-bold mb-1">{{ $user->name }}</h2>
                        <p class="text-primary font-medium mb-4">Embedded & Full Stack Developer</p>

                        <!-- Short Bio -->
                        <p class="hidden md:flex text-gray-600 dark:text-gray-400 mb-6">
                            {{ Str::limit($user->profile->bio ?? 'Creating beautiful digital experiences with modern web technologies', 80) }}
                        </p>

                        <!-- Social Links -->
                        <div class="flex">
                            @if($user->profile->social_links)
                            @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                            @foreach(array_slice($socialLinks, 0, 4) as $platform => $url)
                            @if($url)
                            <a href="{{ $url }}" class="w-10 h-10 neumorph-btn rounded-full flex items-center justify-center hover:text-primary transition">
                                <i class="fab fa-{{ $platform }}"></i>
                            </a>
                            @endif
                            @endforeach
                            @else
                            <a href="#" class="w-10 h-10 neumorph-btn rounded-full flex items-center justify-center hover:text-primary transition">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="w-10 h-10 neumorph-btn rounded-full flex items-center justify-center hover:text-primary transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-primary/10 animate-pulse"></div>
                    <div class="absolute bottom-6 left-6 w-12 h-12 rounded-lg bg-secondary/10 rotate-45"></div>
                </div>

                <!-- Floating Decorations -->
                <div class="hidden md:flex absolute -top-10 -right-10 w-24 h-24 neumorph rounded-full items-center justify-center animate-spin-slow">
                    <div class="w-16 h-16 neumorph-inset rounded-full flex items-center justify-center">
                        <div class="w-10 h-10 rounded-full bg-primary/10"></div>
                    </div>
                </div>

                <div class="hidden md:flex  absolute -bottom-10 md:-left-10 w-20 h-20 neumorph rounded-full items-center justify-center animate-float">
                    <div class="w-12 h-12 neumorph-inset rounded-full flex items-center justify-center">
                        <i class="fas fa-code text-primary text-lg"></i>
                    </div>
                </div>

                <div class="hidden md:flex  absolute top-1/2 -right-16 w-16 h-16 neumorph rounded-2xl rotate-45 animate-float-2 items-center justify-center">
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
                    <div class="neumorph-3d p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold mb-4">Personal Profile</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            {{ $user->profile->bio ?? "I'm a passionate web developer with experience creating modern web applications. My journey began in web development, which gives me a unique perspective on creating interfaces that are both technically sound and visually compelling." }}
                        </p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Name:</h4>
                                <p class="text-gray-600 dark:text-gray-400">{{ $user->name }}</p>
                            </div>
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Email:</h4>
                                <p class="text-gray-600 dark:text-gray-400  break-words">{{ $user->email }}</p>
                            </div>
                            @if($user->profile->phone)
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Phone:</h4>
                                <p class="text-gray-600 dark:text-gray-400">{{ $user->profile->phone }}</p>
                            </div>
                            @endif
                            @if($user->profile->location)
                            <div class="neumorph-btn p-4 rounded-xl">
                                <h4 class="font-bold mb-2">Location:</h4>
                                <p class="text-gray-600 dark:text-gray-400">{{ $user->profile->location }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold mb-6">Professional Journey</h3>
                        <div class="space-y-6">
                            @forelse($user->experiences as $experience)
                            <div class="flex">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold">{{ $experience->position }}</h4>
                                    <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $experience->company }} •
                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} -
                                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                    </p>
                                    @if($experience->description)
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $experience->description }}</p>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-600 dark:text-gray-400">No work experience added yet.</p>
                            @endforelse
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold mb-4">Education</h4>
                            <div class="space-y-4">
                                @forelse($user->educations as $education)
                                <div>
                                    <h5 class="font-semibold">{{ $education->degree }}</h5>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $education->institution }} •
                                        {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }} -
                                        {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : 'Present' }}
                                    </p>
                                    @if($education->field_of_study)
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Field: {{ $education->field_of_study }}</p>
                                    @endif
                                </div>
                                @empty
                                <p class="text-gray-600 dark:text-gray-400">No education information added yet.</p>
                                @endforelse
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
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">My <span class="text-gradient">Expertise</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Technologies I work with and services I offer</p>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Technical Skills</h3>
                        <div class="space-y-6">
                            @forelse($user->skills as $skill)
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="flex items-center">
                                        @if($skill->icon)
                                        <i class="{{ $skill->icon }} mr-2"></i>
                                        @endif
                                        {{ $skill->name }}
                                    </span>
                                    <span>{{ $skill->percentage }}%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: {{ $skill->percentage }}%" data-width="{{ $skill->percentage }}%"></div>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-600 dark:text-gray-400">No skills added yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <h3 class="text-2xl font-bold mb-6">Services & Capabilities</h3>

                        <div class="space-y-6">
                            @forelse($user->services as $service)
                            <div class="neumorph-btn p-4 rounded-xl">
                                <div class="flex items-start">
                                    <div class="mr-4 text-primary">
                                        @if($service->icon)
                                        <i class="{{ $service->icon }} text-2xl"></i>
                                        @else
                                        <i class="fas fa-laptop-code text-2xl"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold mb-2">{{ $service->title }}</h4>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $service->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-600 dark:text-gray-400">No services added yet.</p>
                            @endforelse
                        </div>
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
            <div class="section">
                <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                    <!-- Certificate Image -->
                    <div class="relative h-80 overflow-hidden bg-gradient-to-br from-primary/10 to-secondary/10">
                        @if($certificate->image)
                        <img src="{{ asset('storage/' . $certificate->image) }}" 
                             alt="{{ $certificate->title }}" 
                             class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-certificate text-6xl text-primary opacity-50 mb-2"></i>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">No Image</p>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Status Badge -->
                        {{-- <div class="absolute top-4 right-4">
                            <span class="text-xs px-3 py-1 neumorph-btn rounded-full {{ $certificate->status_badge }}">
                                {{ ucfirst($certificate->status) }}
                            </span>
                        </div> --}}
                        
                        <!-- Active Badge -->
                        {{-- @if($certificate->is_active)
                        <div class="absolute top-4 left-4">
                            <span class="text-xs px-3 py-1 neumorph-btn rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                Active
                            </span>
                        </div>
                        @endif --}}
                    </div>

                    <!-- Certificate Content -->
                    <div class="p-6 flex-grow h-40">
                        <h3 class="text-xl font-bold mb-2">{{ $certificate->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-3">{{ $certificate->issuer }}</p>
                        
                        <!-- Dates -->
                        {{-- <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <span>Issued: {{ $certificate->issue_date->format('M Y') }}</span>
                            @if($certificate->expiry_date)
                            <span class="{{ $certificate->is_expi   red ? 'text-red-500' : 'text-green-500' }}">
                                {{ $certificate->expiry_date->format('M Y') }}
                            </span>
                            @endif
                        </div> --}}

                        <!-- Credential ID -->
                        {{-- @if($certificate->credential_id)
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong>Credential ID:</strong> {{ $certificate->credential_id }}
                            </p>
                        </div>
                        @endif --}}

                        <!-- Description -->
                        @if($certificate->description)
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                            {{ $certificate->description }}
                        </p>
                        @endif

                        <!-- Duration Info -->
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-clock mr-1"></i>
                                {{ $certificate->duration }}
                            </p>
                        </div>
                    </div>

                    <!-- Certificate Actions -->
                    <div class="p-6 pt-0 flex justify-between items-center">
                        @if($certificate->credential_url)
                        <a href="{{ $certificate->credential_url }}" 
                           target="_blank" 
                           class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                            Verify <i class="fas fa-external-link-alt ml-2"></i>
                        </a>
                        @endif
                        
                        {{-- <button type="button" 
                                onclick="showCertificateDetails({{ $certificate->id }})"
                                class="text-sm text-primary hover:underline flex items-center">
                            View Details <i class="fas fa-arrow-right ml-1"></i>
                        </button> --}}
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <div class="neumorph-3d p-8 rounded-3xl inline-block">
                    <i class="fas fa-certificate text-6xl text-gray-400 dark:text-gray-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No Certificates Yet</h3>
                    <p class="text-gray-600 dark:text-gray-400">Certificates will be displayed here once added.</p>
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

<!-- Certificate Details Modal -->
<div id="certificateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="neumorph-3d rounded-3xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold">Certificate Details</h3>
                <button onclick="closeCertificateModal()" class="neumorph-btn w-10 h-10 rounded-full flex items-center justify-center hover:text-primary transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Modal Content -->
            <div id="certificateModalContent">
                <!-- Content will be loaded via JavaScript -->
            </div>
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
                <div class="section">
                    <div class="neumorph-3d rounded-3xl overflow-hidden neumorph-hover h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                                <i class="fas fa-image text-4xl text-gray-500"></i>
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-secondary opacity-20"></div>
                            @if($project->is_featured)
                            <div class="absolute top-4 right-4">
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full bg-white dark:bg-gray-800">Featured</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold">{{ $project->title }}</h3>
                                @if($project->project_date)
                                <span class="text-xs px-2 py-1 neumorph-btn rounded-full">
                                    {{ \Carbon\Carbon::parse($project->project_date)->format('Y') }}
                                </span>
                                @endif
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($project->description, 100) }}</p>

                            @if(!empty($project->technologies))
                            <div class="flex flex-wrap gap-2 mb-4">
                                @php
                                $techIds = is_string($project->technologies)
                                ? json_decode($project->technologies, true)
                                : $project->technologies;

                                $technologies = \App\Models\Technology::whereIn('id', $techIds)->get();
                                @endphp

                                @foreach($technologies as $tech)
                                <span class="text-xs px-3 py-1 neumorph-btn rounded-full">{{ $tech->name }}</span>
                                @endforeach
                            </div>
                            @endif



                            @if($project->client)
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <i class="fas fa-user mr-2"></i>
                                <span>Client: {{ $project->client }}</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-6 pt-0 flex justify-between items-center">
                            @if($project->case_study_url)
                            <a href="{{ $project->case_study_url }}" class="neumorph-btn px-4 py-2 text-sm font-medium inline-flex items-center hover:text-primary transition">
                                Case Study <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                            @endif
                            @if($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="text-sm text-primary hover:underline flex items-center">
                                Live Demo <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                            @endif
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
    <section id="testimonials" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">
                Client <span class="text-gradient">Testimonials</span>
            </h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">
                What people say about working with me
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($user->testimonials as $testimonial)
                <div class="section">
                    <div class="neumorph-3d p-8 rounded-3xl h-full">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 rounded-full overflow-hidden mr-4 neumorph">
                                @if($testimonial->client_avatar)
                                <img src="{{ asset('storage/' . $testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                                    <i class="fas fa-user text-xl text-gray-500"></i>
                                </div>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold">{{ $testimonial->client_name }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">
                                    {{ $testimonial->client_position }}
                                    @if($testimonial->client_company)
                                    , {{ $testimonial->client_company }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 mb-6">
                            <i class="fas fa-quote-left text-primary opacity-50 mr-2"></i>
                            {{ $testimonial->content }}
                            <i class="fas fa-quote-right text-primary opacity-50 ml-2"></i>
                        </div>
                        <div class="flex">
                            @for($i = 0; $i < 5; $i++) <i class="fas fa-star {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-gray-600 dark:text-gray-400 col-span-3 text-center">No testimonials added yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 section">Let's <span class="text-gradient">Connect</span></h2>
            <p class="text-center text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16 section">Get in touch for project inquiries or collaboration opportunities</p>

            <div class="grid md:grid-cols-2  gap-12">
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d rounded-3xl h-full p-8">
                        <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Email</h4>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                                    <a href="mailto:{{ $user->email }}" class="text-sm text-primary hover:underline">Send email</a>
                                </div>
                            </div>

                            @if($user->profile->phone)
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Phone</h4>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $user->profile->phone }}</p>
                                    <a href="tel:{{ $user->profile->phone }}" class="text-sm text-primary hover:underline">Call me</a>
                                </div>
                            </div>
                            @endif

                            @if($user->profile->location)
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <div class="w-12 h-12 neumorph-btn rounded-full flex items-center justify-center text-primary">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Location</h4>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $user->profile->location }}</p>
                                    <a href="https://maps.google.com?q={{ urlencode($user->profile->location) }}" target="_blank" class="text-sm text-primary hover:underline">View on map</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="mt-8">
                            <h4 class="font-bold mb-4">Follow Me</h4>
                            <div class="flex">
                                @if($user->profile->social_links)
                                @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                                @foreach($socialLinks as $platform => $url)
                                @if($url)
                                <a href="{{ $url }}" target="_blank" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition">
                                    <i class="fab fa-{{ $platform }}"></i>
                                </a>
                                @endif
                                @endforeach
                                @else
                                <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-github"></i></a>
                                <a href="#" class="neumorph-btn w-12 h-12 flex items-center justify-center hover:text-primary transition"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="transition-delay: 0.2s">
                    <div class="neumorph-3d p-8 rounded-3xl">
                        <h3 class="text-2xl font-bold mb-6">Send Me a Message</h3>
                        <form class="space-y-6" id="contactForm">
                            <div>
                                <label for="name" class="block mb-2 font-medium">Your Name</label>
                                <input type="text" id="name" class="w-full input-field px-4 py-3" placeholder="fulan fulanah" required>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 font-medium">Your Email</label>
                                <input type="email" id="email" class="w-full input-field px-4 py-3" placeholder="fulan@example.com" required>
                            </div>
                            <div>
                                <label for="subject" class="block mb-2 font-medium">Subject</label>
                                <select id="subject" class="w-full input-field px-4 py-3">
                                    <option value="">Select a subject</option>
                                    <option value="project">Project Inquiry</option>
                                    <option value="collaboration">Collaboration Opportunity</option>
                                    <option value="job">Job Offer</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block mb-2 font-medium">Message</label>
                                <textarea id="message" rows="5" class="w-full input-field px-4 py-3" placeholder="Tell me about your project..." required></textarea>
                            </div>
                            <button type="submit" class="w-full neumorph-btn px-6 py-3 font-medium text-white bg-gradient-to-br from-primary to-secondary hover:opacity-90 transition-all duration-300 rounded-xl">
                                Send Message
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
function showCertificateDetails(certificateId) {
    // In a real application, you would fetch the certificate details via AJAX
    // For now, we'll redirect to the certificate detail page
    window.location.href = `{{ url('/' . $user->name . '/certificates') }}/${certificateId}`;
}

function closeCertificateModal() {
    document.getElementById('certificateModal').classList.add('hidden');
}
document.getElementById('certificateModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeCertificateModal();
    }
});
    </script>
</body>
</html>
