@extends('layouts.backend')
@section('content')
    <div class="card enquiry-card">
        <div class="card-header">
            @includeIf('backend.estimates.filters')
        </div>
        <div class="card-block">
            <div class="row enquires">
                <div class="col-md-9 enquiry-left scroll">
                    <div class="row no-gutters">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-bordered table-hover table-xs">
                                <thead>
                                @if(!empty($tableHeader))
                                    <tr>
                                        @foreach($tableHeader as $head)
                                            <th>{{ucwords(str_replace('_',' ',$head))}}</th>
                                        @endforeach
                                        <th>#</th>
                                    </tr>
                                @endif
                                </thead>
                                <tbody>
                                @if(!empty($tableData) && $tableData->count())
                                    @foreach($tableData as $body)
                                        <tr>
                                            @foreach($tableHeader as $td)
                                                @if($td=='status')
                                                    <td>{{$body->status_value}}</td>
                                                @else
                                                    <td>{{$body->$td}}</td>
                                                @endif
                                            @endforeach
                                            <td><a href="{{route('estimates.edit',$body->id)}}" class="btn btn-sm btn-primary">View</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!!  @$tableData->appends(request()->all())->render()  !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 enquiry-right scroll b-l-default">
                    <div class="row row no-gutters">
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
