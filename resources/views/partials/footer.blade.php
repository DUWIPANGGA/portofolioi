<!-- Footer - Enhanced with more links and information -->
<footer class="py-12 px-4 bg-white bg-opacity-50 dark:bg-dark-100 dark:bg-opacity-70">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="mb-8 md:mb-0">
                <a href="#" class="text-2xl font-bold text-gradient mb-4 inline-block">{{ $user->name }}</a>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Embedded & Full Stack Developer</p>

                <div class="flex space-x-4">
                    @if($user->profile->social_links)
                    @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                    @foreach($socialLinks as $platform => $url)
                    @if($url)
                    <a href="{{ $url }}" target="_blank" class="neumorph-btn w-10 h-10 flex items-center justify-center hover:text-primary transition">
                        <i class="fab fa-{{ $platform }}"></i>
                    </a>
                    @endif
                    @endforeach
                    @else
                    <a href="#" class="neumorph-btn w-10 h-10 flex items-center justify-center hover:text-primary transition"><i class="fab fa-github"></i></a>
                    <a href="#" class="neumorph-btn w-10 h-10 flex items-center justify-center hover:text-primary transition"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="neumorph-btn w-10 h-10 flex items-center justify-center hover:text-primary transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="neumorph-btn w-10 h-10 flex items-center justify-center hover:text-primary transition"><i class="fab fa-dribbble"></i></a>
                    @endif
                </div>
            </div>


            <div>
                <h3 class="text-lg font-bold mb-4">Navigation</h3>
                <ul class="space-y-2">
                    <li><a href="#home" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Home</a></li>
                    <li><a href="#about" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">About</a></li>
                    <li><a href="#skills" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Skills</a></li>
                    <li><a href="#projects" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Projects</a></li>
                    <li><a href="#blog" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Blog</a></li>
                    <li><a href="#contact" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Services</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Web Development</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">UI/UX Design</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Performance Optimization</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Accessibility Audits</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Technical Consulting</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Code Reviews</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Legal</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">Cookie Policy</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary transition">GDPR Compliance</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 mt-12 pt-8 text-center">
            <p class="text-gray-600 dark:text-gray-400">&copy; 2025 {{ $user->name }}. All rights reserved.</p>
            <p class="text-gray-500 dark:text-gray-500 text-sm mt-2">Made with <i class="fas fa-heart text-red-500"></i> and <i class="fas fa-coffee text-yellow-600"></i> in Indramayu</p>
        </div>
    </div>
</footer>
