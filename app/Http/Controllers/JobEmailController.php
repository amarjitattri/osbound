<?php

namespace App\Http\Controllers;

use App\Models\JobEmail;
use App\Models\Job;
use App\Models\JobTag;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobEmailer;
use File;

class JobEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() && @$request['update_content']){
            $tags = $request['tags'];
            $images = [];
            if(count($tags)){
                
                //------Get all jobs from tags

                $job_tags = JobTag::has('jobs')->with('jobs',function($query){
                    $query->select('id');
                })
                ->whereIn('job_tags.id',$tags)
                ->get()->pluck('jobs');

                $jobs = [];
                foreach($job_tags as $job){
                    foreach($job as $j){
                        $jobs[] = $j['id'];
                    }
                }
                $all_jobs = [];
                if(count($jobs)){
                    $jobs = array_unique($jobs);

                    //---- Get all media from the jobs selected above

                    $all_jobs = Job::has('medias')->with('medias',function($query){
                        $query->where('type','image');
                    })->whereIn('id' , $jobs)->where('is_active',1)->get()->pluck('medias');

                    foreach($all_jobs as $all_media){
                        foreach($all_media as $media){
                            $images[] = [
                                'id' => $media['id'],
                                'path' => $media['path']
                            ];
                        }
                    }
                }
            }

            return response()->json($images);
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

        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // dd($request->all());

        $data = [
            'job_id' => $request['job_id'],
            'job_type_slug' => $request['job_type_slug'],
            'from' => $request['from'],
            'to' => $request['to'],
            'subject' => $request['subject'] ?? '',
            'message' => $request['message'] ?? '',
        ];

        if($request->has('photography_auth_form') && File::exists(public_path($request['photography_auth_form']))){
            $data['attachments']['photography_auth_form'] = $request['photography_auth_form'];
        }
        if($request->has('terms_and_conditions') && File::exists(public_path($request['terms_and_conditions']))){
            $data['attachments']['terms_and_conditions'] = $request['terms_and_conditions'];
        }
        if($request->has('has_image_gallery') && count(@$request['image_gallery'])){
            $data['attachments']['image_gallery'] = $request['image_gallery'];
        }

        $jobemail = JobEmail::create($data);

        Mail::to($request['to'])->queue(new JobEmailer($jobemail));

        \Session::flash('type', 'success');
        \Session::flash('message','Email has been sent successfully!');

        return redirect()->route('enquiries.show',['enquiry' => $request['job_id']]);
        // $data["email"] = "websolutionstuff@gmail.com";
        // $data["title"] = "websolutionstuff.com";
        // $data["body"] = "This is test mail with attachment";
 
        // $files = [
        //     public_path('attachments/Image_1.jpeg'),
        //     public_path('attachments/Laravel_8_pdf_Example.pdf'),
        // ];
  
        // Mail::send('mail.Test_mail', $data, function($message)use($data, $files) {
        //     $message->to($data["email"])
        //             ->subject($data["title"]);
 
            // foreach ($files as $file){
            //     $message->attach($file);
            // }            
        // });

        // echo "Mail send successfully !!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobEmail  $jobEmail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $job_id)
    {
        $job_data = Job::with(['contact'])->where('id',$job_id)->where('is_active',1)->first();

        $job_tags = JobTag::where('is_active',1)->get();

        if($request->ajax() && @$request['update_content']){
            return response()->json($job_data->images()->get());
        }
        
        return view('backend.enquiries.email_contact',['job_data' => $job_data , 'job_tags' => $job_tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobEmail  $jobEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(JobEmail $jobEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobEmail  $jobEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobEmail $jobEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobEmail  $jobEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobEmail $jobEmail)
    {
        //
    }
}
