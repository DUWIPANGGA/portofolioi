<!-- Sidebar -->
<div class="hidden md:flex flex-col w-64 bg-light dark:bg-dark-100 border-r border-gray-200 dark:border-gray-800">
    <div class="flex items-center justify-center h-16 px-4 neumorph-inset dark:neumorph-inset-dark">
        <h1 class="text-xl font-bold text-gradient">{{ config('app.name') }}</h1>
    </div>

    <div class="flex flex-col flex-grow p-4 overflow-y-auto scrollbar-hide">
        <!-- Navigation -->
        <nav class="space-y-2">
            <a href="{{ route('admin.profiles.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-user-circle mr-3"></i>
                Profiles
            </a>
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl text-primary font-medium">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>

            <!-- Content Management -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Content</div>
            <a href="{{ route('admin.pages.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-file-alt mr-3"></i>
                Pages
            </a>
            <a href="{{ route('admin.posts.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-newspaper mr-3"></i>
                Blog Posts
            </a>
            <a href="{{ route('admin.services.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-cogs mr-3"></i>
                Services
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-quote-left mr-3"></i>
                Testimonials
            </a>
            <a href="{{ route('admin.custom_sections.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-puzzle-piece mr-3"></i>
                Custom Sections
            </a>

            <!-- Portfolio Management -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Portfolio</div>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-project-diagram mr-3"></i>
                Projects
            </a>
            <!-- TAMBAHKAN CERTIFICATES DI SINI -->
            <a href="{{ route('admin.sertifikat.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-certificate mr-3"></i>
                Certificates
            </a>
            <a href="{{ route('admin.technologies.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-code mr-3"></i>
                Technologies
            </a>
            <a href="{{ route('admin.skills.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-star mr-3"></i>
                Skills
            </a>
            <a href="{{ route('admin.experience.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-briefcase mr-3"></i>
                Experience
            </a>
            <a href="{{ route('admin.educations.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-graduation-cap mr-3"></i>
                Education
            </a>
            <a href="{{ route('admin.portfolio-stats.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-chart-bar mr-3"></i>
                Portfolio Stats
            </a>
            <a href="{{ route('admin.development_processes.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-cogs mr-3"></i>
                Development Processes
            </a>

            <!-- User & System Management -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">System</div>
            <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-users mr-3"></i>
                Users
            </a>
            <a href="{{ route('admin.media.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-images mr-3"></i>
                Media Library
            </a>
            <a href="{{ route('admin.theme-settings.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-palette mr-3"></i>
                Theme Settings
            </a>
            <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-cog mr-3"></i>
                Settings
            </a>
            <a href="{{ route('admin.seo-metas.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-search mr-3"></i>
                SEO Meta
            </a>

            <!-- Communications -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Communications</div>
            <a href="{{ route('admin.contact-messages.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-envelope mr-3"></i>
                Contact Messages
            </a>
            <a href="{{ route('admin.form-submissions.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-inbox mr-3"></i>
                Form Submissions
            </a>
            <a href="{{ route('admin.subscribers.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-rss mr-3"></i>
                Subscribers
            </a>

            <!-- Analytics -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Analytics</div>
            <a href="{{ route('admin.page-views.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-chart-line mr-3"></i>
                Page Views
            </a>
        </nav>

        <!-- User Profile -->
        <div class="mt-auto pt-4">
            <div class="neumorph-3d dark:neumorph-3d-dark p-4 rounded-xl">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full overflow-hidden mr-3 neumorph dark:neumorph-dark">
                        <img src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset('storage/'.Auth::user()->profile->avatar) : asset('assets/default-avatar.png') }}" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-bold">{{ Auth::user()->name ?? 'User' }}</h4>
                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ Auth::user()->role ?? 'Admin' }}</p>
                    </div>
                </div>

                <div class="mt-3 flex justify-between">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-3 py-1 rounded-lg text-sm hover:text-primary transition">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </button>
                    </form>

                    <button id="darkModeToggle" class="neumorph-btn dark:neumorph-btn-dark px-3 py-1 rounded-lg text-sm hover:text-primary transition">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar -->
<div id="mobileSidebar" class="md:hidden fixed inset-0 z-50 bg-black bg-opacity-50 hidden">
    <div class="absolute left-0 top-0 h-full w-64 bg-light dark:bg-dark-100 shadow-lg">
        <div class="flex items-center justify-between h-16 px-4 neumorph-inset dark:neumorph-inset-dark">
            <h1 class="text-xl font-bold text-gradient">{{ config('app.name') }}</h1>
            <button id="closeMobileSidebar" class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="p-4 space-y-2 overflow-y-auto h-[calc(100%-4rem)]">
            <a href="{{ route('admin.profiles.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-user-circle mr-3"></i>
                Profiles
            </a>
            <!-- Repeat the same navigation structure for mobile -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl text-primary font-medium">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            
            <!-- Content Management -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Content</div>
            <a href="{{ route('admin.pages.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-file-alt mr-3"></i>
                Pages
            </a>
            <a href="{{ route('admin.posts.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-newspaper mr-3"></i>
                Blog Posts
            </a>
            <a href="{{ route('admin.services.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-cogs mr-3"></i>
                Services
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-quote-left mr-3"></i>
                Testimonials
            </a>
            <a href="{{ route('admin.custom_sections.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-puzzle-piece mr-3"></i>
                Custom Sections
            </a>

            <!-- Portfolio Management -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Portfolio</div>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-project-diagram mr-3"></i>
                Projects
            </a>
            <!-- TAMBAHKAN sertifikat DI MOBILE SIDEBAR JUGA -->
            <a href="{{ route('admin.sertifikat.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-certificate mr-3"></i>
                Certificates
            </a>
            <a href="{{ route('admin.technologies.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-code mr-3"></i>
                Technologies
            </a>
            <a href="{{ route('admin.skills.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-star mr-3"></i>
                Skills
            </a>
            <a href="{{ route('admin.experience.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-briefcase mr-3"></i>
                Experience
            </a>
            <a href="{{ route('admin.educations.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-graduation-cap mr-3"></i>
                Education
            </a>
            <a href="{{ route('admin.portfolio-stats.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-chart-bar mr-3"></i>
                Portfolio Stats
            </a>
            <a href="{{ route('admin.development_processes.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-cogs mr-3"></i>
                Development Processes
            </a>

            <!-- User & System Management -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">System</div>
            <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-users mr-3"></i>
                Users
            </a>
            <a href="{{ route('admin.media.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-images mr-3"></i>
                Media Library
            </a>
            <a href="{{ route('admin.theme-settings.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-palette mr-3"></i>
                Theme Settings
            </a>
            <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-cog mr-3"></i>
                Settings
            </a>
            <a href="{{ route('admin.seo-metas.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-search mr-3"></i>
                SEO Meta
            </a>

            <!-- Communications -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Communications</div>
            <a href="{{ route('admin.contact-messages.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-envelope mr-3"></i>
                Contact Messages
            </a>
            <a href="{{ route('admin.form-submissions.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-inbox mr-3"></i>
                Form Submissions
            </a>
            <a href="{{ route('admin.subscribers.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-rss mr-3"></i>
                Subscribers
            </a>

            <!-- Analytics -->
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Analytics</div>
            <a href="{{ route('admin.page-views.index') }}" class="flex items-center px-4 py-3 neumorph-btn dark:neumorph-btn-dark rounded-xl hover:text-primary transition">
                <i class="fas fa-chart-line mr-3"></i>
                Page Views
            </a>
        </div>
    </div>
</div>