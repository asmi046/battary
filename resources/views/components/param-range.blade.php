@props([
    'name'=>"field_def",
])
<div class="range_param">
    <div class="side from">
        <label for="{{$name}}_param_from">От</label>
        <input type="number" id="{{$name}}_param_from" name="{{$name}}_from" value="{{ $_REQUEST[$name.'_from'] ?? 0 }}">
    </div>

    <div class="side to">
        <label for="{{$name}}_param_to">До</label>
        <input type="number" id="{{$name}}_param_to" name="{{$name}}_to" value="{{ $_REQUEST[$name.'_to'] ?? 0 }}">
    </div>
</div>
