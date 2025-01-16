<template>
  <div class="car_icon_wrapper">
        <a @click.prevent="selectMarka(item.title)" v-for="(item, index) in carIconList" :key="index" href="#"
        :class="{active: item.title == props.modelValue}"
        class="car_icon">
            <img :src="base_path+'/'+item.img" :alt="item.title">
            <span>{{ item.title }}</span>
        </a>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    const base_path = window.storage || '';
    const emit = defineEmits(['update:modelValue'])

    const props = defineProps({
        modelValue: String,
    })

    let carIconList = ref([]);

    const selectMarka = (char) => {
        emit('update:modelValue', char)
    }

    const getCarIcon = () => {
        axios.get('/get_all_car_icon')
        .then((response) => {
            carIconList.value = response.data
            console.log(response)
        })
        .catch( (error) => {
            console.log(error)
        });
    }

    getCarIcon()

</script>
