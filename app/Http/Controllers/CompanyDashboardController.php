<?php

namespace App\Http\Controllers;

use App\Models\education;
use App\Models\portfolio;
use App\Models\Skill;
use App\Models\SkillTalent;
use App\Models\Talent;
use App\Offer;
use App\OfferLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyDashboardController extends Controller
{

    public function __construct()
    {
      $this->total  = DB::table('talent')->count();
    }

    public function companyDashboard()
    {

        // $user_id = Session::get("user_id"); 
        // $user = Company::find($user_id);   
        // $talent = $user->talent; 

        return view("company.dashboard", [
            'active' => 'dashboard',
            'total' => $this->total
        ]);
    }
  
  public function makeOffer(Request $request)
  {
    $company = $request->session()->get('user_id');
    dd($request->all());

    $validateData = $request->validate([
      'position' => 'required',
      'description' => 'required',
      'benefit' => 'required',
      'salary' => 'required',
      'duration_contract' => 'required|integer|min:0',
      'type_work' => 'required'
    ]);

    $validateData['salary'] = preg_replace('/[^0-9]/', '', $request->salary);

    $validateData['type_offer'] = 'all';
    $validateData['company_id'] = $company;

    if($request->type_offer === 'on'){
      $validateData['type_offer'] = 'spesifik';

      // Create Offer
      $offer = Offer::create($validateData);
      $offer_id = $offer->offer_id;

      $talents = Talent::select('talent_id');

      // FILTER
      
      // domisili
        $talentDomisili = [];
        if($request->domisili){
          $talentDomisili = Talent::where(function($q) use($request){
            $q->where('talent_address', 'like', '%'.$request->domisili.'%')->orWhere('talent_current_address', 'like', '%'.$request->domisili.'%')->orWhere('talent_prefered_city','like','%'.$request->domisili.'%');
          })->pluck('talent_id')->toArray();
        }
      // end domisili

      // ready kerja
        if($request->readkerja == 'yes'){
          $talentReady = Talent::whereIn('talent_available', ['yes','asap'])->pluck('talent_id')->toArray();
        }else{
          $talentReady = Talent::where('talent_available', '!=','yes')->pluck('talent_id')->toArray();
        }
      // end ready kerja

      // userUpdate
        $talentUpdate = [];
        if($request->userupdate == 'yes'){
          $talentUpdate = Talent::where('tupdated_date', '>=', Carbon::now()->subMonth(1)->toDateTimeString())->pluck('talent_id')->toArray();
        }
      // end userUpdate
      
      // // experience
      // $talentExperience = [];
      // if($request->experience == 'More Then 10 Years'){
      //   $talentExperience = Talent::select(['talent_id'])->where('talent_totalexperience', 'like','%'.''.'%')->get()->toArray();
      // }elseif($request->experience == '5 - 10 Years'){
      //   return '5-10';
      // }elseif($request->experience == '3 - 5 Years'){
      //   return '3-5';
      // }elseif($request->experience == '1 - 3 Years'){
      //   return '1-3';
      // }elseif($request->experience == 'Less Then 1 Years'){
      //   return '<1';
      // }

      // dd($talentExperience);

      // skill
        $skills = $request->skill;
        
        $talentSkill = [];
        if($skills){
          $talentSkill = SkillTalent::where('st_skill_verified', 'YES')->whereIn('st_skill_id', $skills)->groupBy('st_talent_id')->pluck('st_talent_id')->toArray();
        }
      // End Skill

      // Onsite
        if($request->onsite == 'yes'){
          $talentOnSite = Talent::where('talent_luar_kota', 'yes')->where(function($q){
            $q->where('talent_onsite_jakarta', 'yes')->orWhere('talent_onsite_jogja', 'yes');
          })->pluck('talent_id')->toArray();
        }else{
          $talentOnSite = Talent::where(function($q){
            $q->where('talent_remote', '!=', 'no');
          })->pluck('talent_id')->toArray();
        }
      // End Onsite
      
      // ExpSalary - CurrSalary
        $talentSalary = [];
        if($request->expsalary && $request->currsalary){
          $expSalary = (int)preg_replace('/[^0-9]/', '', $request->expsalary);
          $currSalary = (int)preg_replace('/[^0-9]/', '', $request->currsalary);
          $talentSalary = Talent::whereBetween('talent_salary', [$expSalary,$currSalary])->pluck('talent_id')->toArray();
        }
      // End ExpSalary - CurrSalary       

      // Education
        $talentEdu = [];
        if($request->education != 'none'){
          $talentEdu = education::where('edu_level', 'like','%'.$request->education.'%')->groupBy('edu_talent_id')->pluck('edu_talent_id')->toArray();
        }
      // End Education   

      // Type = full, part, intern
        
      // End Type

      // Exec offerlog
        $allTalent = array_merge($talentDomisili,$talentEdu, $talentOnSite, $talentSalary, $talentReady, $talentUpdate, $talentSkill);
        $allTalent = array_unique($allTalent);

        $allTalent = DB::table('talent')->select(['talent'])->get()->toArray();
        foreach($allTalent as $tal){
          OfferLog::create([
            'offer_id' => $offer_id,
            'talent_id' => $tal->talent_id
          ]);
        }
      // End Exec Offerlog

      // dd($request->all(),$allTalent);
    }
    else{

      // Create Offer
      $offer = Offer::create($validateData);
      $offer_id = $offer->offer_id;

      // Create Offer_log
      $allTalent = DB::table('talent')->select(['talent_id'])->get()->toArray();
      foreach($allTalent as $talent){
          OfferLog::create([
            'offer_id' => $offer_id,
            'talent_id' => $talent->talent_id
          ]);
      }
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
   
    $talents = Talent::orderBy('talent_id', "DESC")->paginate(10);

    return view('company.talent', [
        'talents' => $talents,
        'active' => "all",
        'total' => $this->total
    ]);
  }

  public function paginate_data(Request $request)
  {
    $default_query = "*,users.id as user_id, talent.talent_name as name, talent.talent_salary as expetasi, talent.talent_lastest_salary as gaji";

    $data = Talent::select(DB::raw($default_query));
    
    $data = $data->join("users", "talent.user_id","=","users.id","LEFT");

    // Request

    // End Request

    $data = $data->orderBy('talent_id', "DESC")->groupBy("talent_id");
    $data = $data->paginate(5);

    return view('company.table', [
        'data' => $data
    ])->render();
  }

  public function request_active(Request $request)
  {
    return view('company.requests.active',[
        'active' => 'active',
        'total' => $this->total
    ]);
  }
}
