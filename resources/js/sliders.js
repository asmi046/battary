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
console.log(bannerSlider);

bannerSlider.initialize();
