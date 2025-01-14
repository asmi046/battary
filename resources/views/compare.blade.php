@extends('layouts.all')
@php
    $title = "Сравнение товаров"
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

<section class="compare_section">
    <div class="container">
        <favorites></favorites>
    </div>
</section>

@endsection

