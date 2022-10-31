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

class jobsapplyclientController extends Controller
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
          return view('admin.jobsapplyclient', compact('jobs', 'locations', 'countU', 'countTO', 'countI', 'countO', 'countRD', 'countTC'));
      }

      public function get_info_talent(){
        $data_talent = HireTalent::select('hire_talent_id','hire_talent_talent_id')->first();
        return response()->json([
          "id_hire_talent" => $data_talent->hire_talent_id, 
          "nama_talent" => $data_talent->hire_talent_talent_id
        ]);    
      }
  
      public function notif(Request $request)
      {
        $id = $request->id;
        $hire_talent = HireTalent::select('hire_talent_talent_id','hire_talent_company_id')->where('hire_talent_id',$request->id)->first();
        // $data_notif = HireTalent::select('hire_talent_id as id' ,'hire_talent_talent_id as talent_id', 'hire_talent_company_id as value')->get();
        
        // return redirect()->route('jobsapplyclient')->with([
        //   "talent" => $hire_talent->hire_talent_talent_id,
        //   "company" => $hire_talent->hire_talent_company_id
        // ]);
  
        return response()->json([
          "talent" => $hire_talent->hire_talent_talent_id,
          "company" => $hire_talent->hire_talent_company_id
        ]);
      }
  
}
