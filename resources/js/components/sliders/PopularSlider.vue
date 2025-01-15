<template>
    <swiper-container
        id="popult_slider"
        :slides-per-view="2"
        :space-between="20"
        :breakpoints="{


            768: {
                slidesPerView: 2,
            },

            1024: {
                slidesPerView: 3,
            },

            1280: {
                slidesPerView: 4,
            }
        }"

        :navigation="{
            nextEl: '#popular_main_slider_next',
            prevEl: '#popular_main_slider_prev',
        }"
    >
        <slot></slot>
    </swiper-container>
</template>

<script setup>

</script>
