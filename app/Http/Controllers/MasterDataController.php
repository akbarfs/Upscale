<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SkillCategory;
use Carbon\Carbon;
class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Index Master Data Skill

    public function index()
    {
        $skill = DB::table('skill')->join('skill_category','skill_sc_id','=','sc_id')->get();
        $kategori = DB::table('skill_category')->get();
        $nokat = 1;
        $noskill = 1;
        return view('admin.skill',compact('skill','kategori','nokat','noskill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Create Master Data Skill

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Store Master Data Skill

    public function store(Request $request)
    {
        $skill = DB::table('skill')->insert([
            'skill_name'=>$request->skill_name,
            'skill_sc_id'=>$request->skill_category,
            'skill_desc'=>$request->skill_desc
        ]);

        return redirect()->back()->with('Success','Data Skill Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = DB::table('skill')->where('skill_id',$id)->first();
        return response()->json($skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $now = Carbon::now('Asia/Jakarta');
        $update = DB::table('skill')->where('skill_id',$id)->update([
            'skill_name'=>$request->skill_name,
            'skill_sc_id'=>$request->skill_category,
            'skill_desc'=>$request->skill_desc,
            'updated_at'=>$now
        ]);
        return redirect()->back()->with('Success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('skill')->where('skill_id',$id)->delete();
        return redirect()->back()->with('Success','Data berhasil di Hapus');
    }

    public function storecategory(Request $req){
        $kategori = DB::table('skill_category')->insert([
            'sc_name'=>$req->kategori_name,
            'sc_type'=>$req->kategori_type,
            'sc_desc'=>$req->kategori_desc,
        ]);
        return redirect()->back()->with('Successkategori','Data Berhasil di Tambahkan');
    }

    public function editcategory($id){
        $kategori = DB::table('skill_category')->where('sc_id',$id)->first();
        return response()->json($kategori);
    }

    public function updatecategory(Request $req){
        $now = Carbon::now('Asia/Jakarta');
        $kategori = DB::table('skill_category')->where('sc_id',$req->sc_id)->update([
            'sc_name'=>$req->kategori_name,
            'sc_type'=>$req->kategori_type,
            'sc_desc'=>$req->kategori_desc,
            'sc_updated_at'=>$now
        ]);
        return redirect()->back()->with('Successkategori','Data Berhasil di Update');
    }

    public function deletecategory($id){
        $now = Carbon::now('Asia/Jakarta');
        $kategori = DB::table('skill_category')->where('sc_id',$id)->update([
            'sc_deleted_at'=>$now
        ]);
        return redirect()->back()->with('Successkategori','Data Berhasil di hapus, Tekan Tombol Restore untuk memulihkan');
    }

    public function restorecategory($id){
        $now = Carbon::now('Asia/Jakarta');
        $kategori = DB::table('skill_category')->where('sc_id',$id)->update([
            'sc_deleted_at'=>NULL
        ]);
        return redirect()->back()->with('Successkategori','Data Berhasil di pulihkan');
    }


    


}
