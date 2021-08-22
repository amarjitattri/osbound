@extends('layouts.backend')
@section('content')
<div class="card card-border-primary">
    <div class="card-header">
        <h5>{{ ucwords(@$job_data['job_type_slug'])}} Details -- Email Contacts </h5>
        <h6>{{ ucwords(@$job_data['job_no'])}} </h6>
    </div>
    <div class="card-block">
        <form action="{{ route('jobemails.store')}}" method="post" class="email_contact">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group row d-none">
                        {!! Form::label('job_id', 'job_id',['class'=>'col-2 col-form-label']) !!}
                        <div class="col-10">
                            {!! Form::text('job_id',$job_data['id'],['class' => 'form-control','placeholder'=>'Job ID','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row d-none">
                        {!! Form::label('job_type_slug', 'job_type_slug',['class'=>'col-2 col-form-label']) !!}
                        <div class="col-10">
                            {!! Form::text('job_type_slug',$job_data['job_type_slug'],['class' => 'form-control','placeholder'=>'Job Type Slug','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('from', 'From',['class'=>'col-2 col-form-label']) !!}
                        <div class="col-10">
                            {{-- {!! Form::text('from',@Auth::user()->email,['class' => 'form-control','placeholder'=>'Email Address of User','required']) !!} --}}
                            {!! Form::email('from',null,['class' => 'form-control','placeholder'=>'Email Address of User','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('to', 'To',['class'=>'col-2 col-form-label']) !!}
                        <div class="col-10">
                            {!! Form::email('to', @$job_data['contact']['email'],['class' => 'form-control','placeholder'=>'To','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('subject', 'Subject',['class'=>'col-2 col-form-label']) !!}
                        <div class="col-10">
                            {{-- {!! Form::text('subject', 'Regarding your enquiry with Osbond and Tutt - '.@$enquiry->enq_number,['class' => 'form-control','placeholder'=>'Subject','required']) !!} --}}
                            {!! Form::text('subject', null,['class' => 'form-control','placeholder'=>'Subject','required']) !!}
                        </div>
                    </div>
                    <div class="row">
                        {!! Form::label('attachments', 'Attachments',['class'=>'col-2 col-form-label']) !!}
                        <div class="col-md-10 attachments-div">
                            <div class=" fade-in-primary">
                                {!! Form::checkbox('photography_auth_form','storage/enquiries/photography_authorisation_form.pdf',null,['id' => 'photography_auth_form']) !!}
                                {!! Form::label('photography_auth_form', 'Photography Authorisation Form',['class'=>'col-form-label']) !!}
                            </div>
                            <div class=" fade-in-primary">
                                {!! Form::checkbox('terms_and_conditions','storage/enquiries/terms_and_conditions.pdf',null,['id' => 'terms_and_conditions']) !!}
                                {!! Form::label('terms_and_conditions', 'Terms and Conditions',['class'=>'col-form-label']) !!}
                            </div>
                            <div class="fade-in-primary">
                                {!! Form::checkbox('has_image_gallery',null,null,['id' => 'has_image_gallery']) !!}
                                {!! Form::label('has_image_gallery', 'Image Gallery',['class'=>'col-form-label']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('message', 'Message',['class'=>'col-2 col-form-label']) !!}
                        <div class="col-10">
                            <textarea class="form-control" placeholder="Message... " required name="message" id="message" spellcheck="false"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="job_tag" class="col-md-12 col-form-label">Search Image Gallery With Tags</label>
                            <div class="col-md-12">
                                <select class="custom-select valid" id="enquiry_for" name="enquiry_for" aria-invalid="false">
                                    <option selected="selected" value=""></option>
                                    <option value="1">Osbond &amp; Tutt</option>
                                    <option value="2">London Spray Finishes</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.col-md-12 -->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="form-control" placeholder="" required="" name="" type="text" id="">
                            </div>
                        </div>
                        <ul class="enquiry_image_thumb set-width image_thumb_grid scroll">
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_1">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_1" value="1">
                                        <label class="custom-control-label" for="image_checkbox_1"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_6">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_6" value="6">
                                        <label class="custom-control-label" for="image_checkbox_6"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_7">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_7" value="7">
                                        <label class="custom-control-label" for="image_checkbox_7"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_8">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_8" value="8">
                                        <label class="custom-control-label" for="image_checkbox_8"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_9">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_9" value="9">
                                        <label class="custom-control-label" for="image_checkbox_9"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_10">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_10" value="10">
                                        <label class="custom-control-label" for="image_checkbox_10"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_11">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_11" value="11">
                                        <label class="custom-control-label" for="image_checkbox_11"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_12">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_12" value="12">
                                        <label class="custom-control-label" for="image_checkbox_12"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_13">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_13" value="13">
                                        <label class="custom-control-label" for="image_checkbox_13"></label>
                                    </div>
                                </div>
                            </li>
                            <li data-src="https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg" id="image_li_14">
                                <div class="enquiry_inner set-bg" style="background: url('https://dev.data-solve.co.uk/dev/ot/uploads/enquiry_medias/images/MfvQ00r4W3OV8xuZ0juNrzEVb1abF4vtpQPbNUdU.jpeg')">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input selected_images" id="image_checkbox_14" value="14">
                                        <label class="custom-control-label" for="image_checkbox_14"></label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.col-md-12 -->
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-lg-6">
                    {!! Form::submit('Send', ['class' => 'btn btn-outline-primary']) !!}
                    {{-- <a href="{!! route('enquiries.edit',@$enquiry->id) !!}" class="btn btn-outline-warning">Back to
                            Enquiry</a> --}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('customjs')
<script>
    CKEDITOR.replace('message');
</script>
@endsection
