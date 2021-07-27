<fieldset>
    <legend>Contact Details</legend>
    <div class="form-group row">
        {!! Form::label('contact_id', 'Name',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('contact_id', $names,null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'edit_contact_name','data-route'=>route('getContactCompany'),'required']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('company_id', 'Company',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('company_id', $companies, null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'edit_contact_company','data-route'=>route('getCompanyContactByNameIdContactId'),'required']) !!}
        </div>
    </div>
    @if (!empty($contact_emails))
        <div class="form-group row">
            {!! Form::label('email', 'Email',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('email', @$oldData->contact_email, ['class' => 'form-control form-control-sm','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('mobile', 'Mobile',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('mobile', @$oldData->contact_mobile, ['class' => 'form-control form-control-sm','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('telephone', 'Telephone',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('telephone', @$oldData->contact_telephone, ['class' => 'form-control form-control-sm','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('address_line1', 'Address Line 1',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('address_line1', @$oldData->contact_address_line1, ['class' => 'form-control form-control-sm','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('address_line2', 'Address Line 2',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('address_line2', @$oldData->contact_address_line2, ['class' => 'form-control form-control-sm','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('county', 'County',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('county', @$oldData->contact_county, ['class' => 'form-control form-control-sm','readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('postal_code', 'Postal Code',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('postal_code', @$oldData->contact_postal_code, ['class' => 'form-control form-control-sm','readonly']) !!}
            </div>
        </div>

    @else
        <div class="form-group float-right">
            <button class="btn btn-sm btn-success" type="button" id="add_new_contact_btn">Add New Contact
            </button>
            <button class="btn btn-sm btn-primary" type="button" id="contact_company_reset_btn">Reset
                Lists
            </button>
        </div>
    @endif
</fieldset>
@section('customjs')
    @parent
    <script>
        $(document).on('change', '#edit_contact_name', function () {
            let cnval  = $(this).val();
            $.get($(this).data('route'), {
                name: $(this).find('option:selected').text()
            }, function (data) {
                $(document).find("#edit_contact_company").html('<option value="0">--SELECT--</option>');
                $.each(data, function (i, v) {
                    $(document).find("#edit_contact_company").append('<option value="' + v.id + '">' + v.company + '</option>');
                });
                if($("#contact_name_id").length){
                    $("#contact_name_id").val(cnval);
                }
            });
        });
        $(document).on('change', '#edit_contact_company', function () {
            let ccval  = $(this).val();
            $.get($(this).data('route'), {
                company: $(this).find('option:selected').text(),
                name_id:$("#edit_contact_name").val()
            }, function (data) {
                if($("#contact_company_id").length){
                    $("#contact_company_id").val(ccval);
                }
                $("input[name=email]").val(data.email);
                $("input[name=mobile]").val(data.mobile);
                $("input[name=mobile]").val(data.mobile);
                $("input[name=telephone]").val(data.telephone);
                $("input[name=address_line1]").val(data.address_line1);
                $("input[name=address_line2]").val(data.address_line2);
                $("input[name=county]").val(data.county);
                $("input[name=postal_code]").val(data.postal_code);
            });
        });
    </script>
@endsection
