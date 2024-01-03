<!-- @if ($products->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end mb-4">
            {{-- Previous Page Link --}}
            @if ($products->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" style="height: 38px;">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous" style="height: 38px;">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @endif

            {{-- Numbered Page Buttons --}}
            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                <li class="page-item @if ($page == $products->currentPage()) active @endif">
                    <a class="page-link" href="{{ $url }}" style="height: 38px;">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Next Page Link --}}
            @if ($products->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next" style="height: 38px;">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" style="height: 38px;">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

<style>
    .pagination {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .pagination li {
        list-style: none;
        margin: 0 3px;
    }

    .pagination a,
    .pagination span {
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #dee2e6;
        color: #ab5adb;
        height: 38px; /* Set a fixed height */
    }

    .pagination a:hover {
        background-color: #ab5adb;
        color: #fff;
        border-color: #ab5adb;
    }

    .pagination .active a {
        background-color: #d3a2f5;
        color: #fff;
        border-color: #d3a2f5;
    }

    .pagination .disabled a {
        pointer-events: none;
        background-color: #f8f9fa;
        color: #6c757d;
        border-color: #dee2e6;
    }
</style> -->
