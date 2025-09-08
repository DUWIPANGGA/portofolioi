<div id="errorModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"></div>

    <div class="relative neumorph-3d dark:neumorph-3d-dark rounded-xl max-w-md w-full mx-4 transform transition-all">
        <div class="p-6">
            <!-- Modal Header -->
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center mr-3">
                        <i class="fas fa-exclamation-circle text-red-500 dark:text-red-300 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-red-500 dark:text-red-300">Error Occurred</h3>
                </div>
                <button type="button" 
                        class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        onclick="hideErrorModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Modal Content -->
            <div class="mb-6">
                <div id="errorModalContent" class="text-gray-700 dark:text-gray-300">
                    <!-- Error message will be inserted here -->
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end">
                <button type="button" 
                        class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600 transition"
                        onclick="hideErrorModal()">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function showErrorModal(message) {
        const modal = document.getElementById('errorModal');
        const content = document.getElementById('errorModalContent');
        
        content.innerHTML = message;
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function hideErrorModal() {
        const modal = document.getElementById('errorModal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Auto-show modal if there are errors in session
    document.addEventListener('DOMContentLoaded', function() {
        @if($errors->any())
            const errorMessages = {!! json_encode($errors->all()) !!};
            const formattedErrors = errorMessages.map(error => 
                `<div class="mb-2 p-3 rounded-lg bg-red-50 dark:bg-red-900/30">${error}</div>`
            ).join('');
            showErrorModal(formattedErrors);
        @endif

        @if(session('error'))
            showErrorModal(`<div class="p-3 rounded-lg bg-red-50 dark:bg-red-900/30">{{ session('error') }}</div>`);
        @endif
    });
</script>