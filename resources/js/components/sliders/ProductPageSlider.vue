<template>
    <swiper-container
        id="product_page_slider"
        :slides-per-view="1"

        :navigation = "{
            nextEl: '#product_page_button_next',
            prevEl: '#product_page_button_prev',
        }"
    >
        <slot></slot>
    </swiper-container>
</template>

<script>

</script>
