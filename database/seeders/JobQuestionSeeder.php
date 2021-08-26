<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobQuestion;

class JobQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Get Enquiries questions
        $general_enquiry_questions = \Config::get('constants.forms.enquiries.general_enquiry_questions');
        $job_specific_enquiry_questions = \Config::get('constants.forms.enquiries.job_specific_enquiry_questions');

        foreach($general_enquiry_questions as $key => $value){
            JobQuestion::firstOrCreate(['question' => $value['title']],
            [
                'field' => $value['field'],
                'question'=> $value['title'],
                'job_type_slug' => 'enquiries',
                'type' => 'general_enquiry_questions',
                'attributes' => $value
            ]);
        }
        foreach($job_specific_enquiry_questions as $key => $value){
            JobQuestion::firstOrCreate(['question' => $value['title']],
            [
                'field' => $value['field'],
                'question'=> $value['title'],
                'job_type_slug' => 'enquiries',
                'type' => 'job_specific_enquiry_questions',
                'attributes' => $value
            ]);
        }


        
    }
}
