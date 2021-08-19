@php
    $client_id = request('clients_and_contact');
    $contact_id = request('contact_id');
    if($contact_id)
        $contact_detail = $contacts->where('id', $contact_id)->first();
@endphp
<form autocomplete="off" id="contact_form" method="POST" action="{{ ($contact_id) ? route('clients-and-contacts.update', ['clients_and_contact' => $client_id]) : route('clients-and-contacts.store',['clients_and_contact' => $client_id]) }}">
    {{ csrf_field() }}

    @if($contact_id)
    <input type="hidden" id="contact_form_put_request_input" name="_method" value="PUT">
    @endif
    {{-- <div class="row my-3 py-1">
        <div class="col-md-6">
            <select class="custom-select custom-select-sm" name="client_id">
                <option value="">Client Name</option>
                @foreach ($all_clients as $client)
                    <option {{ $client_id == $client->id ? 'selected' : '' }} value="{{$client->id}}">{{$client->client_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1 pr-1 py-1 ml-auto">
            <button type="submit" class="btn btn-sm btn-primary btn-block">Save</button>
        </div>
        <div class="col-md-2 pr-1 py-1">
            <a href="{{ route('clients-and-contacts.index') }}" class="btn btn-sm btn-outline-secondary btn-block">Back to Summary</a>
        </div>
    </div> --}}
    <fieldset>
        @if($contact_id)
        <legend>Update Contact</legend>
        @else
        <legend id="header_contact_form">Add Contact</legend>
        @endif
        <div class="row no-gutters mb-2 justify-content-between">
            <div class="col-md-1 pr-1 py-1 d-none">
                {!! Form::text('from', 'contact_form' , ['class' => 'form-control form-control-sm','placeholder'=>'From', 'required']) !!}
            </div>
            <div class="col-md-1 pr-1 py-1 d-none">
                {!! Form::text('client_id',$client_id , ['class' => 'form-control form-control-sm','placeholder'=>'Client ID', 'required']) !!}
            </div>
            <div class="col-md-1 pr-1 py-1 d-none">
                {!! Form::text('contact_id',$contact_id ?? '' , ['class' => 'form-control form-control-sm','placeholder'=>'Contact ID']) !!}
            </div>
            <div class="col-md-1 pr-1 py-1">
                {!! Form::text('first_name',$contact_detail['first_name'] ?? '' , ['class' => 'form-control form-control-sm','placeholder'=>'First Name' , 'required']) !!}
            </div>
            <div class="col-md-1 pr-1 py-1">
                {!! Form::text('last_name', $contact_detail['last_name'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Last Name', 'required']) !!}
            </div>
            <div class="col-md-2 pr-1 py-1">
                {!! Form::text('job_title',$contact_detail['job_title'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Job Title','required' ]) !!}
            </div>
            <div class="col-md-2 pr-1 py-1">
                {!! Form::text('email', $contact_detail['email'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Email']) !!}
            </div>
            <div class="col-md-2 pr-1 py-1">
                {!! Form::text('mobile', $contact_detail['mobile'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Mobile']) !!}
            </div>
            <div class="col-md-2 pr-1 py-1">
                {!! Form::text('telephone', $contact_detail['telephone'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Telephone']) !!}
            </div>
            <div class="col-md-1 pr-1 py-1">
                <button type="submit" class="btn btn-sm btn-primary btn-block">Save</button>
            </div>
        </div>
        {{-- <div class="row no-gutters">
            <div class="col-md-2 pr-1">
                {!! Form::text('reminder_date', request('reminder_date'), ['class' => 'form-control form-control-sm datepicker','placeholder'=>'Reminders']) !!}
            </div>
            <div class="col-md-2 pr-1">
                {!! Form::text('to_date', request('to_date'), ['class' => 'form-control form-control-sm datepicker','placeholder'=>'Date To']) !!}
            </div>
            <div class="col-md-2 pr-1">
                {!! Form::select('company', @$filteredCompanies , request('company') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Company']) !!}
            </div>

            <div class="col-md-2 pr-1">
                {!! Form::select('reason', @$reasons , request('reason') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Reason']) !!}
            </div>
            <div class="col-md-2 pr-1">

            </div>
            <div class="col-md-1 pr-1">
                <button type="submit" class="btn btn-sm btn-block btn-outline-primary">Search</button>
            </div>
            <div class="col-md-1">
                <a href="{{ route($baseRoute.'.index') }}" class="btn btn-sm btn-block btn-outline-secondary active">Back To All</a>
            </div>
        </div> --}}
    </fieldset>
</form>
