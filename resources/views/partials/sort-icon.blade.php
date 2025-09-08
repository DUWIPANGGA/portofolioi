@props(['field'])

@php
    $currentSort = request('sort');
    $currentDirection = request('direction', 'asc');
    $isCurrentField = $currentSort === $field;
@endphp

<span class="ml-1 cursor-pointer" onclick="sortTable('{{ $field }}')">
    @if($isCurrentField)
        @if($currentDirection === 'asc')
            <i class="fas fa-sort-up text-primary"></i>
        @else
            <i class="fas fa-sort-down text-primary"></i>
        @endif
    @else
        <i class="fas fa-sort text-gray-400 dark:text-gray-500"></i>
    @endif
</span>

<script>
    function sortTable(field) {
        const url = new URL(window.location.href);
        const params = new URLSearchParams(url.search);
        
        // If already sorting by this field, toggle direction
        if (params.get('sort') === field) {
            params.set('direction', params.get('direction') === 'asc' ? 'desc' : 'asc');
        } else {
            // New field, default to ascending
            params.set('sort', field);
            params.set('direction', 'asc');
        }
        
        // Reset pagination if it exists
        if (params.has('page')) {
            params.set('page', 1);
        }
        
        window.location.href = `${url.pathname}?${params.toString()}`;
    }
</script>