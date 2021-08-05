@extends('layouts.backend')
@php
 $pageName = 'Client Details';
 $baseRoute = 'clients-and-contacts';  
 $client_id = request('clients_and_contact'); 
@endphp
@section('content')
    <div class="card enquiry-card">
        <div class="card-header">
            <h1 class="f-18 font-weight-bold pb-2 pt-3">Clients and Contacts -- Details</h1>
            @includeIf('backend.clients_and_contacts.client-form')
        </div>
        <div class="card-block">
            <div class="row enquires">
                <div class="col-md-12 enquiry-left h-75 scroll">
                    <div class="row no-gutters">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-bordered table-hover table-xs">
                                @php
                                    $tableData = $contacts ?? [];
                                @endphp
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Job Title</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="tableData">
                                @if(!empty($tableData) && count($tableData))
                                    @foreach($tableData as $th => $body)
                                        <tr>
                                            <td>{{ $body['first_name'] ?? ''}}</td>
                                            <td>{{ $body['last_name'] ?? ''}}</td>
                                            <td>{{ $body['job_title'] ?? ''}}</td>
                                            <td>{{ $body['email'] ?? ''}}</td>
                                            <td>{{ $body['mobile'] ?? ''}}</td>
                                            <td>{{ $body['telephone'] ?? ''}}</td>
                                            <td><button data-href="{{route('clients-and-contacts.show',['clients_and_contact' => $body['client_id'] , 'contact_id' => $body['id']])}}" class="btn btn-sm btn-secondary update-contact-btn" data-id="{{$body['id']}}">Update</button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            @includeIf('backend.clients_and_contacts.contact-form')
        </div>
    </div>
@stop
@section('customjs')
    @parent

    <script>
        $(document).ready(function (){
            $('.update-contact-btn').click(function(){
                const url = $(this).data('href');
                $.ajax({
                    url: url,
                    success: function(data) {
                        //Insert field to make it the update request
                        var $putRequestField = $("<input type='hidden' id='contact_form_put_request_input' name='_method' value='PUT'>");
                        console.log($('input#contact_form_put_request_input'));
                        if(!$('input#contact_form_put_request_input').length)
                            $('#contact_form').append($putRequestField);
                        
                        //Change Header
                        var $header_contact_form = $('#header_contact_form').html("Update Contact");

                        //Change Action
                        var action_url = "{{route('clients-and-contacts.update', ['clients_and_contact' => $client_id])}}";
                        $('#contact_form').attr('action', action_url);

                        if(data.contact_detail){
                            const contact_data = data.contact_detail;
                            
                            $('input[name=contact_id]').val(contact_data.id ?? '');
                            $('input[name=first_name]').val(contact_data.first_name ?? '');
                            $('input[name=last_name]').val(contact_data.last_name ?? '');
                            $('input[name=job_title]').val(contact_data.job_title ?? '');
                            $('input[name=email]').val(contact_data.email ?? '');
                            $('input[name=mobile]').val(contact_data.mobile ?? '');
                            $('input[name=telephone]').val(contact_data.telephone ?? '');

                        }
                    },
                });
            });
        });
    </script>

@endsection