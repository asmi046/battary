<div class="main_slide_elelemt">
    <img src="{{ Storage::url($item->img) }}" alt="{{ strip_tags($item->title) }}">
    <div class="shadow"></div>
    <div class="info">
        <p class="head th">{!! $item->title !!}</p>
        @if ($item->sub_title)
            <p class="sub_head">{!! $item->sub_title !!}</p>
        @endif

        @if($item->lnk_text)
            <a href="{{ $item->lnk ?? "#" }}" class="button button-white">{{ $item->lnk_text }}</a>
        @endif

    </div>
</div>
