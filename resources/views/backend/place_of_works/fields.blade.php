<div class="form-group row">
  {!! Form::label('place', 'Site Type',['class'=>'col-md-4 col-form-label']) !!}
  <div class="col-8">
    {!! Form::text('place', null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-group text-center">
  <button class="btn btn-sm btn-success btn-ot" type="submit" id="save_btn">Save</button>
  <button class="btn btn-sm btn-primary btn-ot" type="button" id="cancel_btn" data-dismiss="modal">Cancel</button>
</div>
