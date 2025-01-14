<template>

    <div v-if="is_empty !== 0" class="compare_wrapper ">
        <div class="params">
            <div class="h">
                <h3>Характеристики</h3>
            </div>
            <div class="param">Ток разряда(EN):</div>
            <div class="param">Емкость:</div>
            <div class="param">Полярность:</div>
            <div class="param">Габариты (дл/шир/выс):</div>
            <div class="param">Вольтаж:</div>
            <div class="param">Управление:</div>
        </div>
        <div class="list">
            <div v-for="(item, index) in elements" :key="index" class="tovar">
                <div class="h tovar_h">
                    <div class="photo">
                        <img :src="storage_path+'/'+item.tovar_data.img" :alt="item.tovar_data.name">
                    </div>
                    <h4 class="name">
                        {{ item.tovar_data.name }}
                    </h4>
                    <div class="price">
                        {{ item.tovar_data.price }}₽
                    </div>
                </div>

                <div class="param">{{ item.tovar_data.amperage }}</div>
                <div class="param">{{ item.tovar_data.volume }}</div>
                <div class="param">{{ item.tovar_data.clem_location }}</div>
                <div class="param">{{ item.tovar_data.length }}/{{ item.tovar_data.width }}/{{ item.tovar_data.height }}</div>
                <div class="param">{{ item.tovar_data.voltage }}</div>
                <div class="param">
                    <a href="#" @click.prevent="deleteFav(item.tovar_data.sku)" class="button">Убрать</a>
                </div>
            </div>
        </div>
    </div>

    <div v-if="is_empty == 0" class="empty_favorites">Добавляйте товары и сравнивайте нажимая на ⚖️ параметры АКБ</div>

</template>

<script setup>
import { computed, ref } from 'vue'
import { useStore } from 'vuex'
// import TovarCard from './TovarCard.vue'

    // components: { TovarCard },

    const store = useStore()

    const asset_path = window.asset || '';
    const storage_path = window.storage || '';

    let is_empty = computed(() => store.state.favorites_count)
    let elements = computed(() => store.state.favorites_tovars)


    const deleteFav = (sku) => {

        let tiken = document.querySelector('meta[name="_token"]').content;

        axios.post('/favorites/add', {
            'product_id': sku,
            '_token': tiken
        })
        .then((response) => {
            console.log
            store.dispatch('initialFavorites')

        })
        .catch(error => console.log(error));
    }


</script>

<style>

</style>
