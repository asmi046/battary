@extends('layouts.all')

@php
    $title = 'Результаты поиска по запросу: '.$q;
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

    <section class="search_result_section">
        <div class="container">
            <div class="product_list_wrapper">
                @foreach ($products as $item)
                    <x-cards.product-card :item="$item"></x-cards.product-card>
                @endforeach
            </div>
            <x-pagination :tovars="$products"></x-pagination>
        </div>
    </section>

@endsection
