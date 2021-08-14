<style>
  .form-group {
    margin-bottom: 0 !important;
  }
</style>
{!! Form::open(['route' => 'enquiries.store', 'method' => 'post', 'id'=>'enquiry_create_form','files' => true,'autocomplete'=>'off']) !!}
<div id="company_contact_details_div">
  <fieldset>
    <legend>Contact Details</legend>
    <div class="form-group row">
      {{-- {!! Form::label('contact_id', 'Name',['class'=>'col-md-4 col-form-label']) !!}
      <div class="col-md-8">
        {!! Form::select('contact_id', $contacts,null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'edit_contact_name','data-route'=>route('getContactCompany'),'required']) !!}
      </div> --}}
      {!! Form::label('contact_id', 'Name',['class'=>'col-md-4 col-form-label']) !!}
      <div class="col-md-8">
        <select class="custom-select custom-select-sm" name="contact_id" id="select_contact_id" data-route="{{ route('enquiries.create') }}" required>
            <option value="">-- Select Name--</option>
            @foreach ($contacts as $contact)
                <option {{ @$client_id == $contact->id ? 'selected' : '' }} value="{{$contact->id}}">{{$contact->first_name . ' ' . $contact->last_name}}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      {{-- {!! Form::label('company_id', 'Company',['class'=>'col-md-4 col-form-label']) !!}
      <div class="col-md-8">
        {!! Form::select('company_id', $clients, null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'edit_contact_company','data-route'=>route('getCompanyContactByNameIdContactId'),'required']) !!}
      </div> --}}
      {!! Form::label('client_id', 'Company',['class'=>'col-md-4 col-form-label']) !!}
      <div class="col-md-8">
        <select class="custom-select custom-select-sm" name="client_id" id="select_client_id" data-route="{{ route('enquiries.create') }}" required>
            <option value="">--Select Company--</option>
            @foreach ($clients as $client)
                <option {{ @$client_id == $client->id ? 'selected' : '' }} value="{{$client->id}}">{{$client->client_name}}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group float-right">
      <button class="btn btn-sm btn-primary" type="button" id="contact_company_reset_btn" data-route="{{ route('enquiries.create')}}">Reset
        Lists
      </button>
    </div>
  </fieldset>
</div>
{{-- <input type="hidden" name="company_id" id="contact_company_id" required>
<input type="hidden" name="contact_id" id="contact_name_id" required> --}}
{!! Form::close() !!}
{!! Form::open(['route' => 'clients-and-contacts.store','method' => 'post','id'=>'company_contacts_form']) !!}
<fieldset>
  <legend>Add Contact</legend>
  <label id="company_contact_error" class="error" style="display: none"></label>
  <div class="form-group row no">
    {!! Form::label('contact_name', 'Name',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('contact_name',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('client_name', 'Company',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('client_name',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('telephone', 'Telephone',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('telephone', null, ['class' => 'form-control form-control-sm', 'required']) !!}
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
    {!! Form::label('address_line_1', 'Address Line 1',['class'=>'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('address_line_1', null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('address_line_2', 'Address Line 2',['class'=>'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('address_line_2', null, ['class' => 'form-control form-control-sm']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('country', 'Country',['class'=>'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('country', null, ['class' => 'form-control form-control-sm','required']) !!}
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
  <button class="btn btn-sm btn-success btn-ot" type="submit" id="save_enquiry_btn">Save Enquiry</button>
  <button class="btn btn-sm btn-primary btn-ot" type="button" id="cancel_enquiry_btn" data-dismiss="modal">Cancel
  </button>
</div>

<script>
  $(document).on('change', '#select_contact_id', function () {
    let cnval = $(this).val();
    $.get($(this).data('route'), {
      filter: 1,
      contact_id: cnval
    }, function (data) {
      $(document).find("#select_client_id").html('<option value="" disabled>--Select Company--</option>');
      $.each(data.contacts, function (i, v) {
        $(document).find("#select_client_id").append('<option value="' + v.client.id + '" selected>' + v.client.client_name + '</option>');
      });
      // if ($("#contact_name_id").length) {
      //   $("#contact_name_id").val(cnval);
      // }
    });
  });
  $(document).on('change', '#select_client_id', function () {
    let ccval = $(this).val();
    $.get($(this).data('route'), {
      filter: 1,
      client_id: ccval
    }, function (data) {

      $(document).find("#select_contact_id").html('<option value="" disabled>--Select Name--</option>');
      $.each(data.clients.contacts, function (i, v) {
        $(document).find("#select_contact_id").append('<option value="' + v.id + '">' + v.first_name + ' ' + v.last_name + '</option>');
      });
      // if ($("#contact_company_id").length) {
      //   $("#contact_company_id").val(ccval);
      // }
      // $("input[name=name]").val(data.name);
      // $("input[name=company]").val(data.company);
      // $("input[name=email]").val(data.email);
      // $("input[name=mobile]").val(data.mobile);
      // $("input[name=telephone]").val(data.telephone);
      // $("input[name=address_line1]").val(data.address_line1);
      // $("input[name=address_line2]").val(data.address_line2);
      // $("input[name=county]").val(data.county);
      // $("input[name=postal_code]").val(data.postal_code);
    });
  });
  function callResetContactDetails(){
    $.get("{{ route('enquiries.create')}}", {
      filter: 1
    }, function (data) {
      
      $(document).find("#select_client_id").html('<option value="">--Select Company--</option>');
      $.each(data.clients, function (i, v) {
        $(document).find("#select_client_id").append('<option value="' + v.id + '">' + v.client_name + '</option>');
      });
      
      $(document).find("#select_contact_id").html('<option value="">--Select Name--</option>');
      $.each(data.contacts, function (i, v) {
        $(document).find("#select_contact_id").append('<option value="' + v.id + '">' + v.first_name + ' ' + v.last_name + '</option>');
      });

    });
  }
  $(document).on('click', '#contact_company_reset_btn', function () {
    callResetContactDetails();
  });
  $(document).on('click', '#save_enquiry_btn', function () {
    $("#enquiry_create_form").submit();
  });
  $("#company_contacts_form").validate({
    submitHandler: function (form) {
      $(form).ajaxSubmit({
        resetForm: true,
        error: function (res) {
            let errorBucket = res.responseJSON.errors ?? [];
            if(errorBucket){
                Object.keys(errorBucket).forEach(function(val, index) {
                    var $label = $("<label>").attr('id', val+'-servererror').attr('class','error').attr('for',val).text(errorBucket[val][0]);
                    var $inputField = $("input[name="+val+"]");
                    $label.insertAfter($inputField);
                });
            }
        },
        success: function (responseText, statusText, xhr, $form) {
          callResetContactDetails();
            // location.href = "{{ route('clients-and-contacts.index') }}" + "/" + responseText.id;
        }
      });
      return false;
    }
  });
  $("#enquiry_create_form").validate();
</script>
