@extends('layouts.backend')
@section('content')
    <div class="card card-border-primary">
        <div class="card-header">
            <h5>{{ ucwords(@$job_data['job_type_slug'])}} Details -- Email Contacts </h5>
            <h6>{{ ucwords(@$job_data['job_no'])}} </h6>
        </div>
        <div class="card-block">
            <form action="{{ route('jobemails.store')}}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-10">
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
                                {!! Form::email('to', @$enquiry->contacts->email,['class' => 'form-control','placeholder'=>'To','required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('subject', 'Subject',['class'=>'col-2 col-form-label']) !!}
                            <div class="col-10">
                                {{-- {!! Form::text('subject', 'Regarding your enquiry with Osbond and Tutt - '.@$enquiry->enq_number,['class' => 'form-control','placeholder'=>'Subject','required']) !!} --}}
                                {!! Form::text('subject', null,['class' => 'form-control','placeholder'=>'Subject','required']) !!}
                            </div>
                        </div>
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
