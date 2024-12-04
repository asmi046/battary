<template>
  <table>
    <thead>
        <tr>
            <th>Модификация</th>
            <th>Мщьность (Лс / кВт )</th>
            <th>Емкость</th>
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
</template>

<script setup>

const emit = defineEmits(['update:modelValue'])

const clemLocationToStr = (clem) => {
    if (clem == 1) return "прямая";
    if (clem == 0) return "обратная";
    return "прямая";
}

const selectElement = (item) => {
    let element = {}

    element["modification"] = item.modification
    element["volume"] = item.volume
    element["clem_location"] = item.clem_location
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
