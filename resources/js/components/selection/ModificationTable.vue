<template>
  <div class="table_wrapper">
    <table>
        <thead>
            <tr>
                <th>Модификация</th>
                <th>Мощность (Лс / кВт )</th>
                <th>Емкость (А/ч)</th>
                <th>Полярность</th>
                <th>Габариты (дл/шир/выс):</th>
                <th>Управление</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in props.modifications" :key="index">
                <td>{{ item.modification }}</td>
                <td>{{ item.PS }} / {{ item.kW }}</td>
                <td>{{ item.volume }}</td>
                <td>{{ clemLocationToStr(item.clem_location) }}</td>
                <td>{{ item.length }} / {{ item.width }} / {{ item.height }} </td>
                <td>
                    <a @click.prevent="selectElement(item)" class="button" href="#">Выбрать</a>
                </td>
            </tr>
        </tbody>
    </table>
  </div>
</template>

<script setup>

const emit = defineEmits(['update:modelValue'])

const clemLocationToStr = (clem) => {
    if (clem == 1) return "Прямая";
    if (clem == 0) return "Обратная";
    return "Прямая";
}

const selectElement = (item) => {
    let element = {}

    element["order"] = "Сначала дорогие"
    element["modification"] = item.modification
    element["volume"] = item.volume
    element["clem_location"] = clemLocationToStr(item.clem_location)
    element["width"] = item.width
    element["height"] = item.height
    element["length"] = item.length

    emit('update:modelValue', element)
}

const props = defineProps({
    modifications: Array,
    modelValue: Object
})

</script>
