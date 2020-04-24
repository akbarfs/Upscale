<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Location;
use Carbon\Carbon;

class MasterDataLocationController extends Controller
{
    //
    public function index()
    {
        $preferlocation= DB::table('location')->get();
        $location=DB::table('location')->select('location_active');
        $noloc=1;
        return view('admin.preferlocation',compact('preferlocation','noloc'));
    }

    public function store(Request $request)
    {
        $preferlocation = DB::table('location')->insert([
            'location_name'=>$request->location_name,
            'location_active'=>$request->location_active,
        ]);

        return redirect()->back()->with('Success','Data Lokasi Berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $preferlocation = DB::table('location')->where('location_id',$id)->first();
        return response()->json($preferlocation);
    }

    
    public function update(Request $request, $id)
    {
        $now = Carbon::now('Asia/Jakarta');
        $location = DB::table('location')->where('location_id',$id)->update([
            'location_name'=>$request->location_name,
            'location_active'=>$request->location_active,
            'location_updated_at'=>$now
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
        $delete = DB::table('location')->where('location_id',$id)->delete();
        return redirect()->back()->with('Success','Data berhasil di Hapus');
    }
}
