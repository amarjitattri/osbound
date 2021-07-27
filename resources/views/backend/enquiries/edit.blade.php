@extends('layouts.backend')
@section('content')
  <div class="card card-border-primary">
    <div class="card-header card-header">
      <div class="row">
        <div class="col-md-4">
          <div class="ot-enq_num_dat">
            <span class="ot-left ot-enq_number">
                {{$oldData->enq_number}}
            </span>
            <span class="ot-right ot-enq_date">
                {{$oldData->enq_date}}
            </span>
          </div>
        </div>
        <div class="col-md-8">
          <div class="action-btn-wrapper">
            <a href="{{route('enquiries.sendEmail',$oldData->id)}}" class="btn btn-sm btn-info btn-ot"> Email
              Contact</a>
            @if(!$oldData->estimate_id && $oldData->status != 3)
              <a href="{{route('enquiries.estimate',$oldData->id)}}" class="btn btn-sm btn-success btn-ot"> Convert To
                Estimate</a>
            @else
              <a href="{{route('estimates.edit',$oldData->estimate_id)}}" class="btn btn-sm btn-success btn-ot"> View
                Estimate</a>
            @endif
            <button type="button" class="btn btn-sm btn-primary btn-ot" id="updateEnquiryBtn"> Save Enquiry</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card-block">
      {!! Form::model($oldData, ['route' => [$baseRoute.'.update', $oldData->id], 'method' => 'post','files' => true,'id'=>'updateEnquiryForm','autocomplete'=>'off']) !!}
      @method('put')
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
              @includeIf('backend.shared.imageViewer')
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12" id="audioPlayerContainer">
              @includeIf('backend.shared.audioPlayer')
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          @includeIf('backend.enquiries.inner.general_enquiry_questions')
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <fieldset>
            <legend>Enquiry Details</legend>
            <div class="form-group scroll" style="height: 769px;overflow-y: auto;">
              {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'description','required']) !!}
            </div>
          </fieldset>
        </div>
        <div class="col-md-8">
          @includeIf('backend.enquiries.inner.job_specific_questions')
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@stop
@section('customjs')
  <script>
    CKEDITOR.replace('description',{
      height:'699px'
    });
  </script>
@stop
