<fieldset>
    <legend>Contact Details</legend>
    <div class="form-group row">
        {!! Form::label('contact_name', 'Name',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('contact_name',null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('company_name', 'Company',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('company_name', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('email', 'Email',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('email', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('mobile', 'Mobile',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('mobile', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('telephone', 'Telephone',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('telephone', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
</fieldset>
