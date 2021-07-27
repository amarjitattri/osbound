@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>All {{ $pageName ? Str::plural($pageName,2) : 'unknown' }}</h5>
            <div class="card-header-right">
                @if(Route::has($baseRoute.'.create'))
                    <a href="{{ route($baseRoute.'.create') }}" class="btn btn-sm btn-primary active">Add
                        New {{ $pageName ? Str::plural($pageName,1) : 'unknown' }}</a>
                @endif
            </div>
        </div>
        <div class="card-block box-list">
            <div class="row">
                @if(!empty($table))
                    @includeIf(sprintf("backend.%s.%s",$baseRoute,$table))
                @else
                    @includeIf('backend.table')
                @endif
            </div>
        </div>
    </div>
@stop
