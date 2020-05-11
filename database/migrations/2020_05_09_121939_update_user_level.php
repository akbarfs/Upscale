<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE users CHANGE COLUMN level level ENUM('admin', 'user', 'talent','client','cowork') NOT NULL DEFAULT 'user'");
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->after("username");
        });

        Schema::table('talent', function (Blueprint $table) {
            // $table->integer('user_id')->after("talent_id");
            $table->unsignedBigInteger('user_id')->unsigned()->after("talent_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE users CHANGE COLUMN level level ENUM('admin', 'user') NOT NULL DEFAULT 'user'");
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
        });
        Schema::table('talent', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
