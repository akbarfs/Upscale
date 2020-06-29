<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrackingUpgrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('talent_logs', function (Blueprint $table) {

            $table->bigIncrements('id');

            //foreign key ke table talent
            $table->unsignedBigInteger('tl_talent_id')->unsigned();
            // $table->foreign('tl_talent_id')->references('talent_id')->on('talent')->onDelete('cascade');
            
            $table->string('tl_type',100)->nullable();
            $table->string('tl_name',100)->nullable();
            $table->string('tl_phone',100)->nullable();
            $table->string('tl_email',100)->nullable();
            $table->string('tl_email_status',100)->nullable();
            $table->text('tl_desc')->nullable();

            $table->timestamps();
        });

        Schema::table('talent', function (Blueprint $table) 
        {
            $table->text('talent_la_type')->after('talent_last_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talent_logs');

        Schema::table('talent', function (Blueprint $table) {
            $table->dropColumn('talent_la_type');
        });
    }
}
