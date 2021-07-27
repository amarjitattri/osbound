@extends('layouts.backend')
@section('header')
    <link rel="stylesheet"
          href="{{asset('backend/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}">
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Add Estimate</h5>
            <div class="card-header-right">
                <button class="btn btn-sm btn-primary active" type="button" id="saveEstimateBtn" form='#estimateForm'>Save Estimate</button>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-row">
                        <div class="col-md-12" id="company_contact_details_div">
                            @includeIf('backend.shared.company_contact')
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            @includeIf('backend.shared.company_contact_add_new_form')
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    @includeIf('backend.estimates.inner.estimate_details')
                </div>
            </div>
        </div>
    </div>
@endsection
