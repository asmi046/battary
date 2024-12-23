<section class="popular_product">
    <div class="container">
        <h2 class="section_h2">Популярные модели АКБ</h2>
        {{--
            <div class="product_list_wrapper">
                <x-popular-in-main></x-popular-in-main>
            </div>
        --}}

        <div class="product_list_slider">

            <swiper-container init="false" id="popult_slider">
                <x-popular-in-main></x-popular-in-main>
            </swiper-container>

            <x-slide.slide-button prefix="popular_main_slider"></x-slide.slide-button>
        </div>
    </div>
</section>
