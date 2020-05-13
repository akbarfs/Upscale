<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session; 
use App\Models\Talent ; 
use App\Models\Skill ; 
use Illuminate\Support\Facades\Hash;

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
                'talent_birth_date' => $request->tgl_lahir,
                'talent_salary' => $request->fulltime_rate,
                'talent_freelance_hour' => $request->freelance_hour,
                'talent_project_min' => $request->freelance_min,
                'talent_project_max' => $request->freelance_max,
                'talent_konsultasi_rate' => $request->konsultasi_rate,
                'talent_ngajar_rate' => $request->ngajar_rate,
        ];
        
        Talent::create($data); 

        // Session::put('user_id',$result->id);
        // Session::put('username',$request->username);
        // Session::put('email',$request->email);
        // Session::put('level',$request->level);
        // Session::put('login',TRUE);


        return response()->json(array("message"=>"success","status"=>1));
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
        $skill  = $skill->get() ;

        return response()->json($skill) ; 
    }

    public function doLogout()
    {
    	Session::flush();
        return redirect("/");
    }
}