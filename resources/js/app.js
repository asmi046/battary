import './bootstrap';

import { register } from 'swiper/element/bundle';
register();


import axios from 'axios'
import VueAxios from 'vue-axios'

import { store } from "./storage"
import { useStore } from 'vuex'

import {createApp} from 'vue/dist/vue.esm-bundler';
import SelectByCar from "./components/selection/SelectByCar.vue"
import SelectByParams from "./components/selection/SelectByParams.vue"
import Tap from "./components/Tap.vue"
import FilterOpen from "./components/FilterOpen.vue"
import ShopMap from "./components/shop_list/ShopMap.vue"
import RegionSelect from "./components/region/RegionSelect.vue"

import ToFavoritesBtnPage from "./components/favorites/ToFavoritesBtnPage.vue"
import ToFavoritesBtn from "./components/favorites/ToFavoritesBtn.vue"
import Favorites from "./components/favorites/Favorites.vue"
import FavoritesCounter from "./components/favorites/FavoritesCounter.vue"

import MainSelector from "./components/main_select/MainSelector.vue"

import BannerSlider from "./components/sliders/BannerSlider.vue"
import PopularSlider from "./components/sliders/PopularSlider.vue"
import ProductPageSlider from "./components/sliders/ProductPageSlider.vue"
import SideMenu from "./components/SideMenu.vue"

// import SideMenu from './menues.js';

// let side_menue = new SideMenu('#main_side_menue', '.show_menue_button');


document.addEventListener("DOMContentLoaded", function(event) {
    fsLightbox.open();
});

if (document.getElementById("main_app")) {
    const main_app = createApp({
        components:{
            SelectByCar,
            SelectByParams,
            Tap,
            FilterOpen,
            ShopMap,
            RegionSelect,
            FavoritesCounter,
            Favorites,
            BannerSlider,
            PopularSlider,
            ProductPageSlider,
            SideMenu,
            ToFavoritesBtn,
            ToFavoritesBtnPage,
            MainSelector
        },

        setup() {
            const store = useStore()
            store.dispatch('initialFavorites');
        }

    })

    main_app.use(store)
    main_app.use(VueAxios, axios)
    main_app.mount("#main_app")

}

