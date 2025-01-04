@extends('layouts.all')

@section('main')

<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<section id="shops_app" class="all_shop_section">
    <div class="container">
        <shop-map></shop-map>
    </div>
</section>

@endsection
