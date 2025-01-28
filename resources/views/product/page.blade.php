@extends('layouts.all')

@section('main')
    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main :title="$product->name"></x-breadcrumbs.main>
        </div>
    </section>
    <section  class="product_page">
        <div class="container">
            <div class="product_page_wrapper">
                <div class="slider">
                    <product-page-slider>
                        <swiper-slide>
                            <a data-fslightbox href="{{Storage::url($product->img)}}">
                                <img src="{{Storage::url($product->img)}}" alt="{{$product->name}}">
                            </a>
                        </swiper-slide>
                            @if ($product->galery)
                                @foreach ($product->galery as $item)
                                    <swiper-slide>
                                        <a data-fslightbox href="{{Storage::url($item['img'])}}">
                                            <img src="{{Storage::url($item['img'])}}" alt="{{$item['title']}}">
                                        </a>
                                    </swiper-slide>
                                @endforeach
                            @endif



                    </product-page-slider>
                    <x-slide.slide-button prefix="product_page_button"></x-slide.slide-button>
                </div>
                <div id="product_page_app" class="info">
                    <h1>{{$product->name}}</h1>
                    <div class="price_line">
                        <div class="price">
                            @if ($product->old_price)
                                <span class="old">
                                    {{ $product->old_price }} ₽
                                </span>
                            @endif

                            {{-- <span class="old">
                                9000 ₽
                            </span> --}}

                            <span class="real">
                                {{ $product->price }} ₽
                            </span>
                        </div>

                        <div class="compire">
                            <to-favorites-btn-page sku="{{$product->sku}}"></to-favorites-btn-page>
                            {{-- <x-icon-button ancor="Добавить в сравнение" icon="compare_icon" class="button button-yellow" ></x-icon-button> --}}
                        </div>
                    </div>

                    <p class="nal_shop_info">В наличии в {{ count($nal) }} магазинах</p>

                    <tap :header="{{ json_encode(["Характеристики", "Наличие в магазинах"]) }}">
                        <template v-slot:body1>
                            <x-cards.product-param :product="$product"></x-cards.product-param>
                        </template>
                        <template v-slot:body2>
                            <x-cards.shop-table :nal="$nal"></x-cards.shop-table>
                        </template>
                    </tap>
                </div>
            </div>
        </div>
    </section>

    <section  class="product_page">
        <div class="container">
            <h2 class="section_h2">Похожие товары</h2>
            <div class="product_list_slider">
                <popular-slider>
                    @foreach ($upsale as $item)
                        <swiper-slide>
                            <x-cards.product-card :item="$item"></x-cards.product-card>
                        </swiper-slide>
                    @endforeach

                </popular-slider>

                <x-slide.slide-button prefix="popular_main_slider"></x-slide.slide-button>
            </div>

        </div>
    </section>

@endsection
