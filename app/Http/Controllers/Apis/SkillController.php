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
    public function get() {
        return Skill::where('skill_name', 'like', '%'.request()->q.'%')->take(5)->get();
    }
}
