@extends('layouts.all')

@php
    $title = 'Контакты';
@endphp

@section('main')

<section class="breadcrumbs_section">
    <div class="container">
        <x-breadcrumbs.main :title="$page_about->title"></x-breadcrumbs.main>
    </div>
</section>
<section class="h1_section">
    <div class="container">
        <h1 class="bg_h1_page">{{ $page_about->title }}</h1>
    </div>
</section>

<section class="about_page_section">
    <div class="container">
        <div class="columns columns_2">
            <div class="column text_styles text">
                {!! $page_about->description !!}
            </div>

            <div class="column photo">
                @foreach ($page_about->galery as $item)
                    <div class="img">
                        <img src="{{ Storage::url($item['img'])  }}" alt="{{ $item['title'] }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="digit_line">
            @foreach ($page_about->params as $item)
                @if ($item['cat'] === "Цифры")
                    <div class="didgit">
                        <span>{{ $item['value'] }}</span>
                        <p>{{ $item['title'] }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <section class="about_page_adv_section">
        <div class="container">
            <h2 class="section_h2">Наши преимущества</h2>
            <div class="adv_wrapper">
                @foreach ($page_about->params as $item)
                    @if ($item['cat'] === "adv")
                        <div class="adv_blk">
                            <div class="icon_wrapper">
                                <svg class="sprite_icon">
                                    <use xlink:href="#{{ $item['value'] }}"></use>
                                </svg>
                            </div>
                            <p>{{ $item['title'] }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


</section>

@endsection

