<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddSkillStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            
        Schema::table('skill', function (Blueprint $table) {
            $table->enum('status',['enable','disable'])->after('skill_desc')->default('disable');
        });

        DB::table("skill")->where("skill_id",">",0)->update(['status'=>'enable']);

        Schema::table('talent', function (Blueprint $table) {
            $table->enum('talent_onsite_jakarta',['unset','yes','no'])->after('talent_prefered_location')->default('unset')->nullable();;
            $table->enum('talent_onsite_jogja',['unset','yes','no'])->after('talent_onsite_jakarta')->default('unset')->nullable();
            $table->enum('talent_remote',['unset','yes','no'])->after('talent_onsite_jakarta')->default('unset')->nullable();
            $table->string('talent_prefered_city')->after('talent_prefered_location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('talent', function (Blueprint $table) {
            $table->dropColumn('talent_onsite_jakarta');
            if (Schema::hasColumn('talent', 'talent_onsite_jogja')) {$table->dropColumn('talent_onsite_jogja');}
            $table->dropColumn('talent_remote');
            $table->dropColumn('talent_prefered_city');
        });
        
        
    }
}
