<div class="form-group">
    {!! Form::label($field['name'], $field['label'], ['class' => 'control-label']) !!}
    <input class="form-control {{ $errors->first($field['name'], 'is-invalid') }}" type="{{$field['type']}}"
           name="{{$field['name']}}" value="{{ old($field['name'],@$oldData[$field['name']]) }}" id="{{$field['name']}}"
           placeholder="Enter Your {{ $field['label'] }}">
    @error($field['name'])
    <em class="error invalid-feedback" role="alert"><strong>{{ $message }}</strong></em>
    @enderror
</div>
