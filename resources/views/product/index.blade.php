@extends('layouts.all')

@php
    $title = 'Каталог продукции';
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

    <section class="catalog_page_section">
        <div class="container">
            <div class="catalog_side_wrapper">

                <form class="filter">
                    <x-details-main summary="Категории товара">
                        @foreach ($all_cat as $item)
                            <a href="{{ route('product_cat', $item->slug) }}">{{ $item->name }}</a>
                        @endforeach
                    </x-details-main>

                    <x-details-main summary="Цена, ₽">
                        <x-param-range name="price"></x-param-range>
                    </x-details-main>

                    <x-details-main summary="Емкость А/ч">
                        <x-param-range name="volume"></x-param-range>
                    </x-details-main>

                    <x-details-main summary="Ток пуска, А">
                        <x-param-range name="amperage"></x-param-range>
                    </x-details-main>
                </form>

                <div class="product_list_wrapper">
                    @foreach ($all_product as $item)
                        <x-cards.product-card :item="$item"></x-cards.product-card>
                    @endforeach
                </div>
            </div>

            <x-pagination :tovars="$all_product"></x-pagination>
        </div>
    </section>
@endsection
