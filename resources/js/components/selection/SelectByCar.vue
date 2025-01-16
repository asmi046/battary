<template>

<form class="select_form select_form_by_car " action="">
    <select v-model="selectedTsType" name="" id="">
        <option value="">Выберите тип ТС</option>
        <option v-for="(item, index) in tsTypeList" :key="index" :value="item.type">
            {{ item.type }}
        </option>
    </select>
    <select :disabled="selectedTsType == ''" v-model="selectedTsBrand" name="" id="">
        <option value="">Выберите марку ТС</option>
        <option v-for="(item, index) in tsBrandlList" :key="index" :value="item.brand">
            {{ item.brand }}
        </option>
    </select>

    <select :disabled="selectedTsBrand == ''" v-model="selectedTsModel" name="" id="">
        <option value="">Выберите модель ТС</option>
        <option v-for="(item, index) in tsModelList" :key="index" :value="item.model">
            {{ item.model }}
        </option>
    </select>
</form>

<div v-show="tsModificationList.length != 0" class="modification">

    <div class="warning select_warning">
        <span>Ёмкость дается справочно, обязательно сравните размеры вашей и предлагаемых батарей</span>
    </div>

    <h2 class="hm">Модификации</h2>
    <modification-table v-if="showModificationList" v-model="selectedAkbParam" :modifications="tsModificationList"></modification-table>
    <div v-else class="select_modification">
        <strong>{{ selectedTsBrand }} {{ selectedTsModel }} {{ selectedAkbParam.modification }} </strong>     <span>{{ selectedAkbParam.length }} / {{ selectedAkbParam.width }} / {{ selectedAkbParam.height }}, {{ selectedAkbParam.volume }} (А/ч)</span> <a @click.prevent="clearSelectParam()" href="#" class="button">Назад к модификациям</a>
    </div>

    <product-list v-show="productList.length != 0" :product-list="productList" v-model="order"></product-list>
    <p v-if="productList.length == 0 && showModificationList == false" class="hm">Нет подходящих товаров в базе</p>
</div>


</template>

<script setup>
import ModificationTable from './ModificationTable.vue'
import ProductList from './ProductList.vue'

import { ref, watch } from 'vue';

    let order = ref("")

    let selectedTsType = ref("");
    let selectedTsBrand = ref("");
    let selectedTsModel = ref("");
    let selectedTsModification = ref("");

    let tsTypeList = ref([])
    let tsBrandlList = ref([])
    let tsModelList = ref([])
    let tsModificationList = ref([])

    let showModificationList = ref(false)

    let productList = ref([])

    let queryParam = {}
    let selectedAkbParam = ref({})



    watch(selectedTsType, () => {
        selectedTsBrand.value = ""
        selectedTsModel.value = ""
        selectedTsModification.value = ""
        tsModificationList.value = []
        productList.value = []
        selectionQuery()
    })

    watch(selectedTsBrand, () => {
        selectedTsModel.value = ""
        selectedTsModification.value = ""
        tsModificationList.value = []
        productList.value = []
        selectionQuery()
    })

    watch(selectedTsModel, () => {
        selectedTsModification.value = ""
        tsModificationList.value = []
        productList.value = []
        selectionQuery()
    })

    watch(selectedAkbParam, (newVal, oldVal) => {
        console.log(newVal)
        productQuery();
    })


    watch(order, () => {
        selectedAkbParam.value['order'] = order.value
        productQuery()
    })

    const getStartParams = () => {
        const brand = new URLSearchParams(window.location.search).get("brand");
        const model = new URLSearchParams(window.location.search).get("model");
        if (brand && model) {
            selectedTsType.value = "Легковой автомобиль";
            selectedTsBrand.value = brand;
            selectedTsModel.value = model;
        }
    }

    const clearSelectParam = () => {
        productList.value = []
        showModificationList.value = true
    }

    const productQuery = () => {
        axios.get('/select_product', {
            params: selectedAkbParam.value
        })
        .then((response) => {
            productList.value = response.data
            showModificationList.value = false
            console.log(response)
        })
        .catch( (error) => {
            console.log(error)
        });
    }


    const selectionQuery = () => {
        let adr = '/selection_filter'
        queryParam = {}

        if (selectedTsType.value == "") adr += "/type"
        if ((selectedTsType.value != "")&&(selectedTsBrand.value == ""))  {
                adr += "/brand"
                queryParam['type'] = selectedTsType.value
        }
        if ((selectedTsType.value != "")&&(selectedTsBrand.value != "")&&(selectedTsModel.value == ""))  {
            adr += "/model"
            queryParam['type'] = selectedTsType.value
            queryParam['brand'] = selectedTsBrand.value
        }
        if ((selectedTsType.value != "")&&(selectedTsBrand.value != "")&&(selectedTsModel.value != ""))  {
            queryParam['type'] = selectedTsType.value
            queryParam['brand'] = selectedTsBrand.value
            queryParam['model'] = selectedTsModel.value
        }

        axios.get(adr, {
            params: queryParam
        })
        .then((response) => {
            if (selectedTsType.value == "") tsTypeList.value = response.data
            if ((selectedTsType.value != "")&&(selectedTsBrand.value == "")) tsBrandlList.value = response.data
            if ((selectedTsType.value != "")&&(selectedTsBrand.value != "")&&(selectedTsModel.value == "")) tsModelList.value = response.data
            if ((selectedTsType.value != "")&&(selectedTsBrand.value != "")&&(selectedTsModel.value != "")) {
                tsModificationList.value = response.data
                showModificationList.value = true;
            }
            console.log(response)
            getStartParams();
        })
        .catch( (error) => {
            console.log(error)
        });
    }

    selectionQuery()



</script>
