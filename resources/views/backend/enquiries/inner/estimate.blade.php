@extends('layouts.backend')
@section('header')
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}">
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Convert Enquiry To Estimate</h5>
            <div class="card-header-right">
                <button class="btn btn-sm btn-primary active" type="button" id="saveEstimateBtn">Save Estimate</button>
            </div>
        </div>
        <div class="card-block">
            @dd($oldData)
            {!! Form::model($oldData, ['route' => [$baseRoute.'.update', $oldData->id], 'method' => 'post','files' => true,'id'=>'estimateForm']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="col-md-12">
                            @includeIf('backend.shared.company_contact')
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                {!! Form::label('quotation_to:', 'Quotation To:',['class'=>'control-label']) !!}
                                {!! Form::textarea('quotation_to', null, ['class' => 'form-control','cols'=>'2','rows'=>'2','style'=>'margin-right: 0;']) !!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label('po_number', 'PO No.',['class'=>'col-md-4 col-form-label']) !!}
                                <div class="col-8">
                                    {!! Form::text('po_number', null, ['class' => 'form-control form-control-sm']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('project_ref', 'Project Ref.',['class'=>'col-md-4 col-form-label']) !!}
                                <div class="col-8">
                                    {!! Form::text('project_ref', null, ['class' => 'form-control form-control-sm']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                {!! Form::label('estimate_date', 'Estimate Date',['class'=>'col-md-4 col-form-label']) !!}
                                <div class="col-8">
                                    {!! Form::text('estimate_date', null, ['class' => 'form-control form-control-sm datepicker']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('job_number', 'Job No.',['class'=>'col-md-4 col-form-label']) !!}
                                <div class="col-8">
                                    {!! Form::text('job_number', null, ['class' => 'form-control form-control-sm','readonly']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('due_before.', 'Due Before',['class'=>'col-md-4 col-form-label']) !!}
                                <div class="col-8">
                                    {!! Form::text('due_before', null, ['class' => 'form-control form-control-sm datepicker']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>VAT</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><textarea></textarea></td>
                                    <td><input type="text"></td>
                                    <td><input type="text"></td>
                                    <td><input type="button" value="add" class="btn btn-sm btn-primary"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <legend>Enquiry Details</legend>
                        <div class="form-group">
                            {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'description','required']) !!}
                        </div>
                    </fieldset>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('customjs')
    <script>
        CKEDITOR.replace('description');
        $('.datepicker').datepicker({
            orientation: "bottom auto"
        });
    </script>
@stop
@section('footer')
    <script src="{{asset('backend/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <link rel="stylesheet" href="">
@stop
