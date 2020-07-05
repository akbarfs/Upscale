<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMailReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->integer('talent_mail_invitation')->after('talent_last_active')->nullable();
            $table->integer('talent_mail_regular')->after('talent_last_active')->nullable();
            $table->integer('talent_mail_isa')->after('talent_last_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('talent', function (Blueprint $table) 
        {
             $table->dropColumn('talent_mail_invitation');
             $table->dropColumn('talent_mail_regular');
             $table->dropColumn('talent_mail_isa');
        });
    }
}
