<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job_apply;
use App\Models\Skill;
use App\Models\SkillTalent;
use App\Models\Job;
use App\Models\Talent;
use App\Models\Bootcamp;
use App\Models\Location;
use Image;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Rules\Captcha;
use Session ; 
use App\Models\User ; 

class applyController extends Controller
{
    public function index($id)
    {
        $user = null;
        if ( Session::has("login") && session('email') && !$user)
        {
            $email  = Session::get("email");
            $user   = User::where('username',session('username'))->first();
        }

        $skill     = Skill::all();
        // $bootcamps = Bootcamp::all();
        $location  = Location::all();
        $apply     = Job::where('jobs_id', '=', $id)->first();

    	  return view('career/apply', compact('skill','apply', 'location','user'));
    }

    public function in($id)
    {
        $bootcamps = Bootcamp::all();
        $location  = Location::all();
        $apply     = Job::where('jobs_id', '=', $id)->first();

        return view('career/applyin', compact('apply','bootcamps', 'location'));
    }

    public function inkeep($id)
    {
        $bootcamps = Bootcamp::all();
        $location  = Location::all();
        $apply     = Job::where('jobs_id', '=', $id)->first();

        return view('career/applyinkeep', compact('apply','bootcamps', 'location'));
    }

    public function storeinkeep(Request $request, $id)
    {
      // die('udah masuk');
      $cv = Input::file('cv');
      $filecv = base64_encode(file_get_contents($cv->getRealPath()));

      if(Input::hasFile('filepp'))
      {
          $f = Input::file('filepp');
          $filepp = base64_encode(file_get_contents($f->getRealPath()));
      }
      else
      {   $filepp = '';   }

      if($request->type == 'internship')
      { $periode = $request->input('range'); }
      else
      { $periode = ''; }

      $apply                            = Job::where('jobs_id', '=', $id)->first();

      $talent                         = new Talent;
      $talent->talent_name            = $request->input('name');
      $talent->talent_condition       = 'unprocess';
      $talent->talent_phone           = $request->input('phone');
      $talent->talent_email           = $request->input('email');
      $talent->talent_gender          = $request->input('gender');
      $talent->talent_place_of_birth  = $request->input('place');
      $talent->talent_birth_date      = $request->input('tgl');
      $talent->talent_address         = $request->input('address');
      $talent->talent_salary          = $request->input('es');
      $talent->talent_cv              = $filecv;
      $talent->talent_portfolio       = $request->input('pp');
      $talent->talent_portofolio_file = $filepp;
      $talent->talent_campus          = $request->input('campus');
      $talent->talent_skill           = $request->input('skill');
      $talent->talent_status          = 'worker';
      $talent->talent_location_id     = 12;
      $talent->save();
      $id = $talent->talent_id;
      

      // CONV CV TO FILE
      $this->convtofile($id);


      $data                             = new Job_apply;
      $data->jobs_apply_jobs_id         = $apply->jobs_id;
      $data->jobs_apply_talent_id       = $id;
      $data->jobs_apply_type_time       = $request->input('type');
      $data->jobs_apply_created_date    = Carbon::now();
      $data->jobs_apply_status          = 'keep';
      $data->jobs_apply_name            = $request->input('name');
      $data->jobs_apply_place_of_birth  = $request->input('place');
      $data->jobs_apply_gender          = $request->input('gender');
      $data->jobs_apply_phone           = $request->input('phone');
      $data->jobs_apply_email           = $request->input('email');
      $data->jobs_apply_birth_date      = $request->input('tgl');
      $data->jobs_apply_current_address = $request->input('address');
      $data->jobs_apply_location        = $request->input('jobs_location');
      $data->jobs_apply_detail          = $request->input('detail');
      $data->jobs_apply_internal        = "YES";
      $data->jobs_apply_apply           = $request->input('apply');
      $data->jobs_apply_cv              = $filecv;
      $data->jobs_apply_portofolio      = $request->input('pp');
      $data->jobs_apply_portofolio_file = $filepp;
      $data->jobs_apply_information     = $request->input('info');
      // $data->jobs_apply_image        = base64_encode($imageStr);
      $data->jobs_apply_campus          = $request->input('campus');
      $data->jobs_apply_skill           = $request->input('skill');
      $data->jobs_apply_periode         = $periode;
      $data->jobs_apply_expected_salary = $request->input('es');
      $data->save();
      
      $token = $request->input('g-recaptcha-response');
      if ($token){
        return redirect(route('successapply'))->with(['success' => 'Your apply successfully submitted.']);
      } else {
        return redirect('/');
      }

      
    }

    public function storein(Request $request, $id)
    {
      // die('udah masuk');
      $cv = Input::file('cv');
      $filecv = base64_encode(file_get_contents($cv->getRealPath()));

      if(Input::hasFile('filepp'))
      {
          $f = Input::file('filepp');
          $filepp = base64_encode(file_get_contents($f->getRealPath()));
      }
      else
      {   $filepp = '';   }

      if($request->type == 'internship')
      { $periode = $request->input('range'); }
      else
      { $periode = ''; }

      $apply                            = Job::where('jobs_id', '=', $id)->first();

      $talent                         = new Talent;
      $talent->talent_name            = $request->input('name');
      $talent->talent_condition       = 'unprocess';
      $talent->talent_phone           = $request->input('phone');
      $talent->talent_email           = $request->input('email');
      $talent->talent_gender          = $request->input('gender');
      $talent->talent_place_of_birth  = $request->input('place');
      $talent->talent_birth_date      = $request->input('tgl');
      $talent->talent_address         = $request->input('address');
      $talent->talent_salary          = $request->input('es');
      $talent->talent_cv              = $filecv;
      $talent->talent_portfolio       = $request->input('pp');
      $talent->talent_portofolio_file = $filepp;
      $talent->talent_campus          = $request->input('campus');
      $talent->talent_skill           = $request->input('skill');
      $talent->talent_status          = 'worker';
      $talent->talent_location_id     = 12;
      $talent->save();
      $id = $talent->talent_id;

      // CONV CV TO FILE
      $this->convtofile($id);


      $data                             = new Job_apply;
      $data->jobs_apply_jobs_id         = $apply->jobs_id;
      $data->jobs_apply_talent_id       = $id;
      $data->jobs_apply_type_time       = $request->input('type');
      $data->jobs_apply_created_date    = Carbon::now();
      $data->jobs_apply_status          = 'unprocess';
      $data->jobs_apply_name            = $request->input('name');
      $data->jobs_apply_place_of_birth  = $request->input('place');
      $data->jobs_apply_gender          = $request->input('gender');
      $data->jobs_apply_phone           = $request->input('phone');
      $data->jobs_apply_email           = $request->input('email');
      $data->jobs_apply_birth_date      = $request->input('tgl');
      $data->jobs_apply_current_address = $request->input('address');
      $data->jobs_apply_location        = $request->input('jobs_location');
      $data->jobs_apply_detail          = $request->input('detail');
      $data->jobs_apply_internal        = "YES";
      $data->jobs_apply_cv              = $filecv;
      $data->jobs_apply_portofolio      = $request->input('pp');
      $data->jobs_apply_portofolio_file = $filepp;
      $data->jobs_apply_information     = $request->input('info');
      // $data->jobs_apply_image        = base64_encode($imageStr);
      $data->jobs_apply_campus          = $request->input('campus');
      $data->jobs_apply_skill           = $request->input('skill');
      $data->jobs_apply_periode         = $periode;
      $data->jobs_apply_expected_salary = $request->input('es');
      $data->save();

      $token = $request->input('g-recaptcha-response');
      if ($token){
        return redirect(route('successapply'))->with(['success' => 'Your apply successfully submitted.']);
      } else {
        return redirect('/');
      }
    }

    public function store(Request $request, $id)
    {
         
         if ( !Session::get("user_id"))
         {
            return back() ;
         }

          // $token = $request->input('g-recaptcha-response');
          $token = true ; 
          if ($token)
          {
            
            $hariini = Carbon::now()->format('dmY');

            $cv = $request->file('cv');
            if ($cv)
            {
                $extension = $cv->getClientOriginalExtension(); 
                $namecv = 'cv-'.$request->name."_".uniqid().'.'.$extension;
                $path = $cv->storeAs('public/Curriculum Vitae',$namecv);
            }
            
  
            $namepp = '';
            $pp = $request->file('filepp');
            if ( $pp )
            {
                $namepp = 'porto-'.$request->name."_".uniqid().'.'.$pp->getClientOriginalExtension();
                $path2 = $pp->storeAs('public/Portfolio',$namepp);
            }
            

            $coba = str_split($request->phone);

            if($coba[0]==='0')
            {
                $patternzero ='/^\0?\d\s?/m';
                $phone = preg_replace($patternzero,'',$request->phone);
            }
            else
            {
                $pattern='/^\+?\d.\s?/m';
                $phone = preg_replace($pattern,'',$request->phone);    
            }

            $req = $request;
            $this->saveapply($req,$id,$phone,$namecv,$namepp);

            return redirect(route('successapply'));
          } 
          else 
          {
            return redirect()->back()->with(['failed' => 'Selesaikan Captcha']);
          }
    }

    private function saveapply($request,$id,$nophone,$namecv,$namepp)
    {
    
        $now = Carbon::now('Asia/Jakarta');
        
        
        $user_id = Session::get("user_id"); 
        $user = User::find($user_id) ; 
        $talent_id = $user->talent->talent_id ;

        //update talent terbaru
        $updateTalent = Talent::where("talent_id",$talent_id)->first(); 
        
        $updateTalent->talent_cv_update       = $namecv;
        $updateTalent->portfolio_update       = $namepp;
        $updateTalent->talent_location_id     = 12;
        
        if ( $request->input('kerja') == 'ya')
        {
            $updateTalent->talent_date_ready  = $request->ready_pindah;
        }
        else
        {
            $updateTalent->talent_date_ready  = $request->ready_mulai;
        }

        $updateTalent->update();


        $data                             = new Job_apply;
        $apply                            = Job::where('jobs_id', '=', $id)->first();

        if($request->type == 'internship')
        { 
          $periode = $request->input('range'); 
        }
        else
        { 

          $periode = NULL; 
        }

        $data->jobs_apply_jobs_id         = $apply->jobs_id;
        $data->jobs_apply_talent_id       = $talent_id;
        $data->jobs_apply_type_time       = $request->input('type');
        $data->jobs_apply_created_date    = Carbon::now();
        $data->jobs_apply_status          = 'unprocess';
        $data->jobs_apply_name            = $request->input('name');
        $data->jobs_apply_place_of_birth  = $request->input('place');
        $data->jobs_apply_gender          = $request->input('gender');
        $data->jobs_apply_phone           = $nophone;
        $data->jobs_apply_email           = $request->input('email');
        $data->jobs_apply_birth_date      = $request->input('tgl');
        $data->jobs_apply_current_address = $request->input('address');
        $data->jobs_apply_location        = $request->input('jobs_location');
        $data->jobs_apply_information     = $request->input('info');
        // $data->jobs_apply_image        = base64_encode($imageStr);
        $data->jobs_apply_campus          = $request->input('campus');
        $data->jobs_apply_skill           = $request->input('skill');
        $data->jobs_apply_periode         = $periode;
        $data->jobs_apply_expected_salary = $request->input('es');
        $data->created_date               = $now;
        $data->save();

    }

}
