@if ($paginator->hasPages())
<div class="pagination-murtes">
<ul>
    @if ($paginator->onFirstPage())
        <li><a href="javascript:void(0)">← </a></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← </a></li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <li><a href="#">{{ $element }}</a></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a class="active" href="#">{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"> →</a></li>
    @else
        <li><a href="javascript:void(0)"> →</a></li>
    @endif
</ul>
</div>
@endif
