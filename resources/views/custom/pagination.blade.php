@if ($paginator->hasPages())
<nav aria-label="...">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())

        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>

        @else

        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}">
                <span class="page-link">Previous</span>
            </a>
        </li>


        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled">{{ $element }}</li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
            <a class="page-link" href="#"><span class="sr-only">{{ $page }}</span></a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
        
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}">
                <span class="page-link">Previous</span>
            </a>
        </li>
        @else
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}">
                <span class="page-link">Previous</span>
            </a>
        </li>

        @endif
    </ul>
</nav>
@endif