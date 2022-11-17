<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTalentStatusToTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->string('talent_process_status')->default('unprocess')->nullable()->after('talent_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('talent', 'talent_process_status')) {
            Schema::table('talent', function (Blueprint $table) {
                $table->dropColumn('talent_process_status');
            });
        }
    }
}
