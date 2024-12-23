<section class="control_section">
    <div class="container">
        <a href="{{ route("home") }}" class="logo">
            <img src="{{ asset('img/logo-full.svg')}}" alt="{{ config('asmiseo.title_postfix')}}">
        </a>

        <form class="search_form" action="get">
            <input type="text" name="search_str" placeholder="Поиск">
            <button>
                <svg class="sprite_icon">
                    <use xlink:href="#leens_icon"></use>
                </svg>
            </button>
        </form>
        <div class="control">
            <a href="#" class="button button-yellow">Сравнить</a>
            <x-social></x-social>
        </div>
    </div>
</section>
