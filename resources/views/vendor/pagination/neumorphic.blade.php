@if ($paginator->hasPages())
    <div class="mt-8 flex justify-center">
        <div class="neumorph dark:neumorph-dark rounded-xl inline-flex items-center p-2">
            
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-400 mr-2">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 mr-2">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-3 text-gray-500">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center bg-primary text-white mx-1">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 mx-1">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 ml-2">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="neumorph-btn dark:neumorph-btn-dark w-10 h-10 rounded-full flex items-center justify-center text-gray-400 ml-2">
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif

        </div>
    </div>
@endif
