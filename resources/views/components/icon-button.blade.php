
@props([
    'href'=>"#",
    'ancor'=>"ссылка",
    'icon'=>"vk_icon"
])

<a {{ $attributes->merge(['class' => 'icon_button']) }} href="{{$href}}">
    <span>{{$ancor}}</span>
    <svg class="sprite_icon">
        <use xlink:href="#{{ $icon }}"></use>
    </svg>

    {{ $slot }}
</a>
