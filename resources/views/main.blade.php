<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | {{ $user->name }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link rel="stylesheet" href="{{ asset('neo-main.css') }}"> --}}
    <link rel="icon" href="assets/logo.svg" type="image/png" />
<!-- 1. Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- 2. Panggil File CSS Secara Terpisah -->
    <link rel="stylesheet" href="{{ asset('styles/neo.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('neo-main.css') }}"> --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'g-blue': '#728AFF',
                        'g-red': '#FF4F51',
                        'g-yellow': '#FFDD00',
                        'g-green': '#6BBD42',
                        'g-cloud': '#F5F5F5',
                        'g-gray': '#8A8D90',
                        'g-purple': '#7C7D9A',
                        cream: '#FEF5E9',
                        paper: '#FFFFFF',
                        ink: '#000000'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif']
                    },
                    boxShadow: {
                        'nb': '6px 6px 0 #000000',
                        'nb-sm': '4px 4px 0 #000000',
                        'nb-lg': '10px 10px 0 #000000'
                    }
                }
            }
        }

    </script>
</head>
<body class="min-h-screen w-full bg-dot-pattern text-ink font-sans relative">

<!-- Decorative sticker shapes in the cream margin (xl+) -->
<div class="hidden xl:block pointer-events-none absolute top-[12%] -left-3 w-24 h-24 bg-g-green border-[3px] border-ink rounded-full rounded-tl-none -rotate-6 z-0"></div>
<div class="hidden xl:block pointer-events-none absolute top-[38%] -right-4 w-28 h-28 bg-g-purple border-[3px] border-ink rounded-full rounded-br-none rotate-6 z-0"></div>
<div class="hidden xl:block pointer-events-none absolute bottom-[18%] -left-4 w-20 h-20 bg-g-yellow border-[3px] border-ink rounded-full z-0"></div>
<div class="hidden xl:block pointer-events-none absolute bottom-[8%] -right-2 w-24 h-24 bg-g-gray border-[3px] border-ink rounded-full rounded-bl-none -rotate-12 z-0"></div>

<!-- Outer wrapper: page frame + floating tech stickers di LUAR frame -->
@php
    $stickerCdn = 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons';
    $marginStickers = [
        ['side' => 'left',  'top' => '6%',  'rot' => '-7deg', 'bg' => 'bg-white',      'img' => "$stickerCdn/html5/html5-original.svg",           'icon' => 'fab fa-html5',       'alt' => 'HTML5',      'delay' => '0s'],
        ['side' => 'right', 'top' => '13%', 'rot' => '6deg',  'bg' => 'bg-[#D6DDE7]',  'img' => "$stickerCdn/css3/css3-original.svg",             'icon' => 'fab fa-css3-alt',    'alt' => 'CSS3',       'delay' => '-1.2s'],
        ['side' => 'left',  'top' => '23%', 'rot' => '5deg',  'bg' => 'bg-[#FDE8D0]',  'img' => "$stickerCdn/javascript/javascript-original.svg",'icon' => 'fab fa-js',          'alt' => 'JavaScript', 'delay' => '-2.4s'],
        ['side' => 'right', 'top' => '31%', 'rot' => '-6deg', 'bg' => 'bg-[#DFE6D8]',  'img' => "$stickerCdn/php/php-original.svg",              'icon' => 'fab fa-php',         'alt' => 'PHP',        'delay' => '-0.6s'],
        ['side' => 'left',  'top' => '40%', 'rot' => '-5deg', 'bg' => 'bg-[#F4E0D9]',  'img' => "$stickerCdn/laravel/laravel-original.svg",      'icon' => 'fab fa-laravel',     'alt' => 'Laravel',    'delay' => '-3.1s'],
        ['side' => 'right', 'top' => '48%', 'rot' => '7deg',  'bg' => 'bg-white',      'img' => "$stickerCdn/python/python-original.svg",        'icon' => 'fab fa-python',      'alt' => 'Python',     'delay' => '-1.8s'],
        ['side' => 'left',  'top' => '56%', 'rot' => '6deg',  'bg' => 'bg-[#D6DDE7]',  'img' => "$stickerCdn/react/react-original.svg",          'icon' => 'fab fa-react',       'alt' => 'React',      'delay' => '-2.7s'],
        ['side' => 'right', 'top' => '63%', 'rot' => '-7deg', 'bg' => 'bg-[#DFE6D8]',  'img' => "$stickerCdn/vuejs/vuejs-original.svg",          'icon' => 'fab fa-vuejs',       'alt' => 'Vue.js',     'delay' => '-0.9s'],
        ['side' => 'left',  'top' => '70%', 'rot' => '-6deg', 'bg' => 'bg-[#FDE8D0]',  'img' => "$stickerCdn/nodejs/nodejs-original.svg",        'icon' => 'fab fa-node-js',     'alt' => 'Node.js',    'delay' => '-4s'],
        ['side' => 'right', 'top' => '76%', 'rot' => '5deg',  'bg' => 'bg-[#F4E0D9]',  'img' => "$stickerCdn/git/git-original.svg",              'icon' => 'fab fa-git-alt',     'alt' => 'Git',        'delay' => '-2s'],
        ['side' => 'left',  'top' => '84%', 'rot' => '7deg',  'bg' => 'bg-white',      'img' => "$stickerCdn/mysql/mysql-original.svg",          'icon' => 'fas fa-database',    'alt' => 'MySQL',      'delay' => '-1.4s'],
        ['side' => 'right', 'top' => '90%', 'rot' => '-5deg', 'bg' => 'bg-[#D6DDE7]',  'img' => "$stickerCdn/tailwindcss/tailwindcss-original.svg", 'icon' => 'fas fa-wind',    'alt' => 'Tailwind',   'delay' => '-3.4s'],
    ];
@endphp

<div class="relative mx-auto w-[calc(100%-1rem)] md:w-[calc(100%-4rem)] max-w-[1440px] my-2 md:my-6">

    @foreach($marginStickers as $st)
    <div class="hidden xl:flex items-center justify-center pointer-events-none absolute w-16 h-16 border-[3px] border-ink rounded-2xl shadow-nb z-0 float-sticker {{ $st['side'] === 'left' ? '-left-14' : '-right-14' }} {{ $st['bg'] }}"
         style="top: {{ $st['top'] }}; --r: {{ $st['rot'] }}; animation-delay: {{ $st['delay'] }};">
        @if($st['img'])
        <img src="{{ $st['img'] }}" alt="{{ $st['alt'] }}" loading="lazy" class="w-9 h-9 object-contain"
             onerror="this.outerHTML='<i class=\'{{ $st['icon'] }} text-2xl\'></i>'">
        @else
        <i class="{{ $st['icon'] }} text-2xl"></i>
        @endif
    </div>
    @endforeach

    <!-- Page frame -->
    <div class="relative w-full bg-white border-[3px] border-ink rounded-[28px] overflow-clip shadow-nb-lg z-10">

    @include('partials.navbar-neo')

    <!-- Hero Section -->
    <section id="home" class="nb-grid-bg relative min-h-[88vh] flex px-4 pt-12 pb-16 overflow-hidden">

        <!-- Reference-style decorative shapes -->
        <div class="absolute -left-16 top-1/3 w-44 h-44 bg-g-green border-[3px] border-ink rounded-full rounded-tl-none z-0 hidden md:block"></div>
        <div class="absolute -right-14 top-1/2 w-36 h-36 bg-g-gray border-[3px] border-ink rounded-full z-0 hidden md:block"></div>
        <div class="absolute right-10 -bottom-16 w-40 h-40 bg-g-yellow border-[3px] border-ink rounded-full rounded-bl-none z-0 hidden md:block"></div>
        <div class="absolute left-1/3 -bottom-10 w-16 h-16 bg-g-blue border-[3px] border-ink rounded-full z-0 hidden lg:block"></div>
        <div class="absolute left-10 top-24 w-14 h-14 bg-g-purple border-[3px] border-ink rounded-full rounded-br-none rotate-12 z-0 hidden lg:block"></div>

@php
    // Floating tech logos — hardcoded (di luar database)
    $deviconCdn = 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons';
    $floatingTech = [
        ['name' => 'Web',          'img' => null,                          'icon' => 'fas fa-globe'],
        ['name' => 'HTML5',        'img' => "$deviconCdn/html5/html5-original.svg",          'icon' => 'fab fa-html5'],
        ['name' => 'CSS3',         'img' => "$deviconCdn/css3/css3-original.svg",            'icon' => 'fab fa-css3-alt'],
        ['name' => 'JavaScript',   'img' => "$deviconCdn/javascript/javascript-original.svg",'icon' => 'fab fa-js'],
        ['name' => 'PHP',          'img' => "$deviconCdn/php/php-original.svg",              'icon' => 'fab fa-php'],
        ['name' => 'Laravel',      'img' => "$deviconCdn/laravel/laravel-original.svg",      'icon' => 'fab fa-laravel'],
        ['name' => 'Python',       'img' => "$deviconCdn/python/python-original.svg",        'icon' => 'fab fa-python'],
        ['name' => 'React',        'img' => "$deviconCdn/react/react-original.svg",          'icon' => 'fab fa-react'],
        ['name' => 'Vue.js',       'img' => "$deviconCdn/vuejs/vuejs-original.svg",          'icon' => 'fab fa-vuejs'],
        ['name' => 'Node.js',      'img' => "$deviconCdn/nodejs/nodejs-original.svg",        'icon' => 'fab fa-node-js'],
        ['name' => 'MySQL',        'img' => "$deviconCdn/mysql/mysql-original.svg",          'icon' => 'fas fa-database'],
        ['name' => 'Git',          'img' => "$deviconCdn/git/git-original.svg",              'icon' => 'fab fa-git-alt'],
        ['name' => 'Tailwind CSS', 'img' => "$deviconCdn/tailwindcss/tailwindcss-original.svg", 'icon' => 'fas fa-wind'],
        ['name' => 'Bootstrap',    'img' => "$deviconCdn/bootstrap/bootstrap-original.svg",  'icon' => 'fab fa-bootstrap'],
    ];
@endphp

<div class="skill-scroll-container absolute top-8 -right-5 -z-[100] -translate-y-1/2 rotate-[10deg]">
    <div class="skill-scroll-track skill-tilt-2">
        @foreach($floatingTech as $tech)
        <div class="skill-scroll-item skill-no-interaction">
            @if($tech['img'])
            <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="skill-scroll-img"
                 onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }} skill-scroll-icon\'></i>'">
            @else
            <i class="{{ $tech['icon'] }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $tech['name'] }}</span>
        </div>
        @endforeach

        <!-- Duplicate for seamless looping -->
        @foreach($floatingTech as $tech)
        <div class="skill-scroll-item skill-no-interaction">
            @if($tech['img'])
            <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="skill-scroll-img"
                 onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }} skill-scroll-icon\'></i>'">
            @else
            <i class="{{ $tech['icon'] }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $tech['name'] }}</span>
        </div>
        @endforeach
    </div>
</div>
<div class="skill-scroll-container absolute bottom-2 left-5 -z-[100] -translate-y-1/2 rotate-[5deg]">
    <div class="skill-scroll-track-right skill-tilt-2">
        @foreach($floatingTech as $tech)
        <div class="skill-scroll-item skill-no-interaction">
            @if($tech['img'])
            <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="skill-scroll-img"
                 onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }} skill-scroll-icon\'></i>'">
            @else
            <i class="{{ $tech['icon'] }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $tech['name'] }}</span>
        </div>
        @endforeach

        <!-- Duplicate for seamless looping -->
        @foreach($floatingTech as $tech)
        <div class="skill-scroll-item skill-no-interaction">
            @if($tech['img'])
            <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="skill-scroll-img"
                 onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }} skill-scroll-icon\'></i>'">
            @else
            <i class="{{ $tech['icon'] }} skill-scroll-icon"></i>
            @endif
            <span class="skill-scroll-name">{{ $tech['name'] }}</span>
        </div>
        @endforeach
    </div>
</div>
        <div class="max-w-6xl w-full mx-auto grid md:grid-cols-2 gap-12 relative z-10 items-stretch">
            <div class="section flex flex-col justify-center pb-20">
                <div class="mb-5">
                    <span class="nb-badge nb-sticker bg-g-green text-white border-ink"><span class="w-2.5 h-2.5 rounded-full bg-white"></span> Available for work</span>
                </div>
                <h1 class="font-display text-5xl md:text-7xl font-black uppercase tracking-tight mb-4 leading-[0.98]">Hi, I'm <br><span class="nb-marker normal-case">{{ $user->name }}</span></h1>
                <h2 class="text-xl md:text-2xl font-semibold mb-6 font-display">{{ optional($user->profile)->tagline ?? 'Embedded & Full Stack Developer' }}</h2>
                <p class="text-lg mb-8 text-gray-700 leading-relaxed max-w-lg">
                    {{ optional($user->profile)->hero_bio ?? 'I create beautiful, interactive web and embedded experiences that bridge the physical and digital worlds.' }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="nb-btn nb-btn-yellow">View My Work</a>
                    <a href="#contact" class="nb-btn">Hire Me</a>
                </div>
                <div class="mt-8 flex flex-wrap items-center gap-6">
                    <div class="flex gap-3">
                        @if(optional($user->profile)->social_links)
                        @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                        @foreach($socialLinks as $platform => $url)
                        @if($url)
                        <a href="{{ $url }}" target="_blank" class="nb-icon-box nb-ib-blue w-12 h-12 hover:bg-g-yellow hover:text-ink transition">
                            <i class="fab fa-{{ $platform }} text-xl"></i>
                        </a>
                        @endif
                        @endforeach
                        @endif
                    </div>
                    @if(optional($user->profile)->cv_path)
                    <a href="{{ asset('storage/' . $user->profile->cv_path) }}" download class="nb-btn text-sm">
                        <i class="fas fa-download"></i> Download CV
                    </a>
                    @endif
                </div>
            </div>
            <!-- Right: Profile Image (centered vertically) -->
            <div class="section flex items-center justify-center" style="transition-delay: 0.2s">
                <div class="relative hero-photo rotate-2 group">
                    <!-- Neo-brutal pentagon frame (point pointing down) -->
                    <div class="relative">
                        <div class="w-64 h-80 md:w-[24rem] md:h-[30rem] bg-ink"
                             style="clip-path: polygon(0 0, 100% 0, 100% 70%, 50% 100%, 0 70%);">
                            <div class="w-full h-full bg-g-gray overflow-hidden"
                                 style="margin: 3px; clip-path: polygon(0 0, 100% 0, 100% 70%, 50% 100%, 0 70%);">
                                <img src="{{ optional($user->profile)->avatar ? asset('storage/' . $user->profile->avatar) : asset('assets/main.jpg') }}"
                                     alt="Profile Photo"
                                     class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-110"
                                     onerror="this.onerror=null;this.src='{{ asset('assets/default-avatar.png') }}'">
                            </div>
                        </div>
                    </div>

                    <!-- Sticker decorations -->
                    <div class="absolute -top-5 -left-5 nb-badge nb-sticker bg-g-yellow text-ink">
                        <i class="fas fa-code"></i> Developer
                    </div>
                    <div class="absolute -bottom-5 -right-5 nb-badge nb-sticker-r bg-g-gray text-ink">
                        <i class="fas fa-microchip"></i> Embedded
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-4 bg-white border-y-[3px] border-ink relative overflow-hidden">
        <!-- Grid lines ala hero di atas bg cloud -->
        <div class="absolute inset-0 nb-grid-lines pointer-events-none"></div>

        <!-- Decorative shapes (hero-style, konfigurasi beda) -->
        <div class="absolute -left-12 top-20 w-28 h-28 bg-g-purple border-[3px] border-ink rounded-full rounded-br-none -rotate-6 z-0 hidden md:block"></div>
        <div class="absolute -right-10 top-1/3 w-24 h-24 bg-g-red border-[3px] border-ink rounded-full rounded-tl-none rotate-6 z-0 hidden md:block"></div>
        <div class="absolute right-20 -bottom-14 w-32 h-32 bg-g-green border-[3px] border-ink rounded-full rounded-bl-none z-0 hidden lg:block"></div>
        <div class="absolute left-1/4 -bottom-8 w-16 h-16 bg-g-yellow border-[3px] border-ink rounded-full z-0 hidden lg:block"></div>

        <div class="max-w-6xl mx-auto relative z-10">
            <!-- Header ala hero: badge chip + judul besar uppercase + subtitle -->
            <div class="text-center mb-16 section">
                <h2 class="font-display text-4xl md:text-6xl font-black uppercase tracking-tight mb-4">About <span class="nb-marker">Me</span></h2>
                <p class="text-gray-700 max-w-2xl mx-auto">{{ optional($user->profile)->title ?? 'Get to know the person behind the code' }}</p>
            </div>

            <div class="grid md:grid-row-2 gap-12 items-center">
                <div class="section relative" style="transition-delay: 0.1s">
                    <!-- Sticker sudut kartu -->
                    <span class="absolute -top-4 -right-3 nb-badge nb-sticker-r bg-g-red text-white z-10"><i class="fas fa-hand-sparkles"></i> Hi there!</span>
                    <div class="relative bg-white border-[3px] border-ink rounded-[26px] rounded-tr-none shadow-nb overflow-hidden -rotate-1 hover:rotate-0 hover:-translate-y-1.5 hover:shadow-nb-lg transition duration-300">
                        <!-- Header band -->
                        <div class="flex items-center gap-4 p-5 md:p-6 bg-[#D6DDE7] border-b-[3px] border-ink">
                            <div class="nb-icon-box nb-ib-blue w-14 h-14 shrink-0">
                                <i class="fas fa-user-astronaut text-2xl"></i>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-display text-2xl font-bold">About Me</h3>
                                <p class="text-sm text-gray-600 truncate">{{ optional($user->profile)->tagline ?? 'Embedded & Full Stack Developer' }}</p>
                            </div>
                            <span class="ml-auto nb-badge bg-g-yellow hidden sm:inline-flex shrink-0"><i class="fas fa-code"></i> Developer</span>
                        </div>

                        <div class="p-5 md:p-7">
                            <!-- Foto di samping quote -->
                            <div class="grid sm:grid-cols-[13rem_1fr] gap-5 items-center mb-6">
                                <div class="relative w-40 sm:w-full mx-auto sm:mx-0 -rotate-2" style="filter: drop-shadow(6px 6px 0 #000);">
                                    <div class="border-[3px] border-ink rounded-[20px] rounded-br-none overflow-hidden bg-white h-48">
                                        <img src="{{ optional($user->profile)->avatar ? asset('storage/' . $user->profile->avatar) : asset('assets/main.jpg') }}"
                                             alt="{{ $user->name }}"
                                             class="w-full h-full object-cover object-top"
                                             onerror="this.onerror=null;this.src='{{ asset('assets/default-avatar.png') }}'">
                                    </div>
                                    <span class="absolute -bottom-3.5 left-2 nb-badge nb-sticker bg-g-green text-white text-[10px]"><i class="fas fa-camera"></i> That's me</span>
                                </div>

                                <div class="nb-press p-5 md:p-6 relative">
                                    <i class="fas fa-quote-left text-g-yellow text-3xl absolute top-4 left-4"></i>
                                    <p class="text-gray-700 leading-relaxed relative z-10 pl-6 pt-2 text-base">
                                        {{ optional($user->profile)->bio ?? "Hi! I'm a passionate developer who blends embedded systems and modern web technologies to build seamless full-stack experiences. From microcontrollers to cloud APIs, I love crafting solutions that are both technically robust and visually compelling." }}
                                    </p>
                                    <i class="fas fa-quote-right text-g-yellow text-3xl absolute bottom-4 right-4"></i>

                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="neumorph-btn p-4 flex items-center gap-3 bg-white">
                                    <div class="nb-icon-box nb-ib-blue w-10 h-10 shrink-0">
                                        <i class="fas fa-id-card text-sm"></i>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-0.5 font-bold">Name</h4>
                                        <p class="font-semibold text-sm truncate">{{ $user->name }}</p>
                                    </div>
                                </div>
                                <div class="neumorph-btn p-4 flex items-center gap-3 bg-white">
                                    <div class="nb-icon-box nb-ib-yellow w-10 h-10 shrink-0">
                                        <i class="fas fa-envelope text-sm"></i>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-0.5 font-bold">Email</h4>
                                        <p class="font-semibold text-sm truncate">{{ $user->email }}</p>
                                    </div>
                                </div>
                                @if(optional($user->profile)->phone)
                                <div class="neumorph-btn p-4 flex items-center gap-3 bg-white">
                                    <div class="nb-icon-box nb-ib-green w-10 h-10 shrink-0">
                                        <i class="fas fa-phone-alt text-sm"></i>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-0.5 font-bold">Phone</h4>
                                        <p class="font-semibold text-sm truncate">{{ $user->profile->phone }}</p>
                                    </div>
                                </div>
                                @endif
                                @if(optional($user->profile)->location)
                                <div class="neumorph-btn p-4 flex items-center gap-3 bg-white">
                                    <div class="nb-icon-box nb-ib-red w-10 h-10 shrink-0">
                                        <i class="fas fa-map-marker-alt text-sm"></i>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-0.5 font-bold">Location</h4>
                                        <p class="font-semibold text-sm truncate">{{ $user->profile->location }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative mt-10 journey-section nb-grid-bg bg-white border-[3px] border-ink rounded-[24px] shadow-nb px-4 md:px-8 py-8">
                    <h3 class="font-display text-2xl font-bold mb-10 text-center">Professional <span class="nb-marker">Journey</span></h3>

                    <!-- Timeline container: single col on mobile, zig-zag on md+ -->
                    <div class="relative">
                        <!-- Center line — animated dashed scrolling upward (md+ only) -->
                        <div class="hidden md:block absolute left-1/2 inset-y-0 -translate-x-1/2 overflow-hidden" style="width:4px;">
                            <div class="timeline-dash-line w-full"></div>
                        </div>

                        @forelse($user->experiences as $index => $experience)
                        <div class="timeline-item mb-8 flex flex-col md:flex-row md:items-center w-full
                            {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                            data-delay="{{ $index * 150 }}">

                            <!-- Card -->
                            <div class="w-full md:w-[calc(50%-2rem)] {{ $index % 2 == 0 ? 'md:mr-3 tl-slide-left' : 'md:ml-3 tl-slide-right' }}">
                                <div class="neumorph-3d p-5 bg-white transition-transform duration-300 hover:-translate-y-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="nb-icon-box nb-ib-blue w-9 h-9 shrink-0">
                                            <i class="fas fa-briefcase text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-base leading-tight">{{ $experience->position }}</h4>
                                            <p class="text-g-blue text-xs font-bold">{{ $experience->company }}</p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-600 mb-2 flex items-center gap-1">
                                        <i class="fas fa-calendar text-gray-400"></i>
                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} —
                                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                        @if($experience->is_current ?? false)
                                        <span class="ml-1 nb-badge nb-badge-green text-[10px] py-0 px-2">Current</span>
                                        @endif
                                    </p>
                                    @if($experience->description)
                                    <p class="text-sm text-gray-700 leading-relaxed">{{ $experience->description }}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Center dot — only md+ -->
                            <div class="hidden md:flex relative w-10 h-10 items-center justify-center shrink-0 z-10">
                                <div class="relative w-10 h-10 bg-g-blue border-[3px] border-ink rounded-full flex items-center justify-center text-white shadow-nb-sm">
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
                <div class="relative mt-16 nb-grid-bg bg-white border-[3px] border-ink rounded-[24px] shadow-nb px-4 md:px-8 py-8">
                    <h3 class="font-display text-2xl font-bold mb-10 text-center">Education <span class="nb-marker">Journey</span></h3>

                    <div class="relative">
                        <!-- Dashed scrolling line (md+) -->
                        <div class="hidden md:block absolute left-1/2 inset-y-0 -translate-x-1/2 overflow-hidden" style="width:4px;">
                            <div class="edu-dash-line w-full"></div>
                        </div>

                        @forelse($user->educations as $index => $education)
                        <div class="edu-timeline-item mb-8 flex flex-col md:flex-row md:items-center w-full
                            {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}"
                            data-delay="{{ $index * 150 }}">

                            <!-- Card -->
                            <div class="w-full md:w-[calc(50%-2rem)] {{ $index % 2 == 0 ? 'md:mr-3 edu-slide-left' : 'md:ml-3 edu-slide-right' }}">
                                <div class="neumorph-3d p-5 bg-white transition-transform duration-300 hover:-translate-y-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        @if($education->logo_url)
                                        <div class="w-12 h-12 shrink-0 rounded-xl border-2 border-ink bg-white overflow-hidden flex items-center justify-center shadow-nb-sm">
                                            <img src="{{ $education->logo_url }}"
                                                 alt="{{ $education->institution }} Logo"
                                                 class="w-full h-full object-contain p-1.5"
                                                 onerror="this.parentElement.innerHTML='<i class=\'fas fa-graduation-cap text-xl text-g-green\'></i>'">
                                        </div>
                                        @else
                                        <div class="nb-icon-box nb-ib-green w-12 h-12 shrink-0">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        @endif
                                        <div>
                                            <h4 class="font-bold text-base leading-tight">{{ $education->degree }}</h4>
                                            <p class="text-g-green text-xs font-bold">{{ $education->institution }}</p>
                                        </div>
                                    </div>
                                    @if($education->field_of_study)
                                    <p class="text-xs text-gray-600 mb-2 flex items-center gap-1">
                                        <i class="fas fa-book text-gray-400"></i>
                                        {{ $education->field_of_study }}
                                    </p>
                                    @endif
                                    @if($education->gpa)
                                    <div class="inline-flex items-center gap-1.5 mb-2 px-2.5 py-1 nb-badge nb-badge-yellow text-[10px]">
                                        <i class="fas fa-star text-xs"></i>
                                        IPK {{ number_format($education->gpa, 2) }}
                                        <span class="opacity-60 font-normal">/ {{ number_format($education->gpa_max ?? 4.00, 2) }}</span>
                                    </div>
                                    @endif
                                    <p class="text-xs text-gray-600 flex items-center gap-1">
                                        <i class="fas fa-calendar text-gray-400"></i>
                                        {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }}
                                        —
                                        {{ \Carbon\Carbon::parse($education->end_date)->format('Y') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Center dot (md+) -->
                            <div class="hidden md:flex relative w-10 h-10 items-center justify-center shrink-0 z-10">
                                <div class="relative w-10 h-10 bg-g-green border-[3px] border-ink rounded-full flex items-center justify-center text-white shadow-nb-sm">
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
            <h2 class="font-display text-3xl md:text-5xl font-bold text-center mb-4 section">My <span class="nb-marker">Expertise</span></h2>
            <p class="text-center text-gray-700 max-w-2xl mx-auto mb-12 section">Technologies I work with and interactive services I deliver</p>

            @php
                $skillsByCategory = $user->skills->groupBy('category');
                $categoryLabels = [
                    'embedded' => ['label' => 'Embedded & IoT', 'icon' => 'fa-microchip', 'color' => 'nb-ib-red'],
                    'mobile'   => ['label' => 'Mobile Dev', 'icon' => 'fa-mobile-alt', 'color' => 'nb-ib-green'],
                    'frontend' => ['label' => 'Frontend', 'icon' => 'fa-paint-brush', 'color' => 'nb-ib-yellow'],
                    'backend'  => ['label' => 'Backend', 'icon' => 'fa-server', 'color' => 'nb-ib-blue'],
                    'database' => ['label' => 'Database', 'icon' => 'fa-database', 'color' => 'nb-ib-green'],
                    'design'   => ['label' => 'Design', 'icon' => 'fa-pen-nib', 'color' => 'nb-ib-red'],
                    'tool'     => ['label' => 'Tools & DevOps', 'icon' => 'fa-tools', 'color' => 'nb-ib-yellow'],
                ];

                // Logo image mapping (keyed by lowercase skill name) — fallback: font icon
                $devicon = 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons';
                $simple  = 'https://cdn.simpleicons.org';
                $skillLogos = [
                    'php'              => "$devicon/php/php-original.svg",
                    'laravel'          => "$devicon/laravel/laravel-original.svg",
                    'python'           => "$devicon/python/python-original.svg",
                    'mysql'            => "$devicon/mysql/mysql-original.svg",
                    'firebase'         => "$devicon/firebase/firebase-original.svg",
                    'html5'            => "$devicon/html5/html5-original.svg",
                    'css3'             => "$devicon/css3/css3-original.svg",
                    'javascript'       => "$devicon/javascript/javascript-original.svg",
                    'react.js'         => "$devicon/react/react-original.svg",
                    'react native'     => "$devicon/react/react-original.svg",
                    'vue.js'           => "$devicon/vuejs/vuejs-original.svg",
                    'tailwind css'     => "$devicon/tailwindcss/tailwindcss-original.svg",
                    'bootstrap'        => "$devicon/bootstrap/bootstrap-original.svg",
                    'flutter'          => "$devicon/flutter/flutter-original.svg",
                    'android (kotlin)' => "$devicon/android/android-original.svg",
                    'arduino'          => "$simple/arduino",
                    'raspberry pi'     => "$devicon/raspberrypi/raspberrypi-original.svg",
                    'esp32'            => "$simple/espressif",
                    'esp8266'          => "$simple/espressif",
                    'stm32'            => "$simple/stmicroelectronics",
                ];
            @endphp

            <!-- Technical Skills - Interactive Filter Tabs & Modern Grid -->
            <div class="section mb-16" style="transition-delay: 0.1s">
                <div class="neumorph-3d p-6 md:p-8 bg-white">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b-2 border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="nb-icon-box nb-ib-blue w-12 h-12">
                                <i class="fas fa-layer-group text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-display text-2xl font-bold">Technical Skills</h3>
                                <p class="text-xs text-gray-500">Filter berdasarkan kategori atau jelajahi penguasaan teknologi</p>
                            </div>
                        </div>

                        <!-- Skill Category Filter Buttons -->
                        <div class="flex flex-wrap gap-2" id="skillFilters">
                            <button onclick="filterSkillCards('all', this)" 
                                    class="skill-filter-btn px-3.5 py-1.5 rounded-xl text-xs font-bold border-2 border-ink bg-ink text-white shadow-nb-sm transition">
                                Semua ({{ $user->skills->count() }})
                            </button>
                            @foreach($skillsByCategory as $category => $items)
                                @php $catMeta = $categoryLabels[$category] ?? ['label' => ucfirst($category), 'icon' => 'fa-code']; @endphp
                                <button onclick="filterSkillCards('{{ $category }}', this)" 
                                        class="skill-filter-btn px-3.5 py-1.5 rounded-xl text-xs font-bold border-2 border-ink bg-white text-ink hover:bg-gray-100 transition flex items-center gap-1.5">
                                    <i class="fas {{ $catMeta['icon'] }} text-[11px]"></i>
                                    <span>{{ $catMeta['label'] }}</span>
                                    <span class="text-[10px] opacity-70">({{ $items->count() }})</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    @if($user->skills->isEmpty())
                        <p class="text-gray-500 text-center py-8">Belum ada skill yang ditambahkan.</p>
                    @else
                        <!-- Skills Cards Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="skillGrid">
                            @foreach($user->skills as $skill)
                                @php
                                    $catMeta = $categoryLabels[$skill->category] ?? ['label' => ucfirst($skill->category), 'color' => 'nb-ib-blue', 'icon' => 'fa-code'];
                                    $skillLogo = $skill->image ?: ($skillLogos[trim(strtolower($skill->name))] ?? null);
                                    
                                    // Mastery tier from Enum (SkillLevel)
                                    $tier = $skill->level_label;
                                    $tierColor = $skill->level_badge_class;
                                    $progressColor = $skill->level_progress_color;
                                @endphp
                                <div class="skill-card-neo p-4 flex flex-col justify-between group hover:-translate-y-1 transition duration-200" 
                                     data-category="{{ $skill->category }}">
                                    <div>
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="w-10 h-10 rounded-xl border-2 border-ink flex items-center justify-center bg-gray-50 group-hover:bg-amber-50 group-hover:rotate-6 transition duration-300">
                                                @if($skillLogo)
                                                    <img src="{{ $skillLogo }}" alt="{{ $skill->name }}" class="w-6 h-6 object-contain" loading="lazy">
                                                @elseif($skill->icon)
                                                    <i class="{{ $skill->icon }} text-lg text-g-blue"></i>
                                                @else
                                                    <i class="fas fa-terminal text-lg text-ink"></i>
                                                @endif
                                            </div>
                                            <span class="text-[10px] font-black uppercase px-2 py-0.5 rounded-md border border-ink {{ $tierColor }}">
                                                {{ $tier }}
                                            </span>
                                        </div>

                                        <h4 class="font-bold text-base text-ink mb-1 group-hover:text-g-blue transition">{{ $skill->name }}</h4>
                                        <p class="text-[11px] text-gray-500 uppercase tracking-wider font-semibold mb-3">
                                            {{ $catMeta['label'] }}
                                        </p>
                                    </div>

                                    {{-- <div>
                                        <div class="flex justify-between items-center text-xs font-bold mb-1.5">
                                            <span class="text-gray-600">Proficiency</span>
                                            <span class="font-mono text-ink">{{ $skill->percentage }}%</span>
                                        </div>
                                        <div class="w-full h-2.5 rounded-full border border-ink bg-gray-100 overflow-hidden p-[1px]">
                                            <div class="h-full rounded-full {{ $progressColor }} transition-all duration-700 skill-progress-fill" 
                                                 style="width: {{ $skill->percentage }}%"></div>
                                        </div>
                                    </div> --}}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
<!-- Scrolling Tech Stack -->
    <div class="scrolling-text-container section">
        <div class="scrolling-text-track">
            @foreach($floatingTech as $tech)
            <div class="scrolling-text">
                @if($tech['img'])
                <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="scrolling-text-img"
                     onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }}\'></i>'">
                @else
                <i class="{{ $tech['icon'] }}"></i>
                @endif
            </div>
            @endforeach
            <!-- Duplicate for seamless looping -->
            @foreach($floatingTech as $tech)
            <div class="scrolling-text">
                @if($tech['img'])
                <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="scrolling-text-img"
                     onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }}\'></i>'">
                @else
                <i class="{{ $tech['icon'] }}"></i>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Services & Capabilities - UIVERSE 3D FLIP CARD WITH HERO-STYLE GRID BACKGROUND -->
    <section id="services" class="nb-grid-bg nb-grid-bg-full py-24 px-4 border-t-[3px] border-ink relative overflow-hidden">
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center mb-14 section">
                <h3 class="font-display text-3xl md:text-5xl font-bold">Services & <span class="nb-marker">Capabilities</span></h3>
                <p class="text-gray-700 text-sm md:text-base max-w-xl mx-auto mt-3">
                    Arahkan kursor (hover) atau sentuh kartu untuk melihat detail kemampuan & spesifikasi layanan
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 section" style="transition-delay: 0.15s">
                @forelse($user->services as $index => $service)
                    @php
                        $cardThemes = ['', 'flip-card-blue', 'flip-card-green', 'flip-card-yellow'];
                        $themeClass = $cardThemes[$index % 4];
                    @endphp
                    <div class="flip-card {{ $themeClass }}" onclick="this.classList.toggle('flipped')">
                        <div class="flip-card-inner">
                            <!-- FRONT -->
                            <div class="flip-card-front">
                                <div class="w-full flex items-center justify-between mb-2">
                                    <span class="text-[11px] font-black tracking-widest opacity-80 uppercase">
                                        #{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} SERVICE
                                    </span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-current opacity-70"></span>
                                </div>

                                <div class="my-auto py-2">
                                    <div class="w-16 h-16 rounded-2xl border-2 border-ink bg-white/90 text-ink mx-auto flex items-center justify-center text-2xl shadow-nb-sm mb-4">
                                        @if($service->icon)
                                            <i class="{{ $service->icon }}"></i>
                                        @else
                                            <i class="fas fa-laptop-code"></i>
                                        @endif
                                    </div>
                                    <h4 class="title font-display text-xl md:text-2xl font-black mb-2 px-2">
                                        {{ $service->title }}
                                    </h4>
                                </div>

                                <div class="mt-auto text-[11px] font-black uppercase tracking-wider flex items-center gap-1.5 opacity-80">
                                    <i class="fas fa-sync-alt text-[10px]"></i> Hover / Tap to Flip
                                </div>
                            </div>

                            <!-- BACK -->
                            <div class="flip-card-back">
                                <div class="w-full flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-2">
                                        <i class="{{ $service->icon ?: 'fas fa-check-circle' }} text-sm"></i>
                                        <span class="text-xs font-black uppercase tracking-wider">Overview</span>
                                    </div>
                                    <i class="fas fa-undo-alt text-xs opacity-75"></i>
                                </div>

                                <div class="my-auto overflow-y-auto px-1 py-2 max-h-48 text-left">
                                    <h5 class="font-bold text-sm mb-1.5 leading-snug drop-shadow-sm">{{ $service->title }}</h5>
                                    <p class="text-xs leading-relaxed opacity-95">
                                        {{ $service->description }}
                                    </p>
                                </div>

                                <div class="mt-auto w-full pt-2">
                                    <a href="#contact" class="nb-btn text-xs py-2 px-4 w-full bg-white text-ink font-black rounded-xl block text-center shadow-nb-sm hover:bg-yellow-300 transition">
                                        Discuss Project →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-12">
                        <p class="text-gray-500">Belum ada layanan yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Scrolling Tech Stack -->
    <div class="scrolling-text-container section">
        <div class="scrolling-text-track">
            @foreach($floatingTech as $tech)
            <div class="scrolling-text">
                @if($tech['img'])
                <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="scrolling-text-img"
                     onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }}\'></i>'">
                @else
                <i class="{{ $tech['icon'] }}"></i>
                @endif
            </div>
            @endforeach
            <!-- Duplicate for seamless looping -->
            @foreach($floatingTech as $tech)
            <div class="scrolling-text">
                @if($tech['img'])
                <img src="{{ $tech['img'] }}" alt="{{ $tech['name'] }}" loading="lazy" class="scrolling-text-img"
                     onerror="this.outerHTML='<i class=\'{{ $tech['icon'] }}\'></i>'">
                @else
                <i class="{{ $tech['icon'] }}"></i>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Achievements & Speaker Section -->
    <section id="achievements" class="py-20 px-4 bg-white border-y-[3px] border-ink">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-display text-3xl md:text-5xl font-bold text-center mb-4 section">
                My <span class="nb-marker">Achievements & Speaking</span>
            </h2>
            <p class="text-center text-gray-700 max-w-2xl mx-auto mb-10 section">
                Sertifikat sebagai pemateri/speaker, prestasi lomba & hackathon, serta pengakuan kompetensi profesional.
            </p>

            @php
                $speakerCount = $user->achievements->where('category', 'speaker')->count();
                $compCount    = $user->achievements->where('category', 'competition')->count();
                $certCount    = $user->achievements->where('category', 'certification')->count() + $user->certificates->count();
                $awardCount   = $user->achievements->where('category', 'award')->count();
                $totalCount   = $user->achievements->count() + $user->certificates->count();
            @endphp

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-2 mb-12 section" id="achievementFilters">
                <button onclick="filterAchievements('all', this)" 
                        class="achievement-tab-btn px-4 py-2 rounded-xl text-xs font-bold border-2 border-ink bg-ink text-white shadow-nb-sm transition flex items-center gap-2">
                    <i class="fas fa-th-large"></i> Semua ({{ $totalCount }})
                </button>
                <button onclick="filterAchievements('speaker', this)" 
                        class="achievement-tab-btn px-4 py-2 rounded-xl text-xs font-bold border-2 border-ink bg-white text-ink hover:bg-purple-50 transition flex items-center gap-2">
                    <i class="fas fa-microphone-alt text-purple-600"></i> Speaker & Pemateri ({{ $speakerCount }})
                </button>
                <button onclick="filterAchievements('competition', this)" 
                        class="achievement-tab-btn px-4 py-2 rounded-xl text-xs font-bold border-2 border-ink bg-white text-ink hover:bg-amber-50 transition flex items-center gap-2">
                    <i class="fas fa-trophy text-amber-500"></i> Kompetisi & Lomba ({{ $compCount }})
                </button>
                <button onclick="filterAchievements('certification', this)" 
                        class="achievement-tab-btn px-4 py-2 rounded-xl text-xs font-bold border-2 border-ink bg-white text-ink hover:bg-blue-50 transition flex items-center gap-2">
                    <i class="fas fa-certificate text-blue-500"></i> Sertifikasi ({{ $certCount }})
                </button>
                @if($awardCount > 0)
                <button onclick="filterAchievements('award', this)" 
                        class="achievement-tab-btn px-4 py-2 rounded-xl text-xs font-bold border-2 border-ink bg-white text-ink hover:bg-emerald-50 transition flex items-center gap-2">
                    <i class="fas fa-medal text-emerald-500"></i> Penghargaan ({{ $awardCount }})
                </button>
                @endif
            </div>

            <!-- Achievements & Certificates Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="achievementGrid">
                <!-- Achievements (Speaker, Competition, Award, etc) -->
                @foreach($user->achievements as $achievement)
                    @php
                        $cover = $achievement->certificate_image 
                            ?: (($achievement->photos && count($achievement->photos)) ? $achievement->photos[0] : null);
                        
                        $modalData = [
                            'title'        => $achievement->title,
                            'category'     => $achievement->category,
                            'category_label' => $achievement->category_label,
                            'organizer'    => $achievement->organizer,
                            'result'       => $achievement->result,
                            'event_date'   => $achievement->event_date ? $achievement->event_date->format('d F Y') : null,
                            'description'  => $achievement->description,
                            'certificate'  => $achievement->certificate_image ? asset('storage/' . $achievement->certificate_image) : null,
                            'photos'       => array_map(fn($p) => asset('storage/' . $p), $achievement->photos ?? []),
                        ];

                        $catBadgeClass = match($achievement->category) {
                            'speaker'     => 'bg-purple-600 text-white',
                            'competition' => 'bg-amber-400 text-ink',
                            'certification' => 'bg-g-blue text-white',
                            'award'       => 'bg-g-green text-white',
                            default       => 'bg-ink text-white',
                        };
                    @endphp
                    <div class="section cursor-pointer achievement-card-item" 
                         data-category="{{ $achievement->category }}"
                         onclick="openAchievementModal(this)" 
                         data-achievement="{{ json_encode($modalData) }}">
                        <div class="neumorph-3d overflow-hidden neumorph-hover h-full flex flex-col bg-white">
                            <!-- Image / Cover area -->
                            <div class="relative h-52 overflow-hidden bg-white border-b-[3px] border-ink">
                                @if($cover)
                                    <img src="{{ asset('storage/' . $cover) }}" alt="{{ $achievement->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                        <i class="fas {{ $achievement->category_icon }} text-6xl text-gray-300"></i>
                                    </div>
                                @endif

                                <!-- Category Badge -->
                                <div class="absolute top-3 left-3">
                                    <span class="nb-badge {{ $catBadgeClass }} font-bold text-xs flex items-center gap-1.5 shadow-sm">
                                        <i class="fas {{ $achievement->category_icon }}"></i>
                                        {{ $achievement->category_label }}
                                    </span>
                                </div>

                                <!-- Photo Count / Certificate Indicator -->
                                <div class="absolute bottom-3 right-3 flex items-center gap-1.5">
                                    @if($achievement->photos && count($achievement->photos))
                                        <span class="nb-badge bg-black/80 text-white text-[11px]">
                                            <i class="fas fa-camera mr-1"></i> {{ count($achievement->photos) }} Foto
                                        </span>
                                    @endif
                                </div>

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-ink/70 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white font-bold flex items-center gap-2 text-sm nb-badge bg-white text-ink">
                                        <i class="fas fa-expand"></i> Lihat Detail & Dokumentasi
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="font-display text-lg font-bold mb-1.5 line-clamp-2">{{ $achievement->title }}</h3>
                                    
                                    @if($achievement->organizer)
                                        <p class="text-g-blue text-sm font-semibold mb-2 flex items-center gap-1.5">
                                            <i class="fas fa-building text-xs"></i>
                                            <span>{{ $achievement->organizer }}</span>
                                        </p>
                                    @endif

                                    <div class="flex flex-wrap gap-2 mb-3">
                                        @if($achievement->result)
                                            <span class="nb-badge {{ $achievement->category === 'speaker' ? 'bg-purple-100 text-purple-900 border-purple-300' : 'nb-badge-yellow' }} text-xs font-bold">
                                                @if($achievement->category === 'speaker')
                                                    <i class="fas fa-microphone-alt mr-1"></i>{{ $achievement->result }}
                                                @else
                                                    🏆 {{ $achievement->result }}
                                                @endif
                                            </span>
                                        @endif
                                        @if($achievement->event_date)
                                            <span class="text-xs text-gray-600 flex items-center gap-1 font-medium">
                                                <i class="fas fa-calendar-alt text-gray-400"></i>
                                                {{ $achievement->event_date->format('M Y') }}
                                            </span>
                                        @endif
                                    </div>

                                    @if($achievement->description)
                                        <p class="text-gray-600 text-xs line-clamp-2 leading-relaxed mb-4">
                                            {{ $achievement->description }}
                                        </p>
                                    @endif
                                </div>

                                <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500 font-semibold">
                                    <span class="flex items-center gap-1 text-primary">
                                        <i class="fas fa-external-link-alt text-xs"></i> Detail Selengkapnya
                                    </span>
                                    @if($achievement->certificate_image)
                                        <span class="text-g-green font-bold"><i class="fas fa-check-circle"></i> Ada Sertifikat</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Existing Certificates (Preserved under Certification category) -->
                @foreach($user->certificates as $certificate)
                    @php
                        $certData = [
                            'title'          => $certificate->title,
                            'category'       => 'certification',
                            'category_label' => 'Sertifikasi Profesional',
                            'organizer'      => $certificate->issuer,
                            'result'         => 'Certified',
                            'event_date'     => $certificate->issue_date ? \Carbon\Carbon::parse($certificate->issue_date)->format('d F Y') : null,
                            'description'    => $certificate->description,
                            'certificate'    => $certificate->image ? asset('storage/'.$certificate->image) : null,
                            'credential_id'  => $certificate->credential_id,
                            'credential_url' => $certificate->credential_url,
                            'photos'         => [],
                        ];
                    @endphp
                    <div class="section cursor-pointer achievement-card-item" 
                         data-category="certification"
                         onclick="openAchievementModal(this)" 
                         data-achievement="{{ json_encode($certData) }}">
                        <div class="neumorph-3d overflow-hidden neumorph-hover h-full flex flex-col bg-white">
                            <!-- Image area -->
                            <div class="relative h-52 overflow-hidden bg-white border-b-[3px] border-ink">
                                @if($certificate->image)
                                    <img src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-certificate text-6xl text-g-blue"></i>
                                    </div>
                                @endif
                                <div class="absolute top-3 left-3">
                                    <span class="nb-badge bg-g-blue text-white font-bold text-xs">
                                        <i class="fas fa-certificate"></i> Sertifikasi
                                    </span>
                                </div>
                                <div class="absolute inset-0 bg-g-blue/90 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white font-bold flex items-center gap-2 text-sm nb-badge bg-white text-ink">
                                        <i class="fas fa-expand"></i> View Certificate
                                    </span>
                                </div>
                            </div>

                            <div class="p-5 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="font-display text-lg font-bold mb-1 line-clamp-2">{{ $certificate->title }}</h3>
                                    <p class="text-g-blue text-sm font-semibold mb-2">{{ $certificate->issuer }}</p>
                                    @if($certificate->issue_date)
                                        <p class="text-xs text-gray-600 mb-2">
                                            <i class="fas fa-calendar mr-1"></i>
                                            {{ \Carbon\Carbon::parse($certificate->issue_date)->format('M Y') }}
                                            @if($certificate->expiry_date)
                                                — {{ \Carbon\Carbon::parse($certificate->expiry_date)->format('M Y') }}
                                            @endif
                                        </p>
                                    @endif
                                    @if($certificate->description)
                                        <p class="text-gray-600 text-xs line-clamp-2">{{ $certificate->description }}</p>
                                    @endif
                                </div>
                                <div class="pt-3 border-t border-gray-100 flex items-center gap-2 text-xs text-gray-500 font-semibold">
                                    <i class="fas fa-mouse-pointer text-g-yellow"></i>
                                    <span>Klik untuk melihat sertifikat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($user->achievements->isEmpty() && $user->certificates->isEmpty())
                <div class="text-center py-12">
                    <div class="neumorph-3d p-8 inline-block bg-white">
                        <i class="fas fa-trophy text-6xl text-gray-400 mb-4"></i>
                        <h3 class="font-display text-xl font-semibold mb-2">Belum ada achievement atau sertifikat</h3>
                        <p class="text-sm text-gray-500">Data dapat ditambahkan melalui panel admin.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- ═══ ACHIEVEMENT & SPEAKER DETAIL MODAL ═══ -->
    <div id="achievementModal" class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden p-4" onclick="if(event.target===this)closeAchievementModal()">
        <div class="w-full max-w-3xl max-h-[92vh] overflow-y-auto relative bg-white rounded-3xl" onclick="event.stopPropagation()">
            <button onclick="closeAchievementModal()" class="absolute top-4 right-4 neumorph-btn w-10 h-10 rounded-full flex items-center justify-center hover:bg-g-red hover:text-white transition z-20 bg-white shadow-md">
                <i class="fas fa-times"></i>
            </button>
            <div id="achievementModalContent" class="p-0">
                <!-- Populated by JS -->
            </div>
        </div>
    </div>

    <!-- ═══ PROJECT DETAIL MODAL ═══ -->
    <div id="projectModal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden p-4" onclick="if(event.target===this)closeProjectModal()">
        <div class="w-full max-w-2xl max-h-[92vh] overflow-y-auto relative bg-white rounded-3xl" onclick="event.stopPropagation()">
            <button onclick="closeProjectModal()" class="absolute top-4 right-4 neumorph-btn w-10 h-10 rounded-full flex items-center justify-center hover:bg-g-red hover:text-white transition z-10 bg-white shadow-md">
                <i class="fas fa-times"></i>
            </button>
            <div id="projectModalContent" class="p-0">
                <!-- Populated by JS -->
            </div>
        </div>
    </div>
    <!-- Projects Section -->
    <section id="projects" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-display text-3xl md:text-5xl font-bold text-center mb-4 section">Project <span class="nb-marker">Portfolio</span></h2>
            <p class="text-center text-gray-700 max-w-2xl mx-auto mb-16 section">Selected works demonstrating my capabilities</p>

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
                    <div class="neumorph-3d overflow-hidden neumorph-hover h-full flex flex-col bg-white">
                        <div class="relative h-48 overflow-hidden border-b-[3px] border-ink">
                            @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-g-blue flex items-center justify-center">
                                <i class="fas fa-code text-5xl text-white"></i>
                            </div>
                            @endif
                            @if($project->is_featured)
                            <div class="absolute top-3 right-3">
                                <span class="nb-badge nb-sticker bg-g-yellow">⭐ Featured</span>
                            </div>
                            @endif
                            <!-- View detail overlay -->
                            <div class="absolute inset-0 bg-g-yellow/90 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-ink font-bold flex items-center gap-2 text-sm nb-badge">
                                    <i class="fas fa-expand"></i> View Details
                                </span>
                            </div>
                        </div>
                        <div class="p-5 flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-display text-lg font-bold line-clamp-1">{{ $project->title }}</h3>
                                @if($project->project_date)
                                <span class="nb-badge text-[10px] shrink-0 ml-2">
                                    {{ \Carbon\Carbon::parse($project->project_date)->format('Y') }}
                                </span>
                                @endif
                            </div>
                            <p class="text-gray-700 text-sm mb-3 line-clamp-2">{{ $project->description }}</p>
                            @if(!empty($pTechs))
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_slice($pTechs, 0, 4) as $t)
                                <span class="nb-badge text-[10px] py-0.5 px-2">{{ $t }}</span>
                                @endforeach
                                @if(count($pTechs) > 4)
                                <span class="nb-badge text-[10px] py-0.5 px-2 bg-g-cloud">+{{ count($pTechs)-4 }}</span>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="px-5 pb-4 flex items-center gap-2 text-xs text-gray-500 font-semibold">
                            <i class="fas fa-mouse-pointer text-g-yellow"></i>
                            <span>Click to view details</span>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-gray-700 col-span-3 text-center">No projects added yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 px-4 overflow-hidden bg-white border-y-[3px] border-ink">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-display text-3xl md:text-5xl font-bold text-center mb-4 section">
                Client <span class="nb-marker">Testimonials</span>
            </h2>
            <p class="text-center text-gray-700 max-w-2xl mx-auto mb-16 section">
                What people say about working with me
            </p>
        </div>

        <!-- Horizontal Scroll Wrapper -->
        <div class="relative">
            <!-- Fade edges -->
            <div class="absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-g-cloud to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-g-cloud to-transparent z-10 pointer-events-none"></div>

            <!-- Scroll track -->
            <div id="testimonialsTrack" class="flex gap-6 cursor-grab select-none py-4"
                 style="overflow-x: auto; scroll-behavior: auto; -webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
                
                @forelse($user->testimonials as $testimonial)
                <div class="testimonial-card neumorph-3d p-7 flex-shrink-0 bg-white" style="width: 360px;">
                    <!-- Header -->
                    <div class="flex items-center mb-5">
                        <div class="w-14 h-14 rounded-xl overflow-hidden mr-4 border-[3px] border-ink shrink-0">
                            @if($testimonial->client_avatar)
                            <img src="{{ asset('storage/' . $testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-g-yellow flex items-center justify-center">
                                <i class="fas fa-user text-xl text-ink"></i>
                            </div>
                            @endif
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="font-bold truncate font-display">{{ $testimonial->client_name }}</h4>
                            <p class="text-gray-600 text-xs truncate">
                                {{ $testimonial->client_position }}@if($testimonial->client_company), {{ $testimonial->client_company }}@endif
                            </p>
                        </div>
                        @if($testimonial->is_featured)
                        <div class="ml-auto shrink-0">
                            <span class="nb-badge nb-badge-yellow">★ Featured</span>
                        </div>
                        @endif
                    </div>

                    <!-- Quote -->
                    <div class="relative mb-5">
                        <i class="fas fa-quote-left text-g-yellow text-4xl absolute -top-3 -left-1"></i>
                        <p class="text-gray-700 text-sm leading-relaxed pl-6 line-clamp-5">
                            {{ $testimonial->content }}
                        </p>
                    </div>

                    <!-- Stars -->
                    <div class="flex gap-0.5">
                        @for($i = 0; $i < 5; $i++)
                        <i class="fas fa-star text-sm {{ $i < $testimonial->rating ? 'text-g-yellow' : 'text-gray-300' }}"></i>
                        @endfor
                        <span class="text-xs text-gray-500 ml-2 mt-0.5 font-semibold">{{ $testimonial->rating }}/5</span>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 mx-auto">No testimonials yet.</p>
                @endforelse

                <!-- Duplicate for seamless loop -->
                @foreach($user->testimonials as $testimonial)
                <div class="testimonial-card neumorph-3d p-7 flex-shrink-0 bg-white" style="width: 360px;">
                    <div class="flex items-center mb-5">
                        <div class="w-14 h-14 rounded-xl overflow-hidden mr-4 border-[3px] border-ink shrink-0">
                            @if($testimonial->client_avatar)
                            <img src="{{ asset('storage/' . $testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-g-yellow flex items-center justify-center">
                                <i class="fas fa-user text-xl text-ink"></i>
                            </div>
                            @endif
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="font-bold truncate font-display">{{ $testimonial->client_name }}</h4>
                            <p class="text-gray-600 text-xs truncate">
                                {{ $testimonial->client_position }}@if($testimonial->client_company), {{ $testimonial->client_company }}@endif
                            </p>
                        </div>
                        @if($testimonial->is_featured)
                        <div class="ml-auto shrink-0">
                            <span class="nb-badge nb-badge-yellow">★ Featured</span>
                        </div>
                        @endif
                    </div>
                    <div class="relative mb-5">
                        <i class="fas fa-quote-left text-g-yellow text-4xl absolute -top-3 -left-1"></i>
                        <p class="text-gray-700 text-sm leading-relaxed pl-6 line-clamp-5">
                            {{ $testimonial->content }}
                        </p>
                    </div>
                    <div class="flex gap-0.5">
                        @for($i = 0; $i < 5; $i++)
                        <i class="fas fa-star text-sm {{ $i < $testimonial->rating ? 'text-g-yellow' : 'text-gray-300' }}"></i>
                        @endfor
                        <span class="text-xs text-gray-500 ml-2 mt-0.5 font-semibold">{{ $testimonial->rating }}/5</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-display text-3xl md:text-5xl font-bold text-center mb-4 section">Let's <span class="nb-marker">Connect</span></h2>
            <p class="text-center text-gray-700 max-w-2xl mx-auto mb-16 section">Get in touch for project inquiries or collaboration opportunities</p>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Left: Contact Info -->
                <div class="section" style="transition-delay: 0.1s">
                    <div class="neumorph-3d p-8 flex flex-col gap-5 h-full bg-white">
                        <h3 class="font-display text-2xl font-bold mb-2">Contact Information</h3>

                        <!-- Email -->
                        <a href="mailto:{{ $user->email }}" class="neumorph-btn p-4 flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300 bg-white">
                            <div class="nb-icon-box nb-ib-blue w-12 h-12">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-0.5 font-bold">Email</h4>
                                <p class="font-semibold text-sm truncate">{{ $user->email }}</p>
                            </div>
                            <i class="fas fa-arrow-right text-g-yellow ml-auto text-xs"></i>
                        </a>

                        @if(optional($user->profile)->phone)
                        <a href="tel:{{ $user->profile->phone }}" class="neumorph-btn p-4 flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300 bg-white">
                            <div class="nb-icon-box nb-ib-green w-12 h-12">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-0.5 font-bold">Phone</h4>
                                <p class="font-semibold text-sm truncate">{{ $user->profile->phone }}</p>
                            </div>
                            <i class="fas fa-arrow-right text-g-yellow ml-auto text-xs"></i>
                        </a>
                        @endif

                        @if(optional($user->profile)->location)
                        <a href="https://maps.google.com?q={{ urlencode($user->profile->location) }}" target="_blank" class="neumorph-btn p-4 flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300 bg-white">
                            <div class="nb-icon-box nb-ib-red w-12 h-12">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-0.5 font-bold">Location</h4>
                                <p class="font-semibold text-sm truncate">{{ $user->profile->location }}</p>
                            </div>
                            <i class="fas fa-arrow-right text-g-yellow ml-auto text-xs"></i>
                        </a>
                        @endif

                        <!-- Social Links -->
                        @if(optional($user->profile)->social_links)
                        @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                        <div class="pt-2">
                            <h4 class="text-[10px] text-gray-500 uppercase tracking-widest mb-3 font-bold">Follow Me</h4>
                            <div class="flex flex-wrap gap-3">
                                @foreach($socialLinks as $platform => $url)
                                @if($url)
                                <a href="{{ $url }}" target="_blank"
                                   class="nb-icon-box nb-ib-yellow w-11 h-11 hover:bg-g-blue hover:text-white transition-colors duration-200"
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
                    <div class="neumorph-3d p-8 h-full bg-white">
                        <h3 class="font-display text-2xl font-bold mb-6">Send Me a Message</h3>
                        <form class="space-y-5" id="contactForm">
                            @csrf
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-bold">Your Name</label>
                                    <input type="text" id="name" class="w-full input-field px-4 py-3" placeholder="e.g. Fulan" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-bold">Your Email</label>
                                    <input type="email" id="email" class="w-full input-field px-4 py-3" placeholder="fulan@example.com" required>
                                </div>
                            </div>
                            <div>
                                <label for="subject" class="block mb-2 text-sm font-bold">Subject</label>
                                <select id="subject" class="w-full input-field px-4 py-3">
                                    <option value="">Select a subject</option>
                                    <option value="project">Project Inquiry</option>
                                    <option value="collaboration">Collaboration Opportunity</option>
                                    <option value="job">Job Offer</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block mb-2 text-sm font-bold">Message</label>
                                <textarea id="message" rows="5" class="w-full input-field px-4 py-3" placeholder="Tell me about your project..." required></textarea>
                            </div>
                            <button type="submit" class="w-full nb-btn nb-btn-blue" id="contactSubmitBtn">
                                <i class="fas fa-paper-plane"></i> Send Message
                            </button>
                            <p id="contactStatus" class="text-sm font-bold text-center hidden"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer-neo')
</div><!-- /page frame -->
</div><!-- /outer wrapper -->

    <script>
        // Scrolling text pause on hold
        const scrollingTextTrack = document.querySelector('.scrolling-text-track');

        document.addEventListener('DOMContentLoaded', () => {
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

            // Form submission — simpan pesan ke admin (Contact Messages)
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const btn = document.getElementById('contactSubmitBtn');
                    const status = document.getElementById('contactStatus');
                    const showStatus = (text, ok) => {
                        status.textContent = text;
                        status.classList.remove('hidden');
                        status.classList.toggle('text-g-green', ok);
                        status.classList.toggle('text-g-red', !ok);
                    };

                    btn.disabled = true;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                    try {
                        const res = await fetch('{{ route('contact.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            },
                            body: new FormData(contactForm)
                        });
                        const data = await res.json();
                        if (res.ok && data.success) {
                            showStatus(data.message, true);
                            contactForm.reset();
                        } else {
                            showStatus((data.errors && Object.values(data.errors).flat()[0]) || 'Failed to send. Please try again.', false);
                        }
                    } catch (err) {
                        showStatus('Network error. Please try again.', false);
                    } finally {
                        btn.disabled = false;
                        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
                    }
                });
            }
        });

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
//  PROJECT MODAL — flexible multi-page
// ═══════════════════════════════════════
let projectModalPage = 1;
let projectModalTotalPages = 1;

// ── Halaman-halaman popup Project ──────────────────────────────
// NAMBAH HALAMAN: cukup push satu objek baru ke array `pages`
// di dalam function ini — dot, counter "Page X of Y", dan tombol
// Prev/Next otomatis menyesuaikan jumlahnya.
//
// Bentuk tiap halaman: { id: '...', render: () => `<html>` }
// Ikuti pola halaman 'detail' (deskripsi + daftar) sebagai patokan.
function buildProjectPages(d) {
    const techPills = (d.technologies || []).map(t =>
        `<span class="nb-badge text-[10px] py-0.5 px-2">${esc(t)}</span>`
    ).join('');

    const linksBlock = [
        d.demo_url ? `<a href="${esc(d.demo_url)}" target="_blank" class="nb-btn nb-btn-yellow text-sm py-2.5 px-5"><i class="fas fa-external-link-alt"></i> Live Demo</a>` : '',
        d.case_url ? `<a href="${esc(d.case_url)}" target="_blank" class="nb-btn text-sm py-2.5 px-5"><i class="fas fa-book-open"></i> Case Study</a>` : '',
    ].filter(Boolean).join('');

    const pages = [
        // Page 1 — Overview
        {
            id: 'overview',
            render: () => `
                ${d.date ? `<div class="nb-press px-4 py-3 flex items-center gap-3 mb-3 text-sm font-semibold"><span class="nb-icon-box nb-ib-blue w-9 h-9"><i class="fas fa-calendar"></i></span><span>${esc(d.date)}</span></div>` : ''}
                ${d.client ? `<div class="nb-press px-4 py-3 flex items-center gap-3 text-sm font-semibold"><span class="nb-icon-box nb-ib-yellow w-9 h-9"><i class="fas fa-building"></i></span><span><strong>Client:</strong> ${esc(d.client)}</span></div>` : ''}
                ${!d.date && !d.client ? '<p class="text-gray-600 text-sm">No additional info for this project.</p>' : ''}`
        },

        // Page 2 — Description + Technologies (PATOKAN FORMAT)
        // Pola: teks penjelasan, opsional blok daftar ber-label
        {
            id: 'detail',
            render: () => `
                <p class="text-gray-700 leading-relaxed mb-6">${esc(d.description)}</p>
                ${techPills ? `<div><p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-3">Technologies Used</p><div class="flex flex-wrap gap-2">${techPills}</div></div>` : ''}`
        },

        // Page 3 — Links
        {
            id: 'links',
            render: () => `
                ${linksBlock
                    ? `<p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-3">Links</p><div class="flex flex-wrap gap-3">${linksBlock}</div>`
                    : '<p class="text-gray-600 text-sm">No links available for this project.</p>'}`
        },

        // ── CONTOH NAMBAH HALAMAN BARU (hapus komentar untuk pakai) ──
        // {
        //     id: 'gallery',
        //     render: () => `
        //         <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-3">Gallery</p>
        //         <p class="text-gray-700 leading-relaxed">Isi konten halaman di sini…</p>`
        // },
    ];

    return pages;
}

function showProjectPage(n) {
    projectModalPage = Math.min(Math.max(n, 1), projectModalTotalPages);

    document.querySelectorAll('.proj-page').forEach((el, i) => {
        el.classList.toggle('hidden', (i + 1) !== projectModalPage);
    });

    // Dots — active state by page number
    document.querySelectorAll('.proj-dot').forEach((dot, i) => {
        const active = (i + 1) === projectModalPage;
        dot.classList.toggle('bg-g-blue', active);
        dot.classList.toggle('bg-white', !active);
    });

    // Counter
    const counter = document.getElementById('projPageCounter');
    if (counter) counter.textContent = `Page ${projectModalPage} of ${projectModalTotalPages}`;

    // Buttons
    const prevBtn = document.getElementById('projPrevBtn');
    const nextBtn = document.getElementById('projNextBtn');
    if (prevBtn) prevBtn.classList.toggle('invisible', projectModalPage === 1);
    if (nextBtn) nextBtn.classList.toggle('invisible', projectModalPage === projectModalTotalPages);
}

function openProjectModal(card) {
    const d = JSON.parse(card.getAttribute('data-project'));
    const pages = buildProjectPages(d);
    projectModalTotalPages = pages.length;

    const imageBlock = d.image
        ? `<img src="${esc(d.image)}" alt="${esc(d.title)}" class="w-full h-64 object-cover border-b-[3px] border-black">`
        : `<div class="w-full h-48 bg-g-blue flex items-center justify-center border-b-[3px] border-black">
               <i class="fas fa-code text-6xl text-white"></i>
           </div>`;

    // Render semua halaman dari array
    const pagesHtml = pages.map((p, i) =>
        `<div class="proj-page px-7 pb-2 ${i === 0 ? '' : 'hidden'}">${p.render()}</div>`
    ).join('\n');

    // Render dots dari jumlah halaman
    const dotsHtml = pages.map((_, i) =>
        `<span class="proj-dot w-3 h-3 rounded-full border-2 border-black ${i === 0 ? 'bg-g-blue' : 'bg-white'}"></span>`
    ).join('');

    document.getElementById('projectModalContent').innerHTML = `
        <!-- Page header: image + title (always visible) -->
        ${imageBlock}
        <div class="px-7 pt-6">
            <div class="flex items-start justify-between gap-4 mb-4">
                <h3 class="font-display text-2xl font-bold leading-tight">${esc(d.title)}</h3>
                ${d.is_featured ? '<span class="nb-badge nb-sticker bg-g-yellow shrink-0">⭐ Featured</span>' : ''}
            </div>
        </div>

        ${pagesHtml}

        <!-- Page nav (auto: jumlah halaman dari array) -->
        <div class="px-7 pt-5 pb-6 mt-2 border-t-[3px] border-black flex items-center justify-between gap-4">
            <button id="projPrevBtn" onclick="showProjectPage(projectModalPage - 1)"
                    class="nb-btn text-sm py-2 px-4" aria-label="Previous page">
                <i class="fas fa-arrow-left"></i> Prev
            </button>

            <div class="flex items-center gap-2">
                <span id="projPageCounter" class="text-xs font-bold text-gray-500 uppercase tracking-wider">Page 1 of ${projectModalTotalPages}</span>
                <div class="flex gap-1.5 ml-2">${dotsHtml}</div>
            </div>

            <button id="projNextBtn" onclick="showProjectPage(projectModalPage + 1)"
                    class="nb-btn nb-btn-yellow text-sm py-2 px-4" aria-label="Next page">
                Next <i class="fas fa-arrow-right"></i>
            </button>
        </div>`;

    document.getElementById('projectModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    showProjectPage(1);
}

function closeProjectModal() {
    document.getElementById('projectModal').classList.add('hidden');
    document.body.style.overflow = '';
}

// ═══════════════════════════════════════
//  SKILL CARD CATEGORY FILTER
// ═══════════════════════════════════════
function filterSkillCards(category, btn) {
    const buttons = document.querySelectorAll('.skill-filter-btn');
    buttons.forEach(b => {
        b.classList.remove('bg-ink', 'text-white', 'shadow-nb-sm');
        b.classList.add('bg-white', 'text-ink');
    });
    btn.classList.remove('bg-white', 'text-ink');
    btn.classList.add('bg-ink', 'text-white', 'shadow-nb-sm');

    const cards = document.querySelectorAll('#skillGrid > div');
    cards.forEach(card => {
        const cardCat = card.getAttribute('data-category');
        if (category === 'all' || cardCat === category) {
            card.style.display = 'flex';
            card.style.opacity = '1';
        } else {
            card.style.display = 'none';
        }
    });
}

// ═══════════════════════════════════════
//  ACHIEVEMENT CATEGORY FILTER
// ═══════════════════════════════════════
function filterAchievements(category, btn) {
    const buttons = document.querySelectorAll('.achievement-tab-btn');
    buttons.forEach(b => {
        b.classList.remove('bg-ink', 'text-white', 'shadow-nb-sm');
        b.classList.add('bg-white', 'text-ink');
    });
    btn.classList.remove('bg-white', 'text-ink');
    btn.classList.add('bg-ink', 'text-white', 'shadow-nb-sm');

    const items = document.querySelectorAll('.achievement-card-item');
    items.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (category === 'all' || itemCat === category) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

// ═══════════════════════════════════════
//  ACHIEVEMENT & SPEAKER MODAL
// ═══════════════════════════════════════
function openAchievementModal(card) {
    const raw = card.getAttribute('data-achievement') || card.getAttribute('data-cert');
    if (!raw) return;
    const d = JSON.parse(raw);

    const catBadgeClass = d.category === 'speaker'
        ? 'bg-purple-600 text-white'
        : (d.category === 'competition' ? 'bg-amber-400 text-ink' : 'bg-g-blue text-white');

    const catIcon = d.category === 'speaker'
        ? 'fa-microphone-alt'
        : (d.category === 'competition' ? 'fa-trophy' : 'fa-certificate');

    const catLabel = d.category_label || (d.category === 'speaker' ? 'Speaker & Pemateri' : (d.category === 'competition' ? 'Kompetisi' : 'Sertifikasi'));

    let certImageHtml = '';
    if (d.certificate || d.image) {
        const certSrc = d.certificate || d.image;
        certImageHtml = `
            <div class="mb-6 rounded-2xl overflow-hidden border-2 border-ink bg-gray-50 p-2 shadow-nb-sm">
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-500 mb-2 px-1 flex items-center justify-between">
                    <span><i class="fas fa-file-contract mr-1 text-g-blue"></i> Sertifikat / Piagam</span>
                    <a href="${esc(certSrc)}" target="_blank" class="text-primary hover:underline font-bold">Buka Resolusi Penuh ↗</a>
                </p>
                <img src="${esc(certSrc)}" alt="${esc(d.title)}" class="w-full max-h-72 object-contain rounded-xl mx-auto">
            </div>`;
    }

    let photosHtml = '';
    if (d.photos && d.photos.length > 0) {
        const photoThumbnails = d.photos.map((p, i) => `
            <a href="${esc(p)}" target="_blank" class="group relative rounded-xl overflow-hidden border-2 border-ink block shadow-nb-sm hover:-translate-y-1 transition">
                <img src="${esc(p)}" alt="Dokumentasi ${i + 1}" class="w-full h-24 object-cover">
                <div class="absolute inset-0 bg-ink/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold">
                    <i class="fas fa-search-plus"></i>
                </div>
            </a>
        `).join('');

        photosHtml = `
            <div class="mb-6">
                <p class="text-xs font-bold uppercase tracking-wider text-gray-600 mb-2 flex items-center gap-1.5">
                    <i class="fas fa-camera text-purple-600"></i> Foto Dokumentasi Kegiatan (${d.photos.length} Foto)
                </p>
                <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                    ${photoThumbnails}
                </div>
            </div>`;
    }

    const verifyBtn = d.credential_url
        ? `<a href="${esc(d.credential_url)}" target="_blank" class="nb-btn nb-btn-blue text-sm py-2 px-5 inline-flex items-center gap-2"><i class="fas fa-external-link-alt"></i> Verifikasi Kredensial</a>`
        : '';

    const html = `
        <div class="p-6 md:p-8">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                <span class="nb-badge ${catBadgeClass} text-xs font-bold flex items-center gap-1.5">
                    <i class="fas ${catIcon}"></i> ${esc(catLabel)}
                </span>
                ${d.event_date ? `<span class="text-xs font-bold text-gray-600"><i class="fas fa-calendar-alt mr-1"></i> ${esc(d.event_date)}</span>` : ''}
            </div>

            <h3 class="font-display text-2xl md:text-3xl font-bold mb-2 leading-tight">${esc(d.title)}</h3>
            
            ${d.organizer ? `<p class="text-g-blue font-bold text-sm md:text-base mb-4 flex items-center gap-1.5"><i class="fas fa-building text-xs"></i> ${esc(d.organizer)}</p>` : ''}

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                ${d.result ? `
                    <div class="nb-press p-3.5">
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-1">${d.category === 'speaker' ? 'Peran Pemateri' : 'Hasil / Peringkat'}</p>
                        <p class="font-bold text-sm text-yellow-600 flex items-center gap-1.5">
                            <i class="fas ${d.category === 'speaker' ? 'fa-user-tie text-purple-600' : 'fa-trophy text-amber-500'}"></i>
                            ${esc(d.result)}
                        </p>
                    </div>` : ''}
                ${d.credential_id ? `
                    <div class="nb-press p-3.5">
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-1">Credential ID</p>
                        <p class="font-mono font-bold text-xs truncate">${esc(d.credential_id)}</p>
                    </div>` : ''}
            </div>

            ${d.description ? `
                <div class="mb-6 p-4 rounded-xl border border-gray-200 bg-gray-50/50">
                    <p class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Deskripsi / Ringkasan</p>
                    <p class="text-gray-700 text-sm leading-relaxed whitespace-pre-line">${esc(d.description)}</p>
                </div>` : ''}

            ${certImageHtml}
            ${photosHtml}
            ${verifyBtn}
        </div>
    `;

    document.getElementById('achievementModalContent').innerHTML = html;
    document.getElementById('achievementModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAchievementModal() {
    const modal = document.getElementById('achievementModal');
    if (modal) modal.classList.add('hidden');
    document.body.style.overflow = '';
}

// Fallback aliases for legacy handlers
function openCertModal(card) {
    openAchievementModal(card);
}
function closeCertificateModal() {
    closeAchievementModal();
}

// Close modals with Escape key
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        closeProjectModal();
        closeAchievementModal();
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
    <script src="{{ asset('script/type-select.js') }}" defer></script>
</body>
</html>
