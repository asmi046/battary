<ul class="footer_contacts">
    @if ($all_contacts['phone'])
        <li>
            <a href="tel:+7{{ phone_format($all_contacts['phone']) }}">{{ $all_contacts['phone'] }}</a>
        </li>
    @endif

    @if ($all_contacts['adress'])
        <li>{{$all_contacts['adress']}}</li>
    @endif

</ul>
