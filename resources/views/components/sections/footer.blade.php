<footer>
    <div class="container">
        <div class="col col_logo">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('img/logo-full.svg')}}" alt="{{ config('asmiseo.title_postfix')}}">
            </a>

            <x-contacts.social-button pros="1"></x-contacts.social-button>

            <p class="copyright">© Все права защищены</p>
        </div>
        <div class="col col_menue">
            <p class="fheader">Навигация</p>

            <x-menues.puncts  wrap="footer_menu"></x-menues.puncts>
        </div>
        <div class="col col_menue col_menue_catalog">
            <p class="fheader">Катклог</p>
            <x-menues.puncts name="Каталог" wrap="footer_menu"></x-menues.puncts>
        </div>
        <div class="col col_contact">
            <p class="fheader">Контакты</p>
            <x-contacts.footer-list></x-contacts.footer-list>
        </div>
    </div>
</footer>
