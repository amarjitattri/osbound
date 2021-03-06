<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobTag;
use Illuminate\Http\Request;

class JobTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if($request->json() && $request['update_list']){
            
            $job_all_tags = new JobTag;

            if(@$request['searched_tags']){

                $all_tags = explode(',' , $request['searched_tags']);
                // dd($all_tags);
                $job_all_tags = $job_all_tags->where(function ($query) use($all_tags) {
                    for ($i = 0; $i < count($all_tags); $i++){
                        if(trim($all_tags[$i]))
                            $query->orwhere('tag', 'like',  '%' . trim($all_tags[$i]) .'%');
                    }      
               });
            }
            
            
            $job_all_tags = $job_all_tags->where('is_active','1')->get();
            $job_specific_all_tags = JobTag::has('jobs')->where('is_active','1')->orderBy('id','asc')->get();
            $job_specific_tags = [];
            foreach($job_specific_all_tags as $tag){
                if($tag->jobs()->where('id',$request['job_id'])->exists())
                {
                    $job_specific_tags[] = $tag;
                }
            }

            return response()->json(['job_all_tags'=> $job_all_tags, 'job_specific_tags' => $job_specific_tags]);

        }
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
        if(@$request['multi_tags_add_and_associate'])
        {
            $job = Job::findOrFail($request['job_id']);
            $job->jobTags()->syncWithoutDetaching($request['tags']);
        }
        else
        {
            $this->validate($request,[
                'job_tag' => 'required|unique:job_tags,tag'
            ]);
    
            
            
            $jobtag = JobTag::create([
                'tag' => $request['job_tag']
            ]);

        }
        

        if($request->json() && $request['update_list']){
            
            $job_all_tags = JobTag::where('is_active','1')->get();
            $job_specific_all_tags = JobTag::has('jobs')->where('is_active','1')->orderBy('id','asc')->get();
            $job_specific_tags = [];
            foreach($job_specific_all_tags as $tag){
                if($tag->jobs()->where('id',$request['job_id'])->exists())
                {
                    $job_specific_tags[] = $tag;
                }
            }
            return response()->json(['job_all_tags'=> $job_all_tags, 'job_specific_tags' => $job_specific_tags]);

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTag  $jobTag
     * @return \Illuminate\Http\Response
     */
    public function show(JobTag $jobTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobTag  $jobTag
     * @return \Illuminate\Http\Response
     */
    public function edit(JobTag $jobTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobTag  $jobTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobTag $jobTag)
    {
        $this->validate($request,[
            'id' => 'required',
            'tag' => 'required'
        ]);

        $jobTag->where('id', $request['id'])->update([
            'tag' => $request['tag']
        ]);

        if($request->ajax())
        {
            $job_all_tags = JobTag::where('is_active','1')->get();
            $job_specific_all_tags = JobTag::has('jobs')->where('is_active','1')->orderBy('id','asc')->get();
            $job_specific_tags = [];
            foreach($job_specific_all_tags as $tag){
                if($tag->jobs()->where('id',$request['job_id'])->exists())
                {
                    $job_specific_tags[] = $tag;
                }
            }

            return response()->json(['job_all_tags'=> $job_all_tags, 'job_specific_tags' => $job_specific_tags]);
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTag  $jobTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTag $jobTag)
    {
        //
    }
    
    public function destroyMultiple(Request $request)
    {

        if($request['delete_from_job_specific_tags'])
        {
            $job = Job::findOrFail($request['job_id']);
            $job->jobTags()->detach($request['tags']);
        }
        else
        {
            $jobtags = JobTag::whereIn('id',$request['tags'])->delete();
        }

        if($request->ajax())
        {
            $job_all_tags = JobTag::where('is_active','1')->get();
            $job_specific_all_tags = JobTag::has('jobs')->where('is_active','1')->orderBy('id','asc')->get();
            $job_specific_tags = [];
            foreach($job_specific_all_tags as $tag){
                if($tag->jobs()->where('id',$request['job_id'])->exists())
                {
                    $job_specific_tags[] = $tag;
                }
            }
            
            return response()->json(['job_all_tags'=> $job_all_tags, 'job_specific_tags' => $job_specific_tags]);
        }

        return redirect()->back();
    }
}
