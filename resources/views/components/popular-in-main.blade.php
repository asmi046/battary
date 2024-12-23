@foreach ($popular as $item)
    <swiper-slide>
        <x-cards.product-card :item="$item"></x-cards.product-card>
    </swiper-slide>
@endforeach
