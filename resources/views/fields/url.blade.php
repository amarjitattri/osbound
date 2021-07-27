<div class="form-group">
    {!! Form::label($field['name'], $field['label'], ['class' => 'control-label']) !!}
    <input class="form-control {{ $errors->first($field['name'], 'is-invalid') }}" type="url"
           name="{{$field['name']}}" value="{{ old($field['name'], setting($field['name'])) }}" id="{{$field['name']}}"
           placeholder="{{ $field['label'] }}">
    @error($field['name'])
    <em class="error invalid-feedback" role="alert"><strong>{{ $message }}</strong></em>
    @enderror
</div>
