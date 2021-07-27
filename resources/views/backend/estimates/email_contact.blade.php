@extends('layouts.backend')
@section('content')
    <div class="card card-border-primary">
        <div class="card-header">
            <h5>{{ Str::plural($page_title,2) }} </h5>
        </div>
        <div class="card-block">
            <form action="" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-group row">
                            {!! Form::label('from', 'From',['class'=>'col-2 col-form-label']) !!}
                            <div class="col-10">
                                {!! Form::text('from',@Auth::user()->email,['class' => 'form-control','placeholder'=>'Email Address of User','required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('to', 'To',['class'=>'col-2 col-form-label']) !!}
                            <div class="col-10">
                                {!! Form::text('to', @$estimate->contact_email,['class' => 'form-control','placeholder'=>'To','required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('subject', 'Subject',['class'=>'col-2 col-form-label']) !!}
                            <div class="col-10">
                                {!! Form::text('subject', 'Regarding your enquiry with Osbond and Tutt - '.$estimate->job_number,['class' => 'form-control','placeholder'=>'Subject','required']) !!}
                            </div>
                        </div>
                        @if (!empty($estimate->estimate_pdf))
                        <div class="form-group row">
                            {!! Form::label('attachments', 'Select Attachments',['class'=>'col-2 col-form-label']) !!}
                            <div class="col-md-10">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="estimate_pdf" id="estimate_pdf" value="estimate_pdf">
                                    <label class="custom-control-label" for="estimate_pdf">Attach Estimate </label>
                                    <div class="d-block">
                                     <a href="{{\Storage::url($estimate->estimate_pdf)}}" target="_blank" class="">View Attachment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            {!! Form::label('message', 'Message',['class'=>'col-2 col-form-label']) !!}
                            <div class="col-10">
                                <textarea class="form-control" placeholder="Message... " required name="message" id="message" spellcheck="false"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-lg-12">
                        {!! Form::submit('Send', ['class' => 'btn btn-outline-primary']) !!}
                        <a href="{!! route('estimates.edit',$estimate->id) !!}" class="btn btn-outline-warning btn-ot">Back to Estimate</a>
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
