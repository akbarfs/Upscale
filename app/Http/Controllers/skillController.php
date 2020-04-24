<?php

namespace App\Http\Controllers;

use App\Models\Skill;


use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index(){
    	$skill = Skill::all();
    	return view('option_skill',compact('skill'));
    }

    public function skill(Request $request){
    	$skill = $request->input('multicheckbox');
    

    	foreach ($skill as $skill_item){
	    $add_skil = new Skill(); 
	    $add_skil->skill_name = $skill_item;
	    $add_skil->skill_sc_id = 1;
	    $add_skil->skill_desc = NULL;
	    $add_skil->save();
	}

    }
}
