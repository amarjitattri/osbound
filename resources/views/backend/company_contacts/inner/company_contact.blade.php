<fieldset>
    <legend>Contact Details</legend>
    <div class="form-group row">
        {!! Form::label('name', 'Name',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('name', $names, @$name, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'contact_name','data-route'=>route('getContactCompany')]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('company', 'Company',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('company', $companies, @$company, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'contact_company','data-route'=>route('getContactName')]) !!}
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-info" type="button" id="add_new_contact_btn">Add New Contact
        </button>
        <button class="btn btn-sm btn-primary" type="button" id="contact_company_reset_btn">Reset
            Lists
        </button>
    </div>
</fieldset>
