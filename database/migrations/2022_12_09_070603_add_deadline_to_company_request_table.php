<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeadlineToCompanyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_request', function (Blueprint $table) {
            $table->integer('deadline')->nullable()->after('person_needed')->comment('1: secepatnya, 2: 2 minggu, 3: 1 bulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('company_request', 'deadline')) {
            Schema::table('company_request', function (Blueprint $table) {
                $table->dropColumn('deadline');
            });
        }
    }
}
