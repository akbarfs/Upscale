<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTalent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->string('talent_focus')->after('talent_salary')->nullable();
            $table->date('talent_start_career')->after('talent_focus')->nullable();;
            $table->enum('talent_level',['undefined','junior','middle','senior'])->after('talent_start_career')->default('undefined');
            $table->string('talent_international')->after('talent_rt_status')->nullable();;
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
            $table->dropColumn('talent_focus');
            $table->dropColumn('talent_start_career');
            $table->dropColumn('talent_level');
            $table->dropColumn('talent_international');
        });
    }
}
