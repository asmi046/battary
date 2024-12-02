<template>
  <table>
    <thead>
        <tr>
            <th>Модификация</th>
            <th>Мщьность (Лс / кВт )</th>
            <th>Емкость</th>
            <th>Полярность</th>
            <th>Габариты (дл/шир/выс):</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(item, index) in props.modifications" :key="index">
            <td>{{ item.modification }}</td>
            <td>{{ item.PS }} / {{ item.kW }}</td>
            <td>{{ item.volume }}</td>
            <td>{{ item.clem_location }}</td>
            <td>{{ item.length }} / {{ item.width }} / {{ item.height }} </td>
        </tr>
    </tbody>
  </table>
</template>

<script setup>

const props = defineProps({
    modifications: Array
})

</script>
