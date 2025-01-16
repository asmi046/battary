<template>

    <div class="main_select_list size_list">
        <h2>Выберите габариты</h2>
        <div class="body">
            <a
            :href="'/select_by_params?length='+item.length+'&width='+item.width+'&height='+item.height"
            v-for="(item, key, index) in akbSizeList"
            :key="index"
            class="size">
                {{ key }}
            </a>
        </div>
    </div>

  </template>

  <script setup>
    import { ref } from 'vue';
      let akbSizeList = ref([]);


      const getAkbSize = () => {
        axios.get('/get_akb_size_list')
        .then((response) => {
            akbSizeList.value = response.data
            console.log(response)
        })
        .catch( (error) => {
            console.log(error)
        });
    }


    getAkbSize()

  </script>
