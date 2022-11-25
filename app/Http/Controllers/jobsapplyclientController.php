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
use App\Models\CompanyReqLog;

class jobsapplyclientController extends Controller
{
  public function __construct()
  {
    if (session('level') != 'admin') {
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
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->where([
        ['company_req_log.status', '=', 'unprocess']
      ])->count();
    $countI = DB::table('talent')
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->where([
        ['company_req_log.status', '=', 'interview']
      ])->count();
    $countP = DB::table('talent')
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->where([
        ['company_req_log.status', '=', 'prospek']
      ])->count();
    $countO = DB::table('talent')
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->where([
        ['company_req_log.status', '=', 'offered']
      ])->count();
    $countH = DB::table('talent')
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->where([
        ['company_req_log.status', '=', 'hired']
      ])->count();
    $countR = DB::table('talent')
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->where([
        ['company_req_log.status', '=', 'reject']
      ])->count();


    // notif
    $limit = 3;
    $data_talent = DB::table('hire_talent')
      ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
      ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
      ->select('hire_talent.*', 'talent.talent_name', 'company.company_pic')
      ->where('hire_talent.hire_talent_status_notif', '1')
      ->orderBy('hire_talent.created_at', 'DESC')->paginate($limit);

    $data = DB::table('hire_talent')
      ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
      ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
      ->select('hire_talent.*', 'talent.talent_name', 'company.company_pic')->where('hire_talent.hire_talent_status_notif', '1')
      ->get();
    $jumlah_data_notif = $data->count("hire_talent_id");

    return view('admin.jobsapplyclient', compact('reqs', 'locations', 'countU', 'countI', 'countP', 'countO', 'countH', 'countR', 'data_talent', 'jumlah_data_notif'));
  }

  // index page
  public function index2()
  {
    $company_req = CompanyRequest::all();
    $company_req['hired'] = CompanyReqLog::where('status', 'hired')->count();

    $talentpool['unprocess'] = CompanyReqLog::where('status', 'unprocess')->count();
    $talentpool['interview'] = CompanyReqLog::where('status', 'interview')->count();
    $talentpool['prospek'] = CompanyReqLog::where('status', 'prospek')->count();
    $talentpool['offered'] = CompanyReqLog::where('status', 'offered')->count();
    $talentpool['hired'] = CompanyReqLog::where('status', 'hired')->count();
    $talentpool['reject'] = CompanyReqLog::where('status', 'reject')->count();
    $talentpool['bookmark'] = CompanyReqLog::where('bookmark', 'true')->count();

    return view('admin.jobs-apply-client.index', [
      'active' => 'active',
      'data' => $company_req,
      'count' => $talentpool,
    ]);
  }


  // table talent request
  public function table_talent_request(Request $request)
  {
    // set_time_limit(300);
    // $default_query = "talent.talent_id, 
    // talent.user_id, 
    // users.id as user_id, 
    // talent.talent_name as name, 
    // talent.talent_salary as expetasi, 
    // talent.talent_lastest_salary as gaji, 
    // company_req_log.status as status, 
    // company_req_log.company_req_log_id as log_id";

    // $data = Talent::select(DB::raw($default_query));
    // $data = $data->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id");
    // $data = $data->join("users", "talent.user_id", "=", "users.id", "LEFT");
    // $data = $data->join("skill_talent", "talent.talent_id", "=", "skill_talent.st_talent_id", "LEFT");
    // $data = $data->where("company_req_log.company_request_id", 2);

    // if (!empty($request->status)) {
    //   $data = $data->where("company_req_log.status", $request->status);
    // } else if (!empty($request->nama)) {
    //   $data = $data->Contains("talent.talent_name", $request->nama);
    // }


    // $data = $data->groupBy("talent.talent_id");
    // $data = $data->paginate(10);

    // $data = CompanyRequest::paginate(10);

    if (!empty($request->status)) {
      $data = CompanyReqLog::where('status', $request->status)->latest()->paginate(10);
    } else {
      $data = CompanyReqLog::latest()->paginate(10);
    }

    return view('admin.jobs-apply-client.table', ['request_log' => $data])->render();
  }

  public function allNotif()
  {
    $data_talent = DB::table('hire_talent')
      ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
      ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
      ->select('hire_talent.*', 'talent.talent_name', 'company.company_pic')->orderBy('hire_talent.created_at', 'DESC')->get();

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

    return view('admin.all-notif', compact('data_talent', 'countUR', 'countR'));
  }

  public function notif(Request $request)
  {
    $id = $request->id;
    $hire_talent = DB::table('hire_talent')
      ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
      ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
      ->select('hire_talent.*', 'talent.talent_name', 'company.company_name')
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

  public function allUnprocessClient()
  {
    // $id_request = 3;
    $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

    $data = Talent::select(DB::raw($default_query))
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->join("company", "company.company_id", "=", "company_request.company_id")
      // ->where("company_req_log.company_request_id", $id_request)
      ->where([
        ['company_req_log.status', '=', 'unprocess']
      ])
      ->get();

    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->name;
        return $text;
      })

      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('talent_address', function ($data) {
        $text = $data->talent_address;
        return $text;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function ($data) {
        return $data->talent_email . '<br>' . $data->talent_phone;
      })

      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function all()
  {
    // $id_request = 3;
    $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

    $data = Talent::select(DB::raw($default_query))
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->join("company", "company.company_id", "=", "company_request.company_id")
      // ->where("company_req_log.company_request_id", $id_request)
      ->get();

    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->name;
        return $text;
      })

      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('talent_address', function ($data) {
        $text = $data->talent_address;
        return $text;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function ($data) {
        return $data->talent_email . '<br>' . $data->talent_phone;
      })

      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function allInterviewClient()
  {
    // $id_request = 3;
    $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

    $data = Talent::select(DB::raw($default_query))
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->join("company", "company.company_id", "=", "company_request.company_id")
      // ->where("company_req_log.company_request_id", $id_request)
      ->where([
        ['company_req_log.status', '=', 'interview']
      ])
      ->get();

    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->name;
        return $text;
      })

      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('talent_address', function ($data) {
        $text = $data->talent_address;
        return $text;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function ($data) {
        return $data->talent_email . '<br>' . $data->talent_phone;
      })

      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function allRejectClient()
  {
    // $id_request = 3;
    $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

    $data = Talent::select(DB::raw($default_query))
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->join("company", "company.company_id", "=", "company_request.company_id")
      // ->where("company_req_log.company_request_id", $id_request)
      ->where([
        ['company_req_log.status', '=', 'reject']
      ])
      ->get();

    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->name;
        return $text;
      })

      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('talent_address', function ($data) {
        $text = $data->talent_address;
        return $text;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function ($data) {
        return $data->talent_email . '<br>' . $data->talent_phone;
      })

      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function allHiredClient()
  {
    // $id_request = 3;
    $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

    $data = Talent::select(DB::raw($default_query))
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->join("company", "company.company_id", "=", "company_request.company_id")
      // ->where("company_req_log.company_request_id", $id_request)
      ->where([
        ['company_req_log.status', '=', 'hired']
      ])
      ->get();

    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->name;
        return $text;
      })

      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('talent_address', function ($data) {
        $text = $data->talent_address;
        return $text;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function ($data) {
        return $data->talent_email . '<br>' . $data->talent_phone;
      })

      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function allProspekClient()
  {
    // $id_request = 3;
    $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";

    $data = Talent::select(DB::raw($default_query))
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->join("company", "company.company_id", "=", "company_request.company_id")
      // ->where("company_req_log.company_request_id", $id_request)
      ->where([
        ['company_req_log.status', '=', 'prospek']
      ])
      ->get();

    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->name;
        return $text;
      })

      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('talent_address', function ($data) {
        $text = $data->talent_address;
        return $text;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function ($data) {
        return $data->talent_email . '<br>' . $data->talent_phone;
      })

      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function allOfferedClient()
  {
    // $id_request = 3;
    $default_query = "talent.talent_id, talent.talent_name as name,talent.talent_email,talent.talent_phone,talent.talent_address, company_req_log.status as status, company.company_name, company_req_log.company_req_log_id as log_id,company_request.name_request";
    $data = Talent::select(DB::raw($default_query))
      ->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id")
      ->join("company_request", "company_request.company_request_id", "=", "company_req_log.company_request_id")
      ->join("company", "company.company_id", "=", "company_request.company_id")
      // ->where("company_req_log.company_request_id", $id_request)
      ->where([
        ['company_req_log.status', '=', 'offered']
      ])
      ->get();

    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_id}}"/></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->name;
        return $text;
      })

      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('talent_address', function ($data) {
        $text = $data->talent_address;
        return $text;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function ($data) {
        return $data->talent_email . '<br>' . $data->talent_phone;
      })

      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function delete(Request $request)
  {
    $all_id_array = $request->input('id');
    $all = CompanyReqLog::whereIn('company_req_log_id', $all_id_array);
    if ($all->delete()) {
      return 'deleted';
    }
  }
  public function allNotify()
  {
    $data = DB::table('hire_talent')
      ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
      ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
      ->join('company_request', 'hire_talent.hire_talent_company_request_id', '=', 'company_request.company_request_id')
      ->select('hire_talent.*', 'talent.talent_name', 'company.company_name', 'company_request.name_request')
      ->get();


    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" /></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->talent_name;
        return $text;
      })
      ->addColumn('tanggal', function ($data) {
        return $data->created_at;
      })
      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->hire_talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->hire_talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->hire_talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }
  public function allUnread()
  {
    $data = DB::table('hire_talent')
      ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
      ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
      ->join('company_request', 'hire_talent.hire_talent_company_request_id', '=', 'company_request.company_request_id')
      ->select('hire_talent.*', 'talent.talent_name', 'company.company_name', 'company_request.name_request')
      ->where('hire_talent.hire_talent_status_notif', '1')
      ->get();


    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" /></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->talent_name;
        return $text;
      })
      ->addColumn('tanggal', function ($data) {
        return $data->created_at;
      })
      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->hire_talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->hire_talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->hire_talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }

  public function allRead()
  {
    $data = DB::table('hire_talent')
      ->join('talent', 'hire_talent.hire_talent_talent_id', '=', 'talent.talent_id')
      ->join('company', 'hire_talent.hire_talent_company_id', '=', 'company.company_id')
      ->join('company_request', 'hire_talent.hire_talent_company_request_id', '=', 'company_request.company_request_id')
      ->select('hire_talent.*', 'talent.talent_name', 'company.company_name', 'company_request.name_request')
      ->where('hire_talent.hire_talent_status_notif', '0')
      ->get();


    return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" /></center')

      ->addColumn('talent_name', function ($data) {
        $text = $data->talent_name;
        return $text;
      })
      ->addColumn('tanggal', function ($data) {
        return $data->created_at;
      })
      ->addColumn('company_name', function ($data) {
        $text2 = $data->company_name;
        return $text2;
      })
      ->addColumn('req', function ($data) {
        return $data->name_request;
      })

      ->addColumn('action', function ($data) {
        return '<center><a href="' . route('jobsapply.detail') . '?id=' . $data->hire_talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>    <a href="' . route('talent.detail') . '?id=' . $data->hire_talent_id . '" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>     <a href="" id="' . $data->hire_talent_id . '"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="	fa fa-check"></i></a></center>';
      })
      ->rawColumns(['talent_name', 'checkbox', 'action', 'req', 'company_name'])
      ->make(true);
  }
}
