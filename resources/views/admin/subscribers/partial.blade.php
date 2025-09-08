<div class="mt-8 p-6 neumorph-3d dark:neumorph-3d-dark rounded-xl">
    <h3 class="text-lg font-semibold mb-4">Subscribe to our Newsletter</h3>
    <form action="{{ route('subscribers.store') }}" method="POST">
        @csrf
        <div class="flex gap-2">
            <input type="email" name="email" placeholder="Your email address" 
                   class="flex-1 input-field dark:input-field @error('email') border-red-500 @enderror" 
                   required>
            <button type="submit" 
                    class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
                Subscribe
            </button>
        </div>
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        @if(session('success'))
            <p class="text-green-500 text-xs mt-1">{{ session('success') }}</p>
        @endif
    </form>
</div>