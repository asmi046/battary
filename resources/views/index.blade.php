@extends('layouts.all')

@section('main')
<section class="zag_section">
        <img class="zagl_logo" src="{{ asset('img/logo-char.svg') }}" alt="Сеть магазинов «Батарейка»">
        <a href="{{ route('select_by_car') }}" class="button">Перейти к подбору</a>
</section>
@endsection

