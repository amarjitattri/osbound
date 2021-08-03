@extends('layouts.backend')
@php
 $pageName = 'Client';
 $baseRoute = 'clients-and-contacts';   
@endphp
@section('content')
    <div class="card enquiry-card">
        <div class="card-header">
            <h1 class="f-18 font-weight-bold pb-2 pt-3">Clients and Contacts -- Summary</h1>
            @includeIf('backend.clients_and_contacts.filters')
        </div>
        <div class="card-block">
            <div class="row enquires">
                <div class="col-md-12">
                    <div class="row no-gutters">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-bordered table-hover table-xs">
                                <thead>
                                    <tr>
                                        <th>Contact Name</th>
                                        <th>Job Title</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Client Name</th>
                                        <th>Address Line 1</th>
                                        <th>Town</th>
                                        <th>Country</th>
                                        <th>PostCode</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="tableData" class="tableData">
                                </tbody>
                            </table>
                            <div class="ajax-load text-center" style="display:none">
                                <p><img src={{ asset('images/loader.gif') }}>Loading More contacts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('customjs')
    @parent
    
    <script type="text/javascript">
        var page = 1;
        window.max_pages = 10;
        loadMoreData(page);
        // console.log(params);
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            // if($(document).height() - $(this).height() - 100 < $(this).scrollTop()) {
                page++;
                if(page <= window.max_pages) loadMoreData(page);
            }
        });
    
    
        function loadMoreData(page){
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());

            $.ajax(
                {
                    url: "{{ route('clients-and-contacts.index') }}" + '?first_name=' + ((params.first_name) ? params.first_name : '') +  '&last_name=' +((params.last_name) ? params.last_name : '') + '&client_id=' + ((params.client_id) ? params.client_id : '') + '&page=' + page,
                    type: "get",
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    window.max_pages = data.contacts_with_clients.last_page;
                    var html_data = '';
                    var csrf_token = "{{ csrf_token() }}";

                    if((data.contacts_with_clients.data) && (data.contacts_with_clients.data.length)){
                        data.contacts_with_clients.data.forEach(function(body, th){
                            html_data += `<tr>
                                            <td>${(body['first_name']) ?? ''} ${(body['last_name']) ?? ''}</td>
                                            <td>${body['job_title'] ?? ''}</td>
                                            <td>${body['email'] ?? ''}</td>
                                            <td>${body['mobile'] ?? ''}</td>
                                            <td>${body['telephone'] ?? ''}</td>
                                            <td>${body['client']['client_name'] ?? ''}</td>
                                            <td>${body['client']['address_line_1'] ?? ''}</td>
                                            <td>${body['client']['town'] ?? ''}</td>
                                            <td>${body['client']['country'] ?? ''}</td>
                                            <td>${body['client']['postal_code'] ?? ''}</td>
                                            <td class="d-inline-flex"><a href="{{route('clients-and-contacts.index')}}/${body['client_id']}" class="btn btn-sm btn-primary mx-1">View</a>
                                            <form action="{{route('clients-and-contacts.index')}}/${body['id']}" method="POST">
                                                <input class="btn btn-sm btn-danger" type="submit" value="Delete" />
                                                <input type="hidden" name="_method" value="delete" />
                                                <input type="hidden" name="_token" value="${csrf_token}">
                                            </form>
                                        </td>
                                    </tr>`;
                        });
                    }

                    $('.ajax-load').hide();
                    $("#tableData").append(html_data);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                      alert('server not responding...');
                });
        }
    </script>
@endsection
@section('models')
  @include('backend.shared.model')
@endsection
