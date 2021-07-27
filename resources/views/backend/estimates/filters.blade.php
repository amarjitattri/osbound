<fieldset>
    <legend>Searches</legend>
    <form autocomplete="off">
        <div class="row no-gutters mb-2">
            <div class="col-md-2 pr-1">
                <select class="custom-select custom-select-sm" name="id">
                    <option value="">Job No</option>
                    @foreach ($jobs as $job)
                        <option {{ request('id') == $job->id ? 'selected' : '' }} value="{{$job->id}}">{{$job->job_no}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 pr-1">
                {!! Form::text('from_date', request('from_date'), ['class' => 'form-control form-control-sm datepicker','placeholder'=>'Date From']) !!}
            </div>
            <div class="col-md-2 pr-1">
                {!! Form::select('contact', @$filteredNames , request('contact') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Name']) !!}
            </div>

            <div class="col-md-2 pr-1">
                {!! Form::select('status', @$statues , request('status') , ['class' => 'custom-select custom-select-sm','placeholder'=>'Status']) !!}
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
        </div>
    </form>
</fieldset>
