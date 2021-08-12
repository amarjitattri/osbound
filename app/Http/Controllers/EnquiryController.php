<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Contact;
use App\Models\Client;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Job $job, Contact $contact, Client $client , Request $request)
    {
        if(@$request['job_no'])
            $job->where('job_no', $request['job_no']);
        if(@$request['contact_name'])
            $contact->where('contact_name', 'like' , '%'.$request['contact_name'].'%');
        if(@$request['client_name'])
            $client->where('client_name' , 'like' , '%'.$request['client_name'].'%');

        $enquiries = $job->where(['job_type_slug' => 'enquiries' , 'is_active' => 1])->get();
        $contacts = $contact->where(['is_active' => 1])->get();
        $clients = $client->where(['is_active' => 1])->get();
        
        $table_data = Job::join('contacts', 'contacts.id' , '=','jobs.contact_id')->join('clients', 'clients.id', '=', 'contacts.client_id')->where('jobs.job_type_slug' , 'enquiries')->where('jobs.is_active' , '1')->get();
        // dd($table_data);
        return view('backend.enquiries.index', ['enquiries' => $enquiries , 
                                                'contacts' => $contacts, 
                                                'clients'=> $clients, 
                                                'tableData' => @$table_data, 
                                                'list' => []
                                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contact, Client $client)
    {

        $contacts = $contact->select(['id','first_name','last_name'])->where('is_active' , 1)->get();
        $clients = $client->select(['id','client_name'])->where('is_active' , 1)->get();
        return view('backend.enquiries.createModelForm', ['contacts' => $contacts, 'clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact_id = $request['contact_id'] ?? '';

        $job = Job::create([
            'job_no' => 'JOB0'.rand(1,99),
            'job_type_slug' => 'enquiries',
            'contact_id' => $contact_id,
        ]);

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
        $job_data = Job::where('id',$id)->where('is_active' , 1)->where('job_type_slug' , 'enquiries')->first();

        return view('backend.enquiries.show', ['job_data' => $job_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.enquiries.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
