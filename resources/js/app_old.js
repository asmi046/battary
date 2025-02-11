import './bootstrap';

import './sliders'

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

import Favorites from "./components/favorites/Favorites.vue"
import FavoritesCounter from "./components/favorites/FavoritesCounter.vue"

import SideMenu from './menues.js';

let side_menue = new SideMenu('#main_side_menue', '.show_menue_button');

if (document.getElementById("select_app")) {
    const select_app = createApp({
        components:{
            SelectByCar,
            SelectByParams,
        },
    })

    select_app.use(VueAxios, axios)
    select_app.mount("#select_app")

}


if (document.getElementById("product_page_app")) {
    const product_page_app = createApp({
        components:{
            Tap
        },
    })

    product_page_app.use(VueAxios, axios)
    product_page_app.mount("#product_page_app")
}

if (document.getElementById("filter_app")) {
    const filter_app = createApp({
        components:{
            FilterOpen
        },
    })

    filter_app.use(VueAxios, axios)
    filter_app.mount("#filter_app")
}

if (document.getElementById("shops_app")) {
    const shops_app = createApp({
        components:{
            ShopMap
        },
    })

    shops_app.use(VueAxios, axios)
    shops_app.mount("#shops_app")
}

if (document.getElementById("region_select")) {
    const region_select = createApp({
        components:{
            RegionSelect
        },
    })

    region_select.use(VueAxios, axios)
    region_select.mount("#region_select")
}


if (document.getElementById("favorites_counter")) {
    const favorites_counter = createApp({
        components:{
            FavoritesCounter
        },


        setup() {
            const store = useStore()
            store.dispatch('initialFavorites');
        }
    })

    favorites_counter.use(store)
    favorites_counter.use(VueAxios, axios)
    favorites_counter.mount("#favorites_counter")
}

if (document.getElementById("favorites_page")) {
    const favorites_page = createApp({
        components:{
            Favorites
        },


        setup() {
            const store = useStore()
            store.dispatch('initialFavorites');
        }
    })
    favorites_page.use(store)
    favorites_page.use(VueAxios, axios)
    favorites_page.mount("#favorites_page")
}


