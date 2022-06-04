<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Skill;

class SkillController extends Controller
{
    public function all() {
        return Skill::all();
    }
    public function getSkill(Request $request) {
        $skills = Skill::where('skill_name', 'like', '%'.$request->q.'%')->take(5)->get();
        return [
            'msg' => '', 
            'que' => request('q'),
            'results' => $skills
        ];
    }
}
