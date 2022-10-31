<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobca;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;
use App\Models\Talent;
use App\Models\HireTalent;
use Yajra\Datatables\Datatables;
use App\Models\Job_apply;
use App\Models\Interview;
use Carbon\Carbon;
use App\Mail\progressMail;

class jobsapplyController extends Controller
{ 
  public function __construct()
  {
    if(session('level') != 'admin') {
      Auth::logout();
      return redirect('/');
    }
      $this->middleware('auth');
  }

    public function index()
    {
      $jobs      = Job::all();
      $locations = Location::all();
      $countU    = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'unprocess']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get()->count();
      $countI = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'interview.interview_id', 'interview.interview_schedule', 'interview.interview_schedule_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('interview', 'jobs_apply.jobs_apply_id', '=', 'interview.interview_jobs_apply_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'interview',]
                      ])
                      ->orderBy('interview.interview_schedule', 'asc')->get()->count();
    //   $countTC = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'interview.interview_id', 'interview.interview_schedule', 'interview.interview_schedule_status')
      $countTC = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    // ->join('interview', 'jobs_apply.jobs_apply_id', '=', 'interview.interview_jobs_apply_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'tc',]
                      ])
                      ->orderBy('jobs_apply_created_date', 'desc')->get()->count();
                    //   -> orderBy('interview.interview_schedule', 'asc')->get()->count();
                    // var_dump($countTC);die();

      $countTO = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'testonline']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get()->count();
      $countO = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'offered']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get()->count();
      $countRD = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'ready']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get()->count();
        return view('admin.jobsapply', compact('jobs', 'locations', 'countU', 'countTO', 'countI', 'countO', 'countRD', 'countTC'));
    }

    public function noteAdd(Request $request){
      if(isset($request->jobs_apply_note)){
        if(Job_apply::where('jobs_apply_id', '=', $request->jobs_apply_id)->update([ 'jobs_apply_note' => $request->jobs_apply_note])){
            return "berhasil";
        } else {
            return "gagal"; 
        }
      }else{
        if(Job_apply::where('jobs_apply_id', '=', $request->jobs_apply_id)->update([ 'jobs_apply_note' => ''])){
            return "berhasil";
        } else {
            return "gagal";
        }
      }
    }

    public function labelAdd(Request $request){
      if(isset($request->jobs_apply_label)){
        if(Job_apply::where('jobs_apply_id', '=', $request->jobs_apply_id)->update([ 'jobs_apply_label' => $request->jobs_apply_label])){
            return "berhasil";
        } else {
            return "gagal"; 
        }
      }else{
        if(Job_apply::where('jobs_apply_id', '=', $request->jobs_apply_id)->update([ 'jobs_apply_label' => ''])){
            return "berhasil";
        } else {
            return "gagal";
        }
      }
    }

    public function noteRemove(){
      
    }

    public function noteGet(Request $request){
      $data = DB::table('jobs_apply')->select('jobs_apply_note')->where('jobs_apply_id', '=' ,$request->jobs_apply_id)->get();
      if(isset($data)){
        return json_encode($data);
      } else {
        return false;
      }
    }
    public function labelGet(Request $request){
      $data = DB::table('jobs_apply')->select('jobs_apply_label')->where('jobs_apply_id', '=' ,$request->jobs_apply_id)->get();
      if(isset($data)){
        return json_encode($data);
      } else {
        return false;
      }
    }
    public function rushGet(Request $request){
      $data = DB::table('jobs_apply')->select('jobs_apply_rush')->where('jobs_apply_id', '=' ,$request->jobs_apply_id)->get();
      if(isset($data)){
        return json_encode($data);
      } else {
        return false;
      }
    }

    public function rushEdit(Request $request){
      if(DB::table('jobs_apply')->where('jobs_apply_id', $request->jobs_apply_id)->update(['jobs_apply_rush' => $request->jobs_apply_rush])){
        return 'success';
      } else {
        return false;
      }
    }

    public function all() {

    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_rush')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_rush','talent_rt_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->orderBy('jobs_apply_created_date', 'desc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';

        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class=" fa fa-check"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        $rush = '';
        if ($data->jobs_apply_rush == 'YES') { $rush = '&nbsp;&nbsp;<span class="badge badge-danger"><i class=" fa fa-rocket"></i></span>'; }
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }

    public function detail(Request $request)
    { 
      $interview = Interview::leftJoin('location', 'location.location_id', '=', 'interview.interview_location_id' )->where('interview_jobs_apply_id', '=', $request->id)->first();
      $locations = Location::all(); 
      $all = DB::table('jobs_apply')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->where('jobs_apply_id', '=', $request->id)->first();
      return view('admin.detail', compact('all','locations', 'interview'));
    }

    public function delete(Request $request)
    {
      $all_id_array = $request->input('id');
      $all = Job_apply::whereIn('jobs_apply_id', $all_id_array);
      if($all->delete()){
        return 'deleted';
      }
    }

    public function allUnprocess() {

    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id','talent_rt_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'unprocess']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();
      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->jobs_apply_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        $rush = '';
        if ($data->jobs_apply_rush == 'YES') { $rush = '&nbsp;&nbsp;<span class="badge badge-danger"><i class=" fa fa-rocket"></i></span>'; }
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
          $type .= ' '.substr($data->jobs_apply_created_date, 0,10);
        return $type;
      })

      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }

    public function move(Request $request)
    {

      $id_array = $request->input('id');
      $status_array = $request->input('status');
      $datastatus=$request->input('movequarantine');
      

      if($request->input('data') == 'interview' || $request->input('data') == 'tc'){
        for($i = 0; $i < count($id_array); $i++){
          // if($request->input('data') == 'interview' && ($status_array[$i] == 'unprocess' || $status_array[$i] == 'testonline'){
          // if($request->input('data') == 'interview' && ($status_array[$i] == 'unprocess' || $status_array[$i] == 'testonline'){
            $cek_data = Interview::where('interview_jobs_apply_id', '=', $id_array[$i])->first();
            if($cek_data == null){
              $interview = new Interview();
              $interview->created_at = Carbon::now();
              $interview->updated_at = Carbon::now();
              $interview->interview_schedule_status = "not-scheduled";
              $interview->interview_jobs_apply_id = $id_array[$i];
              $interview->save();
            }
            else{}    
          } 
        }
  
        if($datastatus == 'YES'){
          for($j = 0; $j < count($id_array); $j++){ 
            $talent_condition = DB::table('talent')->where('talent_id','=',$id_array[$j])
            ->update([
              'talent_condition'=>"quarantine"
            ]);
              $cekdata = DB::table('quarantine')->where('quarantine_talent_id','=',$id_array[$j])->first();
                if(empty($cekdata)){
                      $quarantine = DB::table('quarantine')->insert([
                        'quarantine_created_date' => Carbon::now(),
                        'quarantine_updated_date' => Carbon::now(),
                        'quarantine_talent_id' => $id_array[$j],
                        'quarantine_status' => "nothing",
                        ]);
                  }
                  else{}
                 
          }
      }
      
      $data = Job_apply::whereIn('jobs_apply_id', $id_array); 

      if(
      $data->update([ 'jobs_apply_status' => $request->input('data')])){
        return 'success';
      }
    }

   

    public function allInterview() {
    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'interview.interview_id', 'interview.interview_schedule', 'interview.interview_schedule_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'interview.interview_id', 'interview.interview_schedule', 'interview.interview_schedule_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id','talent_rt_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('interview', 'jobs_apply.jobs_apply_id', '=', 'interview.interview_jobs_apply_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'interview',]
                      ])
                      ->orderBy('interview.interview_schedule', 'asc')->get();
      
      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->jobs_apply_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('interview_schedule', function($data){
        if($data->interview_schedule == null) return "Belum Dijadwalkan";
        // else return ''.date($data->interview_schedule, 'D, d M Y, h:i').'';
        else return ''.$data->interview_schedule.'';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        $rush = '';
        if ($data->jobs_apply_rush == 'YES') { $rush = '&nbsp;&nbsp;<span class="badge badge-danger"><i class=" fa fa-rocket"></i></span>'; }
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
          $type .= ' '.substr($data->jobs_apply_created_date, 0,10);
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }


    public function allTestcode() {
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'interview.interview_id', 'interview.interview_schedule', 'interview.interview_schedule_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id','talent_rt_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('interview', 'jobs_apply.jobs_apply_id', '=', 'interview.interview_jobs_apply_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'tc',]
                      ])
                      ->orderBy('interview.interview_schedule', 'asc')->get();
      
      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->jobs_apply_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('interview_schedule', function($data){
        if($data->interview_schedule == null) return "Belum Dijadwalkan";
        // else return ''.date($data->interview_schedule, 'D, d M Y, h:i').'';
        else return ''.$data->interview_schedule.'';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        $rush = '';
        if ($data->jobs_apply_rush == 'YES') { $rush = '&nbsp;&nbsp;<span class="badge badge-danger"><i class=" fa fa-rocket"></i></span>'; }
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
          $type .= ' '.substr($data->jobs_apply_created_date, 0,10);
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }
    
    
    public function allHired() {
    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply_created_date', 'jobs_apply.jobs_apply_status')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply_created_date', 'jobs_apply.jobs_apply_status','talent_rt_status','jobs_apply_approve_status','jobs_apply_approve_note')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'hired']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a>    <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-status-approve" type="button" class="btn btn-info btn-xs status-approve" data-toggle="tooltip" data-placement="top" title="Set status approvement"><i class=" fa fa-bookmark"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        return $data->talent_email.'<br>'.$data->talent_phone;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_approve_status=='approve'){$color='success'; $status='Approve';}
        elseif($data->jobs_apply_approve_status=='reject'){$color='danger'; $status='Reject';}
        else{$color='light';$status='';}
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
      	  $type .= ' '.substr($data->jobs_apply_created_date, 0,10).'<br><span class="badge badge-'.$color.'">'.$status.'</span> '.$data->jobs_apply_approve_note;
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }


    public function allKeep() {
    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_apply', 'jobs_apply_created_date', 'jobs_apply_talent_id')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_apply', 'jobs_apply_created_date', 'jobs_apply_talent_id','talent_rt_status','jobs_apply_approve_status','jobs_apply_approve_note','jobs_apply_reminder_date')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'keep']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->jobs_apply_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class=" fa fa-check"></i></a>   <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-status-approve" type="button" class="btn btn-info btn-xs status-approve" data-toggle="tooltip" data-placement="top" title="Set status approvement"><i class=" fa fa-bookmark"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        if($data->jobs_apply_apply=='YES'){$japp = '<span class="badge badge-success">YES</span>';}
        elseif($data->jobs_apply_apply=='OLD'){$japp = '<span class="badge badge-warning">OLD</span>';}
        else{$japp = '<span class="badge badge-danger">NO</span>';}
        $no_wa = ltrim($data->talent_phone, '+62');
        $no_wa = ltrim($data->talent_phone, '62');
        $no_wa = ltrim($data->talent_phone, '0');
        // $txt   = 'Halo%20'.ucwords($data->jobs_apply_name).',%20saya%20Dian%20dari%20tim%20HRD%20PT%20Erporate%20Solusi%20Global.%20Kami%20sedang%20membutuhkan%20developer%20cukup%20banyak%20dan%20menghubungi%20kembali%20karena%20dulu%20sempat%20apply%20di%20kami.%20Apakah%20available%20kalau%20saya%20telpon%20untuk%20diskusi%20kesibukan%20sekarang%20(bukan%20interview%20😊)%20?';
        $txt   = 'Halo%20'.ucwords($data->talent_name).'%2C%20saya%20Dian%20dari%20tim%20HRD%20PT%20Erporate%20Solusi%20Global.%20Kami%20membutuhkan%20cukup%20banyak%20developer%20dan%20menghubungi%20Anda%20karena%20bekerjasama%20dengan%20pihak%20kampus%20IT%20di%20Jogja.%0ADetail%20informasi%20ada%20di%20https%3A%2F%2Fcareer.erporate.com%2Fdetaillp%0AJika%20berkenan%20bisa%20kami%20hubungi%20untuk%20ngobrol%20santai%20seputar%20kesibukan%20saat%20ini%20%2B%20dijelaskan%20detail%20LOWONGAN%20KERJA%20IT%20dan%20PROGRAM%20REFERRAL%20kami.%0ALet%27s%20Join%20With%20Us%20(Indonesia%20%26%20Vietnam%20Teams)%0ATerimakasih%20%F0%9F%98%8A';
        // $wa = 'https://api.whatsapp.com/send?phone=62'.$no_wa.'&text=ARE%20YOU%20THE%20ONE '.ucwords($data->jobs_apply_name).' !!%20Kami%20merupakan%20perusahaan%20yang%20bergerak%20di%20bidang%20jasa%20IT%20dan%20outsourcing%20IT.%20Kami%20memilihmu%20untuk%20bergabung%20bersama%20kami,%20PT.%20Erporate%20Solusi%20Global%20untuk%20posisi%20sebagai%20:%201.%20Web%20Developer%202.%20Android%20Developer%203.%20Dst.%20Untuk%20syarat%20dan%20ketentuan%20bisa%20lihat%20di%20alamat%20web%20kami%20http://career.erporate.com%20Kami%20juga%20menawarkan%20%E2%80%9CReferral%20Program%E2%80%9D%20dengan%20menghadiahkan%20uang%20tunai%20sebesar%20Rp%20500.000!!!%20Apabila%20Anda%20dapat%20mengajak%20teman/rekan%20Anda%20untuk%20bergabung%20dan%20sampai%20ke%20tahap%20penerimaan%20di%20perusahaan%20kami.%20Jadi,%20tunggu%20apalagi?%20Kami%20tunggu%20kontribusi%20Anda%20untuk%20perkembangan%20IT%20yang%20lebih%20baik!!!%20Informasi%20lebih%20lanjut,%20kunjungi%20http://erporate.com%20Cheers,%20.....';
        $wa = 'https://api.whatsapp.com/send?phone=62'.$no_wa.'&text='.$txt;
        $wa = '<a href="'.$wa.'" type="button" target="_blank" class="btn btn-success btn-xs"><i class=" fa fa-whatsapp"></i></a>';
        return $data->talent_email.'<br>'.$data->talent_phone.' '.$japp.' '.$wa;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_approve_status=='approve'){$color='success'; $status='Approve';}
        elseif($data->jobs_apply_approve_status=='reject'){$color='danger'; $status='Reject';}
        else{$color='light';$status='';}
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
      	  $type .= ' '.substr($data->jobs_apply_created_date, 0,10).'<br><span class="badge badge-'.$color.'">'.$status.'</span> '.$data->jobs_apply_approve_note;
        return $type;
      })

      ->addColumn('jobs_reminder', function($data){
        if($data->jobs_apply_reminder_date == null){$reminder_text ='<b>Belum dijadwalkan</b>'; $color_text='light';}
        else{$reminder_text=$data->jobs_apply_reminder_date; $color_text='warning';}

        return '<a href="" data-id="'.$data->jobs_apply_id.'" data-toggle="modal" data-target="modal-reminder" type="button" class="btn btn-'.$color_text.' btn-xs change-reminder" data-placement="top"><strong>'.$reminder_text.'</strong></a>';
      })

      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak','jobs_reminder'])
      ->make(true);
    }


    public function allReady() {
    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_apply', 'jobs_apply_created_date', 'jobs_apply_talent_id')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_apply', 'jobs_apply_created_date', 'jobs_apply_talent_id','talent_rt_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'ready']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->jobs_apply_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class=" fa fa-check"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        if($data->jobs_apply_apply=='YES'){$japp = '<span class="badge badge-success">YES</span>';}
        elseif($data->jobs_apply_apply=='OLD'){$japp = '<span class="badge badge-warning">OLD</span>';}
        else{$japp = '<span class="badge badge-danger">NO</span>';}
       $no_wa = ltrim($data->talent_phone, '0');
        $wa = 'https://api.whatsapp.com/send?phone=62'.$no_wa.'&text=Halo%20'.ucwords($data->talent_name).',%20saya%20Dian%20dari%20tim%20HRD%20PT%20Erporate%20Solusi%20Global.%20Kami%20sedang%20membutuhkan%20developer%20cukup%20banyak%20dan%20menghubungi%20kembali%20karena%20dulu%20sempat%20apply%20di%20kami.%20Apakah%20available%20kalau%20saya%20telpon%20untuk%20diskusi%20kesibukan%20sekarang%20(bukan%20interview%20😊)%20?';
        $wa = '<a href="'.$wa.'" type="button" target="_blank" class="btn btn-success btn-xs"><i class=" fa fa-whatsapp"></i></a>';
        return $data->talent_email.'<br>'.$data->talent_phone.' '.$japp.' '.$wa;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
      	  $type .= ' '.substr($data->jobs_apply_created_date, 0,10);
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }


    public function allOffered() {
    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id','talent_rt_status','jobs_apply_approve_status','jobs_apply_approve_note')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'offered']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>   <a href="'.route('talent.detail').'?id='.$data->jobs_apply_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>    <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="fa fa-check"></i></a> <a href="#" type="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-list-alt"></i></a>  <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-status-approve" type="button" class="btn btn-info btn-xs status-approve" data-toggle="tooltip" data-placement="top" title="Set status approvement"><i class=" fa fa-bookmark"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        $rush = '';
        if ($data->jobs_apply_rush == 'YES') { $rush = '&nbsp;&nbsp;<span class="badge badge-danger"><i class=" fa fa-rocket"></i></span>'; }
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_approve_status=='approve'){$color='success'; $status='Approve';}
        elseif($data->jobs_apply_approve_status=='reject'){$color='danger'; $status='Reject';}
        else{$color='light';$status='';}
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
      	  $type .= ' '.substr($data->jobs_apply_created_date, 0,10).'<br><span class="badge badge-'.$color.'">'.$status.'</span> '.$data->jobs_apply_approve_note;
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }


    public function allTestonline() {      
    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'jobs_apply_created_date', 'jobs_apply_rush', 'jobs_apply_talent_id','talent_rt_status')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'testonline']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->jobs_apply_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>    <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
      	$rush = '';
        if ($data->jobs_apply_rush == 'YES') { $rush = '&nbsp;&nbsp;<span class="badge badge-danger"><i class="	fa fa-rocket"></i></span>'; }
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
          $type .= ' '.substr($data->jobs_apply_created_date, 0,10);
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }

    
    public function allReject() {
    //   $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status')
      $data = DB::table('jobs_apply')->select('talent_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'talent_name', 'talent_email', 'talent_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status','talent_rt_status','jobs_apply_approve_status','jobs_apply_approve_note')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->join('talent', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id' )
                    ->where([
                        ['jobs_apply_status', '=', 'rejected']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$jobs_apply_id}}|{{$jobs_apply_status}}"/></center')
      
      ->addColumn('jobs_apply_name', function($data){
        $text = '<strong>'.$data->talent_name.'</strong>';
        if($data->jobs_apply_label != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        elseif($data->jobs_apply_note != '' && $data->talent_rt_status == 'DONE')
        $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span><br>'.$data->jobs_apply_note;
        elseif($data->jobs_apply_label != '')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">'.$data->jobs_apply_label.'</span>';
        elseif($data->jobs_apply_note != '')
          $text = $text.'<br>'.$data->jobs_apply_note;
        elseif($data->talent_rt_status == 'DONE')
          $text = $text.'&nbsp;&nbsp;<span class="badge badge-success">RT DONE</span>';
        else
          $text = ''.$data->talent_name.'';
          return $text;
      })
      ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->jobs_apply_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a>    <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-status-approve" type="button" class="btn btn-info btn-xs status-approve" data-toggle="tooltip" data-placement="top" title="Set status approvement"><i class=" fa fa-bookmark"></i></a></center>';
      })
      ->addColumn('jobs_apply_kontak', function($data){
        return $data->talent_email.'<br>'.$data->talent_phone;
      })
      ->addColumn('jobs_title', function($data){
        $title = $data->jobs_title;
        if($data->jobs_apply_approve_status=='approve'){$color='success'; $status='Approve';}
        elseif($data->jobs_apply_approve_status=='reject'){$color='danger'; $status='Reject';}
        else{$color='light';$status='';}
        if($data->jobs_apply_type_time == 'fulltime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Full</span>';
        elseif($data->jobs_apply_type_time == 'parttime')
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">Part</span>';
        else
          $type = $title.'&nbsp;&nbsp;<span class="badge badge-success">In</span>';
      	  $type .= '<br><span class="badge badge-'.$color.'">'.$status.'</span> '.$data->jobs_apply_approve_note;
        return $type;
      })
      ->rawColumns(['jobs_apply_name','checkbox', 'action', 'jobs_title', 'jobs_apply_kontak'])
      ->make(true);
    }
    
    public function notify(){
      Mail::to('elvron.indonesia@gmail.com')->send(new progressMail);
      dd(Mail::failures());
    }

    public function blast_show() {
      set_time_limit(0);
      $data = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_phone')
                    ->where([
                        ['jobs_apply_status', '=', 'keep'],
                        ['jobs_apply_jobs_id', '=', '35'],
                        ['jobs_apply_apply', '=', 'NO']
                      ])
                    ->orderBy('jobs_apply_created_date', 'desc')->get();
      echo count($data);
      echo "<table>";
      foreach ($data as $v) {
        $no_wa = ltrim($v->jobs_apply_phone, '+62');
        $no_wa = ltrim($v->jobs_apply_phone, '62');
        $no_wa = ltrim($v->jobs_apply_phone, '0');
        $txt   = 'Halo%20'.ucwords($v->jobs_apply_name).'%2C%20saya%20Dian%20dari%20tim%20HRD%20PT%20Erporate%20Solusi%20Global.%20Kami%20membutuhkan%20cukup%20banyak%20developer%20dan%20menghubungi%20Anda%20karena%20bekerjasama%20dengan%20pihak%20kampus%20IT%20di%20Jogja.%0ADetail%20informasi%20ada%20di%20https%3A%2F%2Fcareer.erporate.com%2Fdetaillp%0AJika%20berkenan%20bisa%20kami%20hubungi%20untuk%20ngobrol%20santai%20seputar%20kesibukan%20saat%20ini%20%2B%20dijelaskan%20detail%20LOWONGAN%20KERJA%20IT%20dan%20PROGRAM%20REFERRAL%20kami.%0ALet%27s%20Join%20With%20Us%20(Indonesia%20%26%20Vietnam%20Teams)%0ATerimakasih%20%F0%9F%98%8A';
        $wa = 'https://api.whatsapp.com/send?phone=62'.$no_wa.'&text='.$txt;

        echo "<tr><td>".$v->jobs_apply_name."</td> <td>".$no_wa."</td> <td>".$wa."</td> </tr>";
      }
      echo "</table>";

      echo "<h3>SELESAI</h3>";
    }



    public function pindah()
    {
        $all = DB::table('talent')->select('talent_id')->get();
        foreach ($all as $v) {
            $ja = DB::table('jobs_apply')->select('jobs_apply_apply')->where('jobs_apply_talent_id', '=', $v->talent_id)->first();
            if($ja != null) {
                DB::table('talent')->where('talent_id', $v->talent_id)->update(['talent_apply' => $ja->jobs_apply_apply]);
            }
        }
        
        echo "finish";
        
    //   $all = DB::table('jobs_apply')
              // ->select('jobs_apply_name', 'jobs_apply_phone', 'jobs_apply_email', 'jobs_apply_gender', 'jobs_apply_place_of_birth', 'jobs_apply_birth_date', 'jobs_apply_current_address', 'jobs_apply_campus', 'jobs_apply_expected_salary', 'jobs_apply_portofolio', 'jobs_apply_created_date' )
            //   ->select('jobs_apply_name', 'jobs_apply_phone', 'jobs_apply_email', 'jobs_apply_gender', 'jobs_apply_birth_date', 'jobs_apply_campus', 'jobs_apply_created_date', 'jobs_apply_status', 'jobs_apply_type_time', 'jobs_apply_information', 'jobs_apply_detail', 'jobs_apply_internal', 'jobs_apply_apply')
      //         ->whereNull('jobs_apply_talent_id')
            //   ->orderBy('jobs_apply_id', 'asc')
            //   ->groupBy('jobs_apply_email')
            //   ->offset(0)->limit(5000)->get()->toArray();

      // echo "<br>".count($all)."<br>";

    //   $no=1;
    //   echo "<table border='1'>";
    //   foreach ($all as $v) {
    //     echo "<tr>";
    //     echo "<td>".$no."</td>";
    //     echo "<td>".$v->jobs_apply_name."</td>";
    //     echo "<td>".$v->jobs_apply_phone."</td>";
    //     echo "<td>".$v->jobs_apply_email."</td>";
    //     echo "<td>".$v->jobs_apply_gender."</td>";
    //     echo "<td>".$v->jobs_apply_birth_date."</td>";
    //     echo "<td>".$v->jobs_apply_campus."</td>";
    //     echo "<td>".$v->jobs_apply_created_date."</td>";
    //     echo "<td>".$v->jobs_apply_status."</td>";
    //     echo "<td>".$v->jobs_apply_type_time."</td>";
    //     echo "<td>".$v->jobs_apply_information."</td>";
    //     echo "<td>".$v->jobs_apply_detail."</td>";
    //     echo "<td>".$v->jobs_apply_internal."</td>";
    //     echo "<td>".$v->jobs_apply_apply."</td>";
    //     echo "</tr>";
    //     $no++;
    //   }
    //   echo "</table>";


      // $all = DB::table('jobs_apply')->select('jobs_apply_email' )->whereNull('jobs_apply_talent_id')->orderBy('jobs_apply_id', 'asc')->groupBy('jobs_apply_email')->offset(0)->limit(5000)->get()->toArray();
      // $all = DB::table('jobs_apply')->select('jobs_apply_email' )->where('jobs_apply_talent_id', '=', '0')->orderBy('jobs_apply_id', 'asc')->groupBy('jobs_apply_email')->offset(0)->limit(5000)->get()->toArray();
      // echo count($all);die();
      // foreach ($all as $v) {
      //   $tl = DB::table('talent')->select('talent_id' )->where('talent_email', '=', $v->jobs_apply_email)->orderBy('talent_id', 'asc')->offset(0)->limit(1)->first();
      //   if(isset($tl->talent_id))
      //   {
      //     Job_apply::where('jobs_apply_email', '=', $v->jobs_apply_email)->update([ 'jobs_apply_talent_id' => $tl->talent_id]);
      //     echo $tl->talent_id.' ';
      //   }
      //   else {
          // $ja = DB::table('jobs_apply')
          //       ->select('jobs_apply_name', 'jobs_apply_phone', 'jobs_apply_email', 'jobs_apply_gender', 'jobs_apply_place_of_birth', 'jobs_apply_birth_date', 'jobs_apply_current_address', 'jobs_apply_expected_salary', '', '', '', '', '', '', '', '', '', '')
          //       ->where('jobs_apply_talent_id')->first();

          // $talent                         = new Talent;
          // $talent->talent_name            = $request->input('name');
          // $talent->talent_condition       = 'unprocess';
          // $talent->talent_phone           = $request->input('phone');
          // $talent->talent_email           = $request->input('email');
          // $talent->talent_gender          = $request->input('gender');
          // $talent->talent_place_of_birth  = $request->input('place');
          // $talent->talent_birth_date      = $request->input('tgl');
          // $talent->talent_address         = $request->input('address');
          // $talent->talent_salary          = $request->input('es');
          // $talent->talent_cv              = $filecv;
          // $talent->talent_portfolio       = $request->input('pp');
          // $talent->talent_portofolio_file = $filepp;
          // $talent->talent_campus          = $request->input('campus');
          // $talent->talent_skill           = $request->input('skill');
          // $talent->talent_status          = 'worker';
          // $talent->talent_location_id     = 12;
          // $talent->save();
          // $id = $talent->talent_id;

        //   echo ' <br>miss : '.$v->jobs_apply_email.' ';
        // }
      // }
      
    }

    public function changeStatusApprove(Request $request){
      
   

      if($request->status=='none'){
          $status=null;
          $note=null;
      }
      else{
          $status=$request->status;
          $note=$request->note;
      }

     if( $data=DB::table('jobs_apply')->where('jobs_apply_id','=',$request->id)->update([
        'jobs_apply_approve_status'=>$status,
        'jobs_apply_approve_note' =>$note,
      ])){

      return 'success';
      }
    }

    public function getreminder(Request $request)
    {
      // dd($request->all());
      $all = DB::table('jobs_apply')->select('jobs_apply_reminder_date')
                                  ->where('jobs_apply_id', $request->input('id'))
                                  ->get();
      echo json_encode($all);
    }
  
    public function editreminder(Request $request){
     if( $data=DB::table('jobs_apply')->where('jobs_apply_id','=',$request->id)->update([
          'jobs_apply_reminder_date'=>$request->date
      ]))
      return 'success';

      

    }
}
