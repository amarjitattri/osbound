<style>
  .form-group {
    margin-bottom: 0 !important;
  }
</style>
{!! Form::open(['route' => 'estimates.store', 'method' => 'post', 'id'=>'estimate_create_form','files' => true,'autocomplete'=>'off']) !!}
<div id="company_contact_details_div">
  <fieldset>
    <legend>Contact Details</legend>
    <div class="form-group row">
      {!! Form::label('contact_id', 'Name',['class'=>'col-md-4 col-form-label']) !!}
      <div class="col-md-8">
        {!! Form::select('contact_id', $names,null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'edit_contact_name','data-route'=>route('getContactCompany'),'required']) !!}
      </div>
    </div>
    <div class="form-group row">
      {!! Form::label('company_id', 'Company',['class'=>'col-md-4 col-form-label']) !!}
      <div class="col-md-8">
        {!! Form::select('company_id', $companies, null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'edit_contact_company','data-route'=>route('getCompanyContactByNameIdContactId'),'required']) !!}
      </div>
    </div>
    <div class="form-group float-right">
      <button class="btn btn-sm btn-primary" type="button" id="contact_company_reset_btn">Reset
        Lists
      </button>
    </div>
  </fieldset>
</div>
<input type="hidden" name="company_id" id="contact_company_id" required>
<input type="hidden" name="contact_id" id="contact_name_id" required>
{!! Form::close() !!}
{!! Form::open(['route' => 'company_contacts.store','method' => 'post','id'=>'company_contacts_form']) !!}
<fieldset>
  <legend>Add Contact</legend>
  <label id="company_contact_error" class="error" style="display: none"></label>
  <div class="form-group row no">
    {!! Form::label('name', 'Name',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('name',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('company', 'Company',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('company',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('telephone', 'Telephone',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('telephone', null, ['class' => 'form-control form-control-sm']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('mobile', 'Mobile',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('mobile', null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('email', 'Email',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::email('email', null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('address_line1', 'Address Line 1',['class'=>'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('address_line1', null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('address_line2', 'Address Line 2',['class'=>'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('address_line2', null, ['class' => 'form-control form-control-sm']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('county', 'County',['class'=>'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('county', null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('postal_code', 'Postal Code',['class'=>'col-md-4 p-r-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('postal_code', null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group text-right pr-0">
    <button class="btn btn-sm btn-primary" id="add_new_contact_submit_btn">Save Contact</button>
  </div>
</fieldset>
{!! Form::close() !!}

<div class="form-group text-center">
  <button class="btn btn-sm btn-success btn-ot" type="submit" id="save_estimate_btn">Save Estimate</button>
  <button class="btn btn-sm btn-primary btn-ot" type="button" id="cancel_estimate_btn" data-dismiss="modal">Cancel
  </button>
</div>

<script>
  $(document).on('change', '#edit_contact_name', function () {
    let cnval = $(this).val();
    $.get($(this).data('route'), {
      name: $(this).find('option:selected').text()
    }, function (data) {
      $(document).find("#edit_contact_company").html('<option value="0">--SELECT--</option>');
      $.each(data, function (i, v) {
        $(document).find("#edit_contact_company").append('<option value="' + v.id + '">' + v.company + '</option>');
      });
      if ($("#contact_name_id").length) {
        $("#contact_name_id").val(cnval);
      }
    });
  });
  $(document).on('change', '#edit_contact_company', function () {
    let ccval = $(this).val();
    $.get($(this).data('route'), {
      company: $(this).find('option:selected').text(),
      name_id: $("#edit_contact_name").val()
    }, function (data) {
      if ($("#contact_company_id").length) {
        $("#contact_company_id").val(ccval);
      }
      $("input[name=name]").val(data.name);
      $("input[name=company]").val(data.company);
      $("input[name=email]").val(data.email);
      $("input[name=mobile]").val(data.mobile);
      $("input[name=telephone]").val(data.telephone);
      $("input[name=address_line1]").val(data.address_line1);
      $("input[name=address_line2]").val(data.address_line2);
      $("input[name=county]").val(data.county);
      $("input[name=postal_code]").val(data.postal_code);
    });
  });
  $(document).on('click', '#save_estimate_btn', function () {
    $("#estimate_create_form").submit();
  });
  $("#company_contacts_form").validate({
    submitHandler: function (form) {
      $(form).ajaxSubmit({
        resetForm: true,
        target: "#company_contact_details_div"
      });
      return false;
    }
  });
  $("#estimate_create_form").validate();
</script>
