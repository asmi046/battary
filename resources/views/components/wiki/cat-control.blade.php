<div class="wiki_cat">
    <a href="{{ route('wiki') }}" @class(['wiki_cat_element', 'active' => Request::route()->named('wiki')])>Все</a>
    @foreach ($cats as $item)
        <a href="{{ route('wiki_cat', $item->slug) }}" @class(['wiki_cat_element', 'active' => $curentname==$item->title])> {{ $item->title }}</a>
    @endforeach
</div>
