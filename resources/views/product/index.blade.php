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
            <div class="catalog_side_wrapper" id="filter_app">
                <filter-open>
                    <form action="{{url()->current()}}" method="GET" class="filter">
                        <x-details-main summary="Категории товара">
                            @foreach ($all_cat as $item)
                                {{-- <a href="{{ route('product_cat', $item->slug) }}">{{ $item->name }}</a> --}}
                                <x-chec-blk id="cat{{$loop->index}}" parametr="category" :value="$item->id" :valuetext="$item->name"></x-chec-blk>
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

                        <x-details-main summary="Полярность">
                            <x-radio-blk id="cleam_1" parametr="clem_location" value="Прямая" valuetext="Прямая"></x-radio-blk>
                            <x-radio-blk id="cleam_2" parametr="clem_location" value="Обратная" valuetext="Обратная"></x-radio-blk>
                        </x-details-main>

                        <div class="filter_button_wrapper">
                           <button type="submit">Применить фильтр</button>
                           <a href="{{url()->current()}}" class="button button-border">Сбросить фильтр</a>
                        </div>
                    </form>
                </filter-open>


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
