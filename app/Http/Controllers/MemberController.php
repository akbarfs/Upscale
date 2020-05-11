<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session; 
use App\Talent ; 

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
        $json[] = array('id'=>1,'label'=>"codeigniter","value"=>"codeigniter");
        $json[] = array('id'=>2,'label'=>"laravel","value"=>"laravel");
        return response()->json($json) ; 
    }

    public function doLogout()
    {
    	Session::flush();
        return redirect("/");
    }
}
