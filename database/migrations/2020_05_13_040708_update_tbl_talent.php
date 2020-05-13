<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblTalent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->integer('talent_freelance_hour')->after('talent_rt_status');
            $table->integer('talent_project_min')->after('talent_freelance_hour');
            $table->integer('talent_project_max')->after('talent_project_min');
            $table->integer('talent_konsultasi_rate')->after('talent_project_max');
            $table->integer('talent_ngajar_rate')->after('talent_konsultasi_rate');
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
            $table->dropColumn('talent_freelance_hour');
            $table->dropColumn('talent_project_min');
            $table->dropColumn('talent_project_max');
            $table->dropColumn('talent_konsultasi_rate');
            $table->dropColumn('talent_ngajar_rate');
        });
    }
}
