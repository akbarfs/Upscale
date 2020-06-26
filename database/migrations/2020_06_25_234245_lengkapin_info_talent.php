<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LengkapinInfoTalent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) 
        {
            $table->integer('talent_salary_jogja')->after('talent_salary')->nullable();
            $table->integer('talent_salary_jakarta')->after('talent_salary')->nullable();
            $table->string('talent_current_work')->after('talent_date_ready')->nullable();
            $table->dateTime('talent_last_active')->after('talent_ngajar_rate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->dropColumn('talent_current_work');
            $table->dropColumn('talent_salary_jogja');
            $table->dropColumn('talent_salary_jakarta');
            $table->dropColumn('talent_last_active');
        });
    }
}
