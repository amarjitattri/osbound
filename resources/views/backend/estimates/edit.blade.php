@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Estimate Details</h5>
            <div class="card-header-right">
                <div class="action-btn-wrapper">
                    <a href="{{route('estimates.sendEmail',$oldData->id)}}" class="btn btn-sm btn-info btn-ot" id="btn_email_contact">Email Contact</a>
                    <a href="{{route('estimates.generateEstimate',$oldData->id)}}" class="btn btn-sm btn-danger btn-ot" id="btn_genrate_estimate" target="_blank">Generate Estimate</a>
                    <button class="btn btn-sm btn-dark btn-ot" type="button" id="">Convert to Job</button>
                    <button class="btn btn-sm btn-primary btn-ot" type="button" id="saveEstimateBtn">Save Estimate</button>
                </div>
            </div>
        </div>
        <div class="card-block">
            {!! Form::model($oldData, ['route' => [$baseRoute.'.update', $oldData->id], 'method' => 'post','files' => true,'id'=>'estimateForm','autocomplete'=>'off']) !!}
            @method('PATCH')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-row">
                        <div class="col-md-12" id="company_contact_details_div">
                            @includeIf('backend.shared.company_contact')
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            @includeIf('backend.shared.administratorForm')
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-row">
                        <div class="col-md-12" id="imageViewerContainer">
                            @includeIf('backend.shared.imageViewer',['oldData'=>$oldData->enquiry])
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12" id="audioPlayerContainer">
                            @includeIf('backend.shared.audioPlayer',['oldData'=>$oldData->enquiry])
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <legend>Enquiry Details</legend>
                        <div class="form-group">
                            {!! Form::textarea('description', @$enquiry->description, ['class' => 'form-control','id'=>'description','required']) !!}
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('quotation_to:', 'Quotation To:',['class'=>'control-label']) !!}
                        <div class="copy_address">
                            <label class="control-label" for="copy_address"> Copy Address</label>
                            <input type="checkbox" value="1" name="copy_address" id="copy_address" data-route="{{route('estimates.copyAddress',$oldData->id)}}" {{ $oldData->copy_address ? 'checked' : '' }}>
                        </div>
                        {!! Form::textarea('quotation_to', null, ['class' => 'form-control','cols'=>'2','rows'=>'5','required']) !!}
                    </div>
                    <div class="form-group row">
                        {!! Form::label('po_number', 'PO No.',['class'=>'col-md-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::text('po_number', null, ['class' => 'form-control form-control-sm','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('project_ref', 'Project Ref.',['class'=>'col-md-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::text('project_ref', null, ['class' => 'form-control form-control-sm','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        {!! Form::label('estimate_date', 'Estimate Date',['class'=>'col-md-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::text('estimate_date', null, ['class' => 'form-control form-control-sm datepicker','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('job_number', 'Job No.',['class'=>'col-md-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::text('job_number', null, ['class' => 'form-control form-control-sm','required','readonly']) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="display: none">
                        {!! Form::label('due_before.', 'Due Before',['class'=>'col-md-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::text('due_before', null, ['class' => 'form-control form-control-sm datepicker']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @includeIf('backend.shared.estimatesAmountDetailsAddForm')
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('customjs')
    <script>
        CKEDITOR.replace('description');
        $(document).on('change','#copy_address',function () {
            let route = $(this).data('route');
            if($(this).is(":checked")){
                $.get(route,{},function (res) {
                    $("textarea[name=quotation_to]").val(res.address);
                });
            }else{
                $("textarea[name=quotation_to]").val('');
            }
        });
    </script>
@stop
