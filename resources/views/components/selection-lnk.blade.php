<nav class="selection_lnk">
    <a @class(['button', 'button-white' => Request::route()->getName() !== 'select_by_car']) href="{{ route('select_by_car') }}">Подбор по авто</a>
    <a @class(['button', 'button-white' => Request::route()->getName() !== 'select_by_params']) href="{{ route('select_by_params') }}">Подбор по параметрам</a>
</nav>
