<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('jobs_id');
            $table->string('jobs_title',150);
            $table->mediumText('jobs_image')->nullable();
            $table->enum('jobs_active', ['Y','N']);
            $table->text('jobs_desc_center')->nullable();
            $table->text('jobs_desc_left')->nullable();
            $table->text('jobs_desc_right')->nullable();
            $table->text('jobs_desc_short');
            $table->enum('jobs_type_time', ['fulltime', 'parttime', 'internship']);
            $table->dateTime('jobs_created_date');
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
