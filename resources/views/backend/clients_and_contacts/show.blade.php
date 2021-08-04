@extends('layouts.backend')
@php
 $pageName = 'Client Details';
 $baseRoute = 'clients-and-contacts';   
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
                                            <td><a href="{{route('clients-and-contacts.show',['clients_and_contact' => $body['client_id'] , 'contact_id' => $body['id']])}}" class="btn btn-sm btn-secondary">Update</a></td>
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
