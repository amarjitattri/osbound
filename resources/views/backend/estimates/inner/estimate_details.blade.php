{!! Form::open(['route' => $baseRoute.'.store','method' => 'post','files' => true,'id'=>'estimateForm','autocomplete'=>'off']) !!}
<input type="hidden" name="company_id" id="contact_company_id" required>
<input type="hidden" name="contact_id" id="contact_name_id">
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('quotation_to:', 'Quotation To:',['class'=>'control-label']) !!}
            {!! Form::textarea('quotation_to', null, ['class' => 'form-control','cols'=>'2','rows'=>'2','style'=>'margin-right: 0;','required']) !!}
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
                {!! Form::text('estimate_date', date(config('site.date_format')), ['class' => 'form-control form-control-sm datepicker','required']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('job_no', 'Job No.',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('job_no', $job_no ?? null, ['class' => 'form-control form-control-sm','required','readonly']) !!}
            </div>
        </div>
        <div class="form-group row hidden">
            {!! Form::label('due_before.', 'Due Before',['class'=>'col-md-4 col-form-label']) !!}
            <div class="col-8">
                {!! Form::text('due_before', null, ['class' => 'form-control form-control-sm datepicker','required']) !!}
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
