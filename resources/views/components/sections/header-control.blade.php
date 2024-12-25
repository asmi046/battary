<section class="control_section">
    <div class="container">
        <div class="element_wrapper">
            <a href="{{ route("home") }}" class="logo">
                <img src="{{ asset('img/logo-full.svg')}}" alt="{{ config('asmiseo.title_postfix')}}">
            </a>

            <form class="search_form" action="{{ route('search') }}" method="get">
                <input type="text" name="q" placeholder="Поиск" value="{{ Request::input('q') }}">
                <button>
                    <svg class="sprite_icon">
                        <use xlink:href="#leens_icon"></use>
                    </svg>
                </button>
            </form>
            <div class="control">
                {{-- <a href="#" class="button button-yellow">Сравнить</a> --}}
                <x-icon-button ancor="Сравнить" icon="compare_icon" class="button button-yellow" ></x-icon-button>
                <x-contacts.social-button></x-contacts.social-button>
            </div>
        </div>


        <form class="search_form mobil_search_form" action="get">
            <input type="text" name="q" placeholder="Поиск" value="{{ Request::input('q') }}">
            <button>
                <svg class="sprite_icon">
                    <use xlink:href="#leens_icon"></use>
                </svg>
            </button>
        </form>

    </div>
</section>
