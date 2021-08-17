<fieldset>
  <legend>Searches</legend>
  <form autocomplete="off" id="enquiry_filter_form" >
    <div class="row no-gutters mb-2">
      <div class="col-md-2 pr-1">
        <select name="job_no" id="job_no" class="custom-select custom-select-sm">
          <option value="0">Job No</option>
          @foreach ($enquiries as $enquiry)
            <option
              value="{{$enquiry['job_no']}}" {{ request('job_no') == $enquiry->job_no ? 'selected' : '' }}>{{$enquiry['job_no']}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2 pr-1">
        {!! Form::text('date_from', request('date_from'), ['class' => 'form-control form-control-sm datepicker','placeholder'=>'Date From']) !!}
      </div>
      <div class="col-md-2 pr-1">
        <select name="contact_id" id="contact_id" class="custom-select custom-select-sm">
          <option value="">Contact Name</option>
          @foreach ($contacts as $contact)
            <option
              value="{{$contact['id']}}" {{ request('contact_id') == $contact->id ? 'selected' : '' }}>{{$contact['first_name'].' '.$contact['last_name']}}</option>
          @endforeach
        </select>
        {{-- {!! Form::select('contact_name', @$contacts , request('contact') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Name']) !!} --}}
      </div>
      <div class="col-md-2 pr-1">
        {{-- @dd($filters_data['status']) --}}
        {!! Form::select('status', @$filters_data['status'] , request('status') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Status']) !!}
      </div>
      <div class="col-md-2 pr-1">

      </div>
      <div class="col-md-2">
        <a href="#" data-modal-width="70%"
           data-modal-title="Add New {{ $pageName }}" data-toggle="modal"
           data-load-url="{{ route($baseRoute.'.create') }}" data-target="#outboundsModel"
           class="btn btn-sm btn-primary btn-block active">Add New {{ $pageName }}</a>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-2 pr-1">
        {{-- {!! Form::text('reminder_date', request('reminder_date'), ['class' => 'form-control form-control-sm datepicker','placeholder'=>'Reminders']) !!} --}}
      </div>
      <div class="col-md-2 pr-1">
        {!! Form::text('date_to', request('date_to'), ['class' => 'form-control form-control-sm datepicker','placeholder'=>'Date To']) !!}
      </div>
      <div class="col-md-2 pr-1">
        
        <select name="client_id" id="client_id" class="custom-select custom-select-sm">
          <option value="">Client Name</option>
          @foreach ($clients as $client)
            <option
              value="{{$client['id']}}" {{ request('client_id') == $client->id ? 'selected' : '' }}>{{$client['client_name']}}</option>
          @endforeach
        </select>
        {{-- {!! Form::select('company', @$filteredCompanies , request('company') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Company']) !!} --}}
      </div>
      <div class="col-md-2 pr-1">
        {!! Form::select('reason', @$filters_data['reasons'] , request('reason') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Reason']) !!}
      </div>
      <div class="col-md-2 pr-1">

      </div>
      <div class="col-md-1 pr-1">
        <button class="btn btn-sm btn-block btn-outline-primary" id="search_enquiry">Search</button>
      </div>
      <div class="col-md-1">
        <a href="{{ route($baseRoute.'.index') }}" class="btn btn-sm btn-block btn-outline-secondary active">Back To
          All</a>
      </div>
    </div>
  </form>
</fieldset>
