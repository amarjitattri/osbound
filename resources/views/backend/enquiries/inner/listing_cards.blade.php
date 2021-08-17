<div class="row no-gutters" id="listing_cards">
      @forelse ($enquiries as $val)
        <div class="col-md-6">
          <div class="card">
            <div class="card-header b-b-default">
              <h5>{{$val['job_no']}}</h5>
              <div class="card-header-right">
                {{ \Carbon\Carbon::parse($val['created_at'])->format('d-m-Y') }}
              </div>
            </div>
            <div class="card-block">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <span class="ot-name text-left">{{$val['first_name'] .' '. $val['last_name']}}</span>
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
                <select class="custom-select custom-select-sm onChangeUpdateStatusReason" name="status" id="{{'status_'.$val['id']}}" data-id="{{$val['id']}}" data-type="status" data-route="{{route('enquiries.update',$val['id'])}}">
                    <option value="" @if(@$val['status']) disabled @endif>Status</option>
                    @foreach ($filters_data['status'] as $id => $value)
                        <option {{ @$val['status'] == $id ? 'selected' : '' }} value="{{$id}}">{{$value}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-4 f-btn b-r-default py-2">
                <select class="custom-select custom-select-sm onChangeUpdateStatusReason" name="reason" id="{{'reason_'.$val['id']}}" data-id="{{$val['id']}}" data-type="reason" data-route="{{route('enquiries.update',$val['id'])}}">
                    <option value="" @if(@$val['reason']) disabled @endif>Reason</option>
                    @foreach ($filters_data['reasons'] as $id => $value)
                        <option {{ @$val['reason'] == $id ? 'selected' : '' }} value="{{$id}}">{{$value}}</option>
                    @endforeach
                </select>
                {{-- {!! Form::select('reason', @$filters_data['reasons'] , @$val['reason'] , ['class' => 'custom-select custom-select-sm onChangeUpdateStatusReason','placeholder'=>'Reason','id'=>'reason_'.$val['id'],'data-id'=>$val['id'],'data-type'=>'reason','data-route'=>route('enquiries.update',$val['id'])]) !!} --}}
              </div>
              <div class="col-4 f-btn py-2">
                <a href="{{route('enquiries.show',$val['id'])}}"
                   class="btn btn-sm btn-block btn-primary">View Details</a>
              </div>
            </div>
          </div>
        </div>
        @empty
        <p class="text-center my-5 m-auto">Oops, No Enquiries here! </p>
      @endforelse
</div>
<div class="ajax-load text-center" style="display:none">
    <p><img src={{ asset('images/loader.gif') }}>Loading Enquiries</p>
</div>