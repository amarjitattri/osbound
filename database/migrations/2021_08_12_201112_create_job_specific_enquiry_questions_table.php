<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSpecificEnquiryQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_specific_enquiry_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id')->unsigned();

            $table->integer('item_fixed')->nullable();
            $table->text('item_fixed_text')->nullable();
            
            $table->integer('sheen_level')->nullable();
            $table->text('sheen_level_text')->nullable();
            
            $table->integer('condition_substrate')->nullable();
            $table->text('condition_substrate_text')->nullable();
            
            $table->integer('require_fitting_items')->nullable();
            $table->text('require_fitting_items_text')->nullable();
            
            $table->integer('substrate_contact_area')->nullable();
            $table->text('substrate_contact_area_text')->nullable();
            
            $table->integer('colour_choices')->nullable();
            $table->text('colour_choices_text')->nullable();
            
            $table->integer('contours_substrate_exposed')->nullable();
            $table->text('contours_substrate_exposed_text')->nullable();
            
            $table->integer('samples')->nullable();
            $table->text('samples_text')->nullable();

            $table->timestamps();
            
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_specific_enquiry_questions');
    }
}
