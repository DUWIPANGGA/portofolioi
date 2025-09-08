<form action="{{ $formAction }}" method="POST" class="space-y-6">
    @if($method !== 'POST')
        @method($method)
    @endif
    @csrf

    <!-- Step Number -->
    <div>
        <label for="step_number" class="block text-sm font-medium mb-2">Step Number</label>
        <input type="number" name="step_number" id="step_number" 
               value="{{ old('step_number', $process->step_number ?? '') }}"
               class="w-full input-field dark:input-field @error('step_number') border-red-500 @enderror" 
               min="1" required>
        @error('step_number')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Title -->
    <div>
        <label for="title" class="block text-sm font-medium mb-2">Step Title</label>
        <input type="text" name="title" id="title" 
               value="{{ old('title', $process->title ?? '') }}"
               class="w-full input-field dark:input-field @error('title') border-red-500 @enderror" 
               required maxlength="255">
        @error('title')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium mb-2">Description</label>
        <textarea name="description" id="description" rows="5"
                  class="w-full input-field dark:input-field @error('description') border-red-500 @enderror" 
                  required>{{ old('description', $process->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Buttons -->
    <div class="flex justify-end space-x-4 pt-4">
        <a href="{{ route('admin.development_processes.index') }}" 
           class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl hover:text-primary transition">
            Cancel
        </a>
        <button type="submit" 
                class="neumorph-btn dark:neumorph-btn-dark px-6 py-2 rounded-xl bg-primary text-white hover:bg-primary-dark transition">
            {{ $buttonText }}
        </button>
    </div>
</form>