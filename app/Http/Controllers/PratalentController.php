<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\PratalentImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\Pra_talent;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;



class PratalentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pratalent = DB::table('pra_talent')->paginate(10);
        return view('admin.praTalent',compact('pratalent'));
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
        //
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
        //
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
    }
    
    public function changeStatus(Request $request){
        
        if(empty($request->status)){}
        else{
            $status=DB::table('pra_talent')->where('pt_id','=',$request->pt_id)->update([
                'pt_status' =>$request->status]);
        }

        if(empty($request->pic)){}
        else{
            $pic=DB::table('pra_talent')->where('pt_id','=',$request->pt_id)->update([
                'pt_pic' =>$request->pic]);
        }

        $data=DB::table('pra_talent')->where('pt_id','=',$request->pt_id)->update([
            'pt_note'   =>$request->note
        ]);

        return redirect()->back()->with(['Success' => 'Status dan PIC Berhasil dirubah.']);

    } 

    public function datalinkedin(){
        $data = DB::table('pra_talent')->select('pt_id','pt_fullname','pt_title','pt_location_id','pt_phone1','pt_organization1','pt_education','pt_skill','pt_status')
                                    ->orderBy('pt_id','asc')->get();
        // $data = Pra_talent::select('pra_talent.*');
        // $data = Pra_talent::all();
        

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('pt_fullname', function($data){
            $text='<a href="'.$data->pt_profile_url.'">'.$data->pt_fullname.'</a>';
            return $text;
        })
        ->addColumn('action', function($data){
            return '<a href="" type="button" class="btn btn-info" target="_blank"><i class="fa fa-retweet"></i></a>';

        })
        ->rawColumns(['action','pt_fullname'])
        ->make(true);
     

    }

    public function import_excel(Request $request) 
	{
        $now = Carbon::now('Asia/Jakarta')->format('dmY hs');
        // dd($request->all());
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = $now."_".$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_pratalent',$nama_file);
 
		// import data
		Excel::import(new PratalentImport, public_path('/file_pratalent/'.$nama_file));
 
		// notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');
        
        // menampilkan jumlah data yg diinput
        $jmldata=DB::table('pra_talent')->where('pt_created_date','=',Carbon::now('Asia/Jakarta'))->count();
        // alihkan halaman kembali
        
        if($jmldata==0){
            $statuspesan='Gagal';
            $pesan="Tidak ada data yang di Import!!!";
        }
        else{
            $statuspesan='Success';
            $pesan=$jmldata.' rows Data Berhasil di Import.';
        }

		return redirect()->back()->with([ $statuspesan => $pesan]);
    }
    
   
 
}
