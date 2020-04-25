@if ($paginator->hasPages())
    <nav>
        <div class="pagination flex-m flex-w p-t-26">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

{{--                    <a href="#" aria-label="@lang('pagination.previous')"   class="item-pagination flex-c-m trans-0-4 active-pagination">--}}
{{--                             <--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                    <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
{{--                </li>--}}
            @else
{{--                <div class="pagination flex-m flex-w p-t-26">--}}
                    <a href="{{ $paginator->previousPageUrl() }}"  rel="prev" aria-label="@lang('pagination.previous')"  class="item-pagination flex-c-m trans-0-4 active-pagination">
                        <
                    </a>

{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
{{--                </li>--}}
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a href="#" aria-label="@lang('pagination.previous')"   class="item-pagination flex-c-m trans-0-4 active-pagination">
                        {{ $element }}
                    </a>
{{--                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">
                                {{ $page }}
                            </a>
{{--                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
                        @else
                            <a href="{{ $url }}" aria-label="@lang('pagination.previous')"   class="item-pagination flex-c-m trans-0-4 active-pagination">
                                {{ $page }}
                            </a>
{{--                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')" class="item-pagination flex-c-m trans-0-4 active-pagination">
                    >
                </a>
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
{{--                </li>--}}
            @else
{{--                <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')" class="item-pagination flex-c-m trans-0-4 active-pagination">--}}
{{--                    &rsaquo;--}}
{{--                </a>--}}
{{--                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                    <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
{{--                </li>--}}
            @endif
        </div>
    </nav>
@endif
