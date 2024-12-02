import './bootstrap';

import axios from 'axios'
import VueAxios from 'vue-axios'

import {createApp} from 'vue/dist/vue.esm-bundler';
import SelectByCar from "./components/selection/SelectByCar.vue"

const select_app = createApp({
    components:{
        SelectByCar,
    },
})

select_app.use(VueAxios, axios)
select_app.mount("#select_app")
