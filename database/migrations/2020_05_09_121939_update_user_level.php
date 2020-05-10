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
    }
}
