@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Update {{ Str::plural($pageName,1) }}</h5>
            <div class="card-header-right">
                <a href="{{ route($baseRoute.'.index') }}" class="btn btn-sm btn-primary active">Back
                    to {{ Str::plural($pageName,2)}}</a>
            </div>
        </div>
        <div class="card-block">
            {!! Form::model($oldData, ['route' => [$baseRoute.'.update', $oldData->id], 'method' => 'PATCH','files' => true]) !!}
            @includeIf('backend.fields')
            <hr>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <input type="submit" value="Update" class="btn btn-block btn-primary">
                </div>
                <div class="col-md-4"></div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
