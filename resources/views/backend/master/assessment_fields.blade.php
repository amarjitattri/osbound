<div class="row">
  <div class="form-group col-sm-6">
    {!! Form::label('name', 'Category') !!}
    {!! Form::text('name', @$oldData->name, ['class' => 'form-control','required','autofocus']) !!}
  </div>
  <div class="form-group col-sm-6">
    {!! Form::label('price', 'Price Per Hour') !!}
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">&pound;</span>
      </div>
      {!! Form::text('price', @$oldData->price, ['class' => 'form-control','required']) !!}
    </div>
  </div>
</div>
