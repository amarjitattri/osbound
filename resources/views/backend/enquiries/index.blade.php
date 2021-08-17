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
                  @includeIf('backend.enquiries.keyPerformanceIndicator')
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
@section('customjs')
  @parent
  <script>

    $(document).on('click', '#search_enquiry', function (e) {
      e.preventDefault();

      $("#enquiry_filter_form").ajaxSubmit({
        // resetForm: true,
        url: "{{ route('enquiries.index', [ 'filter' => '1'])}}",
        beforeSubmit: function(arr, $form, options) {
            // The array of form data takes the following form:
            // [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
            $('.ajax-load').show();
            $('#listing_cards').html('');
            // return false to cancel submit		         
        },
        error: function (res) {
            console.log(res);
            // let errorBucket = res.responseJSON.errors ?? [];
            // if(errorBucket){
            //     Object.keys(errorBucket).forEach(function(val, index) {
            //         var $label = $("<label>").attr('id', val+'-servererror').attr('class','error').attr('for',val).text(errorBucket[val][0]);
            //         var $inputField = $("input[name="+val+"]");
            //         $label.insertAfter($inputField);
            //     });
            // }
        },
        
        success: function (responseText, statusText, xhr, $form) {
            $('.ajax-load').show();
            $('#listing_cards').parent().html(responseText);
            
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
    $(document).ready(function(){
      $(document).on('change', '.onChangeUpdateStatusReason', function () {
          let route = $(this).data('route'), object_id = $(this).val(), type = $(this).data('type'),
          id = $(this).data('id');
          // if (type === 'status') {
          //   if (object_id === '3') {
          //     toastr.info('Please Select Close Reason...');
          //     return false;
          //   }
          // }
          if(!object_id){
            toastr.info('Please Select Something...');
          }
          if (type === 'reason') {
            // if ($(`#status_${id}`).val() === '3') {
              $.ajax({
                url: route,
                method: 'PUT',
                data: {
                  '_method': 'PUT',
                  '_token': '{{csrf_token()}}',
                  'reason': object_id,
                  'type': type,
                  'job_id': id
                }, success: function (res) {
                  toastr.success('The reason has been successfully updated!');
                }
              })
            // }
          }
          else if (type === 'status') {
            // if ($(`#status_${id}`).val() === '3') {
              $.ajax({
                url: route,
                method: 'PUT',
                data: {
                  '_method': 'PUT',
                  '_token': '{{csrf_token()}}',
                  'status': object_id,
                  'type': type,
                  'job_id': id
                }, success: function (res) {
                  toastr.success('The status has been successfully updated!');
                }
              })
            // }
          }

          // $.ajax({
          //   url: route,
          //   method: 'post',
          //   data: {
          //     '_method': 'PUT',
          //     '_token': '{{csrf_token()}}',
          //     'value': object_id
          //   },
          //   success: function (res) {
          //     toastr.success(res.msg);
          //   }
          // })
        });
    });
    
  </script>
@endsection
