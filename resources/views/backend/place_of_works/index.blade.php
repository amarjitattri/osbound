@extends('layouts.backend')
@section('content')
  <div class="card">
    <div class="card-header">
      <h5>All {{ Str::plural($pageName,2) }}</h5>
      <div class="card-header-right">
        <a href="#" data-modal-width="70%"
           data-modal-title="Add New {{ $pageName }}" data-toggle="modal"
           data-load-url="{{ route($baseRoute.'.create') }}" data-target="#outboundsModel"
           class="btn btn-sm btn-primary btn-block active">Add New {{ $pageName }}</a>
      </div>
    </div>
    <div class="card-block box-list">
      <div class="row">
        <div class="col-auto table-responsive">
          <table class="table table-striped table-bordered table-hover table-xs">
            <thead>
            @if(!empty($tableHeader))
              <tr>
                @foreach($tableHeader as $head)
                  <th>{{ucwords(str_replace('_',' ',$head))}}</th>
                @endforeach
                <th width="50">Action</th>
              </tr>
            @endif
            </thead>
            <tbody>
            @if(!empty($tableData) && $tableData->count())
              @foreach($tableData as $body)
                <tr id="row_{{$body->id}}">
                  @foreach($tableHeader as $td)
                    @if($td=='is_active')
                      <td>
                        <input id="switch_{{ $body->id }}" class="switch" type="checkbox" data-action="updateStatus"
                               data-where="{{$baseRoute}}"
                               data-route="{{ route('isActiveOrDeactivate',[$body->id,$baseRoute]) }}"
                               data-id="{{ $body->id }}" {{ $body->is_active ? 'checked' : '' }} />
                      </td>
                    @else
                      <td>{{$body->$td}}</td>
                    @endif
                  @endforeach
                  <td>
                    <div class="btn-group d-flex btn-group-sm btn-group-justified" role="group">
                      <a href="#" data-modal-width="50%"
                         data-modal-title="Edit {{ @$body->place }}" data-toggle="modal"
                         data-load-url="{{ route($baseRoute.'.edit',@$body->id) }}" data-target="#outboundsModel"
                         class="btn btn-primary btn-sm shadow-sm"><i class="ti-pencil"></i></a>
                      <button class="btn btn-danger btn-sm deleted" data-toggle="tooltip" data-original-title="Delete"
                              data-route="{{ route($baseRoute.'.destroy',$body->id) }}" data-id="{{$body->id}}"><i class="ti-trash"></i></button>
                    </div>
                  </td>
                </tr>
              @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop
@section('models')
  @include('backend.shared.model')
@endsection
