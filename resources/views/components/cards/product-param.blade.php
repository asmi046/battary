<div class="product_param">
    @if ($product->brand)
        <div class="line">
            <span class="name">Бренд:</span>
            <span class="dot"></span>
            <span class="value">{{$product->brand}}</span>
        </div>
    @endif


    @if ($product->series)
        <div class="line">
            <span class="name">Серия:</span>
            <span class="dot"></span>
            <span class="value">{{$product->series}}</span>
        </div>
    @endif

    @if ($product->amperage)
        <div class="line">
            <span class="name">Ток (EN):</span>
            <span class="dot"></span>
            <span class="value">{{$product->amperage}}</span>
        </div>
    @endif

    @if ($product->height && $product->width)
        <div class="line">
            <span class="name">Габариты (дл/шир/выс):</span>
            <span class="dot"></span>
            <span class="value">{{$product->length}} / {{$product->width}} / {{$product->height}}</span>
        </div>
    @endif

    @if ($product->volume)
        <div class="line">
            <span class="name">Емкость (А/ч):</span>
            <span class="dot"></span>
            <span class="value">{{$product->volume}}</span>
        </div>
    @endif

    @if ($product->voltage)
        <div class="line">
            <span class="name">Вольтаж (В):</span>
            <span class="dot"></span>
            <span class="value">{{$product->voltage}}</span>
        </div>
    @endif

    @if ($product->clem_location)
        <div class="line">
            <span class="name">Полярность:</span>
            <span class="dot"></span>
            <span class="value">{{clem_location_to_str($product->clem_location)}}</span>
        </div>
    @endif

    @if ($product->type)
        <div class="line">
            <span class="name">Назначение:</span>
            <span class="dot"></span>
            <span class="value">{{$product->type}}</span>
        </div>
    @endif
</div>
