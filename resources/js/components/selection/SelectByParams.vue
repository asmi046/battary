<template>
    <form class="select_form select_form_by_param" action="">
        <div class="field">
            <label for="size_select_component">Выберите габариты</label>
            <select v-model="selectedSize" name="" id="size_select_component">

                <option v-for="(value, key) in sizeList" :key="key" :value="key">
                    {{ key == "%"?"Любые":key }}
                </option>
            </select>
        </div>

        <div class="field">
            <label for="clemm_select_component">Выберите полярность</label>
            <select :disabled="selectedSize == '%'" v-model="selectedClemLocation" name="" id="clemm_select_component">
                <option selected value="%">Любая</option>
                <option v-for="(item, index) in clemLocationList" :key="index" :value="clemLocationToStr(item.clem_location)">
                    {{ clemLocationToStr(item.clem_location) }}
                </option>
            </select>
        </div>

        <div class="field">
            <label for="volume_select_component">Выберите емкость</label>
            <select :disabled="selectedClemLocation == '%'" v-model="selectedVolume" name="" id="volume_select_component">
                <option selected value="%">Любая</option>
                <option v-for="(item, index) in volumeList" :key="index" :value="item.volume">
                    {{ item.volume }}
                </option>
            </select>
        </div>
        <!-- <button @click.prevent="getProductList()" class="button">Подобрать</button> -->
    </form>

    <product-list v-show="productList.length != 0" :product-list="productList" v-model="order"></product-list>
</template>

<script setup>
import { ref, watch } from 'vue';
import ProductList from './ProductList.vue'

    let order = ref("")

    let selectedSize = ref("%")
    let selectedVolume = ref("%")
    let selectedAmperage = ref("")
    let selectedClemLocation = ref("%")


    let sizeList = ref([])
    let volumeList = ref([])
    // let amperageList = ref([])
    let clemLocationList = ref([])


    let queryParam = {}
    let productList = ref([])

    const clemLocationToStr = (clem) => {
        if (clem == 1) return "Прямая";
        if (clem == 0) return "Обратная";
        return "Прямая";
    }

    const getQueryParam = () => {
        queryParam = {}

        if (selectedSize.value != ""){
            queryParam['length'] = sizeList.value[selectedSize.value].length
            queryParam['width'] = sizeList.value[selectedSize.value].width
            queryParam['height'] = sizeList.value[selectedSize.value].height
        }

        if (selectedVolume.value != "") {
            queryParam['volume'] = selectedVolume.value
        }


        queryParam['order'] = (order.value)?order.value:"Сначала дорогие"


        if (selectedClemLocation.value != "") {
            queryParam['clem_location'] = selectedClemLocation.value
        }


        return queryParam
    }

    const getSizeList = () => {
        axios.get('/get_akb_size_list')
        .then((response) => {
            sizeList.value = response.data
        })
        .catch( (error) => {
            console.log(error)
        });
    }

    watch(selectedSize, () => {
        selectedVolume.value = "%"
        selectedClemLocation.value = "%"
        selectionQuery()
        getProductList()
    })

    watch(selectedClemLocation, () => {
        selectedVolume.value = "%"
        selectionQuery()
        getProductList()
    })

    watch(selectedVolume, () => {
        getProductList()
    })

    watch(order, () => {
        console.log(order.value)
        getProductList()
    })



    const selectionQuery = () => {
        let adr = '/parametr_filter'

        if (selectedClemLocation.value == "%")  {
            adr += "/clem_location"
        }

        if ((selectedClemLocation.value != "%") && (selectedVolume.value == "%"))  {
            adr += "/volume"
        }


        axios.get(adr, {
            params: getQueryParam()
        })
        .then((response) => {
            if (selectedClemLocation.value == "%")  clemLocationList.value = response.data
            if ((selectedClemLocation.value != "%") && (selectedVolume.value == "%")) volumeList.value = response.data
            console.log(volumeList.value)
        })
        .catch( (error) => {
            console.log(error)
        });
    }

    const getProductList = () => {
        axios.get('/select_product', {
            params: getQueryParam()
        })
        .then((response) => {
            productList.value = response.data
            console.log(response)
        })
        .catch( (error) => {
            console.log(error)
        });
    }

    getSizeList()

</script>
