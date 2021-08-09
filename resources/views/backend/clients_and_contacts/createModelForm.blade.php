<style>
  .form-group {
    margin-bottom: 0 !important;
  }
</style>

{!! Form::open(['route' => 'clients-and-contacts.store','method' => 'post','id'=>'company_contacts_form']) !!}
<fieldset>
  <legend>Add Contact</legend>
  <label id="company_contact_error" class="error" style="display: none"></label>
  <div class="form-group row no">
    {!! Form::label('client_name', 'Client Name',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('client_name',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('first_name', 'First Name',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('first_name',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('last_name', 'Surname',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('last_name',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group row">
    {!! Form::label('job_title', 'Job Title',['class'=>'col-md-4 pr-0 col-form-label']) !!}
    <div class="col-md-8">
      {!! Form::text('job_title',  null, ['class' => 'form-control form-control-sm','required']) !!}
    </div>
  </div>
  <div class="form-group text-right mt-2 pr-0">
    <button class="btn btn-sm btn-primary" id="add_new_contact_submit_btn">Save Contact</button>
  </div>
</fieldset>
{!! Form::close() !!}
{{-- 
<div class="form-group text-center">
  <button class="btn btn-sm btn-success btn-ot" type="submit" id="save_estimate_btn">Save Estimate</button>
  <button class="btn btn-sm btn-primary btn-ot" type="button" id="cancel_estimate_btn" data-dismiss="modal">Cancel
  </button>
</div> --}}

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
            location.href = "{{ route('clients-and-contacts.index') }}" + "/" + responseText.id;
        }
      });
      return false;
    }
  });
  $("#estimate_create_form").validate();
</script>
