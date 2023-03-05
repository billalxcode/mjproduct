@if ($paginator->hasPages())
    <div class="blog-pagination">
        <ul class="justify-content-center">
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url) 
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>
@endif