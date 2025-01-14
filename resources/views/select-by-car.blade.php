@extends('layouts.all')

@php
    $title = "Подбор АКБ по автомобилю"
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

<section id="select_app" class="select_by_car">
    <div class="container">
        <x-selection-lnk></x-selection-lnk>
        <select-by-car></select-by-car>
    </div>
</section>

@endsection
