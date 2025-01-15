@extends('layouts.all')

@php
    $title = 'Контакты';
@endphp

@section('main')

<section class="breadcrumbs_section">
    <div class="container">
        <x-breadcrumbs.main :title="$title"></x-breadcrumbs.main>
    </div>
</section>
<section class="h1_section">
    <div class="container">
        <h1 class="bg_h1_page">{{ $title }}</h1>
    </div>
</section>

<section class="contacts_page_section">
    <div class="container">
        <div class="columns columns_2">
            <div class="column">
                <div class="main_info">
                    <h4>{{$all_contacts['organ']->value}}</h4>
                    <a href="tel:+7{{ phone_format($all_contacts['phone']->value) }}" class="phone_in_contact_page">{{ $all_contacts['phone']->value }}</a>
                    <h4>Время работы:</h4>
                    <p>{{$all_contacts['work_time']->value}}</p>
                </div>

                <div class="all_rekvizites">
                    <h2>Реквизиты компании для оптовых покупателей и присоединения к сети</h2>
                    @foreach ($all_contacts as $key => $item)
                        @continue(in_array($key, ['organ','phone', 'work_time', 'geo', 'vk', 'tg', 'ws']))
                        @continue(empty($item->value))

                        <p><strong>{{$item->name}}:</strong> {{$item->value}}</p>
                    @endforeach
                </div>
            </div>

            <div class="column">
                <script>
                    ymaps.ready(init);

                    function init () {
                        let coordinates = [{{ $all_contacts['geo']->value }}]
                        let pinAdress = '{{ asset("img/map_pin.png") }}'
                        console.log(pinAdress)
                        var myMap = new ymaps.Map("map", {
                            center: coordinates,
                            zoom: 17,
                            controls: []
                        });

                        var myGeoObjects = [];

                        // Указываем координаты метки
                        myGeoObjects = new ymaps.Placemark(coordinates,{
                                                            hintContent: '<div class="map-hint">{{ $all_contacts["organ"]->value }}</div>',
                                                            balloonContent: '<div class="map-hint">{{ $all_contacts["organ"]->value }}</div>',
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

                        var clusterer = new ymaps.Clusterer({
                            clusterDisableClickZoom: false,
                            clusterOpenBalloonOnClick: false,
                        });

                        clusterer.add(myGeoObjects);
                        myMap.geoObjects.add(clusterer);
                        // Отключим zoom
                        myMap.behaviors.disable('scrollZoom');

                    }
                </script>

                <div id="map" class="map_contacts"></div>
            </div>
        </div>

    </div>
</section>


@endsection

