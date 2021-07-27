@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create New {{ Str::plural($pageName,1) }}</h5>
            <div class="card-header-right">
                <a href="{{ route($baseRoute.'.index') }}" class="btn btn-sm btn-primary active">Back
                    to {{ Str::plural($pageName,2)}}</a>
            </div>
        </div>
        <div class="card-block">
            {!! Form::open(['route' => $baseRoute.'.store', 'method' => 'post','files' => true]) !!}
            @includeIf('backend.'.$baseRoute.'.fields')
            <hr>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <input type="submit" value="Save" class="btn btn-block btn-primary">
                </div>
                <div class="col-md-4"></div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
