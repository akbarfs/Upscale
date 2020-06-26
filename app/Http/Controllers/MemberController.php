<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session; 
use App\Models\Talent ; 
use App\Models\Skill ; 
use App\Models\SkillTalent ;  
use Illuminate\Support\Facades\Hash;
use Log ; 

class MemberController extends Controller
{
    public function talentDashboard()
    {
    	$user_id = Session::get("user_id"); 
    	$user = User::find($user_id); 
    	$talent = $user->talent; 

    	return view("talent.profile",compact('user','talent'));
    }

    public function loadRegisterTalent()
    {
        return view("front.register_talent"); 
    }

    public function regTalentStep1(Request $request)
    {
        $this->validate ($request,[
            'name'         => 'required|min:3|max:25|string',
            'username'     => 'required|min:3|max:20|string|unique:users,username',
            'email'        => 'required|string|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'phone_number' => 'required|max:15|phone_number|digits_between:5,15',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required|min:3|max:25',
        ]); 

        $data = [
                'talent_name' =>$request->name,
                'talent_condition' =>'unprocess',
                'talent_phone'=>$request->phone_number,
                'talent_email'=>$request->email, 
                'talent_place_of_birth' => $request->tempat_lahir,
                'talent_birth_date'=>$request->tgl_lahir,
                'talent_gender' => $request->gender
        ];

        $talent = Talent::updateOrCreate(["talent_email"=>$request->email],$data); 

        return response()->json(array("message"=>"success","status"=>1));
    }

    public function registerTalent(Request $request)
    {
        $this->validate ($request,[
            'name'         => 'required|min:3|max:25|string',
            'username'     => 'required|min:3|max:20|string|unique:users,username',
            'email'        => 'required|string|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'phone_number' => 'required|max:15|phone_number|digits_between:5,15',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            // 'skill_1' => '',
            // 'skill_2' => '',
            // 'skill_2' => '',
            'fulltime_rate' => 'sometimes|format_rp',
            // 'talent_address' => 'sometimes|min:3|max:25|',
            // 'talent_prefered_location' => 'sometimes|min:3|max:25|',
            // 'talent_date_ready' => 'sometimes|string',
            // 'talent_available' => 'sometimes|string',


            'freelance_hour' => 'sometimes|format_rp',
            'freelance_min' => 'sometimes|format_rp',
            'freelance_max' => 'sometimes|format_rp',
            'konsultasi_rate' => 'sometimes|format_rp',
            'ngajar_rate' => 'sometimes|format_rp',
        ]);

        //PROSES INSERT DATABASE USER
        $user = [
            'name'         => $request->name,
            'username'     => $request->username,
            'email'        => $request->email,
            'password'     => Hash::make($request["password"]),
            'phone_number' => $request->phone_number,
            'level'         => 'talent',
        ];

        $result = User::create($user);

        if ( isset($request->karir_tahun) && isset($request->karir_bulan) )
        {
            $start_career = $request->karir_tahun."-".$request->karir_bulan."-01"; 
        }
        else
        {
            $start_career = '0000-00-00'; 
        }

        //PROSES INSERT DATABASE TALENT
        $data = [
                'user_id'  =>$result->id,
                'talent_name' =>$request->name,
                'talent_condition' =>'unprocess',
                'talent_phone'=>$request->phone_number,
                'talent_email'=>$request->email, 
                'talent_gender'=>$request->gender,
                'talent_birth_date'=>$request->tgl_lahir,
                'talent_salary'=>$request->fulltime_rate,
                'talent_location_id'=>12,
                'talent_gender' => $request->gender,
                'talent_place_of_birth' => $request->tempat_lahir,
                'talent_birth_date' => $request->tgl_lahir,
                'talent_salary' =>  preg_replace('/[^0-9]/', '', $request->fulltime_rate),

                'talent_address' => $request->talent_address,
                'talent_prefered_city' => $request->talent_prefered_city,
                'talent_date_ready' => $request->talent_date_ready,
                'talent_available' => $request->talent_available,

                'talent_freelance_hour' =>  preg_replace('/[^0-9]/', '', $request->freelance_hour),
                'talent_project_min' =>  preg_replace('/[^0-9]/', '', $request->freelance_min),
                'talent_project_max' =>  preg_replace('/[^0-9]/', '', $request->freelance_max),
                'talent_konsultasi_rate' =>  preg_replace('/[^0-9]/', '', $request->konsultasi_rate),
                'talent_ngajar_rate' =>  preg_replace('/[^0-9]/', '', $request->ngajar_rate),

                'talent_international' => $request->talent_international,
                'talent_start_career'   => $start_career,
                "talent_level"=>$request->talent_level,
                "talent_focus"=>$request->talent_focus,

                "talent_onsite_jakarta" => $request->talent_onsite_jakarta ? $request->talent_onsite_jakarta : "" ,
                "talent_onsite_jogja" => $request->talent_onsite_jogja ? $request->talent_onsite_jogja : "" ,
                "talent_remote" => $request->talent_remote ? $request->talent_remote : "",
                "talent_isa" => $request->talent_isa ? $request->talent_isa : "unset",

                'talent_salary_jogja'   =>preg_replace('/[^0-9]/', '', $request->salary_jogja),
                'talent_salary_jakarta' =>preg_replace('/[^0-9]/', '', $request->salary_jakarta),
                'talent_current_work'   =>$request->talent_current_work,
                'talent_last_active'   =>date("Y-m-d H:i:s")
        ];

        $talent = Talent::updateOrCreate(["talent_email"=>$request->email],$data); 

        // proses insert skill
        $skill_1 = explode(",",$request->skill_1);
        $this->_insertSkill($skill_1,1,$talent->talent_id); 

        $skill_2 = explode(",",$request->skill_2);
        $this->_insertSkill($skill_2,2,$talent->talent_id); 

        $skill_3 = explode(",",$request->skill_3);
        $this->_insertSkill($skill_3,3,$talent->talent_id); 

        $skill_4 = explode(",",$request->skill_4);
        $this->_insertSkill($skill_4,4,$talent->talent_id); 

        $skill_5 = explode(",",$request->skill_5);
        $this->_insertSkill($skill_5,5,$talent->talent_id); 

        Session::put('user_id',$result->id);
        Session::put('username',$request->username);
        Session::put('email',$request->email);
        Session::put('level',$request->level);
        Session::put('login',TRUE);

        return response()->json(array("message"=>"success","status"=>1));
    }

    public function _insertSkill($array,$cat,$talent_id)
    {
        foreach($array as $row)
        {
            if ($row != "")
            {
                //get skill id 
                $skill = Skill::where("skill_name",$row)->first() ; 

                //klo ga di table list ada buat baru 
                if ( !$skill )
                {
                    $skill = Skill::create(array('skill_name'=>$row,'skill_sc_id'=>$cat));
                }

                //nambahin
                $insert_skill = array(
                                    'st_talent_id'=> $talent_id,
                                    'st_skill_id'=> $skill->skill_id,
                                    'st_skill_verified'=> 'NO',
                                    'st_input_admin'=> 'NO',
                                );

                SkillTalent::updateOrCreate([
                                                'st_talent_id'=> $talent_id,
                                                'st_skill_id'=> $skill->skill_id
                                            ],$insert_skill);
            }
            
        }
    }
    public function updateProfile(Request $request)
    {
        $this->validate ($request,[
            'name' => 'required|min:3|max:25|string',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            // 'skill_1' => '',
            // 'skill_2' => '',
            // 'skill_2' => '',
            'fulltime_rate' => 'sometimes|format_rp',
            'freelance_hour' => 'sometimes|format_rp',
            'freelance_min' => 'sometimes|format_rp',
            'freelance_max' => 'sometimes|format_rp',
            'konsultasi_rate' => 'sometimes|format_rp',
            'ngajar_rate' => 'sometimes|format_rp',
        ]);


        $data = [
                'talent_gender' => $request->gender,
                'talent_birth_date' => $request->tgl_lahir,
                'talent_salary' => $request->fulltime_rate,

                'talent_freelance_hour' => 'sometimes|format_rp',
                'talent_project_min' => 'sometimes|format_rp',
                'talent_project_max' => 'sometimes|format_rp',
                'talent_konsultasi_rate' => 'sometimes|format_rp',
                'talent_ngajar_rate' => 'sometimes|format_rp',
        ];



        return response()->json(array("message"=>"success","status"=>1));
    }

    public function json_skill(Request $request)
    {
        // $json[] = array('id'=>2,'label'=>"laravel","value"=>"laravel");
        
        $skill = Skill::select('skill_name as text','skill_name as value') ; 

        if ($request->cat_id > 0)
        {
            $skill->where("skill_sc_id",$request->cat_id);
        }
        else if ( $request->cat_id == 'other')
        {
            $skill->where("skill_sc_id","!=",1);
            $skill->where("skill_sc_id","!=",2);
        }
        $skill->where('status','enable');
        $skill  = $skill->get() ;

        return response()->json($skill) ; 
    }

    public function doLogout()
    {
    	Session::flush();
        return redirect("/");
    }
}
