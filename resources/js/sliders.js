import { register } from 'swiper/element/bundle';
register();


const bannerSlider = document.getElementById("banner_slider");
if (bannerSlider ) {
    const bannerSliderParam = {
        slidesPerView: 1,

        navigation: {
            nextEl: '#main_slide_button_next',
            prevEl: '#main_slide_button_prev',
        },
    };

    Object.assign(bannerSlider, bannerSliderParam);
    bannerSlider.initialize();
}

const productPageSlider = document.getElementById("product_page_slider");
if (productPageSlider) {
    const productPageSliderParam = {
        slidesPerView: 1,

        navigation: {
            nextEl: '#product_page_button_next',
            prevEl: '#product_page_button_prev',
        },
    };

    Object.assign(productPageSlider, productPageSliderParam);
    productPageSlider.initialize();
}




const popularSlider = document.getElementById("popult_slider");
if (popularSlider) {
    const popularSliderParam = {
        slidesPerView: 2,
        spaceBetween: 20,
        breakpoints: {


            768: {
                slidesPerView: 2,
            },

            1024: {
                slidesPerView: 3,
            },

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

}
