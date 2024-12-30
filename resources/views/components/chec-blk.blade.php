<label for="check_{{$id}}" class="checkbox">
    <input id="check_{{$id}}" class="checkbox__input" type="checkbox" {{ value_check($parametr, $value)?"checked":""}} value="{{$value}}" name="{{$parametr}}[]">
    <span class="checkbox__text"><span>{{$valuetext}}</span></span>
</label>
