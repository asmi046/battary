<div id="main_side_menue" class="side_menue_wrapper">
    <div class="shadow"></div>
    <nav class="side_menue">
        <div class="top_blk">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('img/logo-full.svg') }}" alt="">
            </a>
        </div>

        <div class="menue_body">
            <nav class="side_navigation">
                <x-menues.puncts></x-menues.puncts>
            </nav>
        </div>

        <div class="bottom_blk">
        </div>
    </nav>
</div>


<div class="show_menue_button">
    <div class="icon-menu toggle_menu" aria-label="Бургер меню">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

