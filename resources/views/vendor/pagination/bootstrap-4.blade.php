@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" class="Paginate">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link left-arrow" href="javascript:void(0)" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link left-arrow" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                    </a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><a class="page-link-nav " href="javascript:void(0)">{{ $element }}</a></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link-nav " href="javascript:void(0)">{{ $page }}</a></li>

                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                            <li class="page-item"><a class="page-link-nav " href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rigt-arrow" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link rigt-arrow" href="javascript:void(0)" aria-label="Next">
                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
