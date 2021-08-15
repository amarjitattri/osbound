<table style="width:101.5%" class="tasks_db_table" id="tasks_db_table">
    <tr>
    <th class="taskaction_th"></th>
    <th class="status_th"></th>
    <th class="dateadded_th"></th>
    <th class="duedate_th"></th>
    <th class="action_th"></th>
    </tr>
    @foreach($job_tasks as $task )
    <tr>
        <td>
            <textarea id="task_action_{{@$task['id']}}" name="task_action[{{@$task['id']}}]" class="taskaction_textarea form-control" rows="2">{{ @$task['task_action'] }}</textarea>
        </td>
        <td>
            <select name="status[{{@$task['id']}}]" class="status_select custom-select" id="status_{{@$task['id']}}">
            <option value="">--Status--</option>
            <option value="1" @if(@$task['status'] == '1') selected @endif>Active</option>
            <option value="0" @if(@$task['status'] == '0') selected @endif>Disable</option>
        </select>
        </td>
        <td>
            <div class="form-group">
                <div class="input-group date">
                    <input type="text" name="date_added[{{@$task['id']}}]" id="date_added_{{@$task['id']}}" value="{{ @$task['date_added'] }}" class="form-control datepicker dateadded_input">
                    <label for="date_added[{{@$task['id']}}]">
                        <span class="input-group-addon ">
                        <span class="icofont icofont-ui-calendar"></span></span>
                    </label>
                </div>
            </div>
        </td>
        <td>
            <div class="form-group">
                <div class="input-group date">
                    <input type="text" name="due_date[{{@$task['id']}}]" id="due_date_{{@$task['id']}}" value="{{ @$task['due_date'] }}" class="form-control datepicker dateadded_input">
                        <label for="due_date[{{@$task['id']}}]">
                            <span class="input-group-addon ">
                            <span class="icofont icofont-ui-calendar"></span></span>
                        </label>
                </div>
            </div>
        </td>
        <td>
            <button type="button" class="btn btn-sm btn-info btn-block job_tasks_update_btn" onClick="updateJobTask({{@$task['id']}});"> Update</button>
            <button type="button" class="btn btn-sm btn-danger btn-block job_tasks_del_btn" onClick="destroyJobTask({{@$task['id']}});"> Delete</button>
        </td>
    </tr>
    @endforeach
</table>