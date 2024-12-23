@foreach ($popular as $item)
    <x-cards.product-card :item="$item"></x-cards.product-card>
@endforeach
