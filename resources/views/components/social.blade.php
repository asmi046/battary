<div class="social">
    <a href="#" class="social_icon">
        <svg class="sprite_icon">
            <use xlink:href="#vk_icon"></use>
        </svg>
    </a>

    @if(isset($pros))
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

</div>
