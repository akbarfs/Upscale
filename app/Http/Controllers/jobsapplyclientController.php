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
use App\Models\CompanyRequest;
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
        $reqs      = CompanyRequest::all();
        $locations = Location::all();

        $countU = DB::table('talent')
                  ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
                  ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
                  ->join("company","company.company_id","=","company_request.company_id")
                  // ->where("company_req_log.company_request_id", $id_request)
                  ->where([
                    ['company_req_log.status', '=', 'unprocess']
                  ])
                  ->get()->count();
        $countI = DB::table('talent')
                  ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
                  ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
                  ->join("company","company.company_id","=","company_request.company_id")
                  // ->where("company_req_log.company_request_id", $id_request)
                  ->where([
                    ['company_req_log.status', '=', 'interview']
                  ])
                  ->get()->count();
      //   $countTC = DB::table('jobs_apply')->select('jobs_apply.jobs_apply_current_address', 'jobs_apply.jobs_apply_type_time', 'jobs.jobs_title', 'jobs_apply.jobs_apply_label', 'jobs_apply.jobs_apply_note', 'jobs_apply.jobs_apply_name', 'jobs_apply.jobs_apply_email', 'jobs_apply.jobs_apply_phone', 'jobs_apply.jobs_apply_id', 'jobs_apply.jobs_apply_status', 'interview.interview_id', 'interview.interview_schedule', 'interview.interview_schedule_status')
        $countP = DB::table('talent')
                  ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
                  ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
                  ->join("company","company.company_id","=","company_request.company_id")
                  // ->where("company_req_log.company_request_id", $id_request)
                  ->where([
                    ['company_req_log.status', '=', 'prospek']
                  ])
                  ->get()->count();
  
        $countO = DB::table('talent')
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        ->where([
          ['company_req_log.status', '=', 'offered']
        ])
        ->get()->count();
        $countH = DB::table('talent')
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        ->where([
          ['company_req_log.status', '=', 'hired']
        ])
        ->get()->count();
        $countR = DB::table('talent')
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        ->where([
          ['company_req_log.status', '=', 'reject']
        ])
        ->get()->count();

        $limit = 3;
        $data_talent = DB::table('hire_talent')
        ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
        ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
        ->select('hire_talent.*','talent.talent_name','company.company_pic')
        ->where('hire_talent.hire_talent_status_notif', '1')
        ->orderBy('hire_talent.created_at', 'DESC')->paginate();

        $data = DB::table('hire_talent')
        ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
        ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
        ->select('hire_talent.*','talent.talent_name','company.company_pic')->where('hire_talent.hire_talent_status_notif', '1')
        ->get();
        $jumlah_data_notif = $data->count("hire_talent_id");

        $today = new \DateTime();
        $tgl2 = new \DateTime($data_talent['created_at']);
        $diff = $today->diff($tgl2);
          return view('admin.jobsapplyclient', compact('reqs', 'locations', 'countU', 'countI','countP', 'countO', 'countH', 'countR', 'data_talent', 'jumlah_data_notif', 'diff'));
      }

      public function allNotif(){
        $data_talent = DB::table('hire_talent')
        ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
        ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
        ->select('hire_talent.*','talent.talent_name','company.company_pic')->orderBy('hire_talent.created_at', 'DESC')->get();

        $countUR = DB::table('hire_talent')
        ->where([
          ['hire_talent_status_notif', '=', '1']
        ])
        ->get()->count();

        $countR = DB::table('hire_talent')
        ->where([
          ['hire_talent_status_notif', '=', '0']
        ])
        ->get()->count();

        $countAll = DB::table('hire_talent')
        ->get()->count();

        return view('admin.all-notif', compact('data_talent', 'countUR', 'countR', 'countAll'));
      }
  
      public function notif(Request $request)
      {
        $id = $request->id;
        $hire_talent = DB::table('hire_talent')
        ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
        ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
        ->select('hire_talent.*','talent.talent_name','company.company_name')
        ->where('hire_talent.hire_talent_id', $id)
        ->first();

        $hire_talent1 = HireTalent::find($id);

        $hire_talent1->hire_talent_status_notif = '0';
        $hire_talent1->update();

        return redirect()->route('jobsapplyclient')->with([
          "talent" => $hire_talent->talent_name,
          "company" => $hire_talent->company_name,
        ]);

      }

      public function allUnprocessClient() {
        // $id_request = 3;
        $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

        $data = Talent::select(DB::raw($default_query))
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        // ->where("company_req_log.company_request_id", $id_request)
        ->where([
          ['company_req_log.status', '=', 'unprocess']
        ])
        ->groupBy('talent_id')->get();
    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

        ->addColumn('talent_name', function($data){
          $text = $data->name;
          return $text;
          })

        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('talent_address', function($data){
          $text = $data->talent_address;
          return $text;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->addColumn('talent_kontak', function($data){
          return $data->talent_email.'<br>'.$data->talent_phone;
        })

        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
        }

      public function all() {
        // $id_request = 3;
        $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

        $data = Talent::select(DB::raw($default_query))
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        // ->where("company_req_log.company_request_id", $id_request)
        ->groupBy('talent_id')->get();
    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

        ->addColumn('talent_name', function($data){
          $text = $data->name;
          return $text;
          })

        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('talent_address', function($data){
          $text = $data->talent_address;
          return $text;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->addColumn('talent_kontak', function($data){
          return $data->talent_email.'<br>'.$data->talent_phone;
        })

        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }

      public function allInterviewClient(){
        // $id_request = 3;
        $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

        $data = Talent::select(DB::raw($default_query))
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        // ->where("company_req_log.company_request_id", $id_request)
        ->where([
          ['company_req_log.status', '=', 'interview']
        ])
        ->groupBy('talent_id')->get();
    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

        ->addColumn('talent_name', function($data){
          $text = $data->name;
          return $text;
          })

        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('talent_address', function($data){
          $text = $data->talent_address;
          return $text;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->addColumn('talent_kontak', function($data){
          return $data->talent_email.'<br>'.$data->talent_phone;
        })

        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }      

      public function allRejectClient(){
        // $id_request = 3;
        $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

        $data = Talent::select(DB::raw($default_query))
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        // ->where("company_req_log.company_request_id", $id_request)
        ->where([
          ['company_req_log.status', '=', 'reject']
        ])
        ->groupBy('talent_id')->get();
    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

        ->addColumn('talent_name', function($data){
          $text = $data->name;
          return $text;
          })

        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('talent_address', function($data){
          $text = $data->talent_address;
          return $text;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->addColumn('talent_kontak', function($data){
          return $data->talent_email.'<br>'.$data->talent_phone;
        })

        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }

      public function allHiredClient(){
        // $id_request = 3;
        $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

        $data = Talent::select(DB::raw($default_query))
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        // ->where("company_req_log.company_request_id", $id_request)
        ->where([
          ['company_req_log.status', '=', 'hired']
        ])
        ->groupBy('talent_id')->get();
    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

        ->addColumn('talent_name', function($data){
          $text = $data->name;
          return $text;
          })

        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('talent_address', function($data){
          $text = $data->talent_address;
          return $text;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->addColumn('talent_kontak', function($data){
          return $data->talent_email.'<br>'.$data->talent_phone;
        })

        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }

      public function allProspekClient(){
        // $id_request = 3;
        $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

        $data = Talent::select(DB::raw($default_query))
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        // ->where("company_req_log.company_request_id", $id_request)
        ->where([
          ['company_req_log.status', '=', 'prospek']
        ])
        ->groupBy('talent_id')->get();
    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

        ->addColumn('talent_name', function($data){
          $text = $data->name;
          return $text;
          })

        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('talent_address', function($data){
          $text = $data->talent_address;
          return $text;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->addColumn('talent_kontak', function($data){
          return $data->talent_email.'<br>'.$data->talent_phone;
        })

        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }

      public function allOfferedClient(){
        // $id_request = 3;
        $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";
        $data = Talent::select(DB::raw($default_query))
        ->join("company_req_log", "company_req_log.talent_id","=","talent.talent_id")
        ->join("company_request", "company_request.company_request_id","=","company_req_log.company_request_id")
        ->join("company","company.company_id","=","company_request.company_id")
        // ->where("company_req_log.company_request_id", $id_request)
        ->where([
          ['company_req_log.status', '=', 'offered']
        ])
        ->groupBy('talent_id')->get();
    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

        ->addColumn('talent_name', function($data){
          $text = $data->name;
          return $text;
          })

        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('talent_address', function($data){
          $text = $data->talent_address;
          return $text;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->addColumn('talent_kontak', function($data){
          return $data->talent_email.'<br>'.$data->talent_phone;
        })

        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }

      public function delete(Request $request)
      {
        $all_id_array = $request->input('id');
        $all = CompanyReqLog::whereIn('company_req_log_id', $all_id_array);
        if($all->delete()){
          return 'deleted';
        }
      }
      public function allNotify() {
        $data = DB::table('hire_talent')
        ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
        ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
        ->join('company_request', 'hire_talent.hire_talent_company_request_id', '=', 'company_request.company_request_id')
        ->select('hire_talent.*','talent.talent_name','company.company_name','company_request.name_request')
        // ->where('hire_talent.hire_talent_status_notif', '1')
        ->get();

    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" /></center')

        ->addColumn('talent_name', function($data){
          $text = $data->talent_name;
          return $text;
          })
        ->addColumn('tanggal', function($data){
          return $data->created_at;
          })  
        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->hire_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->hire_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->hire_talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }
      public function allUnread() {
        $data = DB::table('hire_talent')
        ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
        ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
        ->join('company_request', 'hire_talent.hire_talent_company_request_id', '=', 'company_request.company_request_id')
        ->select('hire_talent.*','talent.talent_name','company.company_name','company_request.name_request')
        ->where('hire_talent.hire_talent_status_notif', '1')
        ->get();

    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" /></center')

        ->addColumn('talent_name', function($data){
          $text = $data->talent_name;
          return $text;
          })
        ->addColumn('tanggal', function($data){
          return $data->created_at;
          })  
        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->hire_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->hire_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->hire_talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }
      public function allRead() {
        $data = DB::table('hire_talent')
        ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
        ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
        ->join('company_request', 'hire_talent.hire_talent_company_request_id', '=', 'company_request.company_request_id')
        ->select('hire_talent.*','talent.talent_name','company.company_name','company_request.name_request')
        ->where('hire_talent.hire_talent_status_notif', '0')
        ->get();

    
        return Datatables::of($data)
        ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" /></center')

        ->addColumn('talent_name', function($data){
          $text = $data->talent_name;
          return $text;
          })
        ->addColumn('tanggal', function($data){
          return $data->created_at;
          })  
        ->addColumn('company_name', function($data){
          $text2 = $data->company_name;
          return $text2;
          })
        ->addColumn('req', function($data){
          return $data->name_request;
          })  
  
        ->addColumn('action', function($data){
        return '<center><a href="'.route('jobsapply.detail').'?id='.$data->hire_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="'.route('talent.detail').'?id='.$data->hire_talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="'.$data->hire_talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
        })
        ->rawColumns(['talent_name','checkbox','action','req','company_name'])
        ->make(true);
      }

}
