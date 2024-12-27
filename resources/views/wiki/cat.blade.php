@extends('layouts.all')

@section('main')

<section class="breadcrumbs_section">
    <div class="container">
        <x-breadcrumbs.main :title="$curent->title"></x-breadcrumbs.main>
    </div>
</section>
<section class="h1_section">
    <div class="container">
        <h1 class="bg_h1_page">{{ $curent->title }}</h1>
    </div>
</section>


<section class="wiki_section">
    <div class="container">
        <x-wiki.cat-control :cats="$cats" :curentname="$curent->title"></x-wiki.cat-control>

        <div class="wiki_post_wrapper">
            @foreach ($curent->posts as $item)
                <x-cards.wiki-card :item="$item"></x-cards.wiki-card>
            @endforeach

            <x-pagination :tovars="$curent->posts()->paginate(12)"></x-pagination>
        </div>
    </div>
</section>

@endsection
