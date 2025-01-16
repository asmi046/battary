@extends('layouts.all')

@section('main')
    <x-sections.slider></x-sections.slider>

    <section class="main_selector_section">
        <div class="container">
            <main-selector></main-selector>
        </div>
    </section>

    <x-sections.technic-type></x-sections.technic-type>
    <x-sections.util></x-sections.util>
    <x-sections.popular-in-main></x-sections.popular-in-main>
    <x-sections.about-in-main></x-sections.about-in-main>
@endsection
