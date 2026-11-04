<nav class="sticky top-0 z-50 py-3 px-4 md:px-6 bg-white border-b-[3px] border-ink">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <!-- Logo + Text -->
        <a href="#" class="flex items-center gap-3">
            <img src="assets/logo.svg" alt="{{ $user->name }} Logo" class="h-10 w-auto">
            <span class="font-display text-xl font-bold">{{ $user->name }}</span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-2 items-center">
            <a href="#home" class="nav-link text-sm">Home</a>
            <a href="#about" class="nav-link text-sm">About</a>
            <a href="#skills" class="nav-link text-sm">Skills</a>
            <a href="#services" class="nav-link text-sm">Services</a>
            <a href="#achievements" class="nav-link text-sm">Achievements</a>
            <a href="#projects" class="nav-link text-sm">Projects</a>
            <a href="#contact" class="nb-btn nb-btn-yellow text-sm py-2 px-5 ml-2">Hire Me</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center space-x-4">
            <button class="text-xl neumorph-btn w-10 h-10 flex items-center justify-center bg-white" id="mobileMenuButton">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden absolute left-0 right-0 top-20 bg-white border-y-[3px] border-ink p-4 shadow-nb" id="mobileMenu">
        <div class="flex flex-col space-y-3">
            <a href="#home" class="nav-link font-medium">Home</a>
            <a href="#about" class="nav-link font-medium">About</a>
            <a href="#skills" class="nav-link font-medium">Skills</a>
            <a href="#services" class="nav-link font-medium">Services</a>
            <a href="#achievements" class="nav-link font-medium">Achievements</a>
            <a href="#projects" class="nav-link font-medium">Projects</a>
            <a href="#contact" class="nav-link font-medium">Contact</a>
        </div>
    </div>
</nav>
