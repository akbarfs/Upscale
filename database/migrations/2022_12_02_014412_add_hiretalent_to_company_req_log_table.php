<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHiretalentToCompanyReqLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_req_log', function (Blueprint $table) {
            $table->string('is_hire_requested')->nullable()->after('note');
            $table->string('is_read_notif')->nullable()->after('is_hire_requested');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('company_req_log', 'is_hire_requested')) {
            Schema::table('company_req_log', function (Blueprint $table) {
                $table->dropColumn('is_hire_requested');
            });
        }
        if (Schema::hasColumn('company_req_log', 'is_read_notif')) {
            Schema::table('company_req_log', function (Blueprint $table) {
                $table->dropColumn('is_read_notif');
            });
        }
    }
}
