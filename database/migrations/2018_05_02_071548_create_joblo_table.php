<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joblo', function (Blueprint $table) {
            $table->increments('joblo_id');
            $table->unsignedInteger('joblo_jobs_id');
            $table->unsignedInteger('joblo_location_id');
            $table->dateTime('joblo_created_date');
            $table->foreign('joblo_jobs_id')->references('jobs_id')->on('jobs')->onDelete('cascade');
            $table->foreign('joblo_location_id')->references('location_id')->on('location')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joblo');
    }
}
