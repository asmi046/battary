@extends('layouts.all')

@php
    $title = 'База знаний';
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

<section class="wiki_section">
    <div class="container">
        <div class="wiki_cat">
            @foreach ($cats as $item)
                <a href="{{ route('wiki_cat', $item->slug) }}" class="wiki_cat_element">{{ $item->title }}</a>
            @endforeach
        </div>
        <div class="wiki_post_wrapper">
            @foreach ($posts as $item)
                <x-cards.wiki-card :item="$item"></x-cards.wiki-card>
            @endforeach
        </div>
    </div>
</section>

@endsection
