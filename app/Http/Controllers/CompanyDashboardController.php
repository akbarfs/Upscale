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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyDashboardController extends Controller
{

    public function __construct()
    {
      $this->total  = DB::table('talent')->count();
      $this->total_active_req = DB::table('company_request')->where('status_request','active')->count();
      $this->total_nonactive_req = DB::table('company_request')->where('status_request','nonactive')->count();
    }

    public function companyDashboard()
    { 
        return view("company.dashboard", [
            'active' => 'dashboard',
            'total' => $this->total,
            'total_active_req' => $this->total_active_req,
            'total_nonactive_req' => $this->total_nonactive_req
        ]);
    }
  
  public function makeOffer(Request $request)
  {

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

    for($i = 0; $i<$count_skill; $i++){
      $comp_id = $request_id;
      $skill_id = $validateData2['skills'][$i];
      $experience = $validateData2['skill-exp'][$i];
      $skill_req = SkillRequest::create([
        'company_request_id' => $comp_id,
        'skill_id' => $skill_id,
        'experience' => $experience
      ]);
    }

    return redirect()->back();
  }

  public function company_json_skill(Request $request)
  {
      $skill = Skill::select('skill_id as id' ,'skill_name as text', 'skill_name as value')->when($request->q, function($q) use($request){
          $q->where('skill_name','like','%'.$request->q.'%');
      });

      $skill->where('status', 'enable');
      $skill = $skill->get();
      return response()->json($skill);
  }
  
  public function allDatabase()
  {
  
    $domisili = DB::table('location')->get();

    return view('company.talent', [
        'active' => "all",
        'total' => $this->total,
        'total_active_req' => $this->total_active_req,
        'total_nonactive_req' => $this->total_nonactive_req,
        'domisili' => $domisili
    ]);
  }

  public function paginate_data(Request $request)
  {
    $default_query = "*,users.id as user_id, talent.talent_name as name, talent.talent_salary as expetasi, talent.talent_lastest_salary as gaji";

    $data = Talent::select(DB::raw($default_query));
    
    $data = $data->join("users", "talent.user_id","=","users.id","LEFT");

    // Request

    // filter domisili
    if($request->domisili != 'Domisili'){
      $data = $data->where(function($q) use($request){
        $q->where('talent_address', 'like', '%'.$request->domisili.'%')->orWhere('talent_current_address', 'like', '%'.$request->domisili.'%')->orWhere('talent_prefered_city','like','%'.$request->domisili.'%');
      });
    }
    // end filter domisili

    // filter ready kerja
    if($request->readykerja != "Ready Kerja"){
      if($request->readykerja == 'yes'){
        $data = $data->whereIn('talent_available', ['yes','asap']);
      }else{
        $data = $data->whereNotIn('talent_available',['yes','asap']);
      }
    }
    // End Filter ready kerja
    
    // Filter experience in years
    if($request->experience != "Experience In Years"){
      return 'This Filter Still Development';
      $data->where('talent_start_career', '!=',null)->select(DB::raw('DATEDIFF(now(), talent_start_career) as pengalaman'));
      // $data->where('talent_start_career', '!=',null)->whereRaw('DATEDIFF(now(), talent_start_career) / 365.25 ',$request->experience );
      // dd($data->get());
    }
    // End Filter experience in years

    // Filter Education
    if($request->education != "Education"){
      $data = $data->with(['talent_education'])->whereHas('talent_education', function($q) use($request){
        $q->where('edu_level', 'like', '%'.$request->education.'%')->groupBy('edu_talent_id');
      });
    }
    // End Filter Education

    // Filter Gaji Sekarang
    if($request->currsalary != null){
      $currSalary = (int)preg_replace('/[^0-9]/', '', $request->currsalary);
      $data = $data->where(function($q) use($request, $currSalary){
        $q->where('talent_lastest_salary', $currSalary)->orWhere('talent_lastest_salary' , $request->currsalary);
      });
    }
    // End Filter Gaji Sekarang

    // Filter Expetasi Gaji
    if($request->expsalary != null){
      $expSalary = (int)preg_replace('/[^0-9]/', '', $request->expsalary);
      $data = $data->where(function($k) use($request, $expSalary){
        $k->where('talent_salary', $expSalary)->orWhere('talent_salary', $request->expsalary);
      });
    }
    // End Filter Expetasi Gaji

    // Filter Ready Kerja
    if($request->readyluarkota != "Ready Luar Kota"){
      $data = $data->where('talent_luar_kota', $request->readyluarkota);
    }
    // End Filter Ready Kerja

    // Filter Skill
    if($request->skills){
      $data = $data->whereHas('talent_skill', function($o) use($request){
        $o->whereIn('st_skill_id', $request->skills);
      });
    }
    // End Filter Skill

    // Filter User terupdate
    if($request->userupdate == 'yes'){
      $data = $data->orderBy('tupdated_date', 'DESC');
    }else{
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

  public function request_active(Request $request)
  {

    $company_req = DB::table('company_request')->get();

    return view('company.requests.active',[
      'active' => 'active',
      'total' => $this->total,
      'total_active_req' => $this->total_active_req,
      'total_nonactive_req' => $this->total_nonactive_req,
      'data' => $company_req
    ]);
  }

  public function detail_request($id){
    $company_req = DB::table('company_request')->where('company_request_id',$id)->first();

    $skill = DB::table('skill_request')
                ->join('skill','skill_request.skill_id', '=', 'skill.skill_id')
                ->select('skill.skill_name','skill_request.experience')
                ->where('skill_request.company_request_id', $id)
                ->get();
    return response()->json([
      'data' =>$company_req,
      'data2' => $skill
    ]
    );
  }

  public function request_detail(Request $request)
  {
    return view('company.requests.detail_request',[
      'active' => 'active',
      'total' => $this->total,
      'total_active_req' => $this->total_active_req,
      'total_nonactive_req' => $this->total_nonactive_req,
    ]);
  }

  public function table_talent_request(Request $request){
    return view('company.requests.talent-req-table')->render();
  }
}
