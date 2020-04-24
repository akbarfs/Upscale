<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\Jobca;
use App\Models\Joblo;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;
use App\Models\Campaign;
use App\Models\Job_campaign;
use Yajra\Datatables\Datatables;
use Validator;
use Carbon\Carbon;
use App\Models\mediaModel;
use App\Models\jobsMedia;

class mediaController extends Controller
{
    public function __construct()
    {
      if(session('level') != 'admin') {
        Auth::logout();
        return redirect('/');
      }
        $this->middleware('auth');
    }
    public function add(Request $request){
        $media = new mediaModel();
        $media->media_name = $request->media_name;
        $media->media_status = $request->media_status;
        $sukses = $media->save();
        if($sukses) return 'berhasil';
        else return 'gagal';
    }

    public function edit(Request $request)
    {
        // dd($request);
      $data = mediaModel::find($request->media_id);
      $data->media_name = $request->media_name;
      $data->media_status = $request->media_status;
      if($data->update())
        return 'berhasil';
      else 
        return 'gagal';
    }

    public function delete(Request $request)
    {
      $data = mediaModel::find($request->media_id);

      if($data->delete()){
        return 'berhasil';
      }
      else{
        return 'gagal';
      }
      
    }

    public function showTable(){
        $media = mediaModel::all();
    
        return Datatables::of($media)
        ->addColumn('action',function($media){
                return '
                    <center>
                    <a href="#" data-id="'.$media->media_id.'" data-name="'.$media->media_name.'" data-status="'.$media->media_status.'" data-toggle="modal" data-target="#mediaEdit" class="btn btn-warning btn-sm editMedia"><i class="fa fa-edit"></i></a>
                    <a href="#" id="'.$media->media_id.'" class="btn btn-danger btn-sm deleteMed"><i class="fa fa-trash"></i></a>
                    </center>
                ';  
                                
            })
        ->addColumn('media_status', function($media){
            if($media->media_status == 'active'){
            return '<center><span class="badge badge-success">Aktif</span></center>';
            } else{
            return '<center><span class="badge badge-danger">Nonaktif</span></center>';
            }
        })

        ->rawColumns(['action', 'media_status'])
        ->make(true);
    }

    public function getList(Request $request){
        // $data = jobsMedia::where('jobs_media.jobs_id', '=', $request->jobs_id)->join('media', 'media.media_id', '=', 'jobs_media.media.id')->get(); 
        
        $data = mediaModel::all();
        
        return json_encode($data);
    }
    

    
}
