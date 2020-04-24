<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobca;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;
use Yajra\Datatables\Datatables;
use App\Models\Job_apply;
use App\Models\Job_apply_substeps;
use App\Models\Interview;
use App\Models\SubstepsModel;
use Carbon\Carbon;

class Substeps extends Controller
{
    public function getemailtext(Request $request){
        $hasil = SubstepsModel::where('substeps_id', '=', $request->substeps_id)->get(['substeps_email_text']);
        return json_encode($hasil);
    }
    public function add(Request $request){
        $next_order = SubstepsModel::where('substeps_jobs_apply_status', '=', $request->substeps_jobs_apply_status)->max('substeps_order');
        $substeps = new SubstepsModel();
        $substeps->substeps_name = $request->substeps_name;
        $substeps->substeps_order = ++$next_order;
        $substeps->substeps_jobs_apply_status = $request->substeps_jobs_apply_status;
        $substeps->substeps_email_status = $request->substeps_email_status;
        $substeps->substeps_email_text = $request->substeps_email_text;
        if($substeps->save()) return "berhasil";
        else return "gagal";
    }

    public function edit(Request $request){
        if(SubstepsModel::where('substeps_id', '=', $request->substeps_id)->update(['substeps_email_status' => $request->substeps_email_status, 'substeps_email_text' => $request->substeps_email_text,'substeps_name' => $request->substeps_name, 'substeps_jobs_apply_status' => $request->substeps_jobs_apply_status, 'updated_at' => Carbon::now()])){
            return 'berhasil';
        } else {
            return 'gagal';
        }
    }

    public function moveUp(Request $request){
        
        $data_above = SubstepsModel::where('substeps_order', '=', $request->substeps_order-1)->where('substeps_jobs_apply_status', '=', $request->substeps_jobs_apply_status)->first();
        
        if(SubstepsModel::where('substeps_id', '=', $data_above->substeps_id)->update(['substeps_order' => $request->substeps_order])){
            
            if(SubstepsModel::where('substeps_id', '=', $request->substeps_id)->update(['substeps_order' => $request->substeps_order-1])){
                return "berhasil";
            } else {
                return 'gagal';
            }
        } else {
            return 'gagal';
        } 
    }

    public function moveDown(Request $request){
        
        $data_above = SubstepsModel::where('substeps_order', '=', $request->substeps_order+1)->where('substeps_jobs_apply_status', '=', $request->substeps_jobs_apply_status)->first();
        
        if(SubstepsModel::where('substeps_id', '=', $data_above->substeps_id)->update(['substeps_order' => $request->substeps_order])){
            
            if(SubstepsModel::where('substeps_id', '=', $request->substeps_id)->update(['substeps_order' => $request->substeps_order+1])){
                return "berhasil";
            } else {
                return 'gagal';
            }
        } else {
            return 'gagal';
        } 
    }

    public function delete(Request $request)
    {
        $data = SubstepsModel::where('substeps_order', '>', $request->substeps_order)->get();
        $hapus = SubstepsModel::find($request->substeps_id);
        if($hapus->delete()){
            foreach($data as $d) {
                $urutan = $d->substeps_order;
                SubstepsModel::where('substeps_id', '=', $d->substeps_id)->where('substeps_order', '>', $request->substeps_order)->update(['substeps_order' => --$urutan]);
            }
            Job_apply_substeps::where('substeps_id', '=', $request->substeps_id)->delete();
            return 'berhasil';
        }else{
            return 'gagal';
        }
    }

    public function getUnprocess(Request $request){
        $data = DB::table('substeps')->where([['substeps_jobs_apply_status', '=', 'unprocess']])->orderBy('substeps_order', 'asc')->get();
      return Datatables::of($data)
      ->addColumn('move', function($data){
        return '<center><a href="#add_substeps" type="button" class="btn btn-primary btn-sm" id="move-up"  data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'"><i class="fa fa-level-up" > Naik</i></a>    <a href="#add_substeps"  data-id="'.$data->substeps_id.'" id="move-down" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" type="button" class="btn btn-primary btn-sm"><i class="fa fa-level-down"> Turun</i></a></center>';
      })
      ->addColumn('action', function($data){
        return '
                <center>
                 <a href="#" data-email="'.$data->substeps_email_status.'" data-toggle="modal" data-target="#substepsEdit" data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" class="btn btn-warning btn-sm" id="edit-substeps"><i class="fa fa-edit"> Edit</i></a>
                 <a href="#" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" id="'.$data->substeps_id.'" class="btn btn-danger btn-sm deleteSubsteps"><i class="fa fa-trash"> Hapus</i></a>
                </center>
                ';
      })
      ->addColumn('substeps_email_status', function($data){
        if($data->substeps_email_status == 'yes'){
            return '<center><span class="badge badge-success">Kirim Email</span></center>';
            } else{
            return '<center><span class="badge badge-danger">Tidak Kirim Email</span></center>';
            }
      })
      ->rawColumns(['move', 'action', 'substeps_email_status'])
      ->make(true);
    }
    public function gettestonline(Request $request){
        $data = DB::table('substeps')->where([['substeps_jobs_apply_status', '=', 'testonline']])->orderBy('substeps_order', 'asc')->get();
        return Datatables::of($data)
        ->addColumn('move', function($data){
            return '<center><a href="#add_substeps" type="button" class="btn btn-primary btn-sm" id="move-up"  data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'"><i class="fa fa-level-up" > Naik</i></a>    <a href="#add_substeps"  data-id="'.$data->substeps_id.'" id="move-down" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" type="button" class="btn btn-primary btn-sm"><i class="fa fa-level-down"> Turun</i></a></center>';
        })
        ->addColumn('action', function($data){
            return '
                    <center>
                     <a href="#" data-email="'.$data->substeps_email_status.'" data-toggle="modal" data-target="#substepsEdit" data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" class="btn btn-warning btn-sm" id="edit-substeps"><i class="fa fa-edit"> Edit</i></a>
                     <a href="#" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" id="'.$data->substeps_id.'" class="btn btn-danger btn-sm deleteSubsteps"><i class="fa fa-trash"> Hapus</i></a>
                    </center>
                    ';
          })      ->addColumn('substeps_email_status', function($data){
            if($data->substeps_email_status == 'yes'){
                return '<center><span class="badge badge-success">Kirim Email</span></center>';
                } else{
                return '<center><span class="badge badge-danger">Tidak Kirim Email</span></center>';
                }
          })
          ->rawColumns(['move', 'action', 'substeps_email_status'])
          ->make(true);
    }
    public function getinterview(Request $request){
        $data = DB::table('substeps')->where([['substeps_jobs_apply_status', '=', 'interview']])->orderBy('substeps_order', 'asc')->get();
        return Datatables::of($data)
        ->addColumn('move', function($data){
            return '<center><a href="#add_substeps" type="button" class="btn btn-primary btn-sm" id="move-up"  data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'"><i class="fa fa-level-up" > Naik</i></a>    <a href="#add_substeps"  data-id="'.$data->substeps_id.'" id="move-down" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" type="button" class="btn btn-primary btn-sm"><i class="fa fa-level-down"> Turun</i></a></center>';
        })
        ->addColumn('action', function($data){
            return '
                    <center>
                     <a href="#" data-email="'.$data->substeps_email_status.'" data-toggle="modal" data-target="#substepsEdit" data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" class="btn btn-warning btn-sm" id="edit-substeps"><i class="fa fa-edit"> Edit</i></a>
                     <a href="#" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" id="'.$data->substeps_id.'" class="btn btn-danger btn-sm deleteSubsteps"><i class="fa fa-trash"> Hapus</i></a>
                    </center>
                    ';
          })      ->addColumn('substeps_email_status', function($data){
            if($data->substeps_email_status == 'yes'){
                return '<center><span class="badge badge-success">Kirim Email</span></center>';
                } else{
                return '<center><span class="badge badge-danger">Tidak Kirim Email</span></center>';
                }
          })
          ->rawColumns(['move', 'action', 'substeps_email_status'])
          ->make(true);
    }

    public function gethired(Request $request){
        $data = DB::table('substeps')->where([['substeps_jobs_apply_status', '=', 'hired']])->orderBy('substeps_order', 'asc')->get();
        return Datatables::of($data)
        ->addColumn('move', function($data){
            return '<center><a href="#add_substeps" type="button" class="btn btn-primary btn-sm" id="move-up"  data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'"><i class="fa fa-level-up" > Naik</i></a>    <a href="#add_substeps"  data-id="'.$data->substeps_id.'" id="move-down" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" type="button" class="btn btn-primary btn-sm"><i class="fa fa-level-down"> Turun</i></a></center>';
        })
        ->addColumn('action', function($data){
            return '
                    <center>
                     <a href="#" data-email="'.$data->substeps_email_status.'" data-toggle="modal" data-target="#substepsEdit" data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" class="btn btn-warning btn-sm" id="edit-substeps"><i class="fa fa-edit"> Edit</i></a>
                     <a href="#" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" id="'.$data->substeps_id.'" class="btn btn-danger btn-sm deleteSubsteps"><i class="fa fa-trash"> Hapus</i></a>
                    </center>
                    ';
          })      ->addColumn('substeps_email_status', function($data){
            if($data->substeps_email_status == 'yes'){
                return '<center><span class="badge badge-success">Kirim Email</span></center>';
                } else{
                return '<center><span class="badge badge-danger">Tidak Kirim Email</span></center>';
                }
          })
          ->rawColumns(['move', 'action', 'substeps_email_status'])
          ->make(true);
    }

    public function getreject(Request $request){
        $data = DB::table('substeps')->where([['substeps_jobs_apply_status', '=', 'rejected']])->orderBy('substeps_order', 'asc')->get();
        return Datatables::of($data)
        ->addColumn('move', function($data){
            return '<center><a href="#add_substeps" type="button" class="btn btn-primary btn-sm" id="move-up"  data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'"><i class="fa fa-level-up" > Naik</i></a>    <a href="#add_substeps"  data-id="'.$data->substeps_id.'" id="move-down" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" type="button" class="btn btn-primary btn-sm"><i class="fa fa-level-down"> Turun</i></a></center>';
        })
        ->addColumn('action', function($data){
            return '
                    <center>
                     <a href="#" data-email="'.$data->substeps_email_status.'" data-toggle="modal" data-target="#substepsEdit" data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" class="btn btn-warning btn-sm" id="edit-substeps"><i class="fa fa-edit"> Edit</i></a>
                     <a href="#" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" id="'.$data->substeps_id.'" class="btn btn-danger btn-sm deleteSubsteps"><i class="fa fa-trash"> Hapus</i></a>
                    </center>
                    ';
          })      ->addColumn('substeps_email_status', function($data){
            if($data->substeps_email_status == 'yes'){
                return '<center><span class="badge badge-success">Kirim Email</span></center>';
                } else{
                return '<center><span class="badge badge-danger">Tidak Kirim Email</span></center>';
                }
          })
          ->rawColumns(['move', 'action', 'substeps_email_status'])
          ->make(true);
    }

    public function getoffered(Request $request){
        $data = DB::table('substeps')->where([['substeps_jobs_apply_status', '=', 'offered']])->orderBy('substeps_order', 'asc')->get();
        return Datatables::of($data)
        ->addColumn('move', function($data){
            return '<center><a href="#add_substeps" type="button" class="btn btn-primary btn-sm" id="move-up"  data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'"><i class="fa fa-level-up" > Naik</i></a>    <a href="#add_substeps"  data-id="'.$data->substeps_id.'" id="move-down" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" type="button" class="btn btn-primary btn-sm"><i class="fa fa-level-down"> Turun</i></a></center>';
        })
        ->addColumn('action', function($data){
            return '
                    <center>
                     <a href="#" data-email="'.$data->substeps_email_status.'" data-toggle="modal" data-target="#substepsEdit" data-id="'.$data->substeps_id.'" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" class="btn btn-warning btn-sm" id="edit-substeps"><i class="fa fa-edit"> Edit</i></a>
                     <a href="#" data-name="'.$data->substeps_name.'|'.$data->substeps_order.'|'.$data->substeps_jobs_apply_status.'" id="'.$data->substeps_id.'" class="btn btn-danger btn-sm deleteSubsteps"><i class="fa fa-trash"> Hapus</i></a>
                    </center>
                    ';
          })      ->addColumn('substeps_email_status', function($data){
            if($data->substeps_email_status == 'yes'){
                return '<center><span class="badge badge-success">Kirim Email</span></center>';
                } else{
                return '<center><span class="badge badge-danger">Tidak Kirim Email</span></center>';
                }
          })
          ->rawColumns(['move', 'action', 'substeps_email_status'])
          ->make(true);
    }

}
