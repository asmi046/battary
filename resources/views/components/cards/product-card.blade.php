<div class="product_card">
    <div class="img">
        <a href="{{ route('product_page', $item['slug']) }}">
            @if ($item['img'])
                <img src="{{ Storage::url($item['img']) }}" alt="{{ $item['name'] }}">
            @else
                <img class="empty_battary" src="{{ asset('img/empty-battery.svg') }}" alt="{{ $item['name'] }}">
            @endif
        </a>

    </div>
    <h3 class="title">{{ $item['name'] }}</h3>
    <p class="price">
        @if ($item['old_price'])
            <span>{{ $item['old_price'] }}₽</span>
        @endif

        @if ($item->loadedData && isset($item->loadedData[0]))
            <span class="real">
                {{ $item->loadedData[0]->price }} ₽
            </span>
        @else
            <span class="real">
                По запросу
            </span>
        @endif
        {{-- {{ $item['price'] }}₽ --}}
    </p>
    <div class="control_panel">
        <a href="{{ route('product_page', $item['slug']) }}" title="Подробнее" class="button more">Подробнее</a>
        <to-favorites-btn sku="{{$item['sku']}}"></to-favorites-btn>
        {{-- <a href="#" title="Добавить в сравнение" class="compare_button">
            <span>Подобрать</span>
            <svg class="sprite_icon">
                <use xlink:href="#compare_icon"></use>
            </svg>
        </a> --}}
    </div>
</div>
