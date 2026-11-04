<!-- Footer - Neo brutalism -->
<footer class="py-12 px-4 bg-white border-t-[3px] border-ink">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="mb-8 md:mb-0">
                <span class="font-display text-2xl font-bold nb-marker mb-4 inline-block">{{ $user->name }}</span>
                <p class="text-gray-700 mb-4 font-semibold">{{ optional($user->profile)->tagline ?? 'Embedded & Full Stack Developer' }}</p>

                <div class="flex flex-wrap gap-3">
                    @if(optional($user->profile)->social_links)
                    @php $socialLinks = json_decode($user->profile->social_links, true); @endphp
                    @foreach($socialLinks as $platform => $url)
                    @if($url)
                    <a href="{{ $url }}" target="_blank" class="nb-icon-box nb-ib-blue w-10 h-10 hover:bg-g-yellow hover:text-ink transition">
                        <i class="fab fa-{{ $platform }}"></i>
                    </a>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>


            <div>
                <h3 class="font-display text-lg font-bold mb-4">Navigation</h3>
                <ul class="space-y-2">
                    <li><a href="#home" class="text-gray-700 hover:text-g-blue font-medium transition">Home</a></li>
                    <li><a href="#about" class="text-gray-700 hover:text-g-blue font-medium transition">About</a></li>
                    <li><a href="#skills" class="text-gray-700 hover:text-g-blue font-medium transition">Skills</a></li>
                    <li><a href="#services" class="text-gray-700 hover:text-g-blue font-medium transition">Services</a></li>
                    <li><a href="#achievements" class="text-gray-700 hover:text-g-blue font-medium transition">Achievements</a></li>
                    <li><a href="#projects" class="text-gray-700 hover:text-g-blue font-medium transition">Projects</a></li>
                    <li><a href="#contact" class="text-gray-700 hover:text-g-blue font-medium transition">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-display text-lg font-bold mb-4">Services</h3>
                <ul class="space-y-2">
                    @forelse($user->services->take(6) as $service)
                    <li><a href="#services" class="text-gray-700 hover:text-g-blue font-medium transition">{{ $service->title }}</a></li>
                    @empty
                    <li><a href="#services" class="text-gray-700 hover:text-g-blue font-medium transition">View Services</a></li>
                    @endforelse
                </ul>
            </div>

            <div>
                <h3 class="font-display text-lg font-bold mb-4">Contact</h3>
                <ul class="space-y-2">
                    <li><a href="mailto:{{ $user->email }}" class="text-gray-700 hover:text-g-blue font-medium transition break-all">{{ $user->email }}</a></li>
                    @if(optional($user->profile)->phone)
                    <li><a href="tel:{{ $user->profile->phone }}" class="text-gray-700 hover:text-g-blue font-medium transition">{{ $user->profile->phone }}</a></li>
                    @endif
                    @if(optional($user->profile)->location)
                    <li><span class="text-gray-700 font-medium">{{ $user->profile->location }}</span></li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="border-t-[3px] border-ink mt-12 pt-8 text-center">
            <p class="font-semibold">&copy; {{ date('Y') }} {{ $user->name }}. All rights reserved.</p>
        </div>
    </div>
</footer>
