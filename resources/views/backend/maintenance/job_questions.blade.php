@extends('layouts.backend')
@php
 $pageName = 'Client';
 $baseRoute = 'clients-and-contacts';   
@endphp
@section('content')
    <div class="card enquiry-card">
        <div class="card-header">
            <h1 class="f-18 font-weight-bold pb-2 pt-3">Enquiry Questions</h1>
            {{-- @includeIf('backend.clients_and_contacts.filters') --}}
        </div>
        <div class="card-block">
            <div class="row enquires">
                <div class="col-md-12">
                    <div class="row no-gutters">
                        <div class="col-md-12 table-responsive">
                            
                            <fieldset>
                                <legend>General Enquiry Questions</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="w-100 text-center" border="1">
                                            <tr>
                                                <th>Questions</th>
                                                <th>Add Values</th>
                                                <th>All Values</th>
                                            </tr>
                                            @forelse($all_questions->where('type','general_enquiry_questions') as $i => $ques)
                                            <tr>
                                                <td>{{$ques['question']}}</td>
                                                <td>
                                                    <div class="form-group row" id="{{'save_form_'.$ques['field']}}">
                                                        {!! Form::label($ques['field'], 'Add New ',['class'=>'col-md-12 col-form-label']) !!}
                                                        <div class="col-md-6 ml-auto">
                                                        {!! Form::text($ques['field'], null, ['class' => 'form-control form-control-sm', 'id'=> $ques['field'] ,'required']) !!}
                                                        </div>
                                                        <div class="col-md-2 pl-0 mr-auto">
                                                            <a href="javascript::void(0);" class="btn btn-sm btn-primary save-btn" data-id="{{$ques['id']}}" data-field="{{$ques['field']}}">Save</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="{{'update_form_'.$ques['field']}}" style="display: none;">
                                                        {!! Form::label($ques['field'], 'Update field ',['class'=>'col-md-12 col-form-label']) !!}
                                                        <div class="col-md-6 ml-auto">
                                                        {!! Form::text('option_id', null, ['class' => 'form-control form-control-sm d-none','id'=> ('option_'.$ques['field']),'required']) !!}
                                                        {!! Form::text($ques['field'], null, ['class' => 'form-control form-control-sm','id'=> ('update_'.$ques['field']),'required']) !!}
                                                        </div>
                                                        <div class="col-md-2 pl-0 mr-auto">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary update-btn" data-id="{{$ques['id']}}" data-field="{{$ques['field']}}">Update</a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-info back-btn" data-field="{{$ques['field']}}">Back</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul id="{{'datalist_'. $ques['field']}}">
                                                        @forelse(@$ques['attributes']['options'] as $j => $op)
                                                            @if(is_array($op))
                                                                @foreach($op as $k => $o)
                                                                    <li class="border border-bottom">{{$o}} </li>
                                                                @endforeach
                                                            @else
                                                                <li class="border border-bottom list-li" data-id="{{$j}}"> {{$op}} 
                                                                    <span class="float-right">
                                                                        <span class="cursor-pointer edit" data-id="{{$j}}" data-field="{{$ques['field']}}" data-value="{{$op}}">Edit</span> | 
                                                                        <span class="cursor-pointer delete" data-question="{{$ques['id']}}" data-id="{{$j}}" data-field="{{$ques['field']}}">Delete</span>
                                                                    </span>
                                                                </li>
                                                            @endif
                                                        @empty 
                                                        <li> Nothing Added </li>
                                                        @endforelse
                                                    </ul>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td> NO DATA FOUND</td>
                                            </tr>
                                            @endforelse
                                        </table>
                              
                              
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Job Specific Enquiry Questions</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="w-100 text-center" border="1">
                                            <tr>
                                                <th>Questions</th>
                                                <th>Add Values</th>
                                                <th>All Values</th>
                                            </tr>
                                            @forelse($all_questions->where('type','job_specific_enquiry_questions') as $i => $ques)
                                            <tr>
                                                <td>{{$ques['question']}}</td>
                                                <td>
                                                    <div class="form-group row" id="{{'save_form_'.$ques['field']}}">
                                                        {!! Form::label($ques['field'], 'Add New ',['class'=>'col-md-12 col-form-label']) !!}
                                                        <div class="col-md-6 ml-auto">
                                                        {!! Form::text($ques['field'], null, ['class' => 'form-control form-control-sm', 'id'=> $ques['field'] ,'required']) !!}
                                                        </div>
                                                        <div class="col-md-2 pl-0 mr-auto">
                                                            <a href="javascript::void(0);" class="btn btn-sm btn-primary save-btn" data-id="{{$ques['id']}}" data-field="{{$ques['field']}}">Save</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="{{'update_form_'.$ques['field']}}" style="display: none;">
                                                        {!! Form::label($ques['field'], 'Update field ',['class'=>'col-md-12 col-form-label']) !!}
                                                        <div class="col-md-6 ml-auto">
                                                        {!! Form::text('option_id', null, ['class' => 'form-control form-control-sm d-none','id'=> ('option_'.$ques['field']),'required']) !!}
                                                        {!! Form::text($ques['field'], null, ['class' => 'form-control form-control-sm','id'=> ('update_'.$ques['field']),'required']) !!}
                                                        </div>
                                                        <div class="col-md-2 pl-0 mr-auto">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary update-btn" data-id="{{$ques['id']}}" data-field="{{$ques['field']}}">Update</a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-info back-btn" data-field="{{$ques['field']}}">Back</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul id="{{'datalist_'. $ques['field']}}">
                                                        @forelse(@$ques['attributes']['options'] as $j => $op)
                                                            @if(is_array($op))
                                                                @foreach($op as $k => $o)
                                                                    <li class="border border-bottom">{{$o}} </li>
                                                                @endforeach
                                                            @else
                                                                <li class="border border-bottom list-li" data-id="{{$j}}"> {{$op}} 
                                                                    <span class="float-right">
                                                                        <span class="cursor-pointer edit" data-id="{{$j}}" data-field="{{$ques['field']}}" data-value="{{$op}}">Edit</span> | 
                                                                        <span class="cursor-pointer delete" data-question="{{$ques['id']}}" data-id="{{$j}}" data-field="{{$ques['field']}}">Delete</span>
                                                                    </span>
                                                                </li>
                                                            @endif
                                                        @empty 
                                                        <li> Nothing Added </li>
                                                        @endforelse
                                                    </ul>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td> NO DATA FOUND</td>
                                            </tr>
                                            @endforelse
                                        </table>
                              
                              
                                    </div>
                                </div>
                            </fieldset>
                            <div id="ajax_list_loader" style="display: none;">
                                <div class="d-flex text-center" style="min-height: 200px;">
                                    <p class="m-auto"><img src={{ asset('images/loader.gif') }}></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('header')
@parent
<style>
    .cursor-pointer{
        cursor: pointer;
    }
</style>
@endsection
@section('customjs')
    @parent
    <script>
        function updateDataLists(data){

            var ul = '';
            if(data.attributes.options)
            {
                Object.keys(data.attributes.options).forEach(function(value, key){
                    ul += `<li class="border border-bottom"> ${data.attributes.options[value]} 
                                <span class="float-right">
                                    <span class="cursor-pointer edit" data-id='${value}' data-field='${data.field}' data-value="${data.attributes.options[value]}">Edit</span> | 
                                    <span class="cursor-pointer delete" data-question="${data.id}" data-id='${value}' data-field='${data.field}'>Delete</span>
                                </span>
                            </li>`;
                });
            }
            if(ul === '')
                ul += `<li> Nothing Added </li>`;

            $('#datalist_'+data.field).html(ul);
        }
    </script>
    
    <script>
        $(document).ready(function() {
            $('.save-btn').click(function(e){
                e.preventDefault();
                var field = $(this).data('field');
                if($('#'+ field).val()){
                    $.ajax({
                        url: "{{ route('jobquestions.store')}}",
                        type: 'POST',
                        data: {
                            '_token': "{{csrf_token()}}",
                            'question_id': $(this).data('id'),
                            'field': field,
                            'value': $('#'+ field).val()
                        },
                        beforeSend: function(){
                            var loader = $('#ajax_list_loader').html();
                            $('#datalist_'+field).html(loader);
                        },
                        success: function(data){
                            updateDataLists(data);
                            $('#'+ field).val('');
                        }
                    });
                }
                else{
                    toastr.error('Please add some value!');
                }
                
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.update-btn').click(function(e){
                e.preventDefault();
                var field = $(this).data('field');
                var question_id = $(this).data('id');

                if($('#update_'+ field).val()){
                    $.ajax({
                        url: "{{ route('jobquestions.index')}}/"+ question_id,
                        type: 'PUT',
                        data: {
                            '_token': "{{csrf_token()}}",
                            '_method': 'PUT',
                            'question_id': question_id,
                            'option_id': $('#option_'+ field).val(),
                            'field': field,
                            'value': $('#update_'+ field).val()
                        },
                        beforeSend: function(){
                            var loader = $('#ajax_list_loader').html();
                            $('#datalist_'+field).html(loader);
                        },
                        success: function(data){
                            updateDataLists(data);
                            $('#update_'+ field).val('');
                            $('#option_'+ field).val('');
                            $('#update_form_'+ field).hide();
                            $('#save_form_'+field).show();
                        }
                    });
                }
                else{
                    toastr.error('Please add some value!');
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('ul').on('click' , '.delete', function(e){
                e.preventDefault();
                var field = $(this).data('field');
                var question_id = $(this).data('question');
                var option_id = $(this).data('id');

                if(confirm('Are you sure you want to delete this?')){
                    $.ajax({
                        url: "{{ route('jobquestions.index')}}/"+ question_id,
                        type: 'DELETE',
                        data: {
                            '_token': "{{csrf_token()}}",
                            '_method': 'DELETE',
                            'question_id': question_id,
                            'option_id': option_id,
                            'field': field
                        },
                        beforeSend: function(){
                            var loader = $('#ajax_list_loader').html();
                            $('#datalist_'+field).html(loader);
                        },
                        success: function(data){
                            updateDataLists(data);
                        }
                    });
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('ul').on('click' , '.edit', function(e){
                e.preventDefault();

                var field = $(this).data('field');
                $('#update_'+ field).val($(this).data('value'));
                $('#option_'+ field).val($(this).data('id'));
                $('#update_form_'+ field).show();
                $('#save_form_'+field).hide();
                
            });
            $('.back-btn').on('click' , function(e){
                e.preventDefault();

                var field = $(this).data('field');
                $('#update_'+ field).val($(this).data(''));
                $('#option_'+ field).val($(this).data(''));
                $('#update_form_'+ field).hide();
                $('#save_form_'+field).show();
                
            });
        });
    </script>
@endsection
