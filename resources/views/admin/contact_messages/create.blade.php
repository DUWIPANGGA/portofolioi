@extends('layouts.app')

@section('title', 'Contact Us')
@section('subtitle', 'Get in touch with us')

@section('content')
<div class="section">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Information -->
            <div>
                <h3 class="text-2xl font-semibold mb-6">Get in Touch</h3>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="neumorph-icon dark:neumorph-icon-dark mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Address</h4>
                            <p class="text-gray-600 dark:text-gray-400">123 Business Street, City, Country</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="neumorph-icon dark:neumorph-icon-dark mr-4 flex-shrink-0">
                            <i class="fas fa-phone text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Phone</h4>
                            <p class="text-gray-600 dark:text-gray-400">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="neumorph-icon dark:neumorph-icon-dark mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Email</h4>
                            <p class="text-gray-600 dark:text-gray-400">hello@example.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="neumorph-icon dark:neumorph-icon-dark mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Business Hours</h4>
                            <p class="text-gray-600 dark:text-gray-400">Mon - Fri: 9AM - 5PM</p>
                            <p class="text-gray-600 dark:text-gray-400">Sat: 10AM - 3PM</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8">
                    <h4 class="font-medium mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="neumorph-icon dark:neumorph-icon-dark w-10 h-10 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="neumorph-icon dark:neumorph-icon-dark w-10 h-10 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="neumorph-icon dark:neumorph-icon-dark w-10 h-10 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="neumorph-icon dark:neumorph-icon-dark w-10 h-10 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
                <h3 class="text-2xl font-semibold mb-6">Send us a Message</h3>
                
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2">Your Name *</label>
                            <input type="text" id="name" name="name" required 
                                   class="w-full input-field dark:input-field @error('name') border-red-500 @enderror" 
                                   value="{{ old('name') }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2">Your Email *</label>
                            <input type="email" id="email" name="email" required 
                                   class="w-full input-field dark:input-field @error('email') border-red-500 @enderror" 
                                   value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" 
                               class="w-full input-field dark:input-field @error('subject') border-red-500 @enderror" 
                               value="{{ old('subject') }}">
                        @error('subject')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="budget_range" class="block text-sm font-medium mb-2">Budget Range (Optional)</label>
                        <select id="budget_range" name="budget_range" 
                                class="w-full input-field dark:input-field @error('budget_range') border-red-500 @enderror">
                            <option value="">Select a range</option>
                            <option value="<$1000" {{ old('budget_range') == '<$1000' ? 'selected' : '' }}>Less than $1,000</option>
                            <option value="$1000-$5000" {{ old('budget_range') == '$1000-$5000' ? 'selected' : '' }}>$1,000 - $5,000</option>
                            <option value="$5000-$10000" {{ old('budget_range') == '$5000-$10000' ? 'selected' : '' }}>$5,000 - $10,000</option>
                            <option value="$10000+" {{ old('budget_range') == '$10000+' ? 'selected' : '' }}>More than $10,000</option>
                        </select>
                        @error('budget_range')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium mb-2">Your Message *</label>
                        <textarea id="message" name="message" rows="5" required 
                                  class="w-full input-field dark:input-field @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" 
                            class="w-full neumorph-btn dark:neumorph-btn-dark px-6 py-3 rounded-xl bg-primary text-white hover:bg-primary-dark transition font-medium">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection