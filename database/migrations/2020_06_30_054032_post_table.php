<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->string('talent_linkedin')->after('talent_email')->nullable();
            $table->string('talent_facebook')->after('talent_gender')->nullable();
            $table->string('talent_instagram')->after('talent_phone')->nullable();
            $table->string('talent_twitter')->after('talent_birth_date')->nullable();
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
            $table->dropColumn('talent_linkedin');
            $table->dropColumn('talent_facebook');
            $table->dropColumn('talent_instagram');
            $table->dropColumn('talent_twitter');
            
        });
    }
}
