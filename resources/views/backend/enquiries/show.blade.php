@extends('layouts.backend')
@php

$pageName= "Enquiries";
$baseRoute= "enquiries";

@endphp
@section('content')
<div class="card card-border-primary">
    <div class="card-header card-header">
      <div class="row">
        <div class="col-md-4">
          <div class="ot-enq_num_dat">
            <span class="ot-left ot-enq_number">
              {{$job_data['job_no']}}
            </span>
            <span class="ot-right ot-enq_date">
              {{ \Carbon\Carbon::parse($job_data['created_at'])->format('d-m-Y') }}
            </span>
          </div>
        </div>
        <div class="col-md-8">
          <div class="action-btn-wrapper">
            <a href="https://dev.data-solve.co.uk/dev/ot/enquiry-email-contact/28"
              class="btn btn-sm btn-info btn-ot"> Email
              Contact</a>
            <a href="https://dev.data-solve.co.uk/dev/ot/enquiry/estimate/28"
              class="btn btn-sm btn-success btn-ot"> Convert To
              Estimate</a>
            <button type="button" class="btn btn-sm btn-primary btn-ot" id="updateEnquiryBtn"> Save
              Enquiry</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card-block">
      <form method="POST" action="{{ route('enquiries.update', ['enquiry' => $job_data['id']])}}"
        accept-charset="UTF-8" id="updateEnquiryForm" autocomplete="off"
        enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="put">
        <div class="row">
          <div class="col-md-4">
            <div class="form-row">
              <div class="col-md-12" id="company_contact_details_div">
                <fieldset>
                  <legend>Contact Details</legend>
                  <div class="form-group row">
                    <label for="contact_name" class="col-md-4 col-form-label">Name</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="contact_name" type="text"
                        value="{{ @$job_data['contact']['first_name'] .' '. @$job_data['contact']['last_name'] }}" id="contact_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="client_name" class="col-md-4 col-form-label">Company</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="client_name" type="text"
                        value="{{ @$job_data->contact->client->client_name }}" id="client_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">Email</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="email" type="text"
                        value="{{ @$job_data->contact->email }}" id="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="mobile" class="col-md-4 col-form-label">Mobile</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="mobile" type="text"
                        value="{{ @$job_data->contact->mobile }}" id="mobile">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="telephone" class="col-md-4 col-form-label">Telephone</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="telephone"
                        type="text" value="{{ @$job_data->contact->telephone }}" id="telephone">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address_line_1" class="col-md-4 col-form-label">Address Line 1</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="address_line_1"
                        type="text" value="{{ @$job_data->contact->client->address_line_1 }}" id="address_line_1">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address_line_2" class="col-md-4 col-form-label">Address Line 2</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="address_line_2"
                        type="text" value="{{ @$job_data->contact->client->address_line_2 }}" id="address_line_2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label">Country</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="country" type="text"
                        value="{{ @$job_data->contact->client->country }}" id="country">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="postal_code" class="col-md-4 col-form-label">Postal Code</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="postal_code"
                        type="text" value="{{ @$job_data->contact->client->postal_code }}" id="postal_code">
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
            {{-- <div class="form-row">
              <div class="col-md-12">
                <fieldset>
                  <legend>Administration</legend>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group text-center">
                        <label for="reminder">Reminder</label>
                        <input class="form-control form-control-sm date_timepicker" name="reminder"
                          type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group text-center">
                        <label for="snooze">Snooze</label>
                        <input class="form-control form-control-sm" name="snooze" type="number"
                          value="0">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="dropdown_status" class="col-md-4 col-form-label">Status</label>
                    <div class="col-8">
                      <select class="custom-select custom-select-sm" id="dropdown_status"
                        name="status">
                        <option value="">--SELECT--</option>
                        <option value="1" selected="selected">Live</option>
                        <option value="2">Converted</option>
                        <option value="3">Closed</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="dropdown_reason" class="col-md-4 col-form-label">Reason</label>
                    <div class="col-8">
                      <select class="custom-select custom-select-sm" id="dropdown_reason" disabled
                        name="reason">
                        <option selected="selected" value="">--SELECT--</option>
                        <option value="4">Another competitor contracted</option>
                        <option value="5">Client not contactable</option>
                        <option value="2">Found Convenient alternative</option>
                        <option value="3">Slow response to enquiry</option>
                        <option value="1">Too expensive</option>
                      </select>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div> --}}
          </div>
          <!-- Arul edit starts-->
          <div class="col-md-8">
            <!-- Nav tabs -->
            <ul id="apj-nav-tabs" class="nav nav-tabs  tabs apj-nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link nav-media active" data-toggle="tab" href="#media" role="tab"
                  aria-expanded="true">Media</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-geq" data-toggle="tab" href="#generalenquiryquestions"
                  role="tab" aria-expanded="false">General Enquiry Questions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-jseq" data-toggle="tab" href="#jobspecificenquiryquestions"
                  role="tab" aria-expanded="false">Job Specific Enquiry Questions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-edn" data-toggle="tab" href="#enquirydetails" role="tab"
                  aria-expanded="false">Enquiry Details (Notes)</a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-tasks" data-toggle="tab" href="#tasks" role="tab"
                  aria-expanded="false">Tasks </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-jobtags" data-toggle="tab" href="#jobtags" role="tab"
                  aria-expanded="false">Job Tags</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabs card-block apj-tab-s">
              <div class="tab-pane active" id="media" role="tabpanel" aria-expanded="true">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            @includeIf('backend.shared.imageViewer')
                        </div>
                        <div class="col-md-6">
                            @includeIf('backend.shared.audioPlayer')
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  
                </div>
              </div>
              <div class="tab-pane" id="generalenquiryquestions" role="tabpanel"
                aria-expanded="false">
                <div class="row">
                    <div class="col-md-12">
                        @includeIf('backend.enquiries.inner.general_enquiry_questions')
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="jobspecificenquiryquestions" role="tabpanel"
                aria-expanded="false">
                <div class="row">
          
                    <div class="col-md-12">      
                      @includeIf('backend.enquiries.inner.job_specific_questions')
                    </div>
                  </div>
              </div>
              <div class="tab-pane" id="enquirydetails" role="tabpanel" aria-expanded="false">
                <div class="row">
                    <div class="col-md-12">
                    <fieldset>
                        <legend>Enquiry Details</legend>
                        <div class="form-group scroll" style="height: 769px;overflow-y: auto;">
                        <textarea class="form-control" id="description" required name="description" cols="50"
                            rows="10">{{old('description') ?? @$job_data['description']}}</textarea>
                        </div>
                    </fieldset>
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="tasks" role="tabpanel" aria-expanded="false">
                <div class="row">
                    <div class="col-md-12">
                        @includeIf('backend.enquiries.inner.tasks')
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="jobtags" role="tabpanel" aria-expanded="false">
                <p class="m-0">6.In enim ut efficitur. Nulla posuere elit quis auctor interdum
                  praesent sit amet nulla vel enim amet. Donec convallis tellus neque</p>
              </div>
            </div>
          </div>
          <!-- Arul edit ends-->
        </div>
        
        
      </form>
    </div>
  </div>
@stop
@section('models')
  @include('backend.shared.model')
@endsection

@section('header')
<style>
    .apj-tab-s {
  border: 2px groove #ddd !important;
}

.apj-nav-tabs .nav-item .nav-link {
  position: relative;
  display: block;
  border: unset;
  color: #ffffff;
  /* overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap; */
  line-height: 2;
}

.audioPlayList {
  height: 223px;
}

.audio_files_upload {
  width: calc(100% - 111px);
}

#audioPlayerContainer .audio_preview_img {
  min-height: 300px;
  max-height: 300px;
}

.apj-nav-tabs .nav-item .nav-link::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: -1;
  outline: 1px solid transparent;
  border-radius: 0px 2px 0 0;
  border: 2px solid #898989;
  background: #fa5661;
  box-shadow: inset 0 -3px 3px rgb(0 0 0 / 5%);
  content: '';
  -webkit-transform: perspective(9px) rotateX(2.50deg) translateZ(-0.6px);
  transform: perspective(9px) rotateX(2.50deg) translateZ(-0.6px);
  -webkit-transform-origin: 0 0;
  transform-origin: 0 0;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.apj-nav-tabs .nav-item .nav-jobtags::after {
  -webkit-transform: perspective(5px) rotateX(2.5deg) translateZ(-1px);
  transform: perspective(5px) rotateX(2.5deg) translateZ(-1px);
}

.apj-nav-tabs .nav-item .nav-link:hover {
  color: #ffffff;
  border-color: transparent;
}

.apj-nav-tabs .nav-item .nav-link.active:hover {
  color: #ffffff;
}

.apj-nav-tabs.nav-tabs .nav-item {
  margin-bottom: -5px;
  position: relative;
  z-index: 1;
  display: block;
  margin: 0;
  text-align: center;
  /*       -webkit-flex: 1;
      -moz-flex: 1;
      -ms-flex: 1;
      flex: 1; */
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
  color: #ffffff;
  background-color: transparent;
  border-color: transparent;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active::after {
  background-color: #fd3f4c;
}

.apj-nav-tabs .nav-link {
  padding: .1rem 1.7rem .1rem .5rem;
}

#tasks table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tasks tr {
  vertical-align: top;
}

#tasks td {
  text-align: left;
  padding: 8px;
}

#tasks th {
  text-align: center;
  padding: 8px;
}

#tasks .taskaction_th,
#tasks .status_th,
#tasks .dateadded_th,
#tasks .duedate_th {
  width: 20%;
}

#tasks .taskaction_textarea {
  width: 100%;
  border: 1px solid #ced4da;
}

#tasks .input-group-addon {
  background-color: #ffffff;
  color: #000;
  padding: 0px 6px;
  font-size: 22px;
}

.apj_divider {
  border-bottom: 1px solid rgba(204, 204, 204, .35);
  margin: 20px 8px 8px 8px;
}

.tasks_db_table {
  margin-top: 16px;
  height: 534px;
  overflow-y: auto;
  overflow-x: hidden;
  display: block;
}

#jobtags .ms-list li {
  width: 100%;
  padding: 6px 10px;
}

#jobtags .ms-list {
  border: 2px groove #ddd;
  height: 430px;
  overflow-y: auto;
  overflow-x: hidden;
}

#jobtags .ms-list li {
  cursor: pointer;
}

#jobtags .ms-list li:hover {
  background: #fa5661;
  color: #ffffff;
}

#jobtags .ms-list li a {
  display: block;
  width: 100%;
}

#jobtags .ms-list li.selected,
#jobtags .ms-list li.selected a {
  background: #fa5661;
  color: #ffffff;
}

#jobtags .ms-list li:hover a,
#jobtags .ms-list li a:focus {
  color: #ffffff;
}

#jobtags .ms-list li:not(:last-child) {
  border-bottom: 1px solid #898989;
}

#jobtags .addselectedtext {
  background: unset;
  border: 0;
  outline: 0;
}

#jobtags .addselectedtext:focus {
  outline: 0;
}

#jobtags .addselectedtext i {
  display: block;
  font-size: 70px;
}

#jobtags .addselectedtext img {
  width: 65%;
}

#jobtags .list-form-group {
  margin-bottom: 0;
}

#jobtags .mt-20 {
  margin-top: 1.25em;
}

@media only screen and (min-width: 1465px) and (max-width: 1600px) {
  .apj-nav-tabs .nav-link {
    padding: .1rem 0.7rem .1rem .5rem;
  }
}

@media only screen and (min-width: 991px) and (max-width: 1608px) {
  .apj-nav-tabs.nav-tabs .nav-item {
    margin-top: 3px;
  }
}
  </style>
  <style>
    table.padding_zero td {
      padding: 2px 5px 2px 5px !important;
    }

    textarea {
      resize: none;
    }
  </style>
@endsection
@section('customjs')
  @parent
  <script>
    CKEDITOR.replace('description',{
      height:'699px'
    });
  </script>
  <script>
    $(document).on('change', '.onChangeUpdateStatusReason', function () {
      let route = $(this).data('route'), object_id = $(this).val(), type = $(this).data('type'),
        id = $(this).data('id');
      if (type === 'status') {
        if (object_id === '3') {
          toastr.info('Please Select Close Reason...');
          return false;
        }
      }
      if (type === 'reason') {
        if ($(`#status_${id}`).val() === '3') {
          $.ajax({
            url: $(`#status_${id}`).data('route'),
            method: 'post',
            data: {
              '_method': 'PUT',
              '_token': '{{csrf_token()}}',
              'value': 3
            }, success: function (res) {
              toastr.success(res.msg);
            }
          })
        }
      }
      $.ajax({
        url: route,
        method: 'post',
        data: {
          '_method': 'PUT',
          '_token': '{{csrf_token()}}',
          'value': object_id
        },
        success: function (res) {
          toastr.success(res.msg);
        }
      })
    });
  </script>
@endsection
