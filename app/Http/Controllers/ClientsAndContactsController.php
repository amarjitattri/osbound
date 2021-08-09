<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contact;

class ClientsAndContactsController extends Controller
{

    public function index(Request $request){        
        
        if($request->ajax())
        {

            $one_time_results = \Config::get('constants.options.ONE_TIME_JQUERY_INFINITE_RESULTS');

            $contacts_with_clients_instance = Contact::with('client')->latest();

            if($first_name = request()->first_name){
                $contacts_with_clients_instance->where('first_name' , 'like' , '%'.$first_name.'%');
            }
            if($last_name = request()->last_name){
                $contacts_with_clients_instance->where('last_name' ,'like' , '%'.$last_name.'%');
            }
            if($client_id = request()->client_id){
                $contacts_with_clients_instance->where('client_id', '=' , $client_id);
            }

            $contacts_with_clients = $contacts_with_clients_instance->where('is_active' , 1)->paginate($one_time_results);

            return response()->json([ 

                        'contacts_with_clients' => $contacts_with_clients
            ]);
        }

        $all_clients = Client::select(['id','client_name'])->get();

        return view('backend.clients_and_contacts.index', [
                                                            'all_clients' => $all_clients,
                                                        ]);
    }

    public function create(){
        return view('backend.clients_and_contacts.createModelForm');
    }

    public function store(Request $request){
        
        if(@$request['from'] == 'contact_form') {

            $client_id = $request['client_id'] ?? null;
            $first_name = $request['first_name'] ?? null;
            $last_name = $request['last_name'] ?? null;
            $job_title = $request['job_title'] ?? null;
            $email = $request['email'] ?? null;
            $mobile = $request['mobile'] ?? null;
            $telephone = $request['telephone'] ?? null;

            if($client_id){
                $contact = new Contact([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'job_title' => $job_title,
                    'email' => $email,
                    'mobile' => $mobile,
                    'telephone' => $telephone                        
                ]);
    
                $client = Client::find($client_id);

                $client->contacts()->save($contact);
            }
            else{
                return redirect()->back()->withErrors(['msg', 'Client Id is required']);
            }
            \Session::flash('type', 'success');
            \Session::flash('message','Contact Details have been successfully submitted!');
            return redirect()->back();
        }
        
        $validate = $request->validate([
            'client_name' => 'required|unique:App\Models\Client,client_name'
        ]);
        //For Client Storage
        $client_name = $request['client_name'];

        //For Contact Storage
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $job_title = $request['job_title'];

        $contact = new Contact([
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'job_title' => $job_title                        
                        ]);
        
        $client = Client::create(['client_name' => $client_name]);
        
        //Building the relationship 
        $client->contacts()->save($contact);

        if($request->ajax()){
            return response()->json($client);
        }
        else{

            \Session::flash('type', 'success');
            \Session::flash('message','Client has been successfully created!');
    
            return redirect()->back();
        }
        // return redirect()->route('');


    }

    public function show(Request $request, $id){
        

        if($request->ajax()){
            return [
                'contact_detail' => Contact::where(['id' => (request()->contact_id) , 'is_active' => 1])->first()->toArray() 
            ];
        }

        $all_clients = Client::where('is_active', 1)->get();

        $contacts = Contact::where('client_id', $id)->where('is_active' , 1)->orderBy('first_name' , 'asc')->get();
        
        return view('backend.clients_and_contacts.show' , [
                                                                'all_clients' => $all_clients,   
                                                                'contacts' => $contacts                                                     
                                                            ]);
    }

    public function update(Request $request, $id) {
        
        if(@$request['from'] == 'client_form') {

            $address_line_1 = $request['address_line_1'] ?? null;
            $town = $request['town'] ?? null;
            $country = $request['country'] ?? null;
            $postal_code = $request['postal_code'] ?? null;

            if($request['client_id'])
            {
                $client = Client::find($request['client_id']);
                $client->update([
                    'address_line_1' => $address_line_1,
                    'town' => $town,
                    'country' => $country,
                    'postal_code' => $postal_code
                ]);

                \Session::flash('type', 'info');
                \Session::flash('message','Client details have been successfully updated!');
            }
            else{
                return redirect()->back()->withErrors(['msg', 'Client Id is required']);
            }

        }
        elseif(@$request['from'] == 'contact_form'){

            $client_id = $request['client_id'] ?? null;
            $contact_id = $request['contact_id'] ?? null;
            $first_name = $request['first_name'] ?? null;
            $last_name = $request['last_name'] ?? null;
            $job_title = $request['job_title'] ?? null;
            $email = $request['email'] ?? null;
            $mobile = $request['mobile'] ?? null;
            $telephone = $request['telephone'] ?? null;

            if($contact_id){

                $contact = Contact::find($contact_id);

                $contact->update([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'job_title' => $job_title,
                    'email' => $email,
                    'mobile' => $mobile,
                    'telephone' => $telephone                        
                ]);

                \Session::flash('type', 'info');
                \Session::flash('message','Contact details have been successfully updated!');
            }
            else{
                return redirect()->back()->withErrors(['msg', 'Contact Id is required']);
            }

            return redirect()->route('clients-and-contacts.show', ['clients_and_contact' => $client_id]);
        }
        else{
            return redirect()->back()->withErrors(['msg', 'Something went wrong!']);
        }

        return redirect()->back();
    }

    public function destroy(Request $request, $id){

        $contact = Contact::find($id);
        $contact->delete();

        \Session::flash('type', 'info');
        \Session::flash('message','Contact with name as '.$contact['first_name']. ' has been deleted!');
        return redirect()->back();
    }
}
