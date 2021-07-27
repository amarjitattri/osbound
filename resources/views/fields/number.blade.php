<div class="form-group">
    {!! Form::label($field['name'], $field['label'], ['class' => 'control-label']) !!}
    <input class="form-control noscroll {{ $errors->first($field['name'], 'is-invalid') }}" name="{{$field['name']}}"
           type="number" value="{{ old($field['name']) }}" id="{{$field['name']}}"
           placeholder="Enter Your {{ $field['label'] }}">
    <small class="text-info float-right">{{ @$field['info'] }}</small>
</div>
