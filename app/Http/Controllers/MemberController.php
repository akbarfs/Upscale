<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session; 
use App\Talent ; 
use App\Models\Skill ; 

class MemberController extends Controller
{
    public function talentDashboard()
    {
    	$user_id = Session::get("user_id"); 
    	$user = User::find($user_id); 
    	$talent = $user->talent; 

    	return view("talent.profile",compact('user','talent'));
    }

    public function json_skill()
    {
        // $json[] = array('id'=>2,'label'=>"laravel","value"=>"laravel");

        $skill = Skill::all('skill_name as text','skill_name as value') ; 

        return response()->json($skill) ; 
    }

    public function doLogout()
    {
    	Session::flush();
        return redirect("/");
    }
}
