<?php

use Illuminate\Database\Seeder;
use App\AlurGroup;
use App\AlurMaster;
use App\Skill;



class AlurMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed1();
    }
    public function seed1() {
        AlurMaster::query()->delete();
        AlurGroup::query()->delete();

        // $loginGroup = AlurGroup::create(['id' => 1,'name' => 'login']);
        // $registerGroup = AlurGroup::create(['id' => 2,'name' => 'register']);

        // $alurMasters = AlurMaster::create(['id' => 1,'name' => 'intro1', 'response' => 'Hallow :dayTime.', 'next' => 2,'type' => 'text']);
        // $alurMasters = AlurMaster::create(['id' => 2, 'name' => 'intro2', 'response' => 'Sepertinya kamu blm login.', 'next' => 3, 'type' => 'text']);
        // $alurMasters = AlurMaster::create(['id' => 3, 'name' => 'auth', 'response' => 'Login dulu yukk', 'next' => null, 'type' => 'choice', 'data' => json_encode([
        //     ['next' => $loginGroup->id, 'text' => 'login', 'type' => 'action_group', 'name' => 'login'], ['next' => $registerGroup->id, 'text' => 'register', 'name' => 'register']
        // ])]);
        // $alurMasters = AlurMaster::create(['id' => 4, 'alur_group_id' => $loginGroup->id, 'name' => 'login_identity', 'response' => 'Masukkan Emailmu.', 'next' => 5, 'type' => 'input_text']);
        // $alurMasters = AlurMaster::create(['id' => 5, 'alur_group_id' => $loginGroup->id, 'name' => 'login_password', 'response' => 'Masukkan Passwordmu.', 'next' => 6, 'type' => 'input_password']);
        // $alurMasters = AlurMaster::create(['id' => 6, 'alur_group_id' => $loginGroup->id, 'name' => 'login_successfully', 'response' => 'Berhasil Login.', 'next' => 7, 'type' => 'text']);
        // $alurMasters = AlurMaster::create(['id' => 7, 'name' => 'greeting_after_login', 'response' => 'Selamat datang :accountName.', 'next' => null, 'type' => 'text']);

        $profilingGroup = AlurGroup::create(['id' => 1,'name' => 'profiling']);
        
        $alurMasters = AlurMaster::create(['id' => 1,'alur_group_id' => $profilingGroup->id,'name' => 'profiling1', 'response' => 'Hallow :dayTime. :accountName!', 'next' => 2,'type' => 'text']);
        $alurMasters = AlurMaster::create(['id' => 2,'alur_group_id' => $profilingGroup->id,'name' => 'profiling2', 'response' => 'Lengkapi Profilemu dulu yuk.', 'next' => 3,'type' => 'text']);
        $alurMasters = AlurMaster::create(['id' => 3,'alur_group_id' => $profilingGroup->id,'name' => 'profiling3', 'response' => 'Apakah Kamu Memiliki pengalaman kerja ?', 'next' => 4,'type' => 'text']);
        
        $alurMasters = AlurMaster::create([
            'id' => 4,'name' => 'interview_memiliki_pengalaman_kerja','alur_group_id' => $profilingGroup->id, 'response' => 'Apakah Kamu Memiliki pengalaman kerja ?', 'next' => null,'type' => 'choice', 
            'data' => \json_encode([
                [
                    'id' => 1,
                    'next' => 7, 'text' => 'ya',
                    'name' => 'yes'
                ], [
                    'id' => 2,
                    'next' => 7, 'text' => 'tidak', 
                    'name' => 'no'
                ]
            ],true)
        ]);

        $alurMasters = AlurMaster::create([
            'id' => 7,
            'alur_group_id' => $profilingGroup->id,
            'name' => 'profiling3', 
            'response' => 'Mengembangkan karir dibidang ?', 
            'next' => 8,
            'type' => 'text'
        ]);
        $alurMasters = AlurMaster::create([
            'id' => 8,'alur_group_id' => $profilingGroup->id,'name' => 'interview_ingin_mengembangkan_karir_dibidang', 
            'response' => '', 'next' => null,'type' => 'choice',
            'data' => \json_encode([
                [
                    'id' => 1,
                    'next' => 9, 'text' => 'bisnis',
                    'name' => 'bisnis'
                ], [
                    'id' => 2,
                    'next' => 9, 'text' => 'freelancer', 
                    'name' => 'freelance'
                ]
            ],true)
        ]);

        $alurMasters = AlurMaster::create([
            'id' => 9,
            'alur_group_id' => $profilingGroup->id,
            'name' => 'profiling3', 
            'response' => 'Tahun pertama bekerja ?', 
            'next' => 10,
            'type' => 'input_text'
        ]);
        // $alurMasters = AlurMaster::create([
        //     'id' => 10,'alur_group_id' => $profilingGroup->id,'name' => 'interview'.uniqid(), 
        //     'response' => '', 'next' => 11,'type' => 'input_text',
        // ]);

        $alurMasters = AlurMaster::create([
            'id' => 10,
            'alur_group_id' => $profilingGroup->id,
            'name' => 'profiling3', 
            'response' => 'Apakah anda bersedia untuk kami berikan edukasi intensif sebelum disalurkan ke lapangan pekerjaan ?', 
            'next' => 11,
            'type' => 'text'
        ]);
        $alurMasters = AlurMaster::create([
            'id' => 11,'alur_group_id' => $profilingGroup->id,'name' => uniqid(), 
            'response' => '', 'next' => null,'type' => 'choice',
            'data' => \json_encode([
                [
                    'id' => 1,
                    'next' => 12, 'text' => 'ya',
                    'name' => 'ya'
                ], [
                    'id' => 2,
                    'next' => 12, 'text' => 'tidak', 
                    'name' => 'tidak'
                ]
            ],true)
        ]);
        
        $alurMasters = AlurMaster::create([
            'id' => 12,
            'alur_group_id' => $profilingGroup->id,
            'name' => 'profiling3', 
            'response' => 'Apakah anda memiliki Skill Web Development ?', 
            'next' => 13,
            'type' => 'text'
        ]);

        $alurMasters = AlurMaster::create([
            'id' => 13,'alur_group_id' => $profilingGroup->id,'name' => uniqid(), 
            'response' => '', 'next' => null, 'type' => 'input_multi_search',
            'data' => \json_encode([
                'name' => 'interview_multi_search_skill',
                'next' => 14
            ],true)
        ]);

        $alurMasters = AlurMaster::create([
            'id' => 14,
            'alur_group_id' => $profilingGroup->id,
            'name' => 'profiling'.uniqid(), 
            'response' => 'Terimakasih selamat bergabung.', 
            'next' => null,
            'type' => 'text'
        ]);

    }
}
