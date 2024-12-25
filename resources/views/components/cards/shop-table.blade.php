<div class="shop_table">
    @foreach ($nal as $item)
        <div class="shop">
            <div class="info">
                {{ $item->shop }}
            </div>
            <div class="count">
                {{ $item->nap }} шт.
            </div>
        </div>
    @endforeach

</div>
