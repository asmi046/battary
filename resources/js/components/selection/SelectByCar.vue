<template>

<form class="select_form select_form_by_car" action="">
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
    <h2 class="hm">Модификации</h2>
    <modification-table :modifications="tsModificationList"></modification-table>
</div>

</template>

<script setup>
import ModificationTable from './ModificationTable.vue'

import { ref, watch } from 'vue';

    let selectedTsType = ref("");
    let selectedTsBrand = ref("");
    let selectedTsModel = ref("");
    let selectedTsModification = ref("");

    let tsTypeList = ref([])
    let tsBrandlList = ref([])
    let tsModelList = ref([])
    let tsModificationList = ref([])

    let queryParam = {}

    watch(selectedTsType, () => {
        selectionQuery()
        selectedTsBrand.value = ""
        selectedTsModel.value = ""
        selectedTsModification.value = ""
    })

    watch(selectedTsBrand, () => {
        selectionQuery()
        selectedTsModel.value = ""
        selectedTsModification.value = ""
    })

    watch(selectedTsModel, () => {
        selectionQuery()
        selectedTsModification.value = ""
    })


    const selectionQuery = () => {
        let adr = '/selection_filter'

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
            if ((selectedTsType.value != "")&&(selectedTsBrand.value != "")&&(selectedTsModel.value != "")) tsModificationList.value = response.data
            console.log(response)
        })
        .catch( (error) => {
            console.log(error)
        });
    }


    selectionQuery()

</script>
