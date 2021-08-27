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
                <div class="col-md-5" id="images_container" style="display: none;">
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="image_tags">Search Image Gallery With Tags</label>
                            <select id="image_tags" name="image_tags[]" multiple class="form-control">
                                @forelse($job_tags as $tag)
                                    <option value="{{$tag['id']}}">{{$tag['tag']}}</option>
                                @empty
                                    <option disabled>No tags here!</option>
                                @endforelse
                            </select>
                            {{-- <label for="job_tag" class="col-md-12 col-form-label">Search Image Gallery With Tags</label>
                            <div class="col-md-12">
                                <select class="custom-select valid" id="enquiry_for" name="enquiry_for" aria-invalid="false">
                                    <option selected="selected" value=""></option>
                                    <option value="1">Osbond &amp; Tutt</option>
                                    <option value="2">London Spray Finishes</option>
                                </select>
                            </div> --}}
                        </div>
                    </div><!-- /.col-md-12 -->
                    <div class="col-md-12">
                        <ul class="enquiry_image_thumb set-width image_thumb_grid scroll" id="images_list">
                        @if ($job_data->images()->count())
                            @foreach ($job_data->images()->get() as $image)
                                <li data-src="{{asset($image->path)}}" id="image_li_{{$image->id}}">
                                    <div class="enquiry_inner set-bg"
                                            style="background: url('{{asset($image->path)}}')">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                    class="custom-control-input selected_images"
                                                    id="image_checkbox_{{$image->id}}"
                                                    name="image_gallery[]"
                                                    value="{{$image->path}}">
                                            <label class="custom-control-label"
                                                    for="image_checkbox_{{$image->id}}"></label>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <h5 class="p-t-50 p-b-50 m-auto text-center">Images Not Found</h5>
                        @endif
                    </ul>
                    <div style="display:none" id="ajax_loader">
                        <div class="ajax-load text-center py-5">
                            <p><img src={{ asset('images/loader.gif') }}></p>
                        </div>
                    </div>
                    </div><!-- /.col-md-12 -->
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-7">
                <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-10">
                    {!! Form::submit('Send', ['class' => 'btn btn-outline-primary']) !!}
                    {{-- <a href="{!! route('enquiries.edit',@$enquiry->id) !!}" class="btn btn-outline-warning">Back to
                            Enquiry</a> --}}
                </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('header')
@parent
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

@endsection
@section('customjs')
<script>
    CKEDITOR.replace('message');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script>
    $(document).ready(function(){

        $('#image_tags').multiselect({

            nonSelectedText: 'Select Tags',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonContainer: '<div class="prl-10 w-100"></div>',

        });
    });
</script>
<script>
   var updateImages = function (data) {

    if(data)
    {
        var htmlContent ='';
        var asset_path = "{{ asset('') }}";
        if(data.length){
            data.forEach(function(val, index) {
                htmlContent += `<li id="image_li_${val['id']}">
                                    <div class="enquiry_inner set-bg"
                                            style="background: url('${asset_path +val['path']}')">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                    class="custom-control-input selected_images"
                                                    id="image_checkbox_${val['id']}"
                                                    name="image_gallery[]"
                                                    value="${val['path']}">
                                            <label class="custom-control-label"
                                                    for="image_checkbox_${val['id']}"></label>
                                        </div>
                                    </div>
                                </li>`;
            });
        }
        else
        {
            htmlContent += `<h5 class="p-t-50 p-b-50 m-auto text-center">Images Not Found</h5>`;
        }
        $('#images_list').html(htmlContent);

    }

}
</script>
<script>
    $(document).ready(function(){
        $('#image_tags').on('change', function(){
            var tags = [];
            $('#image_tags option:selected').each(function() {
                tags.push($(this).val());
            });
            if(tags.length)
            {
                $.ajax({

                    url: "{{route('jobemails.index')}}",
                    method: "GET",
                    data: {
                        'job_id': "{{$job_data['id']}}",
                        'tags' : tags,
                        'update_content': '1'
                    },
                    beforeSend: function(){
                        let loaderHTML = $('#ajax_loader').html();
                        $('#images_list').html(loaderHTML);
                    },
                    success: function(data){
                        $('#ajax_loader').hide();
                        updateImages(data);
                    }
                });
            }
            else
            {
                $.ajax({

                            url: "{{route('jobemails.index')}}"+"/{{ $job_data['id'] }}",
                            method: "GET",
                            data: {
                                'update_content': '1'
                            },
                            beforeSend: function(){
                                let loaderHTML = $('#ajax_loader').html();
                                $('#images_list').html(loaderHTML);
                            },
                            success: function(data){
                                updateImages(data);
                            }
                            });
            }

        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#has_image_gallery').on('change', function(){
            if($(this).prop("checked")){
                $('#images_container').show();
            }
            else{
                $('#images_container').hide();
            }

        });
    });
</script>
@endsection
