<banner-slider>
    @foreach ($all_banners as $item)
        <swiper-slide>
            <x-slide.slide-main :item="$item"></x-slide.slide-main>
        </swiper-slide>
    @endforeach
</banner-slider>
<x-slide.slide-button></x-slide.slide-button>
