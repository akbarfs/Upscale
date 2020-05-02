<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInqueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inqueries', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type_question', ['test', 'interview', 'quisioner']);
            $table->string('question',255);
            $table->text('description');
            $table->enum('type_answer', ['essay', 'multiple_choice', 'check_list']);
            $table->integer('sort');
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
        Schema::dropIfExists('inqueries');
    }
}
