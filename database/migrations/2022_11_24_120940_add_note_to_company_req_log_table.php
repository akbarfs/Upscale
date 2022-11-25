<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoteToCompanyReqLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_req_log', function (Blueprint $table) {
            $table->longText('note')->nullable()->after('work_start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('company_req_log', 'note')) {
            Schema::table('company_req_log', function (Blueprint $table) {
                $table->dropColumn('note');
            });
        }
    }
}
