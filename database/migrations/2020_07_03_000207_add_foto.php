<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFoto extends Migration
{
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            //
            $table->text('talent_foto')->after('talent_email')->nullable();
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
            //
            $table->dropColumn('talent_foto');
        });
    }
}
