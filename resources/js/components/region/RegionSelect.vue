<template>
    <modal-region-select v-model:show="showModal">
        <div class="ch_blk_wrapper">
            <div v-for="(item, key, index) in regionList" :key="index" class="ch_blk">
                <p class="ch">{{ key }}</p>
                <ul class="list">
                    <li @click="manual_select_regin(value)" v-for="(value, index_l) in item" :key="index_l">{{ value }}</li>
                </ul>
            </div>
        </div>

    </modal-region-select>
    <a  class="icon_a search_lnk" href="#" @click="showModal = true">
        <svg class="sprite_icon">
            <use xlink:href="#map_pin_icon"></use>
        </svg>
        <span>{{ (curentRegion != null)?curentRegion.region:"Курская область" }}</span>
    </a>
</template>

<script setup>
import { ref } from 'vue'
import ModalRegionSelect from './ModalRegionSelect.vue';

let showModal = ref(false)
let regionList = ref([])
let curentRegion = ref(JSON.parse(localStorage.getItem("btRegion")))

console.log(JSON.parse(localStorage.getItem("btRegion")));

const get_region_list = () => {
        axios.get('/get_region_list').then((response) => {
            regionList.value = response.data;
            console.log(response)
        }).catch( (error) => {
            console.log(error)
        });
}

const get_curent_region = () => {
        axios.get('/get_geo_data').then((response) => {
            curentRegion.value = response.data;

            localStorage.setItem("btRegion", JSON.stringify(curentRegion.value));

            console.log(response)
        }).catch( (error) => {
            console.log(error)
        });
}

const manual_select_regin = (region) => {
    let geo_data = JSON.parse(localStorage.getItem("btRegion"))
    geo_data.region = region
    localStorage.setItem("btRegion", JSON.stringify(geo_data))
    curentRegion.value = geo_data
    showModal.value = false
}

get_region_list();


if (curentRegion.value == null)
     get_curent_region();

</script>
