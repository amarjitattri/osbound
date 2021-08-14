<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Contact;
use App\Models\Client;
use Illuminate\Support\Str;

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

        $filters_data = \Config::get('constants.forms.enquiries.filters');
        
        $table_data = Job::join('contacts', 'contacts.id' , '=','jobs.contact_id')->join('clients', 'clients.id', '=', 'contacts.client_id')
                            ->select(['jobs.*' , 'clients.client_name', 'contacts.first_name','contacts.last_name','contacts.email','contacts.mobile','contacts.telephone'])
                            ->where('jobs.job_type_slug' , 'enquiries')->where('jobs.is_active' , '1')->orderBy('jobs.updated_at', 'desc')->get();
        // dd($filters_data);
        return view('backend.enquiries.index', ['enquiries' => $enquiries , 
                                                'contacts' => $contacts, 
                                                'clients'=> $clients, 
                                                'tableData' => @$table_data,
                                                'filters_data' => $filters_data, 
                                                'list' => []
                                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Contact $contact, Client $client)
    {
        
        
        if($request->ajax() && @$request['filter'])
        {
            if(@$request['contact_id'])
            {
                $contacts = $contact->with('client')->where('id',$request['contact_id'])->where('is_active' , 1)->get();
            }
            elseif(@$request['client_id'])
            {
                $clients = $client->with('contacts')->where('id', $request['client_id'])->first();
            }
            else
            {
                $contacts = $contact->select(['id','first_name','last_name'])->where('is_active' , 1)->get();
                $clients = $client->select(['id','client_name'])->where('is_active' , 1)->get();
            }

            return response()->json(['contacts' => @$contacts , 'clients' => @$clients]);

        }
        
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
        
        $last_job = Job::latest()->first();
        $last_job_id = $last_job->id ?? 0;

        $job = Job::create([
            'job_no' => 'JOB'.Str::of($last_job_id+1)->padLeft(3,'0'),
            'job_type_slug' => 'enquiries',
            'contact_id' => $contact_id,
        ]);

        if($request->ajax())
        {
            return response()->json($job);
        }
        return redirect()->route('enquiries.show',['enquiry' => $job->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job_data = Job::with(['generalEnquiryQuestion', 'jobSpecificEnquiryQuestion' , 'contact'])->where('id',$id)->where('is_active' , 1)->where('job_type_slug' , 'enquiries')->first();

        $general_enquiry_questions = \Config::get('constants.forms.enquiries.general_enquiry_questions');
        
        $job_specific_enquiry_questions = \Config::get('constants.forms.enquiries.job_specific_enquiry_questions');

        return view('backend.enquiries.show', [
                                                'job_data' => $job_data ,
                                                'general_enquiry_questions' => $general_enquiry_questions,
                                                'job_specific_enquiry_questions' => $job_specific_enquiry_questions 
                                            ]);
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
    //  */
    public function update(Request $request, $id)
    {

        // dd($request->all());
        $job = Job::findOrFail($id);
        
        $job->update([
            'description' => $request['description'] ?? null
        ]);

        $job->generalEnquiryQuestion()->updateOrCreate(
            [
                'job_id' => $id
            ],
            
            [

                'enquiry_for' => $request['enquiry_for'] ?? null,
                'enquiry_owner' => $request['enquiry_owner'] ?? null,
                'hear_from' => $request['hear_from'] ?? null,
                'transport_require' => (@$request['transport_require']) ? 1 : 0,
                'transport_require_date' => $request['transport_require_date'] ?? null,
                'express_quotation' => $request['express_quotation'] ? 1 : 0,
                'quotation_required_by' => $request['quotation_required_by'] ?? null,
                'contract_start' => $request['contract_start'] ?? null,
                'contract_finish' => $request['contract_finish'] ?? null,
                'site' => $request['site'] ?? null,

            ]);

        $job->jobSpecificEnquiryQuestion()->updateOrCreate(
            [
                'job_id' => $id
            ],
            
            [

                'item_fixed' => $request['item_fixed'] ?? null,
                'item_fixed_text' => $request['item_fixed_text'] ?? null,
                'sheen_level' => $request['sheen_level'] ?? null,
                'sheen_level_text' => $request['sheen_level_text'] ?? null,
                'condition_substrate' => $request['condition_substrate'] ?? null,
                'condition_substrate_text' => $request['condition_substrate_text'] ?? null,
                'require_fitting_items' => $request['require_fitting_items'] ?? null,
                'require_fitting_items_text' => $request['require_fitting_items_text'] ?? null,
                'substrate_contact_area' => $request['substrate_contact_area'] ?? null,
                'substrate_contact_area_text' => $request['substrate_contact_area_text'] ?? null,
                'colour_choices' => $request['colour_choices'] ?? null,
                'colour_choices_text' => $request['colour_choices_text'] ?? null,
                'contours_substrate_exposed' => $request['contours_substrate_exposed'] ?? null,
                'contours_substrate_exposed_text' => $request['contours_substrate_exposed_text'] ?? null,
                'samples' => $request['samples'] ?? null,

            ]);

        \Session::flash('type', 'success');
        \Session::flash('message','Enquiry Details have been updated successfully!');
        return redirect()->back();

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
