import './bootstrap';

import './sliders'

import axios from 'axios'
import VueAxios from 'vue-axios'

import {createApp} from 'vue/dist/vue.esm-bundler';
import SelectByCar from "./components/selection/SelectByCar.vue"
import SelectByParams from "./components/selection/SelectByParams.vue"

const select_app = createApp({
    components:{
        SelectByCar,
        SelectByParams
    },
})

select_app.use(VueAxios, axios)
select_app.mount("#select_app")
