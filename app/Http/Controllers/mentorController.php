<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use Intervention\Image\Facades\Image;

class mentorController extends Controller
{
    public function index()
    {
        $mentor = Mentor::all();
        $nomen = 1;

        return view('admin.mentor', compact('mentor', 'nomen'));
    }

    public function storementor(Request $request)
    {
        $this->validate($request, [
            'mentor_name' => 'required',
            'mentor_work' => 'required',
            'mentor_desc' => 'required',
            'mentor_skill' => 'required',
            'mentor_photo' => 'required'
        ]);

        $mentor = new Mentor;
        $mentor->mentor_name = $request->mentor_name;
        $mentor->mentor_work = $request->mentor_work;
        $mentor->mentor_desc = $request->mentor_desc;
        $mentor->mentor_skill = $request->mentor_skill;

        $image = $request->file('mentor_photo');
        $imageName = 'Image_Mentor_'.$mentor->mentor_name.'.'.$image->getClientOriginalExtension();
        $path = public_path().'/mentor';
        $upload = $image->move($path,$imageName);

        $mentor->mentor_photo = $imageName;
        $mentor->save();

        return redirect()->back()->with('Success', 'Data berhasil ditambahkan');
    }

    public function editmentor(Request $request)
    {
        $mentor = Mentor::where('mentor_id','=', $request->id)->first();
        return response()->json($mentor);
    }

    public function updatementor(Request $request, $id)
    {
        
        $mentor = Mentor::find($id);

        if(!empty($request->mentor_photo)){
            $image = $request->file('mentor_photo');
            $imageName = 'Image_Mentor_'.$mentor->mentor_name.'.'.$image->getClientOriginalExtension();
            $path = public_path().'/mentor';
            $upload = $image->move($path,$imageName);
        } else {
            $imageName = $mentor->mentor_photo;
        }
        
        $mentor->mentor_name = $request->mentor_name;
        $mentor->mentor_work = $request->mentor_work;
        $mentor->mentor_desc = $request->mentor_desc;
        $mentor->mentor_skill = $request->mentor_skill;
        $mentor->mentor_photo = $imageName;
        $mentor->update();

        return redirect()->back()->with('Success', 'Data berhasil diupdate');
    }

    public function deletementor(Request $request)
    {
        $mentor = Mentor::where('mentor_id','=', $request->id)->delete();
        return redirect()->back()->with('Success', 'Data berhasil dihapus');
    }

}
