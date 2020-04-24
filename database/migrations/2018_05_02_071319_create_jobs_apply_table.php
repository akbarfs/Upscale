<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_apply', function (Blueprint $table) {
            $table->increments('jobs_apply_id');
            $table->integer('jobs_apply_jobs_id')->unsigned();
            $table->enum('jobs_apply_status', ['unprocess', 'interview', 'hired', 'rejected']);
            $table->enum('jobs_apply_type_time', ['fulltime','parttime','internship']);
            $table->string('jobs_apply_name');
            $table->string('jobs_apply_phone');
            $table->string('jobs_apply_email');
            $table->string('jobs_apply_gender');
            $table->string('jobs_apply_place_of_birth');
            $table->string('jobs_apply_birth_date');
            $table->text('jobs_apply_current_address');
            $table->text('jobs_apply_location');
            $table->text('jobs_apply_information');
            $table->string('jobs_apply_campus')->nullable();
            $table->string('jobs_apply_periode')->nullable();
            $table->string('jobs_apply_skill')->nullable();
            $table->string('jobs_apply_expected_salary')->nullable();
            $table->binary('jobs_apply_cv');
            $table->text('jobs_apply_portofolio')->nullable();
            $table->binary('jobs_apply_portofolio_file')->nullable();
            // $table->mediumText('jobs_apply_image');
            $table->dateTime('jobs_apply_created_date');
            $table->foreign('jobs_apply_jobs_id')->references('jobs_id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_apply');
    }
}
