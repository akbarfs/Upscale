<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session; 
use App\Models\Talent ; 
use App\Models\Skill ; 
use App\Models\SkillTalent ;  
use Illuminate\Support\Facades\Hash;
use Log ; 
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\work_experience; 
use App\Models\education; 
use App\Models\portfolio; 
use Storage ;
use Image ; 

class MemberController extends Controller
{
    public function talentDashboard()
    {
    	$user_id = Session::get("user_id"); 
    	$user = User::find($user_id); 
    	$talent = $user->talent; 

    	return view("talent.profile",compact('user','talent'));
    }

    public function loadRegisterTalent()
    {
        return view("front.register_talent"); 
    }

    public function regTalentStep1(Request $request)
    {
        $this->validate ($request,[
            'name'         => 'required|min:3|max:25|string',
            'username'     => 'required|min:3|max:20|string|unique:users,username',
            'email'        => 'required|string|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'phone_number' => 'required|max:15|phone_number|digits_between:5,15',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required|min:3|max:25',
        ]); 

        

        //PROSES INSERT DATABASE talent
        $talent = Talent::where('talent_email',$request->email);
        if ($talent->count() == 0)
        {

            $data = [
                    'talent_name' =>$request->name,
                    'talent_condition' =>'unprocess',
                    'talent_phone'=>$request->phone_number,
                    'talent_email'=>$request->email, 
                    'talent_place_of_birth' => $request->tempat_lahir,
                    'talent_birth_date'=>$request->tgl_lahir,
                    'talent_gender' => $request->gender,
                    'talent_last_active' => date("Y-m-d H:i:s"),
                    'talent_la_type' =>'register step 1'
            ];

            $talent = Talent::create($data); 

        }

        return response()->json(array("message"=>"success","status"=>1));
    }

    public function registerTalent(Request $request)
    {
        $this->validate ($request,[
            'name'         => 'required|min:3|max:25|string',
            'username'     => 'required|min:3|max:20|string|unique:users,username',
            'email'        => 'required|string|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'phone_number' => 'required|max:15|phone_number|digits_between:5,15',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            // 'skill_1' => '',
            // 'skill_2' => '',
            // 'skill_2' => '',
            'fulltime_rate' => 'sometimes|format_rp',
            // 'talent_address' => 'sometimes|min:3|max:25|',
            // 'talent_prefered_location' => 'sometimes|min:3|max:25|',
            // 'talent_date_ready' => 'sometimes|string',
            // 'talent_available' => 'sometimes|string',


            'freelance_hour' => 'sometimes|format_rp',
            'freelance_min' => 'sometimes|format_rp',
            'freelance_max' => 'sometimes|format_rp',
            'konsultasi_rate' => 'sometimes|format_rp',
            'ngajar_rate' => 'sometimes|format_rp',
        ]);

        //PROSES INSERT DATABASE USER
        $user = [
            'name'         => $request->name,
            'username'     => $request->username,
            'email'        => $request->email,
            'password'     => Hash::make($request["password"]),
            'phone_number' => $request->phone_number,
            'level'         => 'talent',
        ];

        $result = User::create($user);

        if ( isset($request->karir_tahun) && isset($request->karir_bulan) )
        {
            $start_career = $request->karir_tahun."-".$request->karir_bulan."-01"; 
        }
        else
        {
            $start_career = '0000-00-00'; 
        }

        //PROSES INSERT DATABASE TALENT
        $data = [
                'user_id'  =>$result->id,
                'talent_name' =>$request->name,
                'talent_condition' =>'unprocess',
                'talent_phone'=>$request->phone_number,
                'talent_email'=>$request->email, 
                'talent_gender'=>$request->gender,
                'talent_birth_date'=>$request->tgl_lahir,
                'talent_salary'=>$request->fulltime_rate,
                'talent_location_id'=>12,
                'talent_gender' => $request->gender,
                'talent_place_of_birth' => $request->tempat_lahir,
                'talent_birth_date' => $request->tgl_lahir,
                'talent_salary' =>  preg_replace('/[^0-9]/', '', $request->fulltime_rate),

                'talent_address' => $request->talent_address,
                'talent_prefered_city' => $request->talent_prefered_city,
                'talent_date_ready' => $request->talent_date_ready,
                'talent_available' => $request->talent_available,

                'talent_freelance_hour' =>  preg_replace('/[^0-9]/', '', $request->freelance_hour),
                'talent_project_min' =>  preg_replace('/[^0-9]/', '', $request->freelance_min),
                'talent_project_max' =>  preg_replace('/[^0-9]/', '', $request->freelance_max),
                'talent_konsultasi_rate' =>  preg_replace('/[^0-9]/', '', $request->konsultasi_rate),
                'talent_ngajar_rate' =>  preg_replace('/[^0-9]/', '', $request->ngajar_rate),

                'talent_international' => $request->talent_international,
                'talent_start_career'   => $start_career,
                "talent_level"=>$request->talent_level,
                "talent_focus"=>$request->talent_focus,
                "talent_luar_kota"=>$request->luar_kota_option,

                "talent_onsite_jakarta" => $request->talent_onsite_jakarta ? $request->talent_onsite_jakarta : "" ,
                "talent_onsite_jogja" => $request->talent_onsite_jogja ? $request->talent_onsite_jogja : "" ,
                "talent_remote" => $request->talent_remote ? $request->talent_remote : "",
                "talent_isa" => $request->talent_isa ? $request->talent_isa : "unset",

                'talent_salary_jogja'   =>preg_replace('/[^0-9]/', '', $request->salary_jogja),
                'talent_salary_jakarta' =>preg_replace('/[^0-9]/', '', $request->salary_jakarta),
                'talent_current_work'   =>$request->talent_current_work,
                'talent_last_active'   =>date("Y-m-d H:i:s"),
                'talent_la_type'        => 'register', 
                'talent_last_active'    => date("Y-m-d H:i:s") 
        ];

        $talent = Talent::updateOrCreate(["talent_email"=>$request->email],$data); 

        // proses insert skill
        $skill_1 = explode(",",$request->skill_1);
        $this->_insertSkill($skill_1,1,$talent->talent_id); 

        $skill_2 = explode(",",$request->skill_2);
        $this->_insertSkill($skill_2,2,$talent->talent_id); 

        $skill_3 = explode(",",$request->skill_3);
        $this->_insertSkill($skill_3,3,$talent->talent_id); 

        $skill_4 = explode(",",$request->skill_4);
        $this->_insertSkill($skill_4,4,$talent->talent_id); 

        $skill_5 = explode(",",$request->skill_5);
        $this->_insertSkill($skill_5,5,$talent->talent_id); 

        Session::put('user_id',$result->id);
        Session::put('username',$request->username);
        Session::put('email',$request->email);
        Session::put('level',$request->level);
        Session::put('login',TRUE);

        return response()->json(array("message"=>"success","status"=>1));
    }

    public function _insertSkill($array,$cat,$talent_id)
    {
        foreach($array as $row)
        {
            if ($row != "")
            {
                //get skill id 
                $skill = Skill::where("skill_name",$row)->first() ; 

                //klo ga di table list ada buat baru 
                if ( !$skill )
                {
                    $skill = Skill::create(array('skill_name'=>$row,'skill_sc_id'=>$cat));
                }

                //nambahin
                $insert_skill = array(
                                    'st_talent_id'=> $talent_id,
                                    'st_skill_id'=> $skill->skill_id,
                                    'st_skill_verified'=> 'NO',
                                    'st_input_admin'=> 'NO',
                                );

                SkillTalent::updateOrCreate([
                                                'st_talent_id'=> $talent_id,
                                                'st_skill_id'=> $skill->skill_id
                                            ],$insert_skill);
            }
            
        }
    }
    public function updateProfile(Request $request)
    {
        $this->validate ($request,[
            'name' => 'required|min:3|max:25|string',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            // 'skill_1' => '',
            // 'skill_2' => '',
            // 'skill_2' => '',
            'fulltime_rate' => 'sometimes|format_rp',
            'freelance_hour' => 'sometimes|format_rp',
            'freelance_min' => 'sometimes|format_rp',
            'freelance_max' => 'sometimes|format_rp',
            'konsultasi_rate' => 'sometimes|format_rp',
            'ngajar_rate' => 'sometimes|format_rp',
        ]);


        $data = [
                'talent_gender' => $request->gender,
                'talent_birth_date' => $request->tgl_lahir,
                'talent_salary' => $request->fulltime_rate,

                'talent_freelance_hour' => 'sometimes|format_rp',
                'talent_project_min' => 'sometimes|format_rp',
                'talent_project_max' => 'sometimes|format_rp',
                'talent_konsultasi_rate' => 'sometimes|format_rp',
                'talent_ngajar_rate' => 'sometimes|format_rp',
        ];



        return response()->json(array("message"=>"success","status"=>1));
    }

    public function json_skill(Request $request)
    {
        // $json[] = array('id'=>2,'label'=>"laravel","value"=>"laravel");
        
        $skill = Skill::select('skill_name as text','skill_name as value') ; 

        if ($request->cat_id > 0)
        {
            $skill->where("skill_sc_id",$request->cat_id);
        }
        else if ( $request->cat_id == 'other')
        {
            $skill->where("skill_sc_id","!=",1);
            $skill->where("skill_sc_id","!=",2);
        }
        $skill->where('status','enable');
        $skill  = $skill->get() ;

        return response()->json($skill) ; 
    }

    public function doLogout()
    {
    	Session::flush();
        return redirect("/");
    }

    public function profile($id="")
    {
        if ( $id == "" )
        {
            $id = Session::get("user_id"); 
        }
        
        $user = User::findOrFail($id); 
        $talent = $user->talent()->first(); 
        return view("member.profile",compact('talent'));   
    }

    public function editBasic()
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first(); 
       
        return view("member.editBasicProfile", compact('talent'));
    }

    public function editBasicPost(Request $request)
    {
        $this->validate($request, [
            'photo' => 'max:500|sometimes|mimes:jpeg,png,jpg,JPG,JPEG',
            'name' => 'required|min:3',
            'phone' => 'required',
            'address'=> 'required',
            'gender'=> 'required',
            'phone'=> 'required'
        ]);

        $id = Session::get("user_id"); 
        $user = User::find($id); 
        $talent = $user->talent()->first(); 


        $update = Talent::find($talent->talent_id); 

        $photo = $request->file('photo');
        if ($photo)
        {
            $extension = $photo->getClientOriginalExtension(); 
            $filename = 'profile-'.$id.'.'.$extension;

            $image_resize = Image::make($photo->getRealPath());              
            $image_resize->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/storage/photo/' .$filename));
        }

        
        
        $update['talent_name'] = $request->name ; 
        $update['talent_profile_desc'] = $request->profile_desc ; 
        $update['talent_salary'] = preg_replace('/[^0-9]/', '', $request->salary) ; 
        $update['talent_salary_jogja'] = preg_replace('/[^0-9]/', '', $request->salary_jogja) ; 
        $update['talent_salary_jakarta'] = preg_replace('/[^0-9]/', '', $request->salary_jakarta) ; 
        $update['talent_prefered_city'] = $request->prefered_city ; 
        $update['talent_focus'] = $request->focus ; 
        $update['talent_level'] = $request->level ; 
        $update['talent_phone'] = $request->phone ; 
        $update['talent_address'] = $request->address; 
        $update['talent_gender'] = $request->gender; 
        $update['talent_phone'] = $request->phone; 
        $update['talent_luar_kota'] = $request->luar_kota; 
        $update['talent_onsite_jakarta'] = $request->onsite_jakarta; 
        $update['talent_onsite_jogja'] = $request->onsite_jogja; 
        $update['talent_remote'] = $request->remote; 
        $update['talent_international'] = $request->international; 
        $update['talent_current_work'] = $request->current_work; 
        $update['talent_isa'] = $request->isa; 
        $update['talent_web'] = $request->website ; 
        $update['talent_linkedin'] = $request->linkedin ; 
        $update['talent_facebook'] = $request->facebook ; 
        $update['talent_instagram'] = $request->instagram ; 
        $update['talent_twitter'] = $request->twitter ; 
        $update['talent_freelance_hour'] = preg_replace('/[^0-9]/', '', $request->freelance_hour) ; 
        $update['talent_project_min'] = preg_replace('/[^0-9]/', '', $request->project_min) ; 
        $update['talent_project_max'] = preg_replace('/[^0-9]/', '', $request->project_max) ; 
        $update['talent_konsultasi_rate'] = preg_replace('/[^0-9]/', '', $request->konsultasi_rate) ; 
        $update['talent_ngajar_rate'] = preg_replace('/[^0-9]/', '', $request->ngajar_rate) ; 
        $update->save(); 

        if ( $photo )
        {
            return redirect('member/crop-photo/');
        }
        else
        {
            return back()->with("message","berhasil mengupdate"); ;
        }


    }

    public function editEducation()
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first();
        $education = $talent->talent_education();

        return view("member.editEducation",compact('talent','education'));
    }

    public function editEducationPost(Request $request)
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first();

        $jumlah = count($request->edu_name);
        if ( $jumlah > 0 )
        {
            $this->validate($request, [
                'edu_name.*' => 'required|min:3'
            ]);
            //hpaus semua 
            education::where("edu_talent_id",$talent->talent_id)->delete(); 
            //insert baru   
            for ( $i=0 ; $i<$jumlah ; $i++)
            {
                if ( isset($request->edu_name[$i]) && $request->edu_name[$i] != '' )
                {
                
                    $education = New education; 
                    $education->edu_talent_id = $talent->talent_id ; 
                    $education->edu_name = $request->edu_name[$i] ? $request->edu_name[$i] : "" ; 
                    $education->edu_level  = $request->edu_level[$i] ? $request->edu_level[$i] : "" ; 
                    $education->edu_datestart = $request->edu_start_date[$i] ? $request->edu_start_date[$i] : "" ; 
                    $education->edu_dateend = $request->edu_end_date[$i] ? $request->edu_end_date[$i] : "" ; 
                    $education->edu_field = $request->edu_field[$i] ? $request->edu_field[$i] : "" ; ;
                    $education->save() ; 
                }
                
            }
        }
        return back()->with("message","berhasil mengupdate"); ;
    }

    public function editEducationDelete($id)
    {
        $education = education::find($id); 
        $education->delete(); 
        return back()->with("message","berhasil menghapus") ; 
    }

    public function editWork()
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first();
        $work = $talent->talent_workex();

        return view("member.editWork",compact('talent','work'));
    }

    public function editWorkPost(Request $request)
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first();

        $jumlah = count($request->name);
        if ( $jumlah > 0 )
        {
            $this->validate($request, [
                'name.*' => 'required|min:3'
            ]);
            //hpaus semua 
            work_experience::where("workex_talent_id",$talent->talent_id)->delete(); 
            //insert baru   
            for ( $i=0 ; $i<$jumlah ; $i++)
            {
                if ( isset($request->name[$i]) && $request->name[$i] != '' )
                {
                    $work = New work_experience; 
                    $work->workex_talent_id = $talent->talent_id ; 
                    $work->workex_office  = $request->name[$i] ? $request->name[$i] : "" ; 
                    $work->workex_position = $request->position[$i] ? $request->position[$i] : "" ; 
                    $work->workex_startdate = $request->tglmulai[$i] ? $request->tglmulai[$i] : "";
                    $work->workex_enddate = $request->tglselesai[$i] ? $request->tglselesai[$i] : "";
                    $work->workex_desc = $request->desc[$i] ? $request->desc[$i] : ""; 
                    $work->workex_handle_project = $request->project[$i] ? $request->project[$i] : ""; 
                    $work->save() ; 
                }
                
            }
        }
        return back()->with("message","berhasil mengupdate"); ;

    }

    public function editWorkDelete($id)
    {
        $work = work_experience::find($id); 
        $work->delete(); 
        return back()->with("message","berhasil menghapus") ; 
    }

    public function editSkill()
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first(); 
       
        return view("member.editSkill",compact('talent'));
    }

    public function editSkillPost(Request $request)
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first();

        $skill_1 = explode(",",$request->skill_1);
        $this->_insertSkill($skill_1,1,$talent->talent_id); 

        $skill_2 = explode(",",$request->skill_2);
        $this->_insertSkill($skill_2,2,$talent->talent_id); 

        $skill_3 = explode(",",$request->skill_3);
        $this->_insertSkill($skill_3,3,$talent->talent_id); 

        $skill_4 = explode(",",$request->skill_4);
        $this->_insertSkill($skill_4,4,$talent->talent_id); 

        $skill_5 = explode(",",$request->skill_5);
        $this->_insertSkill($skill_5,5,$talent->talent_id); 

        return back()->with("message","berhasil menambah skill") ; 
    }

    public function updateSkill(Request $request)
    {
        $st_id = $request->st_id ; 
        $level = $request->level ; 
        $st = SkillTalent::find($st_id); 
        $st->st_level = $level ; 

        if ( $level == 'beginer')
        {
            $st->st_score = 1 ; 
        } 
        else if ( $level == 'intermediate')
        {
            $st->st_score = 3;
        }
        else if ( $level == 'senior')
        {
            $st->st_score = 5 ; 
        }

        $st->save() ; 

        return response()->json(['status'=>1,'message'=>'berhasil']);
    }

    public function editCv()
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first(); 

        return view("member.editCv",compact('talent'));
    }

    public function postCv(Request $request)
    {
        $this->validate($request, [
            'cv' => 'required|max:2000|mimes:pdf,PDF',
        ]);

        $id = Session::get("user_id"); 
        $user = User::find($id); 
        $talent = $user->talent()->first(); 


        $update = Talent::find($talent->talent_id); 

        $cv = $request->file('cv');
        if ($cv)
        {
            $extension = $cv->getClientOriginalExtension(); 
            $namecv = 'cv-'.$talent->talent_name."_".$talent->talent_id.'.'.$extension;
            $path = $cv->storeAs('public/Curriculum Vitae',$namecv);
            $update['talent_cv_update'] = $namecv ;
            $update->save();

            return back(); 
        }
    }

    public function editPorto()
    {
        $id = Session::get("user_id"); 

        $user = User::find($id); 
        $talent = $user->talent()->first(); 

        return view("member.editPorto",compact('talent'));
    }

    public function postPorto(Request $request)
    {
        $this->validate($request, [
            'screenshoot' => 'max:500|sometimes|mimes:jpeg,png,jpg,JPG,JPEG',
            'project_name' => 'required'
        ]);

        $id = Session::get("user_id"); 
        $user = User::find($id); 
        $talent = $user->talent()->first(); 

        $screenshoot = $request->file('screenshoot');
        if ($screenshoot)
        {
            $extension = $screenshoot->getClientOriginalExtension(); 
            $filename = 'screenshoot-'.$request->project_name."_".$talent->talent_id.'.'.$extension;
            // $path = $screenshoot->storeAs('public/Project Portfolio',$filename);
            // $porto['portfolio_image'] = $filename ; 

            $image_resize = Image::make($screenshoot->getRealPath());              
            $image_resize->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/storage/Project Portfolio/' .$filename));
            
            $porto = New portfolio;
            $porto['portfolio_talent_id'] = $talent->talent_id; 
            $porto['portfolio_name'] = $request->project_name ? $request->project_name : '' ; 
            $porto['portfolio_desc'] = $request->desc ? $request->desc : ''; 
            $porto['portfolio_tech'] = $request->tect ? $request->tect : ''; 
            $porto['portfolio_image'] = $filename ; 
            $porto['portfolio_link'] = $request->link ? $request->link : '' ; 
            $porto['portfolio_date_created'] = date("Y-m-d H:i:s") ; 
            $porto['portfolio_date_updated'] = date("Y-m-d H:i:s") ;  
            $porto['portfolio_tipe_project'] = $request->typeproject ? $request->typeproject : '' ; 
            $porto['portfolio_namacompany'] = $request->office ? $request->office : '' ; 
            $porto['portfolio_startdate'] = $request->date_start ? $request->date_start : '' ; 
            $porto['portfolio_enddate'] = $request->date_end ? $request->date_end : '' ; 

            $porto->save();

            return redirect('member/crop-porto/'.$porto->portfolio_id);
            // return back()->with('message','berhasil mengupload portfolio'); 
        }
    }

    public function portoDelete($id)
    {
        $porto = portfolio::find($id); 
        Storage::delete("public/Project Portfolio/".$porto->portfolio_image) ;
        $porto->delete();

        return back()->with("message","berhasil menghapus data") ; 
    }

    public function portoUpdate($id)
    {
        $porto = portfolio::find($id); 
        $id = Session::get("user_id"); 
        $user = User::find($id); 
        $talent = $user->talent()->first(); 

        return view("member.updatePorto",compact('porto','talent'));
    }

    public function portoUpdatePost(Request $request)
    {
        $this->validate($request, [
            'screenshoot' => 'max:500|sometimes|mimes:jpeg,png,jpg,JPG,JPEG',//|dimensions:max_width=600
            'project_name' => 'required'
        ]);

        $porto = portfolio::find($request->porto_id);

        $screenshoot = $request->file('screenshoot');
        if ( $request->screenshoot)
        {
            //remove old screenshoot 
            Storage::delete("public/Project Portfolio/".$porto->portfolio_image) ;
            $extension = $screenshoot->getClientOriginalExtension(); 
            $filename = 'screenshoot-'.$request->project_name."_".$porto->portfolio_talent_id.'.'.$extension;
            // $path = $screenshoot->storeAs('public/Project Portfolio',$filename);
            // $porto['portfolio_image'] = $filename ; 

            $image_resize = Image::make($screenshoot->getRealPath());              
            $image_resize->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/storage/Project Portfolio/' .$filename));

        }

        $porto->portfolio_name = $request->project_name ? $request->project_name : '' ; 
        $porto->portfolio_desc = $request->desc ? $request->desc : ''; 
        $porto->portfolio_tech = $request->tech ? $request->tech : ''; 
        $porto->portfolio_link = $request->link ? $request->link : '' ; 
        $porto->portfolio_date_created = date("Y-m-d H:i:s") ; 
        $porto->portfolio_date_updated = date("Y-m-d H:i:s") ;  
        $porto->portfolio_tipe_project = $request->typeproject ? $request->typeproject : '' ; 
        $porto->portfolio_namacompany = $request->office ? $request->office : '' ; 
        $porto->portfolio_startdate = $request->date_start ? $request->date_start : '' ; 
        $porto->portfolio_enddate = $request->date_end ? $request->date_end : '' ; 
        $porto->save();

        if ( $request->screenshoot)
        {
            return redirect('member/crop-porto/'.$request->porto_id);
        }
        return back()->with('message','berhasil update');
    }

    public function cropPorto($id)
    {
        $porto = portfolio::find($id);
        $id = Session::get("user_id"); 
        $user = User::find($id); 
        $talent = $user->talent()->first();  
        return view('member.cropPorto',compact('porto','talent'));
    }

    public function cropPortoPost(Request $request)
    {

        $width  = $request->input("width"); 
        $height  = $request->input("height");
        $x = $request->input("x");  
        $y = $request->input("y");  
        $id = $request->input("id"); 

        // dd($width,$height,$x,$y,$id) ; 

        $targ_w = 300 ; 
        $targ_h = 300;
        $jpeg_quality = 100;

        $id = $request->id; 
        $portfolio = portfolio::find($id) ; 

        $src = 'storage/Project Portfolio/'.$portfolio->portfolio_image;
        // dd($src); 
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

        imagecopyresampled($dst_r,$img_r,0,0,$x,$y, $targ_w,$targ_h,$width,$height);

        // header('Content-type: image/jpeg');
        imagejpeg($dst_r, 'storage/Project Portfolio/'.$portfolio->portfolio_image, $jpeg_quality);

        return redirect('member/edit-porto'); 
    }

    public function cropPhoto()
    {
        $id = Session::get("user_id"); 
        $user = User::find($id); 
        $talent = $user->talent()->first();  
        return view('member.cropPhoto',compact('talent'));
    }

    public function cropPhotoPost(Request $request)
    {

        $width  = $request->input("width"); 
        $height  = $request->input("height");
        $x = $request->input("x");  
        $y = $request->input("y");  

        // dd($width,$height,$x,$y,$id) ; 

        $targ_w = 300 ; 
        $targ_h = 300;
        $jpeg_quality = 100;

        $id = Session::get("user_id"); 
        $user = User::find($id); 
        $talent = $user->talent()->first();  

        $src = 'storage/photo/'.$talent->talent_foto;
        // dd($src); 
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

        imagecopyresampled($dst_r,$img_r,0,0,$x,$y, $targ_w,$targ_h,$width,$height);

        // header('Content-type: image/jpeg');
        imagejpeg($dst_r, 'storage/photo/'.$talent->talent_foto, $jpeg_quality);

        return redirect('member/edit-basic-profile'); 
    }
    
    
}
