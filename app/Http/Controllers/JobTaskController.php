<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobTask;

class JobTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobTask $jobtask)
    {
        $this->validate($request,[
            'task_action' => 'required',
            'status' => 'required',
            'date_added' => 'required',
            'due_date' => 'required'
        ]);

        $jobtask->create([
            'job_id' => $request['job_id'],
            'task_action' => $request['task_action'] ?? null,
            'status' => $request['status'] ?? 0,
            'date_added' => $request['date_added'] ?? null,
            'due_date' => $request['due_date'] ?? null,
        ]);

        if($request->ajax() && $request['update_list']){
            $job_tasks = JobTask::where('job_id', $request['job_id'])->get();
            return response(view('backend.enquiries.inner.tasks_list',['job_tasks' => $job_tasks]));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'task_action' => 'required',
            'status' => 'required',
            'date_added' => 'required',
            'due_date' => 'required'
        ]);

        $jobtask= JobTask::findOrFail($id);
        
        $jobtask->update([
            'task_action' => $request['task_action'] ?? null,
            'status' => $request['status'] ?? 0,
            'date_added' => $request['date_added'] ?? null,
            'due_date' => $request['due_date'] ?? null,
        ]);

        if($request->ajax()){
            return response()->json($jobtask);
        }

        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $jobtask = JobTask::findOrFail($id);
        $jobtask->delete();

        if($request->ajax() && $request['update_list'])
        {
            $job_tasks = JobTask::where('job_id' , $request['job_id'])->get();
            return response(view('backend.enquiries.inner.tasks_list',['job_tasks' => $job_tasks]));
        }

        return redirect()->back();
    }
}
