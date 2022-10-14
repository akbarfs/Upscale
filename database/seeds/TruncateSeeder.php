<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_request')->truncate();
        DB::table('skill_request')->truncate();
        DB::table('company_req_log')->truncate();
    }
}
