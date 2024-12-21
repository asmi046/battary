<div id="main_side_menue" class="side_menue_wrapper">
    <div class="shadow"></div>
    <nav class="side_menue">
        <div class="top_blk">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.svg') }}" alt="">
            </a>

            <a href="#" class="circl_btn show_menue_button">
                <x-burger-icon :active="true"></x-burger-icon>
            </a>
        </div>

        <div class="menue_body">
            <nav class="side_navigation">
                <x-menues.puncts></x-menues.puncts>
            </nav>
        </div>

        <div class="bottom_blk">
            <x-contacts-list></x-contacts-list>
        </div>
    </nav>
</div>

