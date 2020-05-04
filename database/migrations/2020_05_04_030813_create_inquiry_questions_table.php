<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiryQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inquiry_id');
            $table->foreign('inquiry_id')->references('id')->on('inquiries')->onDelete('cascade');
            $table->string('question',255);
            $table->text('description');
            $table->enum('type_option', ['essay', 'multiple_choice', 'check_list']);
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
        Schema::dropIfExists('inquiry_questions');
    }
}
