<div class="form-group">
    {!! Form::label($field['name'], $field['label'], ['class' => 'control-label']) !!}
    <input class="form-control noscroll {{ $errors->first($field['name'], 'is-invalid') }}" name="{{$field['name']}}"
           type="email" value="{{ old($field['name'],@$oldData[$field['name']]) }}" id="{{$field['name']}}"
           placeholder="Enter Your {{ $field['label'] }}">
    <small class="text-info float-right">{{ @$field['info'] }}</small>
    @error($field['name'])
    <em class="error invalid-feedback" role="alert"><strong>{{ $message }}</strong></em>
    @enderror
</div>
