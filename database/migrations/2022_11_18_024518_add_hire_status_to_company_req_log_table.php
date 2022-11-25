<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHireStatusToCompanyReqLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_req_log', function (Blueprint $table) {
            $table->string('hire_status')->nullable()->after('status');
            $table->date('work_start_date')->nullable()->after('hire_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('company_req_log', 'hire_status')) {
            Schema::table('company_req_log', function (Blueprint $table) {
                $table->dropColumn('hire_status');
            });
        }
        if (Schema::hasColumn('company_req_log', 'work_start_date')) {
            Schema::table('company_req_log', function (Blueprint $table) {
                $table->dropColumn('work_start_date');
            });
        }
    }
}
