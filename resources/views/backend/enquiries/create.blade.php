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
            @includeIf('backend.'.$baseRoute.'.fields')
        </div>
    </div>
@stop
@section('customjs')
    <script>
        CKEDITOR.replace('description');
    </script>
@stop
