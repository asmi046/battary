<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @header_seo

    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
    <link rel="icon" type="image/svg" href="{{asset('/img/favicons/fav.svg')}}" sizes="any">

    <meta name="_token" content="{{ csrf_token() }}">



    <script>
        window.asset = "{{ asset('') }}";
        window.storage = "{{ asset('storage') }}";
    </script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'public/scss/main.scss'
    ])
    <script src="{{ asset('js/fslightbox.js') }}"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="//code.jivo.ru/widget/P4eRoHwzy3" async></script>
</head>
<body>
    @include("allicon")
    {{-- <x-menues.side-menu></x-menues.side-menu> --}}
    <main id="main_app">

        <x-sections.header></x-sections.header>
        <x-sections.header-control></x-sections.header-control>

        @yield('main')

        <x-sections.footer></x-sections.footer>
        <side-menu>
            <x-menues.puncts></x-menues.puncts>
            <p class="menu_header">Каталог</p>
            <x-menues.puncts name="Каталог" wrap="side_cat_menu"></x-menues.puncts>

            <x-icon-button href="{{ route('compare') }}" ancor="Сравнить" icon="compare_icon" class="button button-yellow button_compare" >
                <div class="favorites_counter">
                    <favorites-counter></favorites-counter>
                </div>
            </x-icon-button>
        </side-menu>
    </main>
</body>
</html>
