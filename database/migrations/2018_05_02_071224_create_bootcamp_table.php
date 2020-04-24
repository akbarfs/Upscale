<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBootcampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bootcamp', function (Blueprint $table) {
            $table->increments('bootcamp_id');
            $table->string('bootcamp_title',150);
            $table->mediumText('bootcamp_image');
            $table->text('bootcamp_desc');
            $table->enum('bootcamp_active', ['Y','N']);
            $table->dateTime('bootcamp_created_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bootcamp');
    }
}
