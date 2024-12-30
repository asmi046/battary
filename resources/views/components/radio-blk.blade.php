<label for="radio_{{$id}}" class="checkbox">
    <input id="radio_{{$id}}" class="checkbox__input" type="radio" {{ (Request::input($parametr) === $value)?"checked":""}} value="{{$value}}" name="{{$parametr}}">
    <span class="checkbox__text"><span>{{$valuetext}}</span></span>
</label>
