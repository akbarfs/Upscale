<?php

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedAccount();
    }

    public function seedAccount(){
        Company::create([
            'company_name' => 'PT Test Company',
            'company_email' => 'test@gmail.com',
            'company_status' => 'active',
            'company_username' => 'test123',
            'company_password' => Hash::make('tes12345678'),
            'company_level' => 'user',
            'company_pic' => 'Test'
        ]);
    }

}
