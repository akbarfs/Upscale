<?php

namespace App\Http\Controllers;

use App\Models\education;
use App\Models\Location;
use App\Models\portfolio;
use App\Models\Skill;
use App\Models\SkillTalent;
use App\Models\Talent;
use App\Models\CompanyRequest;
use App\Models\CompanyReqLog;
use App\Models\SkillRequest;
use App\Models\HireTalent;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyDashboardController extends Controller
{

  public function __construct()
  {
    $this->total  = DB::table('talent')->count();
  }

  public function getTotal($id)
  {
    $total = [
      'active' => DB::table('company_request')->where(['status_request' => 'active', 'company_id' => $id])->count(),
      'nonactive' => DB::table('company_request')->where(['status_request' => 'nonactive', 'company_id' => $id])->count(),
    ];
    return $total;
  }

  public function companyDashboard()
  {
    $total = $this->getTotal(session('user_id'));
    return view("company.dashboard", [
      'active' => 'dashboard',
      'total' => $this->total,
      'total_active_req' => $total['active'],
      'total_nonactive_req' => $total['nonactive']
    ]);
  }

  // ALL TALENT
  public function allDatabase()
  {

    $domisili = DB::table('location')->get();
    $total = $this->getTotal(session('user_id'));
    return view('company.talent', [
      'active' => "all",
      'total' => $this->total,
      'total_active_req' => $total['active'],
      'total_nonactive_req' => $total['nonactive'],
      'domisili' => $domisili
    ]);
  }

  // REQUEST FEATURE
  public function makeOffer(Request $request)
  {
    set_time_limit(300);
    $validateData = $request->validate([
      'name_request' => 'required',
      'type_work' => 'required',
      'benefit' => 'required',
      'min_salary' => 'required',
      'max_salary' => 'required',
      'person_needed' => 'required|integer|min:1'
    ]);

    $validateData['min_salary'] = preg_replace('/[^0-9]/', '', $request->min_salary);
    $validateData['max_salary'] = preg_replace('/[^0-9]/', '', $request->max_salary);
    $validateData['status_request'] = 'active';
    $validateData['company_id'] = session('user_id');

    $company_req = CompanyRequest::create($validateData);

    $request_id = $company_req->company_request_id;

    $validateData2 = $request->validate([
      'skills' => 'required',
      'skill-exp' => 'required'
    ]);

    $count_skill = count($validateData2['skills']);

    for ($i = 0; $i < $count_skill; $i++) {
      $comp_id = $request_id;
      $skill_id = $validateData2['skills'][$i];
      $experience = $validateData2['skill-exp'][$i];
      SkillRequest::create([
        'company_request_id' => $comp_id,
        'skill_id' => $skill_id,
        'experience' => $experience
      ]);
    }

    $talents = $this->getTalentRequest($request_id);
    $talents = $talents->get();
    foreach ($talents as $talent) {
      CompanyReqLog::create([
        'company_request_id' => $request_id,
        'talent_id' => $talent->talent_id,
        'status' => 'unprocess',
        'bookmark' => 'false'
      ]);
    }

    return redirect()->back();
  }

  public function updateOffer(Request $request, $id)
  {
    set_time_limit(300);
    $validateData = $request->validate([
      'name_request' => 'required',
      'type_work' => 'required',
      'benefit' => 'required',
      'min_salary' => 'required',
      'max_salary' => 'required',
      'person_needed' => 'required|integer|min:1'
    ]);

    $validateData['min_salary'] = preg_replace('/[^0-9]/', '', $request->min_salary);
    $validateData['max_salary'] = preg_replace('/[^0-9]/', '', $request->max_salary);

    CompanyRequest::find($id)->update($validateData);

    $validateData2 = $request->validate([
      'skills' => 'required',
      'skill-exp' => 'required'
    ]);

    $count_skill = count($validateData2['skills']);

    for ($i = 0; $i < $count_skill; $i++) {
      $comp_id = $id;
      $skill_id = $validateData2['skills'][$i]; //bisa jadi string berupa namanya
      $experience = $validateData2['skill-exp'][$i];

      if (is_numeric($skill_id)) {
        SkillRequest::create([
          'company_request_id' => $comp_id,
          'skill_id' => $skill_id,
          'experience' => $experience
        ]);
      } else {
        $get_id_skill = Skill::select('skill_id')->where('skill_name', $skill_id)->first();
        $check = SkillRequest::where('skill_id', $get_id_skill->skill_id)->where('company_request_id', $comp_id)->first();
        SkillRequest::where('skill_request_id', $check->skill_request_id)->update([
          'skill_id' => $get_id_skill->skill_id,
          'experience' => $experience
        ]);
      }
    }

    CompanyReqLog::where('company_request_id', $id)->delete();
    $talents = $this->getTalentRequest($id);
    $talents = $talents->get();
    foreach ($talents as $talent) {
      CompanyReqLog::create([
        'company_request_id' => $id,
        'talent_id' => $talent->talent_id,
        'status' => 'unprocess',
        'bookmark' => 'false'
      ]);
    }


    return redirect()->route('company.request.active')->with([
      'message' => 'Company Request Berhasil Diedit'
    ]);
  }

  public function closeOffer($id)
  {
    $company_req = CompanyRequest::find($id);
    $company_req->status_request = 'nonactive';
    $company_req->save();
    return redirect()->route('company.request.active')->with([
      'message' => 'Company Request Sudah Ditutup'
    ]);
  }

  // GET DATA FUNCTION
  public function company_json_skill(Request $request)
  {
    $skill = Skill::select('skill_id as id', 'skill_name as text', 'skill_name as value')->when($request->q, function ($q) use ($request) {
      $q->where('skill_name', 'like', '%' . $request->q . '%');
    });

    $skill->where('status', 'enable');
    $skill = $skill->get();
    return response()->json($skill);
  }


  public function paginate_data(Request $request)
  {
    $default_query = "*,users.id as user_id, talent.talent_name as name, talent.talent_salary as expetasi, talent.talent_lastest_salary as gaji";

    $data = Talent::select(DB::raw($default_query));

    $data = $data->join("users", "talent.user_id", "=", "users.id", "LEFT");

    // filter domisili
    if ($request->domisili != 'Domisili') {
      $data = $data->where(function ($q) use ($request) {
        $q->where('talent_address', 'like', '%' . $request->domisili . '%')->orWhere('talent_current_address', 'like', '%' . $request->domisili . '%')->orWhere('talent_prefered_city', 'like', '%' . $request->domisili . '%');
      });
    }
    // end filter domisili

    // filter ready kerja
    if ($request->readykerja != "Ready Kerja") {
      if ($request->readykerja == 'yes') {
        $data = $data->whereIn('talent_available', ['yes', 'asap']);
      } else {
        $data = $data->whereNotIn('talent_available', ['yes', 'asap']);
      }
    }
    // End Filter ready kerja

    // Filter experience in years
    if ($request->experience != "Experience In Years") {
      return 'This Filter Still Development';
      $data->where('talent_start_career', '!=', null)->select(DB::raw('DATEDIFF(now(), talent_start_career) as pengalaman'));
      // $data->where('talent_start_career', '!=',null)->whereRaw('DATEDIFF(now(), talent_start_career) / 365.25 ',$request->experience );
      // dd($data->get());
    }
    // End Filter experience in years

    // Filter Education
    if ($request->education != "Education") {
      $data = $data->with(['talent_education'])->whereHas('talent_education', function ($q) use ($request) {
        $q->where('edu_level', 'like', '%' . $request->education . '%')->groupBy('edu_talent_id');
      });
    }
    // End Filter Education

    // Filter Gaji Sekarang
    if ($request->currsalary != null) {
      $currSalary = (int)preg_replace('/[^0-9]/', '', $request->currsalary);
      $data = $data->where(function ($q) use ($request, $currSalary) {
        $q->where('talent_lastest_salary', $currSalary)->orWhere('talent_lastest_salary', $request->currsalary);
      });
    }
    // End Filter Gaji Sekarang

    // Filter Expetasi Gaji
    if ($request->expsalary != null) {
      $expSalary = (int)preg_replace('/[^0-9]/', '', $request->expsalary);
      $data = $data->where(function ($k) use ($request, $expSalary) {
        $k->where('talent_salary', $expSalary)->orWhere('talent_salary', $request->expsalary);
      });
    }
    // End Filter Expetasi Gaji

    // Filter Ready Kerja
    if ($request->readyluarkota != "Ready Luar Kota") {
      $data = $data->where('talent_luar_kota', $request->readyluarkota);
    }
    // End Filter Ready Kerja

    // Filter Skill
    if ($request->skills) {
      $data = $data->whereHas('talent_skill', function ($o) use ($request) {
        $o->whereIn('st_skill_id', $request->skills);
      });
    }
    // End Filter Skill

    // Filter User terupdate
    if ($request->userupdate == 'yes') {
      $data = $data->orderBy('tupdated_date', 'DESC');
    } else {
      $data = $data->orderBy('talent_id', "DESC");
    }
    // End filter user terupdate

    // End Request
    $data = $data->groupBy("talent_id");
    $data = $data->paginate(10);

    return view('company.table', [
      'data' => $data
    ])->render();
  }

  public function table_talent_request(Request $request)
  {
    set_time_limit(300);
    $id_request = $request->id_request;
    $default_query = "talent.talent_id,talent.user_id,users.id as user_id, talent.talent_name as name, talent.talent_salary as expetasi, talent.talent_lastest_salary as gaji, company_req_log.status as status, company_req_log.company_req_log_id as log_id";
    $data = Talent::select(DB::raw($default_query));
    $data = $data->join("company_req_log", "company_req_log.talent_id", "=", "talent.talent_id");
    $data = $data->join("users", "talent.user_id", "=", "users.id", "LEFT");
    $data = $data->join("skill_talent", "talent.talent_id", "=", "skill_talent.st_talent_id", "LEFT");
    $data = $data->where("company_req_log.company_request_id", $id_request);

    if (!empty($request->status)) {
      $data = $data->where("company_req_log.status", $request->status);
    }

    else if(!empty($request->nama)){
      $data = $data->Contains("talent.talent_name", $request->nama);
    }


    $data = $data->groupBy("talent.talent_id");
    $data = $data->paginate(10);
    return view('company.requests.talent-req-table', [
      'data' => $data,
      'id_request' => $id_request,
    ])->render();
  }


  // REQUEST ACTIVE FEATURE
  public function getTalentRequest($id)
  {
    $company_req = CompanyRequest::find($id);
    $skill_req = SkillRequest::select('skill_id')->where('company_request_id', $id)->get();
    $data = Talent::select('talent.talent_id');
    $data = $data->join("users", "talent.user_id", "=", "users.id", "LEFT");
    $data = $data->join("skill_talent", "talent.talent_id", "=", "skill_talent.st_talent_id", "LEFT");
    $minSalary = $company_req->min_salary;
    $maxSalary = $company_req->max_salary;

    foreach ($skill_req as $skill) {
      $data = $data->orWhere('st_skill_id', $skill->skill_id)->whereRaw('st_skill_id is not null');
      $data = $data->where(function ($q) use ($minSalary, $maxSalary) {
        $q->whereBetween('talent_salary', [$minSalary, $maxSalary])->orWhereBetween('talent_lastest_salary', [$minSalary, $maxSalary]);
      });
    }
    return $data;
  }

  public function request_active()
  {
    set_time_limit(300);
    $company_req = DB::table('company_request')->where('company_id', session('user_id'))->where('status_request', 'active')->get();

    $talentpool = [];
    $talenthired = [];
    foreach ($company_req as $req) {
      $count = CompanyReqLog::where('company_request_id', $req->company_request_id)->count();
      array_push($talentpool, $count);
      $count2 = CompanyReqLog::where('company_request_id', $req->company_request_id)->where('status', 'hired')->count();
      array_push($talenthired, $count2);
    }

    $no = 0;

    $total = $this->getTotal(session('user_id'));
    return view('company.requests.active', [
      'active' => 'active',
      'total' => $this->total,
      'total_active_req' => $total['active'],
      'total_nonactive_req' => $total['nonactive'],
      'data' => $company_req,
      'talentpool' => $talentpool,
      'talenthired' => $talenthired,
      'no' => $no
    ]);
  }

  public function detail_request($id)
  {
    $company_req = DB::table('company_request')->where('company_request_id', $id)->first();
    $company_req = (object)$company_req;
    $skill = DB::table('skill_request')
      ->join('skill', 'skill_request.skill_id', '=', 'skill.skill_id')
      ->select('skill.skill_name', 'skill_request.experience', 'skill_request.skill_request_id')
      ->where('skill_request.company_request_id', $id)
      ->get();

    return response()->json(
      [
        'data' => $company_req,
        'data2' => $skill
      ]
    );
  }

  public function request_detail($id)
  {
    $company_req = CompanyRequest::find($id);
    $company_req['hired'] = CompanyReqLog::where('company_request_id', $id)->where('status', 'hired')->count();

    $talentpool['unprocess'] = CompanyReqLog::where('company_request_id', $id)->where('status', 'unprocess')->count();
    $talentpool['interview'] = CompanyReqLog::where('company_request_id', $id)->where('status', 'interview')->count();
    $talentpool['prospek'] = CompanyReqLog::where('company_request_id', $id)->where('status', 'prospek')->count();
    $talentpool['offered'] = CompanyReqLog::where('company_request_id', $id)->where('status', 'offered')->count();
    $talentpool['hired'] = CompanyReqLog::where('company_request_id', $id)->where('status', 'hired')->count();
    $talentpool['reject'] = CompanyReqLog::where('company_request_id', $id)->where('status', 'reject')->count();
    $talentpool['bookmark'] = CompanyReqLog::where('company_request_id', $id)->where('bookmark', 'true')->count();

    $talentkeep = DB::table('company_req_log')
      ->join('talent', 'company_req_log.talent_id', '=', 'talent.talent_id')
      ->select('talent.talent_id', 'talent.talent_name', 'talent.talent_phone', 'talent.talent_email', 'status')
      ->where('company_request_id', $id)
      ->where('bookmark', 'true')
      ->get();

    $total = $this->getTotal(session('user_id'));
    return view('company.requests.detail_request', [
      'active' => 'active',
      'total' => $this->total,
      'total_active_req' => $total['active'],
      'total_nonactive_req' => $total['nonactive'],
      'data' => $company_req,
      'count' => $talentpool,
      'talents' => $talentkeep
    ]);
  }

  public function keepTalent(Request $request)
  {
    $total_bookmark = CompanyReqLog::where('company_request_id', $request->id_request)->where('bookmark', 'true')->count();
    $req_need = CompanyRequest::select('person_needed')->where('company_request_id', $request->id_request)->first();
    if ($total_bookmark < $req_need->person_needed) {
      $talent = CompanyReqLog::where('company_request_id', $request->id_request)->where('talent_id', $request->id_talent)->first();
      if ($talent->bookmark == 'true') {
        return redirect()->route('company.request.detail', $request->id_request)->with([
          'message' => 'Talent telah dibookmark'
        ]);
      } else {
        $talent->bookmark = 'true';
        $talent->save();
        return redirect()->route('company.request.detail', $request->id_request)->with([
          'message' => 'Talent dibookmark'
        ]);
      }
    } else {
      return redirect()->route('company.request.detail', $request->id_request)->with([
        'message' => 'Bookmark mencapai batas'
      ]);
    }
  }

  public function unkeepTalent(Request $request)
  {
    $talent = CompanyReqLog::where('company_request_id', $request->id_request)->where('talent_id', $request->id_talent)->first();
    $talent->bookmark = 'false';
    $talent->save();
    return redirect()->route('company.request.detail', $request->id_request)->with([
      'message' => 'Talent Batal Dibookmark'
    ]);
  }

  public function removeSkillReq($id)
  {
    $skill = SkillRequest::find($id);
    $skill->delete();
    return response()->json([
      'message' => 'Hapus Skill Request Berhasil'
    ]);
  }

  public function changeStatusTalent(Request $request)
  {
    $data = CompanyRequest::select('person_needed')->where('company_request_id', $request->id_request)->first();
    $talent = CompanyReqLog::where('company_request_id', $request->id_request)->where('talent_id', $request->id_talent)->first();
    if ($request->status == 'hired') {
      $hired = CompanyReqLog::where('company_request_id', $request->id_request)->where('status', 'hired')->count();
      if ($hired == $data->person_needed) {
        return response()->json([
          'status' => 'failed',
          'message' => 'Maksimum batas hired telah tercapai',
        ]);
      }
    }
    $talent->status = $request->status;
    $talent->save();
    return response()->json([
      'status' => 'success',
      'message' => 'Status talent telah diubah'
    ]);
  }


  public function change_to_hired(Request $request)
  {
    $request->validate([
      'hire_status' => 'required',
      'work_start_date' => 'required',
    ]);




    $talent = CompanyReqLog::where([
      'company_request_id' => $request->id_request,
      'talent_id' => $request->id_talent
    ])->first();

    $talent->status = 'hired';
    $talent->work_start_date = $request->work_start_date;
    $talent->save();
    return response()->json([
      'status' => 'success',
      'message' => 'Status talent telah diubah'
    ]);
  }



  public function addTalentReq(Request $request)
  {
    $validateData = $request->validate([
      'name_request' => 'required',
    ]);

    $request_id = $request->name_request;
    $talent = $request->talent_id;
    $check = CompanyReqLog::where('company_request_id', $request_id)->where('talent_id', $talent)->count();

    if ($check > 0) {
      return redirect()->route('company.dashboard.talent')->with([
        'message' => 'Talent sudah ada di list request'
      ]);
    } else {
      CompanyReqLog::create([
        'company_request_id' => $request_id,
        'talent_id' => $talent,
        'status' => 'unprocess',
        'bookmark' => 'false'
      ]);

      return redirect()->route('company.dashboard.talent')->with([
        'message' => 'Talent berhasil ditambahkan di request'
      ]);
    }
  }

  public function company_json_CompReq(Request $request)
  {
    $company_req = CompanyRequest::select('company_request_id as id', 'name_request as text', 'name_request as value')->where('company_id', session('user_id'))->when($request->q, function ($q) use ($request) {
      $q->where('name_request', 'like', '%' . $request->q . '%');
    });

    $company_req = $company_req->get();
    return response()->json($company_req);
  }

  public function get_info_req(Request $request)
  {
    $id = $request->id_request;
    $company_req = CompanyRequest::select('person_needed')->where('company_request_id', $id)->first();
    $total_talentpool = CompanyReqLog::where('company_request_id', $id)->count();
    $total_talenthired = CompanyReqLog::where('status', 'hired')->where('company_request_id', $id)->count();
    return response()->json([
      "need" => $company_req->person_needed,
      "total" => $total_talentpool,
      "hired" => $total_talenthired
    ]);
  }

  public function hireTalent(Request $request)
  {
    $company_id = session('user_id');
    $talent_id = $request->talent_id;
    $company_request_id = $request->company_request_id;
    $company_req_log_id = $request->company_req_log_id;
    $check = HireTalent::where('hire_talent_talent_id', $talent_id)->where('hire_talent_company_id', $company_id)->count();

    if ($check > 0) {
      return redirect()->route('company.request.detail', $company_request_id)->with([
        'message' => 'Talent sudah di Hire'
      ]);
    } else {
      HireTalent::create([
        'hire_talent_talent_id' => $talent_id,
        'hire_talent_company_id' => $company_id,
        'hire_talent_company_request_id' => $company_request_id,
        'hire_talent_status_notif' => '1'
      ]);

      return redirect()->route('company.request.detail', $company_request_id)->with([
        'message' => 'Talent berhasil di Hire'
      ]);
    }


    //   return response()->json([
    //     'talent_id' => $talent_id,
    //     'company_id' => $company_id,
    //     'company_request' => $company_request,
    //   ]);
  }

  public function cv()
  {
    return view('CV');
  }
}
