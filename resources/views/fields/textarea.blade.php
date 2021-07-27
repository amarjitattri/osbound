<div class="form-group">
    <label for="{{$field['name']}}" class="control-label">{{$field['label']}}
        @if(!empty($field['rules']))

        @endif
    </label>
    {!! Form::label($field['name'], $field['label'].'<span>*</span>', ['class' => 'control-label']) !!}
    <textarea class="form-control {{ $errors->first($field['name'], 'is-invalid') }}" name="{{$field['name']}}"
              rows="{{$field['rows']??5}}"
              id="{{$field['name']}}"
              cols="{{$field['cols']??50}}"
              placeholder="Enter Your {{ $field['label'] }}">{{ old($field['name']) }}
    </textarea>
    <small class="text-info float-right">{{ @$field['info'] }}</small>
</div>
