<div class="social">
    @if ($social_button['vk'])
        <a href="{{ $social_button['vk'] }}" class="social_icon">
            <svg class="sprite_icon">
                <use xlink:href="#vk_icon"></use>
            </svg>
        </a>
    @endif


    @if ($social_button['tg'])
        @if($pros === "1")
            <a href="#" class="social_icon">
                <svg class="sprite_icon">
                    <use xlink:href="#tg_icon_b"></use>
                </svg>
            </a>
        @else
            <a href="#" class="social_icon">
                <svg class="sprite_icon">
                    <use xlink:href="#tg_icon"></use>
                </svg>
            </a>
        @endif
    @endif

</div>
