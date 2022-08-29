<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_request', function (Blueprint $table) {
            $table->increments('company_request_id');
            $table->string('name_request');
            $table->string('type_work');
            $table->text('benefit');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->text('skills');
            $table->integer('person_needed');
            $table->integer('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_request');
    }
}
