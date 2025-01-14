<template>
    <a @click.prevent="addToBascet" href="#" title="Добавить в сравнение" :class="{'favorite_fill':in_favorites}" class="compare_button">
        <span>Подобрать</span>
        <svg class="sprite_icon">
            <use xlink:href="#compare_icon"></use>
        </svg>
    </a>
</template>

<script setup>
    import { onMounted, ref, watch } from 'vue'
    import { useStore } from 'vuex'

    const props = defineProps({
        sku: String
    })



        const store = useStore()

        let in_favorites = ref(false)

        const in_favorites_chekc = () => {
            let inFavoritesElem = store.getters.favoritesList.find((elem) => { return elem.product_sku === props.sku})
            in_favorites.value = (inFavoritesElem != undefined)
        }

        watch(() => store.getters.favoritesCount, function() {
            in_favorites_chekc()
        });

        const addToBascet = () => {

            console.log(props.sku)

            let tiken = document.querySelector('meta[name="_token"]').content;

            axios.post('/favorites/add', {
                'product_id': props.sku,
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
