<template>
    <div class="columns columns_2">
        <div class="column shop_list">
            <form class="shop_select_form" action="">
                <shop-types v-model="shopType"></shop-types>
                <select v-model="selectObl">
                    <option value="%">Все регионы</option>
                    <option v-for="(item, index) in regionList" :key="index" :value="item">{{ item }}</option>
                </select>
            </form>

            <div class="shop_list_wrapper">
                <shop-card @click="go_to_shop(item.geo)" v-for="(item, index) in mainShopList" :key="index" :item="item"></shop-card>
            </div>

        </div>
        <div class="column map_side">
            <div class="history warning history_warning">
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
    import ShopCard from "./ShopCard.vue"

    let shopType = ref("%")
    let regionList = ref([])
    let map = ref(null)
    let myMap = null
    let mainShopList = ref([])
    let startGeo = [52.665894883152205,37.29416945396171];
    let curentGeo = ref([52.665894883152205,37.29416945396171]);
    let curentZoom = ref(5);


    let selectObl = ref(JSON.parse(localStorage.getItem("btRegion"))? JSON.parse(localStorage.getItem("btRegion")).region : '%')


    watch([shopType, selectObl], () => {
        getShops()
    } )

    const loadToMap = () => {
        myMap.geoObjects.removeAll()

        for(let i =0; i<mainShopList.value.length; i++) {
            let pinAdress = window.asset+"img/map_pin.svg"
            if (mainShopList.value[i].aproved )
                pinAdress = window.asset+"img/map_pin_apr.svg"
""
            const hintValue = '<div class="map_hint"><h4>'+mainShopList.value[i].name+'</h4><p>Адрес: '+mainShopList.value[i].adress+'</p><p>Телефон: '+mainShopList.value[i].phone+'</p></div>'

            let pl = new ymaps.Placemark(mainShopList.value[i].geo.split(',') ,{
                                                hintContent: '<div class="map-hint">'+hintValue+'</div>',
                                                balloonContent: '<div class="map-hint">'+hintValue+'</div>',
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


    const go_to_shop = (point) => {
        let toZoom = 12;
        let toPoint = point.split(',')

        myMap.setCenter([parseFloat(toPoint[0]), parseFloat(toPoint[1])], toZoom)
    }

    const map_to_point = () => {
        let toPoint = startGeo;
        let toZoom = curentZoom.value;
        if (selectObl.value != "%" && mainShopList.value.length != 0) {
            toPoint = mainShopList.value[0].geo.split(',')
            toZoom = 8;
        }

        myMap.setCenter([parseFloat(toPoint[0]), parseFloat(toPoint[1])], toZoom)
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
            map_to_point()
        }).catch( (error) => {
            console.log(error)
        });
    }

    ymaps.ready( () => {

		myMap = new ymaps.Map(map.value, {
			center: curentGeo.value,
			zoom: curentZoom.value,
			controls: ['zoomControl', 'typeSelector']
		});

        loadToMap()

    });



    getShops()
    get_region_list()



</script>
