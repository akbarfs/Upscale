<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlurMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alur_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('response');
            $table->text('data')->nullable();
            $table->string('type');
            $table->string('next')->nullable();
            $table->string('prev')->nullable();
            $table->unsignedBigInteger('alur_group_id')->nullable();
            $table->foreign('alur_group_id')->references('id')->on('alur_groups');
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
        Schema::dropIfExists('alur_masters');
    }
}
