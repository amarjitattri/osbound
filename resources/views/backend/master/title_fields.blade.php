<div class="row">
  <div class="form-group col-sm-6">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', @$oldData->name, ['class' => 'form-control','required','autofocus']) !!}
  </div>
</div>
