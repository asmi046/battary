<template>
    <swiper-container
        id="banner_slider"
        :slides-per-view="1"
        :navigation="{
            nextEl: '#main_slide_button_next',
            prevEl: '#main_slide_button_prev',
        }"
    >
        <slot></slot>
    </swiper-container>
</template>

<script setup>

</script>
