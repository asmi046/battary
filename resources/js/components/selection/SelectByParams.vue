<template>
    <form class="select_form select_form_by_param" action="">
        <select v-model="selectedSize" name="" id="">
            <option disabled value="">Выберите габариты</option>
            <option v-for="(value, key) in sizeList" :key="key" :value="key">
                {{ key }}
            </option>
        </select>
        <select :disabled="selectedSize == ''" v-model="selectedVolume" name="" id="">
            <option disabled value="">Выберите емкость</option>
            <option v-for="(item, index) in volumeList" :key="index" :value="item.volume">
                {{ item.volume }}
            </option>
        </select>

        <select :disabled="selectedVolume == ''" v-model="selectedAmperage" name="" id="">
            <option disabled value="">Выберите стартовый ток</option>
            <option v-for="(item, index) in amperageList" :key="index" :value="item.amperage">
                {{ item.amperage }}
            </option>
        </select>

        <select :disabled="selectedAmperage == ''" v-model="selectedClemLocation" name="" id="">
            <option disabled value="">Выберите полярность</option>
            <option v-for="(item, index) in clemLocationList" :key="index" :value="item.clem_location">
                {{ clemLocationToStr(item.clem_location) }}
            </option>
        </select>

        <button @click.prevent="getProductList()" class="button">Подобрать</button>
    </form>

    <product-list v-show="productList.length != 0" :product-list="productList"></product-list>
</template>

<script setup>
import { ref, watch } from 'vue';
import ProductList from './ProductList.vue'

    let selectedSize = ref("")
    let selectedVolume = ref("")
    let selectedAmperage = ref("")
    let selectedClemLocation = ref("")


    let sizeList = ref([])
    let volumeList = ref([])
    let amperageList = ref([])
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

        if (selectedAmperage.value != "") {
            queryParam['amperage'] = selectedAmperage.value
        }

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
        selectedVolume.value = ""
        selectedAmperage.value = ""
        selectedClemLocation.value = ""
        selectionQuery()
    })

    watch(selectedVolume, () => {
        selectedAmperage.value = ""
        selectedClemLocation.value = ""
        selectionQuery()
    })

    watch(selectedAmperage, () => {
        selectedClemLocation.value = ""
        selectionQuery()
    })


    const selectionQuery = () => {
        let adr = '/parametr_filter'

        if (selectedVolume.value == "")  {
            adr += "/volume"
        }

        if ((selectedVolume.value != "") && (selectedAmperage.value == ""))  {
            adr += "/amperage"
        }

        if ((selectedVolume.value != "") && (selectedAmperage.value != "") && (selectedClemLocation.value == ""))  {
            adr += "/clem_location"
        }

        axios.get(adr, {
            params: getQueryParam()
        })
        .then((response) => {
            if (selectedVolume.value == "") volumeList.value = response.data
            if ((selectedVolume.value != "") && (selectedAmperage.value == "")) amperageList.value = response.data
            if ((selectedVolume.value != "") && (selectedAmperage.value != "") && (selectedClemLocation.value == "")) clemLocationList.value = response.data
            console.log(response)
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
