@props([
    'summary'=>"Список 1",
    'open'=> true
])
<details @if ($open) open @endif>
    <summary>
        <span>{{ $summary }}</span>
        <svg class="sprite_icon">
            <use xlink:href="#arrow_slider_icon"></use>
        </svg>
    </summary>
    <div class="response">
        {{ $slot }}
    </div>
</details>
