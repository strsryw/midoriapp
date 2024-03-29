@if ($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12 text-center py-5">
            <div class="custom-navigation">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span>{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="#sec-news" class="active bg-success">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}" class="text-success">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
