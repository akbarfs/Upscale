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
