@extends('layouts.backend')
@section('content')
  <div class="card enquiry-card">
    {{-- <div class="card-header">
      @includeIf('backend.enquiries.filters')
    </div>
    <div class="card-block">
      <div class="row enquires">
        <div class="col-md-9 enquiry-left scroll">
          <div class="row no-gutters">
            @if($tableData->count())
              @foreach ($tableData as $val)
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header b-b-default">
                      <h5>{{$val->enq_number}}</h5>
                      <div class="card-header-right">
                        {{$val->enq_date}}
                      </div>
                    </div>
                    <div class="card-block">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <span class="ot-name text-left">{{$val->contact_name}}</span>
                        </div>
                        <div class="col-md-4">
                          <span class="ot-company">{{$val->company_name}}</span>
                        </div>
                        <div class="col-md-4 text-right">
                          <span class="ot-email">{{$val->email}}</span>
                        </div>
                      </div>
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <span class="ot-mobile">{{$val->mobile}}</span>
                        </div>
                        <div class="col-md-4">
                          <span class="ot-telephone">{{$val->telephone}}</span>
                        </div>
                        <div class="col-md-2 text-center">
                          <span class="ot-reminder">{{$val->reminder_date}}</span>
                        </div>
                        <div class="col-md-2 text-center">
                          {{$val->snooze}} {{ \Str::plural('Day',$val->snooze) }}
                        </div>
                      </div>
                      <div class="row no-gutters px-1 border">
                        <div class="col-md-12 description scroll">
                          {!! $val->description !!}
                        </div>
                      </div>
                    </div>
                    <div class="row m-0 px-0 b-t-default">
                      <div class="col-4 f-btn b-r-default py-2">
                        {!! Form::select('status', $statues , $val->status , ['class' => 'custom-select custom-select-sm onChangeUpdateStatusReason','placeholder'=>'Status','id'=>'status_'.$val->id,'data-id'=>$val->id,'data-type'=>'status','data-route'=>route('enquiries.update.status',$val->id)]) !!}
                      </div>
                      <div class="col-4 f-btn b-r-default py-2">
                        {!! Form::select('reason', $reasons , $val->reason , ['class' => 'custom-select custom-select-sm onChangeUpdateStatusReason','placeholder'=>'Reason','id'=>'reason_'.$val->id,'data-id'=>$val->id,'data-type'=>'reason','data-route'=>route('enquiries.update.reason',$val->id)]) !!}
                      </div>
                      <div class="col-4 f-btn py-2">
                        <a href="{{route('enquiries.edit',$val->id)}}"
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
              {!!  @$tableData->appends(request()->all())->render()  !!}
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
    </div> --}}
  </div>
@stop
@section('models')
  @include('backend.shared.model')
@endsection
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
