<template>
    <div class="product">
        <h2 class="hm">Продукты</h2>


        <div class="control_panel">
            <div class="field">
                <label for="order_component">Сортировка</label>
                <select v-model="order" name="" id="order_component">
                    <option selected value="Сначала дорогие">Сначала дорогие</option>
                    <option value="Сначала дешевые">Сначала дешевые</option>
                    <option value="Сначала большей ёмкости">Сначала большей ёмкости</option>
                    <option value="Сначала меньшей ёмкости">Сначала меньшей ёмкости</option>
                </select>
            </div>
        </div>
        <div class="product_wrapper">
            <div v-for="(item, index) in props.productList" :key="index" class="product_card product_card_select">
                <div class="photo">
                    <img v-if="item.img != ''" :src="base_path+'/'+item.img" :alt="item.name">
                    <img v-else :src="asset_path+'img/empty-battery.svg'" :alt="item.name">
                </div>
                <div class="name">
                    <h3>{{ item.name }}</h3>
                </div>
                <div class="params">
                    <ul>
                        <li>Габариты: <strong>{{ item.length }} / {{ item.width }} / {{ item.height }}</strong></li>
                        <li>Ток: <strong>{{ item.amperage }} (EN)</strong></li>
                        <li>Ёмкость: <strong>{{ item.volume }} (А/ч)</strong></li>
                        <li>Полярность: <strong>{{ clemLocationToStr(item.clem_location) }} </strong></li>
                    </ul>
                </div>
                <div class="price_section">
                    <p class="price">{{ item.price }}₽</p>
                </div>
                <div class="control">
                    <a target="_blank" :href="'/catalog/product/'+item.slug" class="button">Перейти</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref, watch } from 'vue';

    const emit = defineEmits(['update:modelValue'])

    let order = ref("Сначала дорогие")

    const props = defineProps({
        productList: Array,
        modelValue: String
    })

    watch(order, () => {
        console.log('order - '+order.value);
        emit('update:modelValue', order.value)
    })

    const clemLocationToStr = (clem) => {
        if (clem == 1) return "Прямая";
        if (clem == 0) return "Обратная";
        return "Прямая";
    }
    const base_path = window.storage || '';
    const asset_path = window.asset || '';
</script>
