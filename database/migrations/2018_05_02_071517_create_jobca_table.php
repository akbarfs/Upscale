<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobcaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobca', function (Blueprint $table) {
            $table->increments('jobca_id');
            $table->integer('jobca_jobs_id')->unsigned();
            $table->integer('jobca_category_id')->unsigned();
            $table->dateTime('jobca_created_date');
            $table->foreign('jobca_jobs_id')->references('jobs_id')->on('jobs')->onDelete('cascade');
            $table->foreign('jobca_category_id')->references('categories_id')->on('categories')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobca');
    }
}
