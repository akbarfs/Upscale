<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function editBasic()
    {
      //  $profile = Profile::find($id);
      //  return view('editBasicProfile',['profile' => $profile], compact('id'));

      return view('editBasicProfile');
    }

    public function editEducation()
    {
        return view('editEducation');
    }

    public function editWork()
    {
        return view('editWork');
    }

    public function editSkill()
    {
        return view('editSkill');
    }
    public function editCv()
    {
        return view('editCv');
    }
}
