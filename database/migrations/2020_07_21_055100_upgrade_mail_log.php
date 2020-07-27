<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpgradeMailLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('talent_logs', function (Blueprint $table) {
            $table->datetime('tl_last_respon')->after('tl_email_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('talent_logs', function (Blueprint $table) {
            //
            $table->dropColumn('tl_last_respon');
        });
    }
}
