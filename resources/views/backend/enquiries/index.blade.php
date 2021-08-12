@extends('layouts.backend')
@php

$pageName= "Enquiries";
$baseRoute= "enquiries";

// $tableData = collect([
//   [
//     'enq_number' => '123',
//     'enq_date' => '03/03/2121',
//     'contact_name' => 'Contact',
//     'company_name' => 'company_name',
//     'email' => 'Email',
//     'mobile' => '21312312',
//     'telephone' => '1231232',
//     'reminder_date' => '09/21/12',
//     'snooze' => '123122',
//     'description' => 'asfdasdfasdfdfadas',
//     'reason' => 'asdfafdsafsdfasf',
//     'status'=> 1,
//     'id' => 1
// ],
//   [
//     'enq_number' => '123',
//     'enq_date' => '03/03/2121',
//     'contact_name' => 'Contact',
//     'company_name' => 'company_name',
//     'email' => 'Email',
//     'mobile' => '21312312',
//     'telephone' => '1231232',
//     'reminder_date' => '09/21/12',
//     'snooze' => '123122',
//     'description' => 'asfdasdfasdfdfadas',
//     'reason' => 'asdfafdsafsdfasf',
//     'status'=> 1,
//     'id' => 1
// ],
//   [
//     'enq_number' => '123',
//     'enq_date' => '03/03/2121',
//     'contact_name' => 'Contact',
//     'company_name' => 'company_name',
//     'email' => 'Email',
//     'mobile' => '21312312',
//     'telephone' => '1231232',
//     'reminder_date' => '09/21/12',
//     'snooze' => '123122',
//     'description' => 'asfdasdfasdfdfadas',
//     'reason' => 'asdfafdsafsdfasf',
//     'status'=> 1,
//     'id' => 1
// ],
//   [
//     'enq_number' => '123',
//     'enq_date' => '03/03/2121',
//     'contact_name' => 'Contact',
//     'company_name' => 'company_name',
//     'email' => 'Email',
//     'mobile' => '21312312',
//     'telephone' => '1231232',
//     'reminder_date' => '09/21/12',
//     'snooze' => '123122',
//     'description' => 'asfdasdfasdfdfadas',
//     'reason' => 'asdfafdsafsdfasf',
//     'status'=> 1,
//     'id' => 1
// ],
//   [
//     'enq_number' => '123',
//     'enq_date' => '03/03/2121',
//     'contact_name' => 'Contact',
//     'company_name' => 'company_name',
//     'email' => 'Email',
//     'mobile' => '21312312',
//     'telephone' => '1231232',
//     'reminder_date' => '09/21/12',
//     'snooze' => '123122',
//     'description' => 'asfdasdfasdfdfadas',
//     'reason' => 'asdfafdsafsdfasf',
//     'status'=> 1,
//     'id' => 1
// ],
//   [
//     'enq_number' => '123',
//     'enq_date' => '03/03/2121',
//     'contact_name' => 'Contact',
//     'company_name' => 'company_name',
//     'email' => 'Email',
//     'mobile' => '21312312',
//     'telephone' => '1231232',
//     'reminder_date' => '09/21/12',
//     'snooze' => '123122',
//     'description' => 'asfdasdfasdfdfadas',
//     'reason' => 'asdfafdsafsdfasf',
//     'status'=> 1,
//     'id' => 1
// ],
//   [
//     'enq_number' => '123',
//     'enq_date' => '03/03/2121',
//     'contact_name' => 'Contact',
//     'company_name' => 'company_name',
//     'email' => 'Email',
//     'mobile' => '21312312',
//     'telephone' => '1231232',
//     'reminder_date' => '09/21/12',
//     'snooze' => '123122',
//     'description' => 'asfdasdfasdfdfadas',
//     'reason' => 'asdfafdsafsdfasf',
//     'status'=> 1,
//     'id' => 1
// ],
// ]);
@endphp
@section('content')
  <div class="card enquiry-card">
    <div class="card-header">
      @includeIf('backend.enquiries.filters')
    </div>
    <div class="card-block">
      <div class="row enquires">
        <div class="col-md-9 enquiry-left scroll">
          <div class="row no-gutters" id="tableData">
            @if($tableData->count())
              @foreach ($tableData as $val)
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header b-b-default">
                      <h5>{{$val['job_no']}}</h5>
                      <div class="card-header-right">
                        {{$val['enq_date']}}
                      </div>
                    </div>
                    <div class="card-block">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <span class="ot-name text-left">{{$val['first_name'] . $val['last_name']}}</span>
                        </div>
                        <div class="col-md-4">
                          <span class="ot-company">{{$val['client_name']}}</span>
                        </div>
                        <div class="col-md-4 text-right">
                          <span class="ot-email">{{$val['email']}}</span>
                        </div>
                      </div>
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <span class="ot-mobile">{{$val['mobile']}}</span>
                        </div>
                        <div class="col-md-4">
                          <span class="ot-telephone">{{$val['telephone']}}</span>
                        </div>
                        {{-- <div class="col-md-2 text-center">
                          <span class="ot-reminder">{{$val['reminder_date']}}</span>
                        </div>
                        <div class="col-md-2 text-center">
                          {{$val['snooze']}} {{ \Str::plural('Day',$val['snooze']) }}
                        </div> --}}
                      </div>
                      <div class="row no-gutters px-1 border">
                        <div class="col-md-12 description scroll">
                          {!! $val['description'] !!}
                        </div>
                      </div>
                    </div>
                    <div class="row m-0 px-0 b-t-default">
                      <div class="col-4 f-btn b-r-default py-2">
                        {{-- {!! Form::select('status', $status , $val['status'] , ['class' => 'custom-select custom-select-sm onChangeUpdateStatusReason','placeholder'=>'Status','id'=>'status_'.$val['id'],'data-id'=>$val['id'],'data-type'=>'status','data-route'=>route('enquiries.update.status',$val['id'])]) !!} --}}
                      </div>
                      <div class="col-4 f-btn b-r-default py-2">
                        {{-- {!! Form::select('reason', $reasons , $val['reason'] , ['class' => 'custom-select custom-select-sm onChangeUpdateStatusReason','placeholder'=>'Reason','id'=>'reason_'.$val['id'],'data-id'=>$val['id'],'data-type'=>'reason','data-route'=>route('enquiries.update.reason',$val['id'])]) !!} --}}
                      </div>
                      <div class="col-4 f-btn py-2">
                        <a href="{{route('enquiries.show',$val['id'])}}"
                           class="btn btn-sm btn-block btn-primary">View Details</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
          <div class="row">
            <div class="col-md-12">
              {{-- {!!  @$tableData->appends(request()->all())->render()  !!} --}}
            </div>
          </div>
        </div>
        <div class="col-md-3 enquiry-right scroll b-l-default">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="card mr-0">
                <div class="card-block">
                  @includeIf('backend.keyPerformanceIndicator')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('models')
  @include('backend.shared.model')
@endsection
{{-- @section('customjs')
    @parent
    <script>
        function getValues(){
            return {
                'first_name': $('input[name=first_name]').val(),
                'last_name' : $('input[name=last_name]').val(),
                'client_id': $('select#client_id').val()
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#filter_submit_button').click(function(e) {
                e.preventDefault();
                page = 1;
                loadMoreData(page);
            })
        });
    </script>
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
            // const urlSearchParams = new URLSearchParams(window.location.search);
            // const params = Object.fromEntries(urlSearchParams.entries());
            const params = getValues() ?? {};

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
                                            <td class="d-inline-flex"><a href="{{route('clients-and-contacts.index')}}/${body['client_id']}" class="btn btn-sm btn-primary mx-1">Edit</a>
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
                    (page==1) ? $("#tableData").html(html_data) : $("#tableData").append(html_data);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                      alert('server not responding...');
                });
        }
    </script>
@endsection --}}
@section('customjs')
  @parent
  <script>
    $(document).on('change', '.onChangeUpdateStatusReason', function () {
      let route = $(this).data('route'), object_id = $(this).val(), type = $(this).data('type'),
        id = $(this).data('id');
      if (type === 'status') {
        if (object_id === '3') {
          toastr.info('Please Select Close Reason...');
          return false;
        }
      }
      if (type === 'reason') {
        if ($(`#status_${id}`).val() === '3') {
          $.ajax({
            url: $(`#status_${id}`).data('route'),
            method: 'post',
            data: {
              '_method': 'PUT',
              '_token': '{{csrf_token()}}',
              'value': 3
            }, success: function (res) {
              toastr.success(res.msg);
            }
          })
        }
      }
      $.ajax({
        url: route,
        method: 'post',
        data: {
          '_method': 'PUT',
          '_token': '{{csrf_token()}}',
          'value': object_id
        },
        success: function (res) {
          toastr.success(res.msg);
        }
      })
    });
  </script>
@endsection
