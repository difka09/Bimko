@if ($paginator->hasPages())
    <nav class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="disabled" >
                <span aria-hidden="true" class="pagination__page pagination__icon pagination__page--previous"><i class="ui-arrow-left"></i></span>
            </a>
        @else
            <a>
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination__page pagination__icon pagination__page--previous"><i class="ui-arrow-left"></i></a>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="disabled pagination__page pagination__page--current" aria-disabled="true"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active" aria-current="page"><span class="pagination__page pagination__page--current">{{ $page }}</span></a>
                    @else
                        <a><a class="pagination__page" href="{{ $url }}">{{ $page }}</a></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a>
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination__page pagination__icon pagination__page--next"><i class="ui-arrow-right"></i></a>
            </a>
        @else
            <a class="disabled" >
                <span aria-hidden="true" class="pagination__page pagination__icon pagination__page--next"><i class="ui-arrow-right"></i></span>
            </a>
        @endif
        </nav>
@endif
