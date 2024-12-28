import './bootstrap';

import './sliders'

import axios from 'axios'
import VueAxios from 'vue-axios'

import {createApp} from 'vue/dist/vue.esm-bundler';
import SelectByCar from "./components/selection/SelectByCar.vue"
import SelectByParams from "./components/selection/SelectByParams.vue"
import Tap from "./components/Tap.vue"

import SideMenu from './menues.js';

let side_menue = new SideMenu('#main_side_menue', '.show_menue_button');

const select_app = createApp({
    components:{
        SelectByCar,
        SelectByParams,
        Tap
    },
})

select_app.use(VueAxios, axios)
select_app.mount("#select_app")

const product_page_app = createApp({
    components:{
        Tap
    },
})

product_page_app.use(VueAxios, axios)
product_page_app.mount("#product_page_app")


