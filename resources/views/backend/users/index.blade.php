@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>All {{ Str::plural($pageName,2) }}</h5>
            <div class="card-header-right">
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary active">Permissions</a>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary active">Roles</a>
                <a href="{{ route($baseRoute.'.create') }}" class="btn btn-sm btn-primary active">Add
                    New {{ $pageName }}</a>
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
                            </tr>
                        @endif
                        </thead>
                        <tbody>
                        @if(!empty($tableData) && $tableData->count())
                            @foreach($tableData as $body)
                                <tr>
                                    @foreach($tableHeader as $td)
                                        <td>{{$body->$td}}</td>
                                    @endforeach
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
