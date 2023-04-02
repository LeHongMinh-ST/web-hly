

@if ($paginator->hasPages())
    <!-- Pagination -->
    <!-- <p >{{print_r($paginator);}}</p> -->
    <div class="paging" >
    {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <i class="fa fa-solid fa-chevron-left"></i>
            @else
            <a target="_self" href="{{ $paginator->previousPageUrl() }}" class="last ">
                <i class="fa fa-solid fa-chevron-left"></i>
            </a>
            @endif

            {{-- Pagination Elements --}}
            <!-- {{print_r($elements);}} -->
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span>{{ $page }}</span>
                        @else
                        <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-chevron-right"></i>
                    </a>
            @else
                    <i class="fa fa-chevron-right"></i>
            @endif
    </div>
    <!-- Pagination -->
@endif
