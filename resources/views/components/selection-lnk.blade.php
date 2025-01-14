<nav class="selection_lnk tap_headers">
    <a @class(['tap_header', 'active' => Request::route()->getName() === 'select_by_car']) href="{{ route('select_by_car') }}">По авто</a>
    <a @class(['tap_header', 'active' => Request::route()->getName() === 'select_by_params']) href="{{ route('select_by_params') }}">По параметрам</a>
</nav>
