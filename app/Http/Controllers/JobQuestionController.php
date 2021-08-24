<?php

namespace App\Http\Controllers;

use App\Models\JobQuestion;
use Illuminate\Http\Request;

class JobQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_questions = JobQuestion::where('is_active',1)->get();
        return view('backend.maintenance.job_questions',['all_questions' => $all_questions]);
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'question_id' => 'required',
            'value' => 'required',
            'field' => 'required'

        ]);

        $job_question = JobQuestion::where('id', $request['question_id'])->where('field', $request['field'])->firstOrFail();
        $attributes = $job_question['attributes'];
        $attributes['options'][] = $request['value']; 

        $job_question->update([
            'attributes' => $attributes
        ]);

        if($request->ajax())
        {
            return response()->json($job_question);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobQuestion  $jobQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(JobQuestion $jobQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobQuestion  $jobQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(JobQuestion $jobQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobQuestion  $jobQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'value' => 'required',
            'option_id' => 'required',
            'question_id' => 'required'
        ]);

        $job_question = JobQuestion::where('id',$request['question_id'])->firstOrFail();
        $attributes = $job_question['attributes'];
        $attributes['options'][$request['option_id']] = $request['value'];

        $job_question->update([
            'attributes' => $attributes
        ]);

        if($request->ajax())
        {
            return response()->json($job_question);
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobQuestion  $jobQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request,[
            'option_id' => 'required',
            'question_id' => 'required'
        ]);

        $job_question = JobQuestion::where('id',$request['question_id'])->firstOrFail();
        $attributes = $job_question['attributes'];
        unset($attributes['options'][$request['option_id']]);

        $job_question->update([
            'attributes' => $attributes
        ]);

        if($request->ajax())
        {
            return response()->json($job_question);
        }

        return redirect()->back();
    }
}
