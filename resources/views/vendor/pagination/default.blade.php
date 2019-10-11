@if ($paginator->hasPages())
    <div class="ui pagination menu">
    {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon item disabled"> <i class="left chevron icon"></i>&laquo </a>
        @else
            <a class="icon item" href="{{ $paginator->previousPageUrl() }}" rel="prev"> &laquo<i class="left chevron icon"></i> </a>
        @endif
        
    <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- Array Of Links -->
            @foreach ($element as $page => $url)
                <!--  Use three dots when current page is greater than 3.  -->
                @if ($paginator->currentPage() > 3 && $page === 2)
                    <a class="icon item disabled"><i class="icon item">...</i></a>
                @endif

                <!--  Show active page else show the first and last two pages from current page.  -->
                @if ($page == $paginator->currentPage())
                     <a class="item active" href="{{ $url }}">{{ $page }}</a>
                @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1 || $page === $paginator->lastPage() || $page === 1)
                    <a class="item" href="{{ $url }}">{{ $page }}</a>
                @endif

                <!--  Use three dots when current page is away from end.  -->
                @if ($paginator->currentPage() < $paginator->lastPage() - 2 && $page === $paginator->lastPage() - 1)
                    <a class="item disabled">...</a>
                @endif
            @endforeach
        @endforeach 
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next"> <i class="right chevron icon"></i>&raquo </a>
        @else
            <a class="icon item disabled"> <i class="right chevron icon"></i>&raquo </a>
        @endif
    </div>
@endif