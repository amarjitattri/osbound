<fieldset>
  <legend>General Enquiry Questions</legend>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group row">
        {!! Form::label('enquiry_for', 'Enquiry For',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-md-8">
          {!! Form::select('enquiry_for', array('Osbond & Tutt'=> 'Osbond & Tutt', 'London Spray Finishes'=>'London Spray Finishes') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </div>
      </div>
      <div class="form-group row">
        {!! Form::label('referral_from', 'How Did You hear about us',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-md-8">
          {!! Form::select('referral_from', array('Email'=>'Email','Google'=>'Google','Instagram'=>'Instagram','Facebook'=>'Facebook','Linkedin'=>'Linkedin') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </div>
      </div>
      <div class="form-group row">
        {!! Form::label('transport_for', 'Transport For Collection Required',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-md-1">
          <div class="custom-control custom-checkbox" style="margin-top: 7px;">
            {!! Form::checkbox('transport_for_required', 1 , null , ['class' => 'custom-control-input','id'=>'transport_for_required']) !!}
            <label class="custom-control-label" for="transport_for_required">&nbsp;</label>
          </div>
        </div>
        <div class="col-md-7">
          {!! Form::text('transport_for', null , ['class' => 'form-control date_timepicker','readonly']) !!}
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6">
          {!! Form::label('express_quotation', 'Express Quotation',['class'=>'control-label']) !!}
          <div class="custom-control custom-checkbox">
            {!! Form::checkbox('express_quotation', 1 , null , ['class' => 'custom-control-input']) !!}
            <label class="custom-control-label" for="express_quotation">&nbsp;</label>
          </div>
        </div>
        <div class="col-md-6">
          {!! Form::label('quotation_required_by', 'Quotation Required By',['class'=>'control-label']) !!}
          {!! Form::text('quotation_required_by' , null , ['class' => 'form-control date_timepicker','readonly']) !!}
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6">
          {!! Form::label('contract_start', 'Contract Start',['class'=>'control-label']) !!}
          {!! Form::text('contract_start' , null , ['class' => 'form-control datepicker']) !!}
        </div>
        <div class="col-md-6">
          {!! Form::label('contract_finish', 'Contract Finish',['class'=>'control-label']) !!}
          {!! Form::text('contract_finish' , null , ['class' => 'form-control datepicker']) !!}
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-borderless table-condensed">
          <thead>
          <tr>
            <th width="30%">Site Type</th>
            <th width="50%">Site Address</th>
            <th width="20">Postcode</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
              {!! Form::select('site_type_1', $site_types , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
            </td>
            <td>
              {!! Form::textarea('site_address_1', null, ['class' => 'form-control','rows'=>'3']) !!}
            </td>
            <td>
              {!! Form::number('postcode_1', null, ['class' => 'form-control']) !!}
            </td>
          </tr>
          <tr>
            <td>
              {!! Form::select('site_type_2', $site_types , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
            </td>
            <td>
              {!! Form::textarea('site_address_2', null, ['class' => 'form-control','rows'=>'3']) !!}
            </td>
            <td>
              {!! Form::number('postcode_2', null, ['class' => 'form-control']) !!}
            </td>
          </tr>
          <tr>
            <td>
              {!! Form::select('site_type_3', $site_types , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
            </td>
            <td>
              {!! Form::textarea('site_address_3', null, ['class' => 'form-control','rows'=>'3']) !!}
            </td>
            <td>
              {!! Form::number('postcode_3', null, ['class' => 'form-control']) !!}
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</fieldset>
