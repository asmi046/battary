<template>
    <div class="filter_wrapper">
        <div @click="show_element = !show_element" class="filter_button">
            <svg class="sprite_icon">
                <use xlink:href="#filter_icon"></use>
            </svg>
            <span>Фильтры</span>
        </div>
        <div v-show="show_element" class="filter_body">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    let show_element = ref(true)

    if (window.innerWidth <= 768) {
        show_element.value = false
    }
</script>
