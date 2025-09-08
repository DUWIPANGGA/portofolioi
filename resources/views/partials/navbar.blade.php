<nav class="fixed w-full z-50 py-4 px-6 backdrop-blur-sm">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <!-- Logo + Text -->
        <a href="#" class="flex items-center ">
            <img src="assets/logo.svg" alt="Duwipangga Logo" class="h-10 w-auto filter invert-[58%] sepia-[13%] saturate-[740%] hue-rotate-[204deg]">
            <span class="text-2xl font-bold text-gradient">Duwipangga</span>
        </a>

        <!-- Desktop Menu -->
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

        <!-- Mobile Menu Button -->
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
