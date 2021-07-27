<div class="form-group">
    {!! Form::label($field['name'].'_top', $field['label'], ['class' => 'control-label']) !!}
    @if (!empty($field['options']))
        @foreach ($field['options'] as $key => $option)
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox($field['name'].'[]', $key, !empty($oldData[$field['name']]) ? 'in_array($key, @$oldData)'  ? true : false : null, ['class' => 'custom-control-input','id'=>'checkbox_'.$field['name'].'_'.$key]) }}
                <label class="custom-control-label" for="checkbox_{{$field['name']}}_{{$key}}">{{$option}}</label>
            </div>
        @endforeach
    @endif
</div>

