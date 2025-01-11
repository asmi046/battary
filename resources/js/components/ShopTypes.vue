<template>
    <div class="shop_selection">
        <div @click="selectPunkt(item)" v-for="(item, key, index) in punktList" :key="index" :class="{ active: item == props.modelValue }" class="punkt">{{ key }}</div>
    </div>
</template>

<script setup>

let punktList = {
    'Все':"%",
    'Рекомендованные':"1",
};

const props = defineProps({
    modelValue: String
})

const emit = defineEmits(['update:modelValue'])

const selectPunkt = (value) => {
    emit('update:modelValue', value)
}

</script>
