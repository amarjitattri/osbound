<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralEnquiryQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_enquiry_questions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('job_id')->unsigned();

            $table->integer('enquiry_for')->nullable();
            $table->integer('enquiry_owner')->nullable();
            $table->integer('hear_from')->nullable();

            $table->boolean('transport_require')->default(0);
            $table->dateTime('transport_require_date', $precision = 0)->nullable();

            $table->boolean('express_quotation')->default(0);

            $table->dateTime('quotation_required_by', $precision = 0)->nullable();
            $table->dateTime('contract_start', $precision = 0)->nullable();
            $table->dateTime('contract_finish', $precision = 0)->nullable();

            $table->json('site')->nullable();

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
        Schema::dropIfExists('general_enquiry_questions');
    }
}
