<section class="banner_section">
    <div class="container">
        <div class="slider_control_wrapper">
            <div class="slider">
                {{-- <swiper-container init="false" id="banner_slider">
                    @for ($i=0; $i<3; $i++)
                        <swiper-slide>
                            <x-slide.slide-main></x-slide.slide-main>
                        </swiper-slide>
                    @endfor
                </swiper-container> --}}
                <banner-slider>
                    @for ($i=0; $i<3; $i++)
                        <swiper-slide>
                            <x-slide.slide-main></x-slide.slide-main>
                        </swiper-slide>
                    @endfor
                </banner-slider>
                <x-slide.slide-button></x-slide.slide-button>
            </div>
            <div class="controls">
                <div class="control podbor_auto">
                    <h2>Подбор <br>по марке авто</h2>
                    <a href="{{ route('select_by_car') }}" class="button">Подобрать</a>
                </div>
                <div class="control podbor_param">
                    <h2>Подбор <br>по параметрам</h2>
                    <a href="{{ route('select_by_params') }}" class="button">Подобрать</a>
                </div>
            </div>
        </div>

    </div>
</section>
