import { register } from 'swiper/element/bundle';
register();


const bannerSlider = document.getElementById("banner_slider");


const bannerSliderParam = {
    slidesPerView: 1,

    navigation: {
        nextEl: '#main_slide_button_next',
        prevEl: '#main_slide_button_prev',
    },
};

Object.assign(bannerSlider, bannerSliderParam);
bannerSlider.initialize();

const popularSlider = document.getElementById("popult_slider");


const popularSliderParam = {
    slidesPerView: 1,
    spaceBetween: 20,
    breakpoints: {

        1280: {
          slidesPerView: 4,

        }
    },
    navigation: {
        nextEl: '#popular_main_slider_next',
        prevEl: '#popular_main_slider_prev',
    },
};

Object.assign(popularSlider,popularSliderParam);
popularSlider.initialize();
