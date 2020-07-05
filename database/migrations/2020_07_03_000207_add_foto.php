<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFoto extends Migration
{
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->text('talent_foto')->after('talent_email')->nullable();
            $table->text('talent_profile_desc')->after('talent_foto')->nullable();
            $table->text('talent_upscale_desc')->after('talent_foto')->nullable();
            $table->string('talent_luar_kota')->after('talent_isa')->nullable();
            $table->integer('talent_price_jakarta')->after('talent_salary_jogja')->nullable();
            $table->integer('talent_price_jogja')->after('talent_price_jakarta')->nullable();
            $table->integer('talent_hh_price')->after('talent_price_jogja')->nullable();
            $table->integer('talent_price_usd')->after('talent_price_jakarta')->nullable();
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
            $table->dropColumn('talent_profile_desc');
            $table->dropColumn('talent_upscale_desc');
            $table->dropColumn('talent_luar_kota');
            $table->dropColumn('talent_price_jakarta');
            $table->dropColumn('talent_price_jogja');
            $table->dropColumn('talent_hh_price');
            $table->dropColumn('talent_price_usd');
        });
    }
}
