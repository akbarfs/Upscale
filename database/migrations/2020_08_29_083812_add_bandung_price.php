<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBandungPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->integer('talent_price_bandung')->after('talent_price_jakarta')->nullable();
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
            $table->dropColumn('talent_price_bandung');
        });
    }
}
