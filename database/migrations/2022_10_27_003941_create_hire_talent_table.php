<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHireTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hire_talent', function (Blueprint $table) {
            $table->increments('hire_talent_id');
            $table->integer('hire_talent_talent_id');
            $table->integer('hire_talent_company_id');
            $table->integer('hire_talent_company_request_id');
            $table->integer('hire_talent_status_notif');
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
        Schema::dropIfExists('hire_talent');
    }
}
