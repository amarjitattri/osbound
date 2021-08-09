<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->string('job_no')->nullable();
            $table->bigInteger('contact_id')->unsigned();
            $table->string('date')->nullable();
            $table->text('description')->nullable();
            
            $table->string('job_type')->nullable();
            $table->string('job_type_slug')->nullable();
            // $table->bigInteger('client_id')->unsigned();
            $table->boolean('is_active')->default('1');

            $table->timestamps();

            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
