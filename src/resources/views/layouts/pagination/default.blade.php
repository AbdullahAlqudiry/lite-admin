@if ($paginator->hasPages())

    <div class="row">
        <div class="col-12">
            <ul class="pagination pull-right">

                <li class="paginate_button page-item @if ($paginator->onFirstPage()) disabled @endif">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">{!! __('pagination.previous') !!}</a>
                </li>
                
                <li class="paginate_button page-item mr-1 @if (!$paginator->hasMorePages()) disabled @endif">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">{!! __('pagination.next') !!}</a>
                </li>
                
            </ul>
        </div>
    
    </div>

@endif
