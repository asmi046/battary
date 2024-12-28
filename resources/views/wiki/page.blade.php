@extends('layouts.all')

@section('main')

<section class="breadcrumbs_section">
    <div class="container">
        <x-breadcrumbs.main :wiki="$post->title"></x-breadcrumbs.main>
    </div>
</section>
<section class="h1_section">
    <div class="container">
        <h1 class="bg_h1_page">{{ $post->title }}</h1>
    </div>
</section>

<section class="wiki_page_section">
    <div class="container">
        <div class="wiki_img">
            <img src="{{ Storage::url($post->img) }}" alt="{{ $post->title }}">
        </div>
        <div class="wiki_content_wrapper text_styles">
            {!! $post->description !!}
        </div>
    </div>
</section>

@endsection
