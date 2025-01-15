<template>
  <div class="table_wrapper">
    <table class="modification_table">
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
                <td>
                    <span class="mob_header">Модификация</span>
                    <span class="value">{{ item.modification }}</span>
                </td>
                <td>
                    <span class="mob_header">Мощность (Лс / кВт )</span>
                    <span class="value">{{ item.PS }} / {{ item.kW }}</span>
                </td>
                <td>
                    <span class="mob_header">Емкость (А/ч)</span>
                    <span class="value">{{ item.volume }}</span>
                </td>
                <td>
                    <span class="mob_header">Полярность</span>
                    <span class="value">{{ clemLocationToStr(item.clem_location) }}</span>
                </td>
                <td>
                    <span class="mob_header">Габариты (дл/шир/выс):</span>
                    <span class="value">{{ item.length }} / {{ item.width }} / {{ item.height }}</span>
                </td>
                <td>
                    <span class="mob_header">Управление</span>
                    <span class="value"><a @click.prevent="selectElement(item)" class="button" href="#">Выбрать</a></span>
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
