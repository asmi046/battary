<template>

    <div :class="{ active: showMenue }" class="shadow"></div>
    <nav :class="{ active: showMenue }" class="side_menue">
        <div class="top_blk">
            <a class="logo" href="/">
                <img :src="asset_path + 'img/logo-full.svg'" alt="">
            </a>
        </div>

        <div class="menue_body">
            <nav class="side_navigation">
                <slot></slot>
            </nav>
        </div>

        <div class="bottom_blk">
        </div>
    </nav>

    <div @click="tgMenue" class="show_menue_button">
        <div class="icon-menu toggle_menu" aria-label="Бургер меню">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

</template>

<script setup>
    import { ref } from 'vue';

    let showMenue = ref(false)
    const tgMenue = () => {
        showMenue.value = !showMenue.value
    }
    const asset_path = window.asset || '';
</script>
