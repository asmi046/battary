<template>
    <div class="columns columns_2">
        <div class="column shop_list">

        </div>
        <div class="column map_side">
            <div ref="map" class="map_component"></div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';

    let map = ref(null)
    let myMap = null
    let mainShopList = ref([])
    let startGeo = [52.665894883152205,37.29416945396171];

    const loadToMap = () => {
        for(let i =0; i<mainShopList.value.length; i++) {
            let pinAdress = window.asset+"img/map_pin.png"
            console.log(mainShopList.value[i].geo)
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

    const getShops = () => {
        axios.get('/get_shops', {
            obl: "%"
        }).then((response) => {
            mainShopList.value = response.data;
            loadToMap()
            console.log(response)
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



</script>
