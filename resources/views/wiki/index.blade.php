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
        <x-wiki.cat-control :cats="$cats" curentname="Все"></x-wiki.cat-control>

        <div class="wiki_post_wrapper">
            @foreach ($posts as $item)
                <x-cards.wiki-card :item="$item"></x-cards.wiki-card>
            @endforeach

            <x-pagination :tovars="$posts"></x-pagination>
        </div>
    </div>
</section>

@endsection
