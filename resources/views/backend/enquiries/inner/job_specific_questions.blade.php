<fieldset>
  <legend>Job Specific Enquiry Questions</legend>
  <div class="table-responsive">
    <table class="table table-condensed table-borderless padding_zero">
      @if($item_fixed = @$job_specific_enquiry_questions['item_fixed'])
      <tr>
        <td colspan="2">{{ $item_fixed['title'] }}</td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="item_fixed" name="{{ $item_fixed['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($item_fixed['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('item_fixed') || @$job_data['jobSpecificEnquiryQuestion']['item_fixed'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        <td width="60%">
          <textarea class="form-control" rows="3" name="item_fixed_text"
            cols="50">{{ old('item_fixed_text') ?? @$job_data['jobSpecificEnquiryQuestion']['item_fixed_text']}}</textarea>
        </td>
      </tr>
      @endif
      @if($sheen_level = @$job_specific_enquiry_questions['sheen_level'])
      <tr>
        <td colspan="2">{{ $sheen_level['title'] }}</td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="sheen_level" name="{{ $sheen_level['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($sheen_level['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('sheen_level') || @$job_data['jobSpecificEnquiryQuestion']['sheen_level'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        <td width="60%">
          <textarea class="form-control" rows="3" name="sheen_level_text"
            cols="50">{{ old('sheen_level_text') ?? @$job_data['jobSpecificEnquiryQuestion']['sheen_level_text']}}</textarea>
        </td>
      </tr>
      @endif
      @if($condition_substrate = @$job_specific_enquiry_questions['condition_substrate'])
      <tr>
        <td colspan="2">{{ $condition_substrate['title'] }}</td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="condition_substrate" name="{{ $condition_substrate['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($condition_substrate['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('condition_substrate') || @$job_data['jobSpecificEnquiryQuestion']['condition_substrate'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        <td width="60%">
          <textarea class="form-control" rows="3" name="condition_substrate_text"
            cols="50">{{ old('condition_substrate_text') ?? @$job_data['jobSpecificEnquiryQuestion']['condition_substrate_text']}}</textarea>
        </td>
      </tr>
      @endif
      @if($require_fitting_items = @$job_specific_enquiry_questions['require_fitting_items'])
      <tr>
        <td colspan="2">{{ $require_fitting_items['title'] }}</td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="require_fitting_items" name="{{ $require_fitting_items['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($require_fitting_items['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('require_fitting_items') || @$job_data['jobSpecificEnquiryQuestion']['require_fitting_items'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        <td width="60%">
          <textarea class="form-control" rows="3" name="require_fitting_items_text"
            cols="50">{{ old('require_fitting_items_text') ?? @$job_data['jobSpecificEnquiryQuestion']['require_fitting_items_text']}}</textarea>
        </td>
      </tr>
      @endif
      @if($substrate_contact_area = @$job_specific_enquiry_questions['substrate_contact_area'])
      <tr>
        <td colspan="2">{{ $substrate_contact_area['title'] }}</td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="substrate_contact_area" name="{{ $substrate_contact_area['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($substrate_contact_area['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('substrate_contact_area') || @$job_data['jobSpecificEnquiryQuestion']['substrate_contact_area'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        <td width="60%">
          <textarea class="form-control" rows="3" name="substrate_contact_area_text"
            cols="50">{{ old('substrate_contact_area_text') ?? @$job_data['jobSpecificEnquiryQuestion']['substrate_contact_area_text']}}</textarea>
        </td>
      </tr>
      @endif
      @if($colour_choices = @$job_specific_enquiry_questions['colour_choices'])
      <tr>
          <td colspan="2">{{ $colour_choices['title'] }} <br>
              <small>({{$colour_choices['sub_title']}})</small>
          </td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="colour_choices" name="{{ $colour_choices['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($colour_choices['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('colour_choices') || @$job_data['jobSpecificEnquiryQuestion']['colour_choices'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        <td width="60%">
          <textarea class="form-control" rows="3" name="colour_choices_text"
            cols="50">{{ old('colour_choices_text') ?? @$job_data['jobSpecificEnquiryQuestion']['colour_choices_text']}}</textarea>
        </td>
      </tr>
      @endif
      @if($contours_substrate_exposed = @$job_specific_enquiry_questions['contours_substrate_exposed'])
      <tr>
          <td colspan="2">{{ $contours_substrate_exposed['title'] }} <br>
              <small>({{$contours_substrate_exposed['sub_title']}})</small>
          </td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="contours_substrate_exposed" name="{{ $contours_substrate_exposed['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($contours_substrate_exposed['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('contours_substrate_exposed') || @$job_data['jobSpecificEnquiryQuestion']['contours_substrate_exposed'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        <td width="60%">
          <textarea class="form-control" rows="3" name="contours_substrate_exposed_text"
            cols="50">{{ old('contours_substrate_exposed_text') ?? @$job_data['jobSpecificEnquiryQuestion']['contours_substrate_exposed_text']}}</textarea>
        </td>
      </tr>
      @endif
      @if($samples = @$job_specific_enquiry_questions['samples'])
      <tr>
          <td colspan="2">{{ $samples['title'] }} 
          </td>
      </tr>
      <tr>
        <td width="40%">
          <select class="custom-select" id="samples" name="{{ $samples['field'] }}">
              <option selected="selected" value="">Please Select</option>
              @foreach($samples['options'] as $id=> $value)
                  <option value="{{$id}}" @if(old('samples') || @$job_data['jobSpecificEnquiryQuestion']['samples'] == $id) selected="" @endif>{{ $value }}</option>
              @endforeach
          </select>
        </td>
        {{-- <td width="60%">
          <textarea class="form-control" rows="3" name="samples_text"
            cols="50">{{ old('samples_text') ?? @$job_data['jobSpecificEnquiryQuestion']['samples_text']}}</textarea>
        </td> --}}
      </tr>
      @endif
      
      
      
    </table>
  </div>
</fieldset>