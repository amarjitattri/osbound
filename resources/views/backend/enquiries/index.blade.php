@extends('layouts.backend')
@php

$pageName= "Enquiries";
$baseRoute= "enquiries";

@endphp
@section('content')
  <div class="card enquiry-card">
    <div class="card-header">
      @includeIf('backend.enquiries.filters')
    </div>
    <div class="card-block">
      <div class="row enquires">
        <div class="col-md-9 enquiry-left scroll">
          <div>
            @includeIf('backend.enquiries.inner.listing_cards')
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

    $(document).on('click', '#search_enquiry', function (e) {
      e.preventDefault();

      $("#enquiry_filter_form").ajaxSubmit({
        resetForm: true,
        url: "{{ route('enquiries.index', [ 'filter' => '1'])}}",
        error: function (res) {
            let errorBucket = res.responseJSON.errors ?? [];
            if(errorBucket){
                Object.keys(errorBucket).forEach(function(val, index) {
                    var $label = $("<label>").attr('id', val+'-servererror').attr('class','error').attr('for',val).text(errorBucket[val][0]);
                    var $inputField = $("input[name="+val+"]");
                    $label.insertAfter($inputField);
                });
            }
        },
        success: function (responseText, statusText, xhr, $form) {
          console.log('form sunmitted');
            // location.href = "{{ route('enquiries.index') }}" + "/" + responseText.id;
        }
      });
    });
    $("#company_contacts_form").validate({
      submitHandler: function (form) {
        $(form).ajaxSubmit({
          resetForm: true,
          error: function (res) {
              let errorBucket = res.responseJSON.errors ?? [];
              if(errorBucket){
                  Object.keys(errorBucket).forEach(function(val, index) {
                      var $label = $("<label>").attr('id', val+'-servererror').attr('class','error').attr('for',val).text(errorBucket[val][0]);
                      var $inputField = $("input[name="+val+"]");
                      $label.insertAfter($inputField);
                  });
              }
          },
          success: function (responseText, statusText, xhr, $form) {
              location.href = "{{ route('enquiries.index') }}" + "/" + responseText.id;
          }
        });
        return false;
      }
    });
    $("#enquiry_create_form").validate();
  </script>

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
