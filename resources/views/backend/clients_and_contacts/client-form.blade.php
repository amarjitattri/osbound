@php
    $client_id = request('clients_and_contact');
    $client_detail = $all_clients->where('id', $client_id)->first();
@endphp
<form autocomplete="off" method="POST" action="{{ route('clients-and-contacts.update',['clients_and_contact' => $client_id]) }}">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}

    <div class="row my-3 py-1">
        <div class="col-md-6">
            <select class="custom-select custom-select-sm" name="client_id" id="select_client_id" onchange="changeSelectedPath()">
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
    </div>
    <fieldset>
        <legend>Address</legend>
        <div class="row no-gutters mb-2 justify-content-between">
            <div class="col-md-3 pr-1 py-1 d-none">
                {!! Form::text('from', 'client_form' , ['class' => 'form-control form-control-sm','placeholder'=>'Form name']) !!}
            </div>
            <div class="col-md-3 pr-1 py-1 d-none">
                {!! Form::text('client_id', $client_id , ['class' => 'form-control form-control-sm','placeholder'=>'Client_id']) !!}
            </div>
            <div class="col-md-3 pr-1 py-1">
                {!! Form::text('address_line_1',$client_detail['address_line_1'] ?? '' , ['class' => 'form-control form-control-sm','placeholder'=>'Address Line 1']) !!}
            </div>
            <div class="col-md-3 pr-1 py-1">
                {!! Form::text('town', $client_detail['town'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Town']) !!}
            </div>
            <div class="col-md-3 pr-1 py-1">
                {!! Form::text('country',$client_detail['country'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Country']) !!}
            </div>
            <div class="col-md-2 pr-1 py-1">
                {!! Form::text('postal_code', $client_detail['postal_code'] ?? '', ['class' => 'form-control form-control-sm','placeholder'=>'Postal Code']) !!}
            </div>
        </div>
    </fieldset>
</form>

<script>
    function changeSelectedPath(){
        var client_id = document.getElementById("select_client_id").value;
        location.href = "{{route('clients-and-contacts.index')}}/" + client_id
    }
    
</script>
