@props(['prefix' => 'main_slide_button'])

<div class="slide_button_wrapper">
    <a href="" id="{{$prefix}}_prev" class="slide_button slide_button_prev">
        <svg class="sprite_icon">
            <use xlink:href="#arrow_slider_icon"></use>
        </svg>
    </a>
    <a href="" id="{{$prefix}}_next" class="slide_button slide_button_next">
        <svg class="sprite_icon">
            <use xlink:href="#arrow_slider_icon"></use>
        </svg>
    </a>
</div>
