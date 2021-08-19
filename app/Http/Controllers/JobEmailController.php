<?php

namespace App\Http\Controllers;

use App\Models\JobEmail;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobEmailer;

class JobEmailController extends Controller
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
    public function store(Request $request)
    {

        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $jobemail = JobEmail::create([
            'job_id' => $request['job_id'],
            'job_type_slug' => $request['job_type_slug'],
            'from' => $request['from'],
            'to' => $request['to'],
            'subject' => $request['subject'] ?? '',
            'message' => $request['message'] ?? ''
        ]);

        Mail::to($request['to'])->queue(new JobEmailer($jobemail));

        \Session::flash('type', 'success');
        \Session::flash('message','Email has been sent successfully!');

        return redirect()->back();
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
    public function show($job_id)
    {
        $job_data = Job::select(['id','job_no','job_type_slug'])->where('id',$job_id)->first();
        
        return view('backend.enquiries.email_contact',['job_data' => $job_data]);
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
