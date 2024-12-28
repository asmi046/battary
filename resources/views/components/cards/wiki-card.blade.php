<div class="wiki_card">
    <div class="img">
        <a href="{{ route('wiki_page', $item->slug) }}">
            <img src="{{ Storage::url($item->img) }}" alt="{{ $item->title }}">
        </a>
    </div>
    <h3>{{ $item->title }}</h3>
    <a href="{{ route('wiki_page', $item->slug) }}" class="button">Подробнее</a>
</div>
