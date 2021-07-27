<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', @$oldData->name, ['class' => 'form-control','required','autofocus']) !!}
    </div>
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', @$oldData->email, ['class' => 'form-control','required']) !!}
  </div>
  <div class="form-group col-md-4">
    {!! Form::label('isAdmin', 'Role') !!}
    {!! Form::select('isAdmin', array('Operator','Admin'),@$oldData->isAdmin, ['class' => 'form-control','required']) !!}
  </div>
</div>
