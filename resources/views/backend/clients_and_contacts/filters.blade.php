<fieldset>
    <legend>Searches</legend>
    <form autocomplete="off">
        <div class="row no-gutters mb-2">
            <div class="col-md-2 pr-1 py-1">
                {!! Form::text('first_name', request('first_name'), ['class' => 'form-control form-control-sm','placeholder'=>'First Name']) !!}
            </div>
            <div class="col-md-2 pr-1 py-1">
                {!! Form::text('last_name', request('last_name'), ['class' => 'form-control form-control-sm','placeholder'=>'Last Name']) !!}
            </div>
            <div class="col-md-2 pr-1 py-1">
                <select class="custom-select custom-select-sm" name="client_id">
                    <option value="">Client Name</option>
                    @foreach ($all_clients as $client)
                        <option {{ request('client_id') == $client->id ? 'selected' : '' }} value="{{$client->id}}">{{$client->client_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 pr-1 py-1 ml-auto">
              <button type="submit" class="btn btn-sm btn-secondary btn-block">Search</button>
            </div>
            <div class="col-md-1 pr-1 py-1">
              <button type="reset" class="btn btn-sm btn-outline-secondary btn-block">Reset</button>
            </div>
            <div class="col-md-2 py-1">
              <a href="#" data-modal-width="70%"
                 data-modal-title="Add New {{ $pageName }}" data-toggle="modal"
                 data-load-url="{{ route($baseRoute.'.create') }}" data-target="#outboundsModel"
                 class="btn btn-sm btn-primary btn-block active">Add New {{ $pageName }}</a>
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
    </form>
</fieldset>
