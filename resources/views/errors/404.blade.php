@extends('layouts.all')

@section('main')

<section class="section_404">
    <div class="container">
        <h1>404</h1>
        <p>К сожадению данная страница не найдена</p>
        <a href="{{route("home")}}" class="button">На главную</a>
        <a href="{{ route('select_by_car') }}" class="button">Подбор по авто</a>
        <a href="{{ route('select_by_params') }}" class="button">Подбор параметрам</a>
    </div>
</section>

@endsection
