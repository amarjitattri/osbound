{!! Form::open(['route' => 'company_contacts.store','method' => 'post','id'=>'company_contacts_form']) !!}
<fieldset disabled>
    <legend>Add Contact</legend>
    <label id="company_contact_error" class="error" style="display: none"></label>
    <div class="form-group row no">
        {!! Form::label('name', 'Name',['class'=>'col-md-4 pr-0 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('name',  null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('company', 'Company',['class'=>'col-md-4 pr-0 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('company',  null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('telephone', 'Telephone',['class'=>'col-md-4 pr-0 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('telephone', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('mobile', 'Mobile',['class'=>'col-md-4 pr-0 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('mobile', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('email', 'Email',['class'=>'col-md-4 pr-0 col-form-label']) !!}
        <div class="col-8">
            {!! Form::email('email', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('address_line1', 'Address Line 1',['class'=>'col-md-4 col-form-label address_line']) !!}
        <div class="col-8">
            {!! Form::text('address_line1', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('address_line2', 'Address Line 2',['class'=>'col-md-4 col-form-label address_line']) !!}
        <div class="col-8">
            {!! Form::text('address_line2', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('county', 'County',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('county', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('postal_code', 'Postal Code',['class'=>'col-md-4 p-r-0 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('postal_code', null, ['class' => 'form-control form-control-sm','required']) !!}
        </div>
    </div>
    <div class="form-group text-right pr-0">
        <button class="btn btn-sm btn-primary" id="add_new_contact_submit_btn">Save Contact</button>
    </div>
</fieldset>
{!! Form::close() !!}
