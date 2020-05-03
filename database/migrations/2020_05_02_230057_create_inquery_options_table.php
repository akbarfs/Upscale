<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInqueryOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquery_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inquery_id');
            $table->foreign('inquery_id')->references('id')->on('inqueries')->onDelete('cascade');
            $table->string('option',255);
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
        Schema::dropIfExists('inquery_options');
    }
}
