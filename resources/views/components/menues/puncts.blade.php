<ul class="{{$wrap_class}}">
    @if ($puncts)
        @foreach ($puncts as $item)
            <li>
                <a href="{{ $item->lnk }}">{{ $item->title }}</a>
            </li>
        @endforeach
    @endif
</ul>
