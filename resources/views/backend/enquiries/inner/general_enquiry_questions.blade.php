<fieldset>
  <legend>General Enquiry Questions</legend>
  <div class="row">
    <div class="col-md-12">
      @if($enquiry_for = @$general_enquiry_questions['enquiry_for'])
      <div class="form-group row">
        <label for="{{ $enquiry_for['field'] }}" class="col-md-4 col-form-label">{{ $enquiry_for['title'] }}</label>
        <div class="col-md-8">
            <select class="custom-select" id="enquiry_for" name="{{ $enquiry_for['field'] }}">
            <option selected="selected" value="">Please Select</option>
            @foreach($enquiry_for['options'] as $id=> $value)
            <option value="{{$id}}" @if(old('enquiry_for') || @$job_data['generalEnquiryQuestion']['enquiry_for'] == $id) selected="" @endif>{{ $value }}</option>
            @endforeach
            </select>
        </div>
      </div>
      @endif
      {{-- @if($enquiry_owner = @$general_enquiry_questions['enquiry_owner'])
      <div class="form-group row">
      <label for="{{ $enquiry_owner['field'] }}" class="col-md-4 col-form-label">{{ $enquiry_owner['title'] }}</label>
      <div class="col-md-8">
          <select class="custom-select" id="enquiry_owner" name="{{ $enquiry_owner['field'] }}">
          <option selected="selected" value="">Please Select</option>
          @foreach($enquiry_owner['options'] as $id=> $value)
          <option value="{{$id}}" @if(old('enquiry_owner') || @$job_data['generalEnquiryQuestion']['enquiry_owner'] == $id) selected="" @endif>{{ $value }}</option>
          @endforeach
          </select>
      </div>
      </div>
      @endif --}}
      @if($hear_from = @$general_enquiry_questions['hear_from'])
      <div class="form-group row">
        <label for="{{ $hear_from['field'] }}" class="col-md-4 col-form-label">{{ $hear_from['title'] }}</label>
        <div class="col-md-8">
            <select class="custom-select" id="hear_from" name="{{ $hear_from['field'] }}">
            <option selected="selected" value="">Please Select</option>
            @foreach($hear_from['options'] as $id=> $value)
            <option value="{{$id}}" @if(old('hear_from') || @$job_data['generalEnquiryQuestion']['hear_from'] == $id) selected="" @endif>{{ $value }}</option>
            @endforeach
            </select>
        </div>
      </div>
      @endif
      
      <div class="form-group row">
        <label for="transport_for" class="col-md-4 col-form-label">Transport For
            Collection Required</label>
        <div class="col-md-1">
            <div class="custom-control custom-checkbox" style="margin-top: 7px;">
                <input type="checkbox" name="transport_require" @if((old('transport_require') == 'on' || @$job_data['generalEnquiryQuestion']['transport_require'] == '1')) checked @endif>
              
            </div>
        </div>
        <div class="col-md-7">
            <input class="form-control date_timepicker" name="transport_require_date"
            type="text" value="{{ (old('transport_require_date') ?? @$job_data['generalEnquiryQuestion']['transport_require_date']) }}" id="transport_require_date">
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6">
            <label for="express_quotation" class="control-label">Express Quotation</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="express_quotation" @if((old('express_quotation') == 'on' || @$job_data['generalEnquiryQuestion']['express_quotation'] == '1')) checked @endif>
                
            {{-- <input class="custom-control-input" name="express_quotation" type="checkbox"
                value="{{ (old('express_quotation') ?? @$job_data['generalEnquiryQuestion']['express_quotation']) }}" id="express_quotation">
            <label class="custom-control-label" for="express_quotation">&nbsp;</label> --}}
            </div>
        </div>
        <div class="col-md-6">
            <label for="quotation_required_by" class="control-label">Quotation Required By</label>
            <input class="form-control date_timepicker"
            name="quotation_required_by" type="text" value="{{ (old('quotation_required_by') ?? @$job_data['generalEnquiryQuestion']['quotation_required_by']) }}" id="quotation_required_by">
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6">
            <label for="contract_start" class="control-label">Contract Start</label>
            <input class="form-control datepicker" name="contract_start" type="text"
            value="{{ (old('contract_start') ?? @$job_data['generalEnquiryQuestion']['contract_start']) }}" id="contract_start">
        </div>
        <div class="col-md-6">
            <label for="contract_finish" class="control-label">Contract Finish</label>
            <input class="form-control datepicker" name="contract_finish" type="text"
            value="{{ (old('contract_finish') ?? @$job_data['generalEnquiryQuestion']['contract_finish']) }}" id="contract_finish">
        </div>
      </div>
    </div>
    <div class="col-md-12">
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
              @if($site_type = @$general_enquiry_questions['site_type'])
              @php
                  $count = 0;
                  $total = $site_type['total'];
                  // $site = json_decode($job_data['generalEnquiryQuestion']['site'], true);
                  // dd($job_data['generalEnquiryQuestion']['site']);
              @endphp
              @while((++$count) <= $total)
              <tr>
                  <td>
                      <select class="custom-select" name="site[{{$count}}][type]">
                          <option selected="selected" value="">Please Select</option>
                          @foreach($site_type['options'] as $id=> $value)
                              <option value="{{$id}}" @if(old('site['.$count.'][type]') || @$job_data['generalEnquiryQuestion']['site'][$count]['type'] == $id) selected="" @endif>{{ $value }}</option>
                          @endforeach
                      </select>
                  </td>
                  <td>
                  <textarea class="form-control" rows="3" name="site[{{ $count }}][site_address]"
                      cols="50">{{ old('site['.$count.'][site_address]') ?? @$job_data['generalEnquiryQuestion']['site'][$count]['site_address'] }}</textarea>
                  </td>
                  <td>    
                  <input class="form-control" name="site[{{$count}}][postal_code]" type="number" value="{{ old('site['.$count.'][postal_code]') ?? @$job_data['generalEnquiryQuestion']['site'][$count]['postal_code'] }}">
                  </td>
              </tr>
              @endwhile
              @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</fieldset>