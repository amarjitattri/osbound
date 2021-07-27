<style>
  table.padding_zero td {
    padding: 2px 5px 2px 5px !important;
  }

  textarea {
    resize: none;
  }
</style>
<fieldset>
  <legend>Job Specific Enquiry Questions</legend>
  <div class="table-responsive">
    <table class="table table-condensed table-borderless padding_zero">
      <tr>
        <td colspan="2">Is Item Fixed or Portable</td>
      </tr>
      <tr>
        <td width="40%">
          {!! Form::select('job_specific_key_1', array('Fixed'=>'Fixed','Portable'=>'Portable','Both'=>'Both') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </td>
        <td width="60%">
          {!! Form::textarea('job_specific_val_1', null, ['class' => 'form-control','rows'=>'3']) !!}
        </td>
      </tr>
      <tr>
        <td colspan="2">Condition of Substrate</td>
      </tr>
      <tr>
        <td width="40%">
          {!! Form::select('job_specific_key_2', array('New'=>'New','Existing'=>'Existing','Both'=>'Both') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </td>
        <td width="60%">
          {!! Form::textarea('job_specific_val_2', null, ['class' => 'form-control','rows'=>'3']) !!}
        </td>
      </tr>
      <tr>
        <td colspan="2">Is Substrate going to be in a High Contact area or Low Contact area</td>
      </tr>
      <tr>
        <td width="40%">
          {!! Form::select('job_specific_key_3', array('High Contact Area'=>'High Contact Area','Low Contact Area'=>'Low Contact Area') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </td>
        <td width="60%">
          {!! Form::textarea('job_specific_val_3', null, ['class' => 'form-control','rows'=>'3']) !!}
        </td>
      </tr>
      <tr>
        <td colspan="2">Do you want the contours of the substrate to be exposed? <br> <small>(With natural timber this
            could be the grain of the timber or the roughness of a textured piece of architectural metal)</small></td>
      </tr>
      <tr>
        <td width="40%">
          {!! Form::select('job_specific_key_4', array('Yes'=>'Yes','No'=>'No') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </td>
        <td width="60%">
          {!! Form::textarea('job_specific_val_4', null, ['class' => 'form-control','rows'=>'3']) !!}
        </td>
      </tr>
      <tr>
        <td colspan="2">Do you have a specific colour or effect in mind that you want to match or a colour card from<br>
          a
          paint supplier or do you want to visit our show room to pick from a variety of different effects
        </td>
      </tr>
      <tr>
        <td width="40%">
          {!! Form::select('job_specific_key_5', array('Specific Colour or Effect'=>'Specific Colour or Effect','Colour Card from Paint Supplier'=>'Colour Card from Paint Supplier','Supply Own Materials or Paint'=>'Supply Own Materials or Paint','Visit Showroom'=>'Visit Showroom') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </td>
        <td width="60%">
          {!! Form::textarea('job_specific_val_5', null, ['class' => 'form-control','rows'=>'3']) !!}
        </td>
      </tr>
      <tr>
        <td colspan="2"><span>Do you have a sheen level in mind</span></td>
      </tr>
      <tr>
        <td width="40%">
          {!! Form::select('job_specific_key_6', array('Yes'=>'Yes','No'=>'No') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </td>
        <td width="60%">
          {!! Form::textarea('job_specific_val_6', null, ['class' => 'form-control','rows'=>'3']) !!}
        </td>
      </tr>
      <tr>
        <td colspan="2"><span>Do you require removal and fitting of the items</span></td>
      </tr>
      <tr>
        <td width="40%">
          {!! Form::select('job_specific_key_7', array('Yes'=>'Yes','No'=>'No') , null , ['class' => 'custom-select','placeholder'=>'Please Select']) !!}
        </td>
        <td width="60%">
          {!! Form::textarea('job_specific_val_7', null, ['class' => 'form-control','rows'=>'3']) !!}
        </td>
      </tr>
    </table>
  </div>
</fieldset>
