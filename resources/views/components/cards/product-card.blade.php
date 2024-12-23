<div class="product_card">
    <div class="img">
        @if ($item['img'])
            <img src="{{ Storage::url($item['img']) }}" alt="{{ $item['name'] }}">
        @else
            <img class="empty_battary" src="{{ asset('img/empty-battery.svg') }}" alt="{{ $item['name'] }}">
        @endif
    </div>
    <h3 class="title">{{ $item['name'] }}</h3>
    <p class="price">
        @if ($item['old_price'])
            <span>{{ $item['old_price'] }}₽</span>
        @endif
        {{ $item['price'] }}₽
    </p>
    <div class="control_panel">
        <a href="#" title="Подробнее" class="button more">Подробнее</a>
        <a href="#" title="Добавить в сравнение" class="compare_button">
            <svg class="sprite_icon">
                <use xlink:href="#compare_icon"></use>
            </svg>
        </a>
    </div>
</div>
