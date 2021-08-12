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
              15-08-2020
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
      <form method="POST" action="https://dev.data-solve.co.uk/dev/ot/enquiries/28"
        accept-charset="UTF-8" id="updateEnquiryForm" autocomplete="off"
        enctype="multipart/form-data"><input name="_token" type="hidden"
          value="ln4OkVDiMmCI1dtyNeckFUuUN8bpSiATwd4jwcWw">
        <input type="hidden" name="_method" value="put">
        <div class="row">
          <div class="col-md-4">
            <div class="form-row">
              <div class="col-md-12" id="company_contact_details_div">
                <fieldset>
                  <legend>Contact Details</legend>
                  <div class="form-group row">
                    <label for="contact_id" class="col-md-4 col-form-label">Name</label>
                    <div class="col-8">
                      <select class="custom-select custom-select-sm" id="edit_contact_name"
                        data-route="https://dev.data-solve.co.uk/dev/ot/company-contact" required
                        name="contact_id">
                        <option value="">--SELECT--</option>
                        <option value="8" selected="selected">Allan Donaldson</option>
                        <option value="13">Darren O&#039;Brien</option>
                        <option value="2">Jane Austin</option>
                        <option value="3">Jason Smith</option>
                        <option value="1">Joe Bloogs</option>
                        <option value="14">Kylie Conrad</option>
                        <option value="7">Michael</option>
                        <option value="4">Test Name</option>
                        <option value="12">test123vb</option>
                        <option value="10">V B</option>
                        <option value="5">VB</option>
                        <option value="6">Vb1</option>
                        <option value="9">VB2</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="company_id" class="col-md-4 col-form-label">Company</label>
                    <div class="col-8">
                      <select class="custom-select custom-select-sm" id="edit_contact_company"
                        data-route="https://dev.data-solve.co.uk/dev/ot/company-contact-by-name-contact"
                        required name="company_id">
                        <option value="">--SELECT--</option>
                        <option value="2">Austin and Sons Limited</option>
                        <option value="1">Becky Int</option>
                        <option value="14">Conrad Wood Polishing</option>
                        <option value="8" selected="selected">Donaldson Carpenters Limited</option>
                        <option value="13">O&#039;Brien Furnitures</option>
                        <option value="3">Smiths and Wardrobes Limited</option>
                        <option value="7">Starlit</option>
                        <option value="4">Test Comapny</option>
                        <option value="6">Test Comp1</option>
                        <option value="10">Test New</option>
                        <option value="11">Test New 2</option>
                        <option value="9">Test Vb Comp1</option>
                        <option value="5">Vb Comp</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">Email</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="email" type="text"
                        value="info@donaldsoncarpenters.co.uk" id="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="mobile" class="col-md-4 col-form-label">Mobile</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="mobile" type="text"
                        value="07985 458 7854" id="mobile">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="telephone" class="col-md-4 col-form-label">Telephone</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="telephone"
                        type="text" value="0207 895 4587" id="telephone">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address_line1" class="col-md-4 col-form-label">Address Line 1</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="address_line1"
                        type="text" value="23 Hudson Road" id="address_line1">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address_line2" class="col-md-4 col-form-label">Address Line 2</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="address_line2"
                        type="text" value="Hudson Corner" id="address_line2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="county" class="col-md-4 col-form-label">County</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="county" type="text"
                        value="London" id="county">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="postal_code" class="col-md-4 col-form-label">Postal Code</label>
                    <div class="col-8">
                      <input class="form-control form-control-sm" readonly name="postal_code"
                        type="text" value="SW7 6HG" id="postal_code">
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
            <div class="form-row">
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
            </div>
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
                      <fieldset>
                        <legend>General Enquiry Questions</legend>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label for="enquiry_for" class="col-md-4 col-form-label">Enquiry For</label>
                              <div class="col-md-8">
                                <select class="custom-select" id="enquiry_for" name="enquiry_for">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="Osbond &amp; Tutt">Osbond &amp; Tutt</option>
                                  <option value="London Spray Finishes">London Spray Finishes</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="referral_from" class="col-md-4 col-form-label">How Did You hear about
                                us</label>
                              <div class="col-md-8">
                                <select class="custom-select" id="referral_from" name="referral_from">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="Email">Email</option>
                                  <option value="Google">Google</option>
                                  <option value="Instagram">Instagram</option>
                                  <option value="Facebook">Facebook</option>
                                  <option value="Linkedin">Linkedin</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="transport_for" class="col-md-4 col-form-label">Transport For
                                Collection Required</label>
                              <div class="col-md-1">
                                <div class="custom-control custom-checkbox" style="margin-top: 7px;">
                                  <input class="custom-control-input" id="transport_for_required"
                                    name="transport_for_required" type="checkbox" value="1">
                                  <label class="custom-control-label"
                                    for="transport_for_required">&nbsp;</label>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <input class="form-control date_timepicker" readonly name="transport_for"
                                  type="text" value="" id="transport_for">
                              </div>
                            </div>
                            <div class="row text-center">
                              <div class="col-md-6">
                                <label for="express_quotation" class="control-label">Express Quotation</label>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" name="express_quotation" type="checkbox"
                                    value="1" id="express_quotation">
                                  <label class="custom-control-label" for="express_quotation">&nbsp;</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="quotation_required_by" class="control-label">Quotation Required
                                  By</label>
                                <input class="form-control date_timepicker" readonly
                                  name="quotation_required_by" type="text" value="" id="quotation_required_by">
                              </div>
                            </div>
                            <div class="row text-center">
                              <div class="col-md-6">
                                <label for="contract_start" class="control-label">Contract Start</label>
                                <input class="form-control datepicker" name="contract_start" type="text"
                                  value="" id="contract_start">
                              </div>
                              <div class="col-md-6">
                                <label for="contract_finish" class="control-label">Contract Finish</label>
                                <input class="form-control datepicker" name="contract_finish" type="text"
                                  value="" id="contract_finish">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="table-responsive">
                              <table class="table table-borderless table-condensed">
                                <thead>
                                  <tr>
                                    <th width="30%">Site Type</th>
                                    <th width="50%">Site Address</th>
                                    <th width="20">Postcode</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <select class="custom-select" name="site_type_1">
                                        <option selected="selected" value="">Please Select</option>
                                        <option value="4">Commercial building site</option>
                                        <option value="3">Private home</option>
                                        <option value="2">Private home building site</option>
                                        <option value="5">Public space : Hotel, Restaurant, Museum</option>
                                        <option value="7">vbcc</option>
                                        <option value="6">Workshop/Commercial Premises</option>
                                      </select>
                                    </td>
                                    <td>
                                      <textarea class="form-control" rows="3" name="site_address_1"
                                        cols="50"></textarea>
                                    </td>
                                    <td>
                                      <input class="form-control" name="postcode_1" type="number">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <select class="custom-select" name="site_type_2">
                                        <option selected="selected" value="">Please Select</option>
                                        <option value="4">Commercial building site</option>
                                        <option value="3">Private home</option>
                                        <option value="2">Private home building site</option>
                                        <option value="5">Public space : Hotel, Restaurant, Museum</option>
                                        <option value="7">vbcc</option>
                                        <option value="6">Workshop/Commercial Premises</option>
                                      </select>
                                    </td>
                                    <td>
                                      <textarea class="form-control" rows="3" name="site_address_2"
                                        cols="50"></textarea>
                                    </td>
                                    <td>
                                      <input class="form-control" name="postcode_2" type="number">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <select class="custom-select" name="site_type_3">
                                        <option selected="selected" value="">Please Select</option>
                                        <option value="4">Commercial building site</option>
                                        <option value="3">Private home</option>
                                        <option value="2">Private home building site</option>
                                        <option value="5">Public space : Hotel, Restaurant, Museum</option>
                                        <option value="7">vbcc</option>
                                        <option value="6">Workshop/Commercial Premises</option>
                                      </select>
                                    </td>
                                    <td>
                                      <textarea class="form-control" rows="3" name="site_address_3"
                                        cols="50"></textarea>
                                    </td>
                                    <td>
                                      <input class="form-control" name="postcode_3" type="number">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                  </div>
              </div>
              <div class="tab-pane" id="jobspecificenquiryquestions" role="tabpanel"
                aria-expanded="false">
                <div class="row">
          
                    <div class="col-md-8">
                      <style>
                        table.padding_zero td {
                          padding: 2px 5px 2px 5px !important;
                        }
          
                        textarea {
                          resize: none;
                        }
                      </style>
                      <fieldset>
                        <legend>Job Specific Enquiry Questions</legend>
                        <div class="table-responsive">
                          <table class="table table-condensed table-borderless padding_zero">
                            <tr>
                              <td colspan="2">Is Item Fixed or Portable</td>
                            </tr>
                            <tr>
                              <td width="40%">
                                <select class="custom-select" name="job_specific_key_1">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="Fixed">Fixed</option>
                                  <option value="Portable">Portable</option>
                                  <option value="Both">Both</option>
                                </select>
                              </td>
                              <td width="60%">
                                <textarea class="form-control" rows="3" name="job_specific_val_1"
                                  cols="50"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">Condition of Substrate</td>
                            </tr>
                            <tr>
                              <td width="40%">
                                <select class="custom-select" name="job_specific_key_2">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="New">New</option>
                                  <option value="Existing">Existing</option>
                                  <option value="Both">Both</option>
                                </select>
                              </td>
                              <td width="60%">
                                <textarea class="form-control" rows="3" name="job_specific_val_2"
                                  cols="50"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">Is Substrate going to be in a High Contact area or Low Contact
                                area</td>
                            </tr>
                            <tr>
                              <td width="40%">
                                <select class="custom-select" name="job_specific_key_3">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="High Contact Area">High Contact Area</option>
                                  <option value="Low Contact Area">Low Contact Area</option>
                                </select>
                              </td>
                              <td width="60%">
                                <textarea class="form-control" rows="3" name="job_specific_val_3"
                                  cols="50"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">Do you want the contours of the substrate to be exposed? <br>
                                <small>(With natural timber this
                                  could be the grain of the timber or the roughness of a textured piece of
                                  architectural metal)</small></td>
                            </tr>
                            <tr>
                              <td width="40%">
                                <select class="custom-select" name="job_specific_key_4">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </td>
                              <td width="60%">
                                <textarea class="form-control" rows="3" name="job_specific_val_4"
                                  cols="50"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">Do you have a specific colour or effect in mind that you want to
                                match or a colour card from<br>
                                a
                                paint supplier or do you want to visit our show room to pick from a variety of
                                different effects
                              </td>
                            </tr>
                            <tr>
                              <td width="40%">
                                <select class="custom-select" name="job_specific_key_5">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="Specific Colour or Effect">Specific Colour or Effect</option>
                                  <option value="Colour Card from Paint Supplier">Colour Card from Paint
                                    Supplier</option>
                                  <option value="Supply Own Materials or Paint">Supply Own Materials or Paint
                                  </option>
                                  <option value="Visit Showroom">Visit Showroom</option>
                                </select>
                              </td>
                              <td width="60%">
                                <textarea class="form-control" rows="3" name="job_specific_val_5"
                                  cols="50"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2"><span>Do you have a sheen level in mind</span></td>
                            </tr>
                            <tr>
                              <td width="40%">
                                <select class="custom-select" name="job_specific_key_6">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </td>
                              <td width="60%">
                                <textarea class="form-control" rows="3" name="job_specific_val_6"
                                  cols="50"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2"><span>Do you require removal and fitting of the items</span></td>
                            </tr>
                            <tr>
                              <td width="40%">
                                <select class="custom-select" name="job_specific_key_7">
                                  <option selected="selected" value="">Please Select</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </td>
                              <td width="60%">
                                <textarea class="form-control" rows="3" name="job_specific_val_7"
                                  cols="50"></textarea>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </fieldset>
                    </div>
                  </div>
              </div>
              <div class="tab-pane" id="enquirydetails" role="tabpanel" aria-expanded="false">
                <div class="row">
                    <div class="col-md-4">
                    <fieldset>
                        <legend>Enquiry Details</legend>
                        <div class="form-group scroll" style="height: 769px;overflow-y: auto;">
                        <textarea class="form-control" id="description" required name="description" cols="50"
                            rows="10"></textarea>
                        </div>
                    </fieldset>
                    </div>
                </div>
              </div>
              <div class="tab-pane" id="tasks" role="tabpanel" aria-expanded="false">
                <p class="m-0">5.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor
                  interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et
                  imperdiet felis amet.</p>
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
.apj-tab-s{
    border: 2px groove #ddd !important;
  }
  .apj-nav-tabs .nav-item .nav-link{
    position: relative;
    display: block;
    border: unset;
    color: #ffffff;
    /* overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; */
    line-height: 2;
  }
  .audioPlayList{
    height: 223px;
  }
  .audio_files_upload {
    width: calc(100% - 111px);
  }
  #audioPlayerContainer .audio_preview_img{
    min-height: 300px;
    max-height: 300px;
  }
  .apj-nav-tabs .nav-item .nav-link::after{
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
  .apj-nav-tabs .nav-item .nav-jobtags::after{
    -webkit-transform: perspective(5px) rotateX(2.5deg) translateZ(-1px);
  transform: perspective(5px) rotateX(2.5deg) translateZ(-1px);
  }
  .apj-nav-tabs .nav-item .nav-link:hover{
  color: #ffffff;
  border-color: transparent;
  }
  .apj-nav-tabs .nav-item .nav-link.active:hover{
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
  
  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #ffffff;
    background-color: transparent;
    border-color: transparent;
  }
  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active::after{
    background-color: #fd3f4c;
  }
  
  .apj-nav-tabs .nav-link {
    padding: .1rem 1.7rem .1rem .5rem;
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
@endsection
@section('customjs')
  @parent
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
