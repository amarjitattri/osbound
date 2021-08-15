<div>
    <div id="create_job_task_form">
        
        <table style="width:100%">
            <tr>
            <th class="taskaction_th">Task Action</th>
            <th class="status_th">Status</th>
            <th class="dateadded_th">Date Added</th>
            <th class="duedate_th">Due Date</th>
            <th class="action_th"></th>
            </tr>
            <tr>
                <td>
                    <textarea name="task_action" id="task_action" class="taskaction_textarea form-control" rows="2">{{ old('task_action') }}</textarea>
                </td>
                <td>
                    <select name="status" class="status_select custom-select" id="status">
                    <option value="">--Status--</option>
                    <option value="1" selected>Active</option>
                    <option value="0">Disable</option>
                </select>
                </td>
                <td>
                    <div class="form-group">
                        <div class="input-group date">
                            <input type="text" name="date_added" id="date_added" class="form-control datepicker dateadded_input">
                            <label for="date_added">
                                <span class="input-group-addon ">
                                <span class="icofont icofont-ui-calendar"></span></span>
                            </label>
                        </div>
                    </div>
                </td>
            <td>
                <div class="form-group">
                    <div class="input-group date">
                        <input type="text" name="due_date" id="due_date" class="form-control datepicker dateadded_input">
                            <label for="due_date">
                                <span class="input-group-addon ">
                                <span class="icofont icofont-ui-calendar"></span></span>
                            </label>
                    </div>
                </div>
            </td>
            <td><button type="button" class="btn btn-sm btn-primary btn-block" id="create_job_task_btn"> Add</button></td>
            </tr>
        </table>
        
    </div>
    <div id="tasks_error_list" style="display: none;">
        <div class="apj_divider"></div><!-- /.apj_divider -->
        <p class="text-danger"><span class="icofont icofont-ui-close" style="cursor: pointer;" title="Hide Errors" id="hide_job_task_errors"></span> Errors</p>
    </div>
    <div class="apj_divider"></div><!-- /.apj_divider -->
    <div>
        @includeIf('backend.enquiries.inner.tasks_list', ['job_tasks' => $job_data['jobTasks']])
    </div>
</div>

@section('customjs')
  @parent
    <script>
        function updateJobTask(id){
            try{
                $.ajax({
                    method: 'PUT',
                    url: "{{ route('jobtasks.index') }}/" + id,
                    data: {
                        '_token' : "{{ csrf_token() }}",
                        '_method' : "PUT",
                        'task_action': $("#task_action_" + id).val(),
                        'status' : $("#status_" + id).val(),
                        'date_added' : $("#date_added_" + id).val(),
                        'due_date' : $("#due_date_" + id).val(),
                    },
                    error: function (res) {
                            let errorBucket = res.responseJSON.errors ?? [];
                            if(errorBucket){
                                Object.keys(errorBucket).forEach(function(val, index) {
                                    var substr = errorBucket[val][0].split('field');
                                    var $label = $("<label>").attr('id', val+'-' + id+ '-servererror').attr('class','error w-100').attr('for',val+"_"+id).text(substr[0] + id +' field' + substr[1]);
                                    // var $inputField = $("[name="+val+"]");
                                    var $inputField = $("#tasks_error_list");
                                    $inputField.show();
                                    $label.insertAfter($inputField.find("p"));
                                    
                                });
                            }
                        },
                    
                    
                })
                .done(function(data) {
                    var $inputField = $("#tasks_error_list");
                    $inputField.hide();
                    toastr.success('Task '+ data['id'] + ' has been updated successfully');
                });
            }
            catch(error){
                console.log('Error Occured', error);
            }
    }
    function destroyJobTask(id){
        try{
            $.ajax({
                method: 'DELETE',
                url: "{{ route('jobtasks.index') }}/" + id,
                data: {
                    '_token' : "{{ csrf_token() }}",
                    '_method' : "DELETE",
                    'job_id': "{{ $job_data['id']}}",
                    'update_list' : '1'
                },
            }).fail(function(error) {
                alert('Sorry, Some error occured! Please try again after sometime.');
            })
            .done(function(data) {
                var $inputField = $("#tasks_error_list");
                $inputField.hide();
                $('#tasks_db_table').parent().html(data);
                toastr.info('Task has been deleted successfully');
            });
        }
        catch(error){
            console.log('Error Occured', error);
        }
    }
    </script>
    <script>
        $('#hide_job_task_errors').click(function(){
            $('#tasks_error_list').hide();
        });
        $("#create_job_task_form").validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    resetForm: true,
                    method: "POST",
                    url: "{{ route('jobtasks.store')}}",
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
                                // var $inputField = $("[name="+val+"]");
                                var $inputField = $("#tasks_error_list");
                                $inputField.show();
                                $label.insertAfter($inputField.find("p"));
                                
                            });
                        }
                    },
                    success: function (responseText, statusText, xhr, $form) {
                        var $inputField = $("#tasks_error_list");
                        $inputField.hide();
                        $('#tasks_db_table').parent().html(responseText);
                        toastr.success('Task has been added successfully');
                        // location.href = "{{ route('enquiries.index') }}" + "/" + responseText.id;
                    }
                });
                return false;
            }
            });
            $('#create_job_task_btn').click(function(){
                $('#create_job_task_form').submit();
            })
    </script>
@endsection