
@props([
    'href'=>"#",
    'ancor'=>"ссылка",
    'icon'=>"vk_icon"
])
<a {{ $attributes->merge(['class' => 'icon_a']) }} href="{{$href}}">
    <svg class="sprite_icon">
        <use xlink:href="#{{ $icon }}"></use>
    </svg>
    <span>{{$ancor}}</span>
    {{ $slot }}
</a>
