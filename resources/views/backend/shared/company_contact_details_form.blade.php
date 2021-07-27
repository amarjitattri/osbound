<fieldset>
    <legend>Contact Details</legend>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                {!! Form::label('contact_id', 'Name',['class'=>'col-md-4 col-form-label']) !!}
                <div class="col-8">
                    {!! Form::select('contact_id', $names,null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'contact_name','data-route'=>route('getContactCompany'),'required']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('company_id', 'Company',['class'=>'col-md-4 col-form-label']) !!}
                <div class="col-8">
                    {!! Form::select('company_id', $companies, null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'contact_company','data-route'=>route('getContactName'),'required']) !!}
                </div>
            </div>
            <div class="form-group row float-right">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-success" type="button" id="add_new_contact_btn">Add New Contact</button>
                    <button class="btn btn-sm btn-primary" type="button" id="contact_company_reset_btn">Reset Lists</button>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($contact_emails))
        <div class="form-group row">
            {!! Form::label('email', 'Email',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('email', @$oldData->contact_email, ['class' => 'form-control form-control-sm','required']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('mobile', 'Mobile',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('mobile', @$oldData->contact_mobile, ['class' => 'form-control form-control-sm','required']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('telephone', 'Telephone',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('telephone', @$oldData->contact_telephone, ['class' => 'form-control form-control-sm','required']) !!}
            </div>
        </div>
    @endif
</fieldset>
