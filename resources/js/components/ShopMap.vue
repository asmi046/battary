<template>
    <div class="columns columns_2">
        <div class="column shop_list">
            <form class="shop_select_form" action="">
                <shop-types v-model="shopType"></shop-types>
                <select v-model="selectObl">
                    <option disabled value="%">Все регионы</option>
                    <option v-for="(item, index) in regionList" :key="index" :value="item">{{ item }}</option>
                </select>
            </form>

            <div class="shop_list_wrapper">
                <div v-for="(item, index) in mainShopList" :key="index" class="shop_card">
                    <h4>{{ item.name }}</h4>
                    <p>Адрес: {{ item.adress }}</p>
                    <p>Телефон: <a :href="'tel:' + item.phone">{{ item.phone }}</a></p>
                </div>
            </div>

        </div>
        <div class="column map_side">
            <div class="history">
                <svg class="sprite_icon">
                    <use xlink:href="#apr_icon"></use>
                </svg>
                <span>магазин с наибольшим ассортиментом и ценой, не выше, чем указана на сайте</span>
            </div>
            <div ref="map" class="map_component"></div>
        </div>
    </div>
</template>

<script setup>
    import { ref, watch } from 'vue';
    import ShopTypes from "./ShopTypes.vue"

    let shopType = ref("%")
    let regionList = ref([])
    let map = ref(null)
    let myMap = null
    let mainShopList = ref([])
    let startGeo = [52.665894883152205,37.29416945396171];
    let selectObl = ref(JSON.parse(localStorage.getItem("btRegion"))? JSON.parse(localStorage.getItem("btRegion")).region : '%')


    watch([shopType, selectObl], () => {
        console.log("ch!")
        getShops()
    } )

    const loadToMap = () => {
        myMap.geoObjects.removeAll()
        for(let i =0; i<mainShopList.value.length; i++) {
            let pinAdress = window.asset+"img/map_pin.svg"
            if (mainShopList.value[i].aproved )
                pinAdress = window.asset+"img/map_pin_apr.svg"
            let pl = new ymaps.Placemark(mainShopList.value[i].geo.split(',') ,{
                                                hintContent: '<div class="map-hint"></div>',
                                                balloonContent: '<div class="map-hint"></div>',
                                            }
                                            ,{
                                                iconLayout: 'default#image',
                            // Путь до нашей картинки
                            iconImageHref: pinAdress,
                            // Размеры иконки
                            iconImageSize: [22, 30],
                            // Смещение верхнего угла относительно основания иконки
                            iconImageOffset: [-11, -31]
                        });

            myMap.geoObjects.add(pl);
       }
    }

    const get_region_list = () => {
        axios.get('/get_region_list').then((response) => {
            let alpha_list = [];

            for (var k in response.data) {
                for (var index in response.data[k]) {
                    alpha_list.push(response.data[k][index])
                }
            }
            regionList.value = alpha_list

        }).catch( (error) => {
            console.log(error)
        });
    }

    const getShops = () => {
        console.log(selectObl.value)
        axios.get('/get_shops', {
            params: {
                obl: selectObl.value,
                apr: shopType.value
            }
        }).then((response) => {
            mainShopList.value = response.data;
            loadToMap()
        }).catch( (error) => {
            console.log(error)
        });
    }

    ymaps.ready( () => {

		myMap = new ymaps.Map(map.value, {
			center: startGeo,
			zoom: 5,
			controls: []
		});

        loadToMap()

    });

    getShops()
    get_region_list()



</script>
