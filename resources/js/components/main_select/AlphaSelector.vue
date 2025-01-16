<template>
  <div class="alpha_selector">
        <a
        v-for="(item, index) in lang" :key="index"
        @click.prevent="selectChar(item)"
        :class="{active: item == props.modelValue}"
        href="#"
        >{{ item }}</a>
  </div>
</template>

<script setup>
    const emit = defineEmits(['update:modelValue'])

    const props = defineProps({
        modelValue: String,
    })


    const lang = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

    const selectChar = (char) => {
        emit('update:modelValue', char)
    }

</script>
