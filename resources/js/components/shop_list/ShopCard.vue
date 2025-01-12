<template>
    <div class="shop_card">
        <div class="label">
            <svg  class="sprite_icon">
                <use v-show="props.item.aproved" xlink:href="#apr_icon"></use>
                <use v-show="!props.item.aproved" xlink:href="#apr_empty_icon"></use>
            </svg>
        </div>

        <div class="info">
            <h4>{{ props.item.name }}</h4>
            <p>Адрес: {{ props.item.adress }}</p>
            <p>Телефон: {{ props.item.phone }}</p>
        </div>

        <div class="photo">
            <img v-show="props.item.img != ''" :src="base_path+'/'+props.item.img" :alt="props.item.adress">
            <img v-show="props.item.img == ''" :src="asset_path+'img/empty-battery.svg'" :alt="props.item.adress">
        </div>

    </div>
</template>

<script setup>

const props = defineProps({
    item: Object
})

const base_path = window.storage || '';
const asset_path = window.asset || '';

</script>
