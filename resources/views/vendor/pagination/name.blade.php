{{--            <div class="paging">--}}
{{--                <span>1</span>--}}
{{--                <a target="_self" href="/tin-tuc-su-kien/tat-ca/2" class="">2</a>--}}
{{--                <a target="_self" href="/tin-tuc-su-kien/tat-ca/3" class="">3</a>--}}
{{--                <a target="_self" href="/tin-tuc-su-kien/tat-ca/4" class="">4</a>--}}
{{--                <a target="_self" href="/tin-tuc-su-kien/tat-ca/5" class="">5</a>--}}
{{--                <a target="_self" href="/tin-tuc-su-kien/tat-ca/2" class="next ">--}}
{{--                    <i class="fas fa-chevron-right"></i>--}}
{{--                </a>--}}
{{--                <a target="_self" href="/tin-tuc-su-kien/tat-ca/125" class="last ">--}}
{{--                    <i class="fas fa-angle-double-right"></i>--}}
{{--                </a>--}}
{{--            </div>--}}

@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="paging">
    {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <i class="fa-solid fa-chevron-left"></i>
            @else
            <a target="_self" href="{{ $paginator->previousPageUrl() }}" class="last ">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span>{{ $page }}</span>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <a href="{{ $url }}">{{ $page }}</a>
                        @elseif ($page == $paginator->lastPage() - 1)
                           <font>---</font>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
            @else
                    <i class="fa fa-angle-double-right"></i>
            @endif
    </div>
    <!-- Pagination -->
@endif
