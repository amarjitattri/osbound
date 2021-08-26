<div class="row" id="store_job_tag_form">
    <div class="col-md-6"></div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="job_tag" class="col-md-6 col-form-label">Add Tag To List of Tags</label>
            <div class="col-md-6">
                <input class="form-control form-control-sm" name="job_tag" type="text" value="" id="job_tag">
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-sm btn-primary btn-block" id="store_job_tag"> Add</button>
    </div>
</div>
<div class="row" id="multisearch_job_tag_form">
    <div class="col-md-6"></div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="searched_tags" class="col-md-6 col-form-label">Multi Search</label>
            <div class="col-md-6">
                <input class="form-control form-control-sm" name="searched_tags" type="text" value="" id="searched_tags">
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-sm btn-primary btn-block" id="search_multitag"> Search</button>
    </div>
</div>
  {{-- <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="telephone" class="col-md-6 col-form-label">Search Tag List</label>
            <div class="col-md-6">
                <input class="form-control form-control-sm" name="" type="text" value="" id="">
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
  </div> --}}
  <div class="row align-items-center">
    <div class="col-md-4" style="min-height: 450px;">
      <div class="form-group list-form-group">
        <label for="jobspecifictagslist">Tag List for this Job</label>
        <select id="jobspecifictagslist" name="jobtags[]" multiple class="form-control">
            @forelse($job_data['jobTags'] as $tag)
                <option value="{{$tag['id']}}">{{$tag['tag']}}</option>
            @empty
                <option disabled>No tags here!</option>
            @endforelse
        </select>
        {{-- <div class="ms-selectable taglistforthisjob_div">
          <ul class="ms-list" tabindex="0">
          <li class="" id=""><a href="javascript:void();"><span>elem 1</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 2</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 3</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 4</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
          <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
            </ul>
        </div> --}}
    </div>
    </div>
    <div class="col-md-2">
      <button type="button" class="text-center addselectedtext" id="add_selected_tags"><b>Add Selected Tag</b> <img src="{{ asset('images/hand-left-icon.png')}}" alt="icon"> </button>
    </div>
    <div class="col-md-4 align-self-start" id="all_job_tags_section" style="min-height: 450px;">
        <div class="form-group list-form-group">
            <div method="post" id="all_tags_form">
                <div class="form-group">

                    <label for="alltagslist">Entire Tag List</label>
                    <select id="alltagslist" name="tags[]" multiple class="form-control">
                        @forelse($job_tags as $tag)
                            <option value="{{$tag['id']}}">{{$tag['tag']}}</option>
                        @empty
                            <option disabled>No tags here!</option>
                        @endforelse
                    </select>
                </div>
            </div>
            {{-- <label for="entiretaglist">Entire Tag List</label>
            <div class="ms-selectable entiretaglist_div">
                <ul class="ms-list" tabindex="0">
                    <li class="" id=""><a href="javascript:void();"><span>elem 1</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 2</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 3</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 4</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                    <li class="" id=""><a href="javascript:void();"><span>elem 5</span></a></li>
                </ul>
            </div> --}}
        </div>
    </div>
    <div class="col-md-2 align-self-end">
      <button type="button" class="btn btn-sm btn-danger btn-block" id="delete_selected_tags"> Delete Selected Tags From Entire List</button>
    </div>
  </div>
  <div class="row mt-5" id="update_tag_form">
    <div class="col-md-2"></div>
    <div class="col-md-2"><button type="button" class="btn btn-sm btn-danger btn-block" id="remove_job_specific_tags"> Remove Tags</button></div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="form-group row">
        <label for="updated_tag_name" class="col-md-6 col-form-label">Amend Selected Tag [<span id="selected_tag_from_entire_list"></span>]</label>
        <div class="col-md-6">
            <input class="form-control form-control-sm d-none" name="update_tag_id" type="text" value="" id="update_tag_id" required>
            <input class="form-control form-control-sm" name="update_tag_name" type="text" value="" id="update_tag_name" required>
        </div>
    </div>
    </div>
    <div class="col-md-2">
      <button type="button" class="btn btn-sm btn-primary btn-block" id="update_tag_btn"> Amend Tag</button>
    </div>
  </div>

@section('header')
@parent
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<style type="text/css">
    .checkbox-list{
        border: 1px solid #000;
        height: 100%;
    }
</style>
@endsection
@section('customjs')
@parent

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script>
    var updateTagLists = function (data) {

        if(data.job_all_tags)
        {
            var htmlContent1 ='';
            if(data.job_all_tags.length){
                data.job_all_tags.forEach(function(val, index) {
                    htmlContent1 += `<option value="${val.id}">${val.tag}</option>`;
                });
            }
            else
            {
                htmlContent1 += `<option disabled>No tags here!</option>`;
            }
            $('#alltagslist').html(htmlContent1);
            $('#alltagslist').multiselect('rebuild');

        }

        if(data.job_specific_tags)
        {
            var htmlContent2 ='';
            if(data.job_specific_tags.length){
                data.job_specific_tags.forEach(function(val, index) {
                    htmlContent2 += `<option value="${val.id}">${val.tag}</option>`;
                });
            }
            else{
                htmlContent2 += `<option disabled>No tags here!</option>`;
            }
            $('#jobspecifictagslist').html(htmlContent2);
            $('#jobspecifictagslist').multiselect('rebuild');
        }

    }
</script>
<script>
    $(document).ready(function(){

        $('#jobspecifictagslist').multiselect({

            nonSelectedText: 'Select Tag',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonContainer: '<div class="jobspecificlist apj-jobspecificlist-left"></div>',
            buttonClass: '',
            templates: {
                button: '',
                ul: '<ul class="multiselect-container checkbox-list"></ul>',
                option: '<a class="multiselect-option text-dark text-decoration-none"></a>'
            }

        });
    });
</script>
<script>

        $("#multisearch_job_tag_form").validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                // resetForm: true,
                method: "GET",
                url: "{{ route('jobtags.index')}}",
                data: {
                    'update_list' : '1',
                    'job_id': "{{ $job_data['id']}}",
                },
                success: function (responseText, statusText, xhr, $form) {

                    updateTagLists(responseText);
                }
            });
            return false;
        }
        });
        $('#search_multitag').click(function(){
            $('#multisearch_job_tag_form').submit();
        })

</script>

<script>

        $("#store_job_tag_form").validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                resetForm: true,
                method: "POST",
                url: "{{ route('jobtags.store')}}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'job_id': "{{ $job_data['id']}}",
                    'update_list' : '1'
                },
                error: function (res) {
                    let errorBucket = res.responseJSON.errors ?? [];
                    if(errorBucket){
                        Object.keys(errorBucket).forEach(function(val, index) {
                            var $label = $("<label>").attr('id', val+'-servererror').attr('class','error w-100').attr('for',val).text(errorBucket[val][0]);
                                var $inputField = $("input[name="+val+"]");
                            $label.insertAfter($inputField);

                        });
                    }
                },
                success: function (responseText, statusText, xhr, $form) {

                    updateTagLists(responseText);

                    //$('#all_job_tags_section').html(responseText);
                    toastr.success('Tag has been added successfully');
                    // location.href = "{{ route('enquiries.index') }}" + "/" + responseText.id;
                }
            });
            return false;
        }
        });
        $('#store_job_tag').click(function(){
            $('#store_job_tag_form').submit();
        })

</script>

<script>

    $(document).ready(function(){

        $('#alltagslist').multiselect({

            nonSelectedText: 'Select Tag',
            enableFiltering: false,
            enableCaseInsensitiveFiltering: false,
            buttonContainer: '<div class="jobspecificlist"></div>',
            buttonClass: '',
            templates: {
                button: '',
                ul: '<ul class="multiselect-container checkbox-list"></ul>',
                option: '<a class="multiselect-option text-dark text-decoration-none"></a>'
            }

        });

        $('#all_tags_form').on('submit', function(event){

            event.preventDefault();
            if($("#alltagslist").val().length)
            {

                $.ajax({

                    url:"{{ route('jobtags.store') }}",
                    method:"POST",
                    data:{
                        '_token': "{{ csrf_token() }}",
                        'tags': $("#alltagslist").val(),
                        'multi_tags_add_and_associate': '1',
                        'job_id': "{{$job_data['id']}}",
                        'update_list': '1'
                    },

                    success: function(data)
                    {
                        updateTagLists(data);
                        toastr.success('The tags has been linked successfully');
                    }

                });
            }
            else{
                toastr.warning('Please select tags to attach');
            }
        });
    });

    $('#add_selected_tags').click(function(){
        $('#all_tags_form').submit();
    });

</script>

<script>
    $('#alltagslist').on('change', function(){
        var selected = $(this).find("option:selected").last();
        var value = selected.text();
        var id = selected.val();
        $('#selected_tag_from_entire_list').html(value);
        $('#update_tag_id').val(id);
        $('#update_tag_name').val(value)

    });
</script>

<script>
        $('#update_tag_form').on('submit', function(event){
            event.preventDefault();
            if($('#update_tag_id').val())
            {
                $(this).ajaxSubmit({
                    resetForm: true,
                    url:"{{ route('jobtags.index') }}/"+$('#update_tag_id').val(),
                    method:"PUT",
                    data:{
                        '_token': "{{ csrf_token() }}",
                        '_method': 'PUT',
                        'tag' : $('#update_tag_name').val(),
                        'id' : $('#update_tag_id').val(),
                        'update_list': '1',
                        'job_id': "{{$job_data['id']}}"
                    },

                    success: function(data)
                    {
                        updateTagLists(data);
                        $('#selected_tag_from_entire_list').html('');
                        toastr.success('Tag has been updated successfully');
                    }

                });
            }
            else{
                toastr.error('Please select a tag');
            }
        });

        $('#update_tag_btn').click(function(){

            $("#update_tag_form").submit();

        });
</script>

<script>

    $('#delete_selected_tags').click(function(){

        var tags = [];
        $('#alltagslist option:selected').each(function() {
                tags.push($(this).val());
            });
        if(tags.length)
        {
            $.ajax({

                url: "{{route('jobtags.destroyMultiple')}}",
                method: "DELETE",
                data: {
                    '_method' : "DELETE",
                    '_token' : "{{ csrf_token()}}",
                    'tags' : tags,
                    'delete_from_all_tags': '1',
                    'job_id': "{{$job_data['id']}}"
                },
                success: function(data){
                    updateTagLists(data);
                    $('#selected_tag_from_entire_list').html('');
                    $('#update_tag_id').val('');
                    $('#update_tag_name').val('')
                    toastr.info('The selected tags have been deleted successfully');
                }
            });
        }
    });
</script>

<script>

    $('#remove_job_specific_tags').click(function(){

        var tags = [];
        $('#jobspecifictagslist option:selected').each(function() {
                tags.push($(this).val());
            });
        if(tags.length)
        {
            $.ajax({

                url: "{{route('jobtags.destroyMultiple')}}",
                method: "DELETE",
                data: {
                    '_method' : "DELETE",
                    '_token' : "{{ csrf_token()}}",
                    'job_id': "{{$job_data['id']}}",
                    'tags' : tags,
                    'delete_from_job_specific_tags': '1'
                },
                success: function(data){
                    updateTagLists(data);
                    toastr.info('The selected tags have been detached successfully');
                }
            });
        }
    });
</script>

@endsection
