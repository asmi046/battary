<template>
    <div class="main_selection_component">
        <tap :header="tapList" >
            <template v-slot:body1>
                <marka-selector v-show="modelList.length == 0" v-model="selectMarka"></marka-selector>
                <alpha-selector v-show="modelList.length == 0" v-model="firstChar"></alpha-selector>

                <svg v-show="doLoad" class="sprite_icon loader_svg">
                    <use xlink:href="#loader_icon"></use>
                </svg>

                <div v-if="markaList.length != 0" class="main_select_list brand_list">
                    <h3>Выберите марку авто</h3>
                    <div class="body">
                        <a @click.prevent="selectMarka = item.brand" href="#" v-for="(item, index) in markaList" :key="index" class="marka">
                            {{ item.brand }}
                        </a>
                    </div>
                </div>

                <div v-if="modelList.length != 0" class="main_select_list model_list">
                    <h2 class="section_h2">Выберите модель авто</h2>
                    <div class="model_control">
                        <div class="selected">
                            Выбрана марка: {{ selectMarka }}
                        </div>
                        <a  @click.prevent="selectClear" href="#" class="clear_select button">↺ Выбрать другую марку</a>
                    </div>

                    <div class="body">
                        <a :href="'/select_by_car?brand='+selectMarka.toUpperCase()+'&model='+item.model" v-for="(item, index) in modelList" :key="index" class="model">
                            {{ item.model }}
                        </a>
                    </div>
                </div>
            </template>
            <template v-slot:body2>
                <akb-size-select></akb-size-select>
            </template>
        </tap>
    </div>
</template>

<script setup>
    import { ref, watch } from 'vue';
    import Tap from "../Tap.vue"
    import AkbSizeSelect from "./AkbSizeSelect.vue"
    import MarkaSelector from "./MarkaSelector.vue"
    import AlphaSelector from "./AlphaSelector.vue"

    let doLoad = ref(false)
    let firstChar = ref("")
    let selectMarka = ref("")
    let markaList = ref([])
    let modelList = ref([])

    watch(firstChar, () => {
        if (firstChar.value != "") {
            selectMarka.value = ""
            modelList.value = []
            getMarkaByChar(firstChar.value)
        }
    })

    watch(selectMarka, () => {
        if (selectMarka.value != "") {
            firstChar.value = "",
            markaList.value = []
            getModelList()
        }
    })


    const asset_path = window.asset || '';

    let tapList = ref(['Подбор по маркам авто', 'Подбор по габаритам'])


    const selectClear = () => {
        firstChar.value = ""
        selectMarka.value = ""
        markaList.value = []
        modelList.value = []
    }

    const getMarkaByChar = (char) => {
        doLoad.value = true
        axios.get('/get_marka_by_char/'+char)
        .then((response) => {
            markaList.value = response.data
            doLoad.value = false
        })
        .catch( (error) => {
            console.log(error)
            doLoad.value = false
        });
    }

    const getModelList = (char) => {
        doLoad.value = true
        axios.get('/selection_filter/model', {
            params: {
                type: "Легковой автомобиль",
                brand: selectMarka.value,
            }
        })
        .then((response) => {
            modelList.value = response.data
            doLoad.value = false
        })
        .catch( (error) => {
            console.log(error)
            doLoad.value = false
        });
    }


</script>
