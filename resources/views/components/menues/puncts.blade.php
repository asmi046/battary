<ul class="top_menu">
    @if ($puncts)
        @foreach ($puncts as $item)
            <li>
                <a href="{{ $item->lnk }}">{{ $item->title }}</a>
            </li>
        @endforeach
    @endif

</ul>
