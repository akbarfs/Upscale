<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Imports\CampusImport;
use Maatwebsite\Excel\Facades\Excel;
class MasterDataCampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $campus = DB::table('campus')->get();
        $no =1;
        return view('admin.campus',compact('campus','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = DB::table('campus')->insert([
            'tipe' => $request->tipe,
            'provinsi' => $request->provinsi,
            'nama' => $request->namacampus,
        ]);

        return redirect()->back();
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
         $campus = DB::table('campus')->where('campus_id',$id)->first();

         return response()->json($campus);
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
        //
         $update = DB::table('campus')->where('campus_id',$id)->update([
            'tipe' => $request->tipe,
            'provinsi' => $request->provinsi,
            'nama' => $request->campus,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $delete = DB::table('campus')->where('campus_id',$id)->delete();

        return redirect()->back();
    }
    public function import(Request $request){
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = "import campus_".$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_campus',$nama_file);
 
        // import data
        Excel::import(new CampusImport, public_path('/file_campus/'.$nama_file));
 
        // notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect()->route('campus.index');

    }
}
