<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Job_apply;
use App\Models\Skill;
use App\Models\Location;
use App\Models\SkillCategory;
use App\Models\SkillTalent;
use App\Models\Company;
use App\Models\Requestt;
use App\Models\TestQuestion;
use App\Models\AssignRequest;
use App\Models\Talent;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Mail\progressMail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use File;
use Session;
use lock;

class talentController extends Controller
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
        ini_set('memory_limit', '1024M');

    //   	$jobs      = Job::all();
    //   	$talent    = Talent::all();
      	 //   $talent= DB::table('talent')->offset(10)->limit(10)->get();

    //   	$locations = Location::all();
      	$company   = Company::all();

      	$countU    = DB::table('talent')->select('talent_id')
                      ->where([
                          ['talent_condition', '=', 'unprocess']
                        ])->get()->count();
      	$countA    = DB::table('assign_request')->select('talent_id')
                      ->where([
                          ['assign_status', '!=', 'cancel'], ['assign_status', '!=', 'reject'], ['assign_status', '!=', 'hired']
                        ])->get()->count();
      	$countQ    = DB::table('talent')->select('talent_id')
                      ->where([
                          ['talent_condition', '=', 'quarantine']
                        ])->get()->count();

        // return view('admin.talent', compact('jobs', 'locations', 'countU', 'countA', 'countQ', 'company'));
        return view('admin.talent', compact('countU', 'countA', 'countQ', 'company'));
    }
    

    function talentskill($id){
      $data = DB::table('skill_talent')
                        ->join('skill','skill_talent.st_skill_id','=','skill.skill_id')
                        ->where('skill_talent.st_talent_id','=',$id)->get();
      return response()->json($data);


    }

    public function update(Request $request, $id) {
        $req = $request;
        $this->cekfile($req,$id);
        return redirect()->back();
    }

    private function cekfile($request,$id){
        $reqcv = $request->talent_cv;
        $reqpp = $request->talent_portfolio;
        $coba = str_split($request->talent_phone);
        // $test = $request->talent_photo;
        $hariini = Carbon::now()->format('dmY');
        if($reqcv!==null){
            $cv = $request->file('talent_cv');
            // $foto = $request->file('talent_foto');
            $namecv = 'Applier_CV_'.$request->talent_name."_".$hariini.'.'.$cv->getClientOriginalExtension();
            $namepp = NULL;
            if($coba[0]==='0'){
                $patternzero ='/^\0?\d\s?/m';
                $hilang0 = preg_replace($patternzero,'',$request->talent_phone);
                $request = $request;
                $path = $cv->storeAs('public/Curriculum Vitae',$namecv);
                // $testi = $foto->storeAs('public/photo', $namefoto);
                // $path2 = $pp->storeAs('Portfolio/Update Portfolio',$namepp);
                $this->updatestalent($id,$request,$namepp,$namecv,$hilang0);
            }else if($coba[0]==='+'){
                $pattern='/^\+?\d.\s?/m';
                $request = $request;
                $path = $cv->storeAs('public/Curriculum Vitae',$namecv);
                $testi = $foto->storeAs('public/photo', $namefoto);
                // $path2 = $pp->storeAs('Portfolio/Update Portfolio',$namepp);
                $hilang = preg_replace($pattern,'',$request->talent_phone);
                $this->updatestalent($id,$request,$namepp,$namecv,$hilang);
            }else{
                $null = NULL;
                $request = $request;
                $path = $cv->storeAs('public/Curriculum Vitae',$namecv);
                $testi = $foto->storeAs('public/photo', $namefoto);
                // $path2 = $pp->storeAs('Portfolio/Update Portfolio',$namepp);
                $this->updatestalent($id,$request,$namepp,$namecv,$null);
            }
        }else if($reqpp!==null){
            $pp = $request->file('talent_portfolio');
            $namepp = 'Applier_Portofolio_'.$request->talent_name."_".$hariini.'.'.$pp->getClientOriginalExtension();
            $namecv = NULL;
            if($coba[0]==='0'){
                $patternzero ='/^\0?\d\s?/m';
                $hilang0 = preg_replace($patternzero,'',$request->talent_phone);
                $request = $request;
                // $path = $cv->storeAs('Curriculum Vitae/Update CV',$namecv);
                $path2 = $pp->storeAs('public/Portfolio',$namepp);
                $this->updatestalent($id,$request,$namepp,$namecv,$hilang0);
            }else if($coba[0]==='+'){
                $pattern='/^\+?\d.\s?/m';
                $request = $request;
                // $path = $cv->storeAs('Curriculum Vitae/Update CV',$namecv);
                $path2 = $pp->storeAs('public/Portfolio',$namepp);
                $hilang = preg_replace($pattern,'',$request->talent_phone);
                $this->updatestalent($id,$request,$namepp,$namecv,$hilang);
            }else{
                $null = NULL;
                $request = $request;
                // $path = $cv->storeAs('Curriculum Vitae/Update CV',$namecv);
                $path2 = $pp->storeAs('public/Portfolio',$namepp);
                $this->updatestalent($id,$request,$namepp,$namecv,$null);
            }
        }else{
            $namepp = NULL;
            $namecv = NULL;
            if($coba[0]==='0'){
                $patternzero ='/^\0?\d\s?/m';
                $hilang0 = preg_replace($patternzero,'',$request->talent_phone);
                $request = $request;
                // $path = $cv->storeAs('Curriculum Vitae/Update CV',$namecv);
                // $path2 = $pp->storeAs('Portfolio/Update Portfolio',$namepp);
                $this->updatestalent($id,$request,$namepp,$namecv,$hilang0);
            }else if($coba[0]==='+'){
                $pattern='/^\+?\d.\s?/m';
                $request = $request;
                // $path = $cv->storeAs('Curriculum Vitae/Update CV',$namecv);
                // $path2 = $pp->storeAs('Portfolio/Update Portfolio',$namepp);
                $hilang = preg_replace($pattern,'',$request->talent_phone);
                $this->updatestalent($id,$request,$namepp,$namecv,$hilang);
            }else{
                $null = NULL;
                $request = $request;
                // $path = $cv->storeAs('Curriculum Vitae/Update CV',$namecv);
                // $path2 = $pp->storeAs('Portfolio/Update Portfolio',$namepp);
                $this->updatestalent($id,$request,$namepp,$namecv,$null);
            }
        }
    }

    private function updatestalent($id,$request,$namepp,$namecv,$nophone){
        $now = Carbon::now('Asia/Jakarta');
        $talent = Talent::where('talent_id', '=', $id)->first();
        $talent->talent_name = $request->talent_name;
        $talent->talent_email= $request->talent_email;
        $talent->talent_address= $request->talent_address;
        $talent->talent_prefered_location = $request->talent_prefered_location;
        $talent->talent_birth_date= $request->talent_birth_date;
        $talent->talent_location_id= $request->talent_current_addres;
        $talent->talent_place_of_birth= $request->talent_place_of_birth;
        $talent->talent_gender= $request->talent_gender;
        $talent->talent_salary= $request->talent_salary;
        $talent->talent_campus= $request->campus;
        $talent->talent_current_address = $request->talent_current_address;
        $talent->talent_martial_status = $request->martial_status;
        $talent->talent_rt_status   = $request->talent_rt;
        $talent->talent_status   = $request->status;
        $talent->talent_level = $request->talent_level;
        $talent->talent_onsite_jakarta = $request->onsite_jakarta;
        $talent->talent_onsite_jogja = $request->onsite_jogja;
        $talent->talent_remote = $request->remote;
        $talent->talent_luar_kota = $request->luar_kota;
        $talent->talent_focus = $request->focus;
        $talent->talent_isa = $request->isa;
        $talent->talent_international = $request->international;
        $talent->talent_rec_salary = $request->recomendation_salary;
        $talent->talent_lastest_salary = $request->lastest_salary;
        $talent->talent_condition = $request->talent_condition;
        $talent->talent_totalexperience = $request->talent_totalexperience;
        $talent->tupdated_date = $now;
        if($nophone===NULL){
            $talent->talent_phone= $request->talent_phone;
        }else{
            $talent->talent_phone= $nophone;
        }

        // if($testi===NULL){
        //   $talent->talent_foto= $request->talent_foto;
        // }else{
        //   $talent->talent_foto= $testi;
        // }

        if($namecv!=null){
            $talent->talent_cv_update = $namecv;
        }else if($namepp!=null){
            $talent->talent_portofolio_file = $namepp;
        }

        if($request->link_portfolio===NULL){
            $talent->talent_portfolio=NULL;
        }else{
            $talent->talent_portfolio=$request->link_portfolio;
        }

        // if($request->talent_rt_status === $talent->talent_rt_status){
          
        // }
        // else
        // {
        //   $talent->talent_rt_status_date = $now;
        // }

        $talent->update();
    }

    // private function deletefilestalent($id){
    //     $delete = DB::table('talent')->where('talent_id',$id)->get();
    //     unlink(storage_path('career/Curriculum Vitae/'.$delete->talent_cv));
    //     unlink(storage_path('career/Curriculum Vitae/'.$delete->talent_cv));

    // }

    public function updateSkill(Request $request)
    {

      $skillTalent = SkillTalent::where('st_id', '=', $request->st_id)->first();
      $skillTalent->st_skill_id= $request->skill_id;
      $skillTalent->st_level = $request->level;
      $skillTalent->st_score= $request->score_skill;
      
      if( $skillTalent->update() ){
        //   return redirect()->back();
        return "success";
      }
    }

    public function updateReady(Request $request)
    {
      if($request->avail=="asap"){
        $now = Carbon::today('Asia/Jakarta');
        $ready = Talent::where('talent_id', '=', $request->talent_id)->first();
        $ready->talent_id         = $request->talent_id;
        $ready->talent_date_ready = $now;
        $ready->talent_available  = $request->avail;
        $ready->update();
      }else if($request->avail=="no"){
        $ready = Talent::where('talent_id', '=', $request->talent_id)->first();
        $ready->talent_id         = $request->talent_id;
        $ready->talent_date_ready = NULL;
        $ready->talent_available  = $request->avail;
        $ready->update();
      }
      else{
        $now = Carbon::today('Asia/Jakarta');
        $ready = Talent::where('talent_id', '=', $request->talent_id)->first();
        $ready->talent_id         = $request->talent_id;
        $ready->talent_date_ready = $request->date_ready;
        $ready->talent_available  = $request->avail;
        $ready->update();
      }

      return redirect()->back();
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
    	$data = DB::table('talent')->select('talent_id','talent_address', 'talent_apply', 'talent_created_date', 'talent_name','talent_phone','talent_email','talent_gender', 'talent_rt_status','talent_status','talent_condition','talent_onsite_jakarta','talent_onsite_jogja','talent_remote','talent_luar_kota','talent_focus','talent_isa', 'talent_international','talent_date_ready', 'talent_available')
    							   ->orderBy('talent_id','DESC')->get();

      return Datatables::of($data)
      // ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_condition}}"/></center')
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}"/></center')
      ->addColumn('action', function($data){
        return '<center><a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>    <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="  fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function($data){
        $rush = '';
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('info', function($data){
        if($data->talent_apply=='YES'){$japp = '<span class="badge badge-success">YES</span>';}
        elseif($data->talent_apply=='OLD'){$japp = '<span class="badge badge-warning">OLD</span>';}
        else{$japp = '<span class="badge badge-danger">NO</span>';}

        $no_wa = ltrim($data->talent_phone, '+62');
        $no_wa = ltrim($data->talent_phone, '62');
        $no_wa = ltrim($data->talent_phone, '0');
        // $txt   = 'Halo%20'.ucwords($data->talent_name).'%2C%20saya%20Dian%20dari%20tim%20HRD%20PT%20Erporate%20Solusi%20Global.%20Kami%20membutuhkan%20cukup%20banyak%20developer%20dan%20menghubungi%20Anda%20karena%20bekerjasama%20dengan%20pihak%20kampus%20IT%20di%20Jogja.%0ADetail%20informasi%20ada%20di%20https%3A%2F%2Fcareer.erporate.com%2Fdetaillp%0AJika%20berkenan%20bisa%20kami%20hubungi%20untuk%20ngobrol%20santai%20seputar%20kesibukan%20saat%20ini%20%2B%20dijelaskan%20detail%20LOWONGAN%20KERJA%20IT%20dan%20PROGRAM%20REFERRAL%20kami.%0ALet%27s%20Join%20With%20Us%20(Indonesia%20%26%20Vietnam%20Teams)%0ATerimakasih%20%F0%9F%98%8A';
        $txt   = 'Halo%20'.ucwords($data->talent_name).'%2C%20%0D%0APerkenalkan%20saya%20Dian%2C%20Tim%20HRD%20PT%20Erporate%20Solusi%20Global.%20Mohon%20maaf%20sebelumnya%20saya%20menghubungi%20Anda%20secara%20langsung%20via%20WA%20ini.%0D%0ASaat%20ini%20kami%20sedang%20membuka%20beberapa%20lowongan%20pekerjaan%20di%20bidang%20IT%20yang%20dibutuhkan%20dalam%20waktu%20dekat.%20Saya%20melihat%20bahwa%20Anda%20pernah%20mendaftar%20ke%20perusahaan%20kami.%20%0D%0ADetail%20informasi%20mengenai%20lowongan%20kerja%20ada%20di%20https%3A%2F%2Fcareer.erporate.com%2Fdetaillp%20Apakah%20saat%20ini%20Anda%20tertarik%20dengan%20tawaran%20kami%3F%20Apakah%20Anda%20bersedia%20kami%20hubungi%20untuk%20ngobrol%20santai%20seputar%20kesibukan%20saat%20ini%20dan%20penjelasan%20lowongan%20kerja%20kami%3F%20Kami%20tunggu%20konfirmasinya.%0D%0ATerima%20kasih%20%F0%9F%98%8A';
        $wa = 'https://api.whatsapp.com/send?phone=62'.$no_wa.'&text='.$txt;
        $wa = '<a href="'.$wa.'" type="button" target="_blank" class="btn btn-success btn-xs"><i class=" fa fa-whatsapp"></i></a>';

        return date("d-M-Y", strtotime($data->talent_created_date)).'<br>'.$japp.' '.$wa;
      })
      ->addColumn('skills', function($data){
        $skill = DB::table('skill_talent')->join('skill', 'skill_id', '=', 'st_skill_id')->select('st_score','st_skill_verified','skill_name')
                     ->where('st_talent_id', '=', $data->talent_id)->get();
        $data_skill = "No set skills";
        if(count($skill)>0) { $data_skill = ''; }
        foreach ($skill as $v) {
          $data_skill .= $v->skill_name.' ('.$v->st_score.'), ';
        }
        
        $cv = DB::table('talent')->select('talent_id')->where('talent_cv','=',NULL)->where('talent_id', '=', $data->talent_id)->get();
                    // ->where(function ($query) {
                    //     $query->where('talent_cv','is not',NULL)->orWhere('talent_cv_update','is not',NULL);
                    // })->where(function ($query) {
                    //     $query->where('talent_id', '=', $data->talent_id);
                    // })->first();
        if(count($cv)>0) {
            return $data_skill;
        } else {
            return $data_skill." <span class='badge badge-success'>D1T4</span>";
        }
      })
      ->addColumn('talent_name', function($data){
        if($data->talent_gender=='male') { $name_gender = $data->talent_name.' <span class="badge badge-info">L</span>'; }
        elseif($data->talent_gender=='female') { $name_gender = $data->talent_name.' <span class="badge badge-warning">P</span>'; }
        else { $name_gender = $data->talent_name.' <span class="badge badge-secondary">B</span>'; }

        if($data->talent_condition=='quarantine') { $quarantine = '<span class="badge badge-primary">Q</span>'; }
        else { $quarantine = ''; }

        if( ($data->talent_date_ready=='' or $data->talent_date_ready==null) & $data->talent_available!='1_month') { $ready = '-'; }
        elseif ($data->talent_available=='1_month') { $ready = '<span class="badge badge-success">Ready : 1 Month Notice</span>'; }
        elseif ($data->talent_available=='no') { $ready = '<span class="badge badge-danger">No</span>'; }
        else { $ready = '<span class="badge badge-success">Ready : '.date("D, d-M-Y", strtotime($data->talent_date_ready)).'</span>'; }

        $no_wa = ltrim($data->talent_phone, '+62');
        $no_wa = ltrim($data->talent_phone, '62');
        $no_wa = ltrim($data->talent_phone, '0');
        $txt   = 'Halo%20'.ucwords($data->talent_name).'%2C%20bagaimana%20kabarnya%3F%20Perkenalkan%20saya%20Hakiki%20dari%20Tim%20HR%20SuitCareer.%20Mohon%20maaf%20sebelumnya%20saya%20menghubungi%20secara%20langsung%20via%20WA%20ini.%20Kami%20ingin%20menginformasikan%20bahwa%20saat%20ini%20kami%20memiliki%20banyak%20kebutuhan%20untuk%20beberapa%20posisi%20di%20Web%20%26%20Mobile%20Development.%20Jika%20tertarik%20baik%20dalam%20waktu%20saat%20ini%20atau%20untuk%20beberapa%20bulan%20kedepan%20saat%20available%20cari%20kerja%2C%20apakah%20bersedia%20untuk%20kami%20minta%20beberapa%20informasi%20terkait%20skills%2C%20portofolio%2C%20kapan%20available%20kerjanya%20serta%20berapa%20gaji%20yang%20diinginkan.%20Terimakasih';
        $wa = 'https://api.whatsapp.com/send?phone=62'.$no_wa.'&text='.$txt;
        $wa = '<a href="'.$wa.'" type="button" target="_blank" class="btn btn-success btn-xs"><i class=" fa fa-whatsapp"></i></a>';
        
        return $name_gender.' '.$quarantine.' '.$wa.'<br>'.$ready;
      })
      ->rawColumns(['checkbox', 'action', 'talent_name', 'talent_kontak', 'skills', 'info'])
      ->make(true);

    }

    public function detail(Request $request)
    {
      // $update = Talent::find($talent->talent_id); 
      $photo = $request->file('photo');
        if ($photo)
        {
            $extension = $photo->getClientOriginalExtension(); 
            $filename = 'profile-'.$id.'.'.$extension;

            $image_resize = Image::make($photo->getRealPath());              
            $image_resize->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/storage/photo/' .$filename));

            $update['talent_foto'] = $filename ; 
        }

      
        
      $id = Session::get("talent_id");
      // $user = User::find($id);
      // $talent = $user->talent()->first();
      $talent = Talent::find($id);
      
      // $this->lock($talent);
      
      

        //DB::disableQueryLog();
       $response = config('app.json_city');
        
        $listKota      = array();
        $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
        $tempListKota  = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja

        //looping array temporary untuk masukin object yang kita butuhin
        foreach ($tempListKota as $value) {
            //bikin object baru
            $kota = new \stdClass();
            $kota->id = $value['city_id']; //id kotanya
            $kota->type= $value['type'];
            $kota->nama = $value['city_name']; //nama kotanya

            array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota
        }


        $response2 = config('app.json_province'); 
        $listprovinsi = array();
        
        $arrRespon = json_decode($response2,true);
        $tempRespon = $arrRespon['rajaongkir']['results'];
        foreach($tempRespon as $value){
            $prov = new \stdClass();
            $prov->nama=$value['province'];
            array_push($listprovinsi,$prov);
        }



        ini_set('memory_limit', '1024M');
      	$id = $request->input('id');
      	$skill = DB::table('skill_talent')
                                      ->join('skill','skill_talent.st_skill_id','=','skill.skill_id')
                                      ->join('skill_category','skill.skill_sc_id','=','skill_category.sc_id')
                                      ->where('st_talent_id','=',$id)->get();

      	$assign= DB::table('assign_request')
                                      ->join('request','assign_request.request_id','=','request.request_id')
                                      ->join('company','request.request_company_id','=','company.company_id')
                                      ->where('talent_id','=',$id)->get();

      	$apply = DB::table('jobs_apply')
                                      ->join('jobs','jobs_apply.jobs_apply_jobs_id','=','jobs.jobs_id')
                                      ->join('talent','jobs_apply_talent_id','=','talent.talent_id')
                                      ->where('jobs_apply_talent_id','=',$id)->get();
        $jobs = DB::table('jobs');
        
      	$requestt = DB::table('request')->join('company','request.request_company_id','=','company.company_id')->get();

      	$list_skill = DB::table('skill')->orderBy('skill_name','asc')->get();

        $edu = DB::table('education')->where('edu_deleted_date','=',NULL)->where('edu_talent_id',$id)->get();
        $certif = DB::table('certification')->where('certif_deleted_date','=',NULL)->where('certif_talent_id',$id)->get();
        $workex = DB::table('work_experience')->where('workex_talent_id',$id)->get();
      	// $list_skill = Skill::all();
      	$company = Company::all();
        $locate = DB::table('location')->where('location_active','=','Y')->get();
        $preferloc=DB::table('talent')->leftjoin('location','location.location_id','=','talent_prefered_location')->where('talent_id',$request->id)->first();
        $all = DB::table('talent')->where('talent_id',$request->id)->first();
        $campus = DB::table('campus')->get();
        

        if($all->tupdated_date!=NULL){
            $cvupdate = 'app/public/Curriculum Vitae/Update CV/'.$all->talent_cv;
            $ini = Storage::url($cvupdate);
            $jobs      = Job::all();
            $fotoupdate = 'app/public/photo/Update foto/'.$all->talent_foto;
            
            
            $ct = DB::table('category_test')->where('ct_id','!=','8')->get();
        
            // server 503 => load talent terlalu tinggi
            //$talent    = Talent::all();
        
            $locations = Location::all();
            $last_update_skill = DB::table('skill_talent')
                                                    ->where('st_talent_id','=',$id)
                                                    ->orderBy('updated_at', 'DESC')->first();
            if(isset($last_update_skill)) {
              $last_update_skill = date("Y-m-d",strtotime($last_update_skill->updated_at));
            }
            else {
              $last_update_skill = "-";
            }

            $hr_tes 	= DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','3')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $person_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','8')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $be_tes 	= DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','1')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $ad_tes 	= DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','2')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $ios_tes =  DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','4')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $pm_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','6')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $fe_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','5')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $qa_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','7')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $ui_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','10')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          foreach ($hr_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_hr[$v->tq_id] = $check->it_answer; }
            else { $answer_hr[$v->tq_id] = "-"; }
          }

          foreach ($person_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_per[$v->tq_id] = $check->it_answer; }
            else { $answer_per[$v->tq_id] = "-"; }
          }

          foreach ($be_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_be[$v->tq_id] = $check->it_answer; }
            else { $answer_be[$v->tq_id] = "-"; }
          }

          foreach ($ad_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_ad[$v->tq_id] = $check->it_answer; }
            else { $answer_ad[$v->tq_id] = "-"; }
          }
         //   Penambahan
          foreach ($ios_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_ios[$v->tq_id] = $check->it_answer; }
            else { $answer_ios[$v->tq_id] = "-"; }
          }
          foreach ($fe_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_fe[$v->tq_id] = $check->it_answer; }
            else { $answer_fe[$v->tq_id] = "-"; }
          }
          foreach ($pm_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_pm[$v->tq_id] = $check->it_answer; }
            else { $answer_pm[$v->tq_id] = "-"; }
          }
          foreach ($qa_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_qa[$v->tq_id] = $check->it_answer; }
            else { $answer_qa[$v->tq_id] = "-"; }
          }
          foreach ($ui_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_ui[$v->tq_id] = $check->it_answer; }
            else { $answer_ui[$v->tq_id] = "-"; }
          }
          
            $answer_pm = isset($answer_pm) ? $answer_pm : null ; 
            $answer_qa = isset($answer_qa) ? $answer_qa : null ; 
            $answer_fe = isset($answer_fe) ? $answer_fe : null ; 
            $answer_ui = isset($answer_ui) ? $answer_ui : null ; 
            $answer_ios = isset($answer_ios) ? $answer_ios : null ; 

            return view('admin.detailTalent',
                compact('last_update_skill','jobs','company',
                'assign','apply','all',
                'skill','requestt','list_skill',
                'locations', 'hr_tes', 'person_tes',
                'be_tes', 'ad_tes', 'answer_hr',
                'answer_per', 'answer_be', 'answer_ad',
                'answer_pm','answer_qa','answer_fe','answer_ios','answer_ui',
                'ini','cvupdate','listKota','ui_tes',
                'listprovinsi','ct','ios_tes',
                'fe_tes','pm_tes','qa_tes','edu','certif','workex',
                'locate','campus','preferloc'
            ));
        }else{
            $cv = 'app/public/Curriculum Vitae/'.$all->talent_cv;
            $ini = Storage::url($cv);
            $jobs      = Job::all();
            $foto = 'app/public/photo/'.$all->talent_foto;

            $ct = DB::table('category_test')->where('ct_id','!=','8')->get();

            $talent    = Talent::all();
        return response()->json([
            'test' => $talent,
        ]);
            $locations = Location::all();
            $last_update_skill = DB::table('skill_talent')
                                                    ->where('st_talent_id','=',$id)
                                                    ->orderBy('updated_at', 'DESC')->first();
            if(isset($last_update_skill)) {
              $last_update_skill = date("Y-m-d",strtotime($last_update_skill->updated_at));
            }
            else {
              $last_update_skill = "-";
            }

            $hr_tes 	= DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','3')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $person_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','8')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $be_tes 	= DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','1')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $ad_tes 	= DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','2')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $ios_tes =  DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','4')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $fe_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','5')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $pm_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','6')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $qa_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','7')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          $ui_tes = DB::table('test_question')
                                          ->join('question','question.question_id','=','test_question.tq_question_id')
                                          ->where('tq_ct_id','=','10')
                                          ->where('tq_active','=','YES')
                                          ->orderBy('tq_sort', 'asc')->get();
          foreach ($hr_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer))
            {
                $answer_hr[$v->tq_id] = $check->it_answer;
            }
            else {
                $answer_hr[$v->tq_id] = "-";
            }
          }

          foreach ($person_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){
                $answer_per[$v->tq_id] = $check->it_answer;
            }
            else {
                 $answer_per[$v->tq_id] = "-";
            }
          }

          foreach ($be_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){
                $answer_be[$v->tq_id] = $check->it_answer;
            }
            else {
                $answer_be[$v->tq_id] = "-";
            }
          }

          foreach ($ad_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){
                $answer_ad[$v->tq_id] = $check->it_answer;
            }
            else {
                $answer_ad[$v->tq_id] = "-";
            }
          }

          foreach ($ios_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_ios[$v->tq_id] = $check->it_answer; }
            else { $answer_ios[$v->tq_id] = "-"; }
          }
          foreach ($fe_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_fe[$v->tq_id] = $check->it_answer; }
            else { $answer_fe[$v->tq_id] = "-"; }
          }
          foreach ($pm_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_pm[$v->tq_id] = $check->it_answer; }
            else { $answer_pm[$v->tq_id] = "-"; }
          }
          foreach ($qa_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_qa[$v->tq_id] = $check->it_answer; }
            else { $answer_qa[$v->tq_id] = "-"; }
          }
          foreach ($ui_tes as $v) {
            $check = DB::table('interview_test')->where('it_tq_id','=',$v->tq_id)->where('it_talent_id','=',$id)->first();
            if(isset($check->it_answer)){ $answer_ui[$v->tq_id] = $check->it_answer; }
            else { $answer_ui[$v->tq_id] = "-"; }
          }
          

            return view('admin.detailTalent',
                compact('last_update_skill','jobs','company',
                'assign','apply','all',
                'skill','requestt','list_skill',
                'locations', 'hr_tes', 'person_tes',
                'be_tes', 'ad_tes', 'answer_hr',
                'answer_per', 'answer_be', 'answer_ad',
                'answer_pm','answer_qa','answer_fe','answer_ios','answer_ui',
                'ini','cvupdate','listKota','ui_tes',
                'listprovinsi','ct','ios_tes',
                'fe_tes','pm_tes','qa_tes','edu','certif','workex',
                'locate','campus','preferloc', 'talent'

            ));

        }
    }

    public function detailPost(Request $request){
      $this ->validate($request, [
          'talent_name' => 'required',
          'talent_foto' => 'max:500|sometimes|mimes:jpeg,png,jpg,JPG,JPEG',
          'talent_email' => 'required',
          'talent_martial_status' => 'required',
          'talent_phone' => 'required|numeric|min:11',
          'talent_gender' => 'required',
          'talent_rt_status' => 'required',
          'talent_status' => 'required',
          'talent_level' => 'required',
          'talent_onsite_jakarta' => 'required',
          'talent_onsite_jogja' => 'required',
          'talent_remote' => 'required',
          'talent_luar_kota' => 'required',
          'talent_focus' => 'required',
          'talent_prefered_city' => 'required',
          'talent_isa' => 'required',
          'talent_international' => 'required'
        ]);

        $id = Session::get("talent_id");
        // $user = User::find($id);
        // $talent = $user->talent()->first();
        $talent = Talent::find($id);

        
        // $this->lock($talent);

        // $update = Talent::find($talent->talent_id); 

        $update = Talent::find($talent->talent_id);

        $photo = $request->file('talent_photo');
        if($photo){
          $extension = $photo->getClientOriginalExtensioon();
          $filename = 'profile-'.$id.'.'.$extension;

          $image_resize = Image::make($photo->getRealPath());
          $image_resize->rezise(600,600, function($constraint){
            $constraint->aspectRatio();
          })->save(public_path('/storage/photo/' .$filename));

          $update['talent_foto'] = $filename;
        }


        $update['talent_name'] = $request->name ; 
        $update['talent_profile_desc'] = $request->profile_desc ; 
        $update['talent_salary'] = preg_replace('/[^0-9]/', '', $request->salary) ; 
        $update['talent_salary_jogja'] = preg_replace('/[^0-9]/', '', $request->salary_jogja) ; 
        $update['talent_salary_jakarta'] = preg_replace('/[^0-9]/', '', $request->salary_jakarta) ; 
        $update['talent_prefered_city'] = $request->prefered_city ; 
        $update['talent_focus'] = $request->focus; 
        $update['talent_level'] = $request->talent_level; 
        $update['talent_phone'] = $request->phone; 
        $update['talent_address'] = $request->address; 
        $update['talent_rt_status'] = $request->talent_rt_status;
        $update['talent_status'] = $request->status;
        $update['talent_gender'] = $request->gender; 
        $update['talent_phone'] = $request->phone; 
        $update['talent_luar_kota'] = $request->luar_kota; 
        $update['talent_onsite_jakarta'] = $request->onsite_jakarta; 
        $update['talent_onsite_jogja'] = $request->onsite_jogja; 
        $update['talent_remote'] = $request->remote;
        $update['talent_prefered_city'] = $request->prefered_city; 
        $update['talent_international'] = $request->international; 
        // $update['talent_current_work'] = $request->current_work; 
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

        return back()->with("message", "berhasil update");


    }



    public function addSkillTalent(Request $request){
        foreach($request->input('skill_id') as $key => $value) {
                $SkillTalent  = new SkillTalent;
                $SkillTalent->st_talent_id = $request->talent_id[$key];
                $SkillTalent->st_skill_id = $request->skill_id[$key];
                $SkillTalent->st_level = $request->level[$key];
                $SkillTalent->st_skill_verified = 'NO';
                $SkillTalent->st_skill_verified_date = NULL;
                $SkillTalent->st_score = $request->score_skill[$key];
                $SkillTalent->st_input_admin = 'NO';
                $SkillTalent->save();
            }
            return response()->json(['message'=>'success']);
    }

    public function getRequest($idcompany,$idtalent){
      $jobs = DB::table('jobs_apply')
          ->join('skill_talent','st_talent_id','=','jobs_apply_talent_id')
          ->where('jobs_apply_talent_id',$idtalent)
          ->get();
        $cp=[];
      foreach ($jobs as $j) {
        $cp = DB::table('company_position')
        ->join('jobs','jobs.jobs_id','=','company_position.cp_jobs_id')
        ->join('request','request.request_company_id','=','company_position.cp_company_id')
        ->leftjoin('location','location.location_id','=','request.request_location')
        ->where('cp_skill_id',$j->st_skill_id)
        ->where('cp_company_id',$idcompany)
        ->groupBy('cp_request')
        ->get(['jobs_title','cp_request','location_name','location_id']);

       
  
}
return response()->json($cp);
    }


    public function addApplyTalent(Request $request)
    {
        // $talent = DB::table('jobs_apply')->select('talent_name', 'talent_phone', 'talent_email', 'talent_gender', 'talent_place_of_birth', 'talent_birth_date', '')
                                    //   ->where('talent_id','=',$request->talent_id)->first();

        $data                             = new Job_apply;
        $data->jobs_apply_jobs_id         = $request->jobs_id;
        $data->jobs_apply_talent_id       = $request->talent_id;
        $data->jobs_apply_created_date    = Carbon::now();
        $data->jobs_apply_status          = $request->apply_status;
        $data->jobs_apply_location        = $request->apply_location;
        $data->jobs_apply_internal       = 'YES';
        $data->save();

      return response()->json(['message'=>'success']);
    }

    public function addAssignTalent(Request $request)
    {

      $data                = new AssignRequest;
      $data->request_id    = $request->request_id;
      $data->talent_id     = $request->talent_id;
      $data->location_id = $request->location_id;
      $data->created_at = Carbon::now();
      $data->updated_at = Carbon::now();
      $data->save();

      $assign=DB::table('talent')->where('talent_id','=',$request->talent_id)->update([
        'talent_condition'=>"assign"
      ]);

      return redirect()->back()->with('Success','Talent Berhasil Di Assign');
    }
    public function skillTalent(Request $request)
    {
      $skill = DB::table('skill_talent')
                                          ->join('skill','skill_talent.st_skill_id','=','skill.skill_id')
                                          ->join('skill_category','skill.skill_sc_id','=','skill_category.sc_id')
                                          ->where('st_talent_id','=',$request->id)->get();
          // echo $skill;
      return Datatables::of($skill)
      ->addColumn('nama_skill', function($skill){
        $text = '<strong>'.$skill->skill_name.'</strong>';
        if($skill->st_skill_verified == 'YES')
          $text = $text.'&nbsp;&nbsp;<i class="fa fa-check-square-o"></i><div style="display:none;">YES</div>';
        else
          $text = $text.'&nbsp;&nbsp;<a href="#verified-skill" data-verifiedskill="'.$skill->st_id.'"><i style="" class="fa fa-square-o"></i></a><div style="display:none;">NO</div>';
          return $text;
      })
      ->addColumn('date_verified', function($skill){
        if($skill->st_skill_verified_date == NULL)
          $text = '-';
        else
          $text= $skill->st_skill_verified_date;
          return $text;
      })
        ->addColumn('score_skill', function($skill){
        if($skill->st_score == NULL)
          $text = '-';
        else
          $text= $skill->st_score;
          return $text;
      })
      ->addColumn('action', function($skill){
        return '<center><a href="#skill-action" data-idskill="'.$skill->st_skill_id.'" data-stid="'.$skill->st_id.'" data-skillname="'.$skill->skill_name.'" data-skillscore="'.$skill->st_score.'" data-levelskill="'.$skill->st_level.'" type="button" data-toggle="modal" data-target="#modal-edit-skill" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa fa-pencil-square-o"></i></a> <a href="#" data-id="'.$skill->st_id.'" type="button" type="button" class="btn btn-danger btn-xs delete-skill" data-toggle="tooltip" data-placement="top" title="See Application Details"><i class="fa fa-trash"></i></a></center>';
      })

      ->rawColumns(['nama_skill','date_verified','score_skill','action'])
      ->make(true);
    }


    public function skillVerified(Request $request)
    {
      $st_id = $request->input('id');

      $verified = SkillTalent::find($st_id);
      if($verified->update(['st_skill_verified'=> 'YES', 'st_skill_verified_date'=> now() ])){
        return 'verified';
      }

    }

    public function assignTalent(Request $request){

      $assign= DB::table('assign_request')
                                          ->join('request','assign_request.request_id','=','request.request_id')
                                          ->join('company','request.request_company_id','=','company.company_id')
                                          ->join('location','assign_request.location_id','=','location.location_id')
                                          ->join('company_position','request.request_id','=','company_position.cp_request')
                                          ->join('jobs','company_position.cp_jobs_id','=','jobs.jobs_id')
                                          ->where('talent_id','=',$request->id)
                                          ->groupby('company_name','location_name','jobs_title','created_at')->get();

      return Datatables::of($assign)
      // ->addColumn('request_start_date', function($assign){
      //    $date= date("Y-m-d",strtotime($assign->request_date_created));
      //     return $date;
      // })
      ->addColumn('nama_company', function($assign){
         $text= '<strong>'.$assign->company_name.'</strong>';
          return $text;
      })
      ->addColumn('request_detail', function($assign){
        $text=$assign->request_detail;
         return $text;
     })
      ->addColumn('location_name', function($assign){
        $text=$assign->location_name;
        return $text;
      })
      ->addColumn('jobs_title', function($assign){
        $text=$assign->jobs_title;
        return $text;
      })
      ->addColumn('assign_status', function($assign){
        if($assign->assign_status=='review_rt') { $status_text = '2. Review RT'; $status_color='info'; }
        elseif($assign->assign_status=='interviewing') { $status_text = '3. Interviewing'; $status_color='success'; }
        elseif($assign->assign_status=='report_interview') { $status_text = '4. Report Interview'; $status_color='success'; }
        elseif($assign->assign_status=='offering') { $status_text = '5.a. Offering'; $status_color='dark'; }
        elseif($assign->assign_status=='hired') { $status_text = '5.b. Hired'; $status_color='primary'; }
        elseif($assign->assign_status=='reject') { $status_text = '5.c. Rejected'; $status_color='danger'; }
        elseif($assign->assign_status=='cancel') { $status_text = '5.d. Cancelled'; $status_color='secondary'; }
        else { $status_text = '1. Send RT'; $status_color='light'; }

      if(strlen(strip_tags($assign->assign_desc))>40){ $status_desc = substr(strip_tags($assign->assign_desc), 0,40).'...'; }
      else{ $status_desc = strip_tags($assign->assign_desc); }

        return '<a href="#change-status" data-id="'.$assign->assign_request_id.'" data-toggle="modal" data-target="#modal-status" type="button" class="btn btn-'.$status_color.' btn-xs change-status" data-placement="top">'.$status_text.'</a>&nbsp;&nbsp;'.substr($assign->assign_status_date, 0,10).'<br><span title="'.strip_tags($assign->assign_desc).'">'.$status_desc.'</span>';
        })
      ->addColumn('action', function($assign){
        return '<center>
        <a href="" type="button" data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa fa-pencil-square-o"></i></a></center>';
      })
      ->rawColumns(['nama_company','request_detail','location_name','jobs_title','assign_status','action'])
      ->make(true);
    }

    public function applyTalent(Request $request){

      $apply = DB::table('jobs_apply')->select('jobs.jobs_title','jobs_apply.jobs_apply_type_time','jobs_apply.jobs_apply_location','jobs_apply.jobs_apply_created_date','jobs_apply.jobs_apply_status')
                                          ->join('jobs','jobs_apply.jobs_apply_jobs_id','=','jobs.jobs_id')
                                          ->join('talent','jobs_apply_talent_id','=','talent.talent_id')
                                          ->where('jobs_apply_talent_id','=',$request->id)->get();

      return Datatables::of($apply)
      ->addColumn('jobs_name', function($apply){
        $text = '<strong>'.$apply->jobs_title.'</strong>&nbsp;&nbsp;<span class="badge badge-success">'.$apply->jobs_apply_type_time.'</span>';
          return $text;
      })
       ->addColumn('jobs_apply_date', function($apply){
         $date= date("Y-m-d",strtotime($apply->jobs_apply_created_date));
          return $date;
      })
      ->addColumn('action', function($apply){
        return '<center><a href="" type="button" data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa fa-pencil-square-o"></i></a></center>';
      })
      ->rawColumns(['jobs_name','jobs_apply_date','action'])
      ->make(true);
    }


    public function delete(Request $request)
    {
      $all_id_array = $request->input('id');
      $all = Job_apply::whereIn('jobs_apply_id', $all_id_array);
      if($all->delete()){
        return 'deleted';
      }
    }
    
    public function deleteskill(Request $request)
    {
      $id = $request->input('id');
    //   $all = DB::table('skill_talent')->where('st_id', '=', $id)->delete();
      $all = DB::table('skill_talent')->where('st_id', '=', $id);
      if($all->delete()){
        return response()->json(['message'=>'deleted']);
      }
    }

    public function allUnprocess() { //allUnprocess

    	$data = DB::table('talent')->select('talent_id','talent_address','talent_name','talent_phone','talent_email','talent_gender','talent_condition')
    							   ->where('talent_condition','unprocess')
    							   ->orderBy('talent_created_date','asc')->get();

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_condition}}"/></center>')
      ->addColumn('action', function($data){
        return '<center><a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>    <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="  fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function($data){
        $rush = '';
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->rawColumns(['checkbox', 'action', 'talent_kontak'])
      ->make(true);
    }



    public function move(Request $request)
    {

      $id_array = $request->input('id');
      $status_array = $request->input('status');
      for($i = 0; $i < count($id_array); $i++){
        // if($request->input('data') == 'interview' && ($status_array[$i] == 'unprocess' || $status_array[$i] == 'testonline'){
        // if($request->input('data') == 'quarantine'){
        // // if($request->input('data') == 'interview' && ($status_array[$i] == 'unprocess' || $status_array[$i] == 'testonline'){

        //   $cek_data = Interview::where('interview_jobs_apply_id', '=', $id_array[$i])->first();
        //   if($cek_data == null){
        //     $interview = new Interview();
        //     $interview->created_at = Carbon::now();
        //     $interview->updated_at = Carbon::now();
        //     $interview->interview_schedule_status = "not-scheduled";
        //     $interview->interview_jobs_apply_id = $id_array[$i];
        //     $interview->save();
        //   }
        // }
      }
      $data = Talent::whereIn('talent_id', $id_array);

      if(
      $data->update([ 'talent_condition' => $request->input('data')])){
        return 'success';
      }
    }



    public function allQuarantine() {
      $data = DB::table('talent')
                         ->select('talent.talent_id','talent_address','talent_name','talent_phone','talent_email','talent_gender','talent_condition','quarantine.*')
                        //  ->leftjoin('assign_request','assign_request.talent_id','=','talent.talent_id')
                         ->leftjoin('quarantine','quarantine_talent_id','=','talent.talent_id')
                        //  ->leftjoin('request','request.request_id','=','assign_request.request_id')
                        //  ->leftjoin('company','company_id','=','request.request_company_id')
                         ->where('talent_condition','quarantine')
                         ->groupby('talent_name')
                         ->orderBy('talent_id','desc')->get();
   


      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_condition}}"/></center>')
      ->addColumn('action', function($data){
        return '<center>
        <a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>    
        <a href="" data-idtalent="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-assign-company" type="button" class="btn btn-info btn-xs assign-talent" data-toggle="tooltip" data-placement="top" title="Assign Talent"><i class="fa fa-plus"></i></a>
        <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="fa fa-check"></i></a>
        </center>';
        // <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-schedule" type="button" class="btn btn-success btn-xs talent-schedule" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-list-alt"></i></a>    
      })
      ->addColumn('talent_name', function($data){
     
        if($data->talent_gender=='male') { $name_gender = $data->talent_name.' <span class="badge badge-info">L</span>'; }
        elseif($data->talent_gender=='female') { $name_gender = $data->talent_name.' <span class="badge badge-warning">P</span>'; }
        else { $name_gender = $data->talent_name.' <span class="badge badge-secondary">B</span>'; }

        return $name_gender;
      })
      ->addColumn('quarantine_status', function($data){
        if($data->quarantine_status=='chat') { $status_text = 'chat'; $status_color='info'; }
      	elseif($data->quarantine_status=='invalid') { $status_text = 'invalid'; $status_color='secondary'; }
      	elseif($data->quarantine_status=='response') { $status_text = 'response'; $status_color='success'; }
      	// elseif($data->quarantine_status=='schedule') { $status_text = 'schedule';  $status_color='info'; }
      	// elseif($data->quarantine_status=='interviewed') { $status_text = 'interviewed'; $status_color='success'; }
      	elseif($data->quarantine_status=='done') { $status_text = 'DONE'; $status_color='primary'; }
        else { $status_text = 'unprocess'; $status_color='light'; }
        
        // if(strlen(strip_tags($data->quarantine_note))>40){ $status_desc = substr(strip_tags($data->quarantine_note), 0,40).'...'; }
        //   else{ $status_desc = strip_tags($data->quarantine_note); }

      
          return '<a href="" data-id="'.$data->quarantine_talent_id.'" data-toggle="modal" data-target="#modal-status-quarantine" type="button" class="btn btn-'.$status_color.' btn-xs change-status-quarantine" data-placement="top">'.$status_text.'</a>  '.substr($data->quarantine_updated_date, 0,10).'<br>';
        //   <span title="'.strip_tags($data->quarantine_note).'">'.$status_desc.'</span>';
        
      })
      ->addColumn('talent_kontak', function($data){
        $rush = '';
        if($data->quarantine_note!='' || $data->quarantine_note!=' ') { $note='<span class="badge badge-primary">'.$data->quarantine_note.'</span>'; } else { $note=''; }
        return $data->talent_email.'<br>'.$data->talent_phone.$rush.' '.$note;
      })

      ->addColumn('quarantine_reminder', function($data){
        if($data->quarantine_reminder_date == null){$reminder_text ='<b>Belum dijadwalkan</b>'; $color_text='light';}
        else{$reminder_text=date('d-M-Y', strtotime($data->quarantine_reminder_date)); $color_text='warning';}

        return '<a href="" data-id="'.$data->talent_id.'" data-toggle="modal" data-target="modal-reminder" type="button" class="btn btn-'.$color_text.' btn-xs change-reminder" data-placement="top"><strong>'.$reminder_text.'</strong></a>';
      })

      ->rawColumns(['checkbox', 'action', 'talent_kontak','talent_name','quarantine_status','quarantine_reminder'])
      ->make(true);

    }


    public function allAssign() {

    	$data = DB::table('talent')
    	                    ->select('talent.talent_id','talent_address','talent_name','talent_phone','talent_email','talent_gender','talent_rt_status','talent_status','talent_condition','talent_onsite_jakarta','talent_onsite_jogja','talent_remote','talent_luar_kota','talent_focus','talent_isa','talent_international','talent_date_ready','talent_available','assign_status','assign_desc', 'assign_request.created_at', 'assign_request.request_id', 'company_name', 'request_name', 'request_location', 'assign_request_id','assign_request_status','assign_status_date')
                            ->join('assign_request','assign_request.talent_id','=','talent.talent_id')
                            ->join('request','request.request_id','=','assign_request.request_id')
                            ->join('company','company.company_id','=','request.request_company_id')
                            ->where('talent_condition','!=','quarantine')
                            ->where('assign_request_status','!=','done')
                            ->groupby('talent_name','company_name','request_name','created_at')
                            ->orderBy('talent_created_date','desc')->offset(10)->limit(10)->get();
                    // return response()->json([
      	            //  'data' => $data,
      	            //  'message' => 'sukses'
      	            //  ]);

      return Datatables::of($data)
      ->addColumn('checkbox', '<center><input type="checkbox" name="interview_checkbox[]" class="checkbox" value="{{$talent_id}}|{{$talent_condition}}"/></center')
      ->addColumn('action', function($data){
        return '<center><a href="'.route('talent.detail').'?id='.$data->talent_id.'" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-user-o"></i></a>    <a href="" id="'.$data->talent_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="  fa fa-check"></i></a></center>';
      })
      ->addColumn('talent_kontak', function($data){
        $rush = '';
        return $data->talent_email.'<br>'.$data->talent_phone.$rush;
      })
      ->addColumn('position', function($data){
        return '<strong>'.$data->company_name.'</strong><br>'.$data->request_name;
      })

      ->addColumn('assign_date', function($data){
        return date("D, d-M-Y", strtotime($data->created_at));
      })
      ->addColumn('skills', function($data){
        $skill = DB::table('skill_talent')->join('skill', 'skill_id', '=', 'st_skill_id')->select('st_score','st_skill_verified','skill_name')
                     ->where('st_talent_id', '=', $data->talent_id)->get();
        $data_skill = "No set skills";
        if(count($skill)>0) { $data_skill = ''; }
        foreach ($skill as $v) {
          $data_skill .= $v->skill_name.' ('.$v->st_score.'), ';
        }
        return $data_skill;
      })
      ->addColumn('talent_name', function($data){
        if($data->talent_gender=='male') { $name_gender = $data->talent_name.' <span class="badge badge-info">L</span>'; }
        elseif($data->talent_gender=='female') { $name_gender = $data->talent_name.' <span class="badge badge-warning">P</span>'; }
        else { $name_gender = $data->talent_name.' <span class="badge badge-secondary">B</span>'; }

        if($data->talent_condition=='quarantine') { $quarantine = '<span class="badge badge-primary">Q</span>'; }
        else { $quarantine = ''; }

        if( ($data->talent_date_ready=='' or $data->talent_date_ready==null) & $data->talent_available!='1_month' & $data->talent_available!='no') { $ready = '-'; }
        elseif ($data->talent_available=='1_month') { $ready = '<span class="badge badge-success">Ready : 1 Month Notice</span>'; }
        elseif ($data->talent_available=='no') { $ready = '<span class="badge badge-danger">No</span>'; }
        else { $ready = '<span class="badge badge-success">Ready : '.date("D, d-M-Y", strtotime($data->talent_date_ready)).'</span>'; }

        return $name_gender.' '.$quarantine.'<br>'.$ready;
      })
      ->addColumn('talent_status', function($data){
      	if($data->assign_status=='review_rt') { $status_text = '2. Review RT'; $status_color='info'; }
      	elseif($data->assign_status=='interviewing') { $status_text = '3. Interviewing'; $status_color='success'; }
      	elseif($data->assign_status=='report_interview') { $status_text = '4. Report Interview'; $status_color='success'; }
      	elseif($data->assign_status=='offering') { $status_text = '5.a. Offering'; $status_color='dark'; }
      	elseif($data->assign_status=='hired') { $status_text = '5.b. Hired'; $status_color='primary'; }
      	elseif($data->assign_status=='reject') { $status_text = '5.c. Rejected'; $status_color='danger'; }
      	elseif($data->assign_status=='cancel') { $status_text = '5.d. Cancelled'; $status_color='secondary'; }
      	else { $status_text = '1. Send RT'; $status_color='light'; }

        if(strlen(strip_tags($data->assign_desc))>40){ $status_desc = substr(strip_tags($data->assign_desc), 0,40).'...'; }
        else{ $status_desc = strip_tags($data->assign_desc); }

        return '<a href="" data-id="'.$data->assign_request_id.'" data-toggle="modal" data-target="#modal-status" type="button" class="btn btn-'.$status_color.' btn-xs change-status" data-placement="top">'.$status_text.'</a><br><span title="'.strip_tags($data->assign_desc).'">'.$status_desc.'</span>';
      })

      ->rawColumns(['checkbox', 'action', 'talent_name', 'talent_kontak', 'talent_status', 'position', 'assign_date'])
      ->make(true);
    }

    public function changeStatusAssign(Request $request){
      DB::table('assign_request')->where('assign_request_id', $request->assign_id)->update( array('assign_status' => $request->status, 'assign_desc' => $request->note) );

      // if( $assign->update() ) {return "berhasil";}
      // else {return "error";}
      return redirect()->back()->with('Success','Status Assign Berhasil Dirubah');
    }

    public function changeStatus(Request $request){
      
      // dd($request->all());
      $now=Carbon::now('Asia/Jakarta');
      DB::table('assign_request')->where('assign_request_id', $request->assign_id)->update([
        'assign_status' => $request->status, 
        'assign_desc' => $request->note
        ]);
      if($request->status == 'assign_status'){

      } 
      else
      {
        $statusdate = DB::table('assign_request')->where('assign_request_id', $request->assign_id)->update([
          'assign_status_date'=>$now
        ]);
      }
      return redirect()->back()->with('Success','Status Assign Berhasil Dirubah');
    }

    public function changeStatusQuarantine(Request $request){
      $now=Carbon::now('Asia/Jakarta');
      DB::table('quarantine')->where('quarantine_talent_id', $request->talent_id)->update([
        'quarantine_status' => $request->status, 
        ]);
      if($request->status == 'quarantine_status'){

      } 
      else
      {
        $statusdate = DB::table('quarantine')->where('quarantine_talent_id', $request->talent_id)->update([
          'quarantine_updated_date'=>$now
        ]);
      }
      return redirect()->back()->with('Success','Status Quarantine berhasil dirubah');
    }

    public function answer(Request $request, $id){
        $question = DB::table('test_question')->where('tq_ct_id',$request->category)->where('tq_active','YES')->orderBy('tq_sort','asc')->get();
        $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                  ->where('test_question.tq_ct_id',$request->category)
                  ->where('test_question.tq_question_id','=',34)
                  ->get();
        // dd(count($cobain));
        if(count($cobain)>0){
            foreach ($question as $v) {
                if( isset($request->answer[$v->tq_id]) )
                {
                    if($request->category==3){
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                          array('it_answer' => $request->answer[$v->tq_id])
                        );
                    }else{
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                            array('it_answer' => $request->answer[$v->tq_id])
                        );
                        // DB::table('interview_test')->updateOrInsert(
                        //     array('it_talent_id'=>$id,'it_tq_id'=>$v->tq_id),
                        //     array('it_answer'=>$request->kesimpulan)
                        // );
                    }

                }
                else {

                    if($request->category==3){
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                            array('it_answer' => "")
                        );
                    }else{
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                            array('it_answer' => "")
                        );
                        // DB::table('interview_test')->updateOrInsert(
                        //     array('it_talent_id'=>$id,'it_tq_id'=>$v->tq_id),
                        //     array('it_answer'=>$request->kesimpulan)
                        // );
                    }
                }
            }
        }else{
            $tq = new TestQuestion;
            $tq->tq_question_id = 34;
            $tq->tq_ct_id=$request->category;
            $tq->tq_sort=100;
            $tq->tq_active="NO";
            $tq->save();
            foreach ($question as $v) {
                if( isset($request->answer[$v->tq_id]) )
                {
                    if($request->category==3){
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                          array('it_answer' => $request->answer[$v->tq_id])
                        );
                    }else{
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                            array('it_answer' => $request->answer[$v->tq_id])
                        );
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id,'it_tq_id'=>$tq->tq_id),
                            array('it_answer'=>$request->kesimpulan)
                        );
                    }

                }
                else {

                    if($request->category==3){
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                            array('it_answer' => 'No-Set')
                        );
                    }else{
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
                            array('it_answer' => 'No-Set')
                        );
                        DB::table('interview_test')->updateOrInsert(
                            array('it_talent_id'=>$id,'it_tq_id'=>$tq->tq_id),
                            array('it_answer'=>$request->kesimpulan)
                        );
                    }
                }
            }
        }

      return redirect()->back();
    }

    public function answerPersonality(Request $request, $id){
      // dd($request->all());
      $question = DB::table('test_question')->where('tq_ct_id',$request->category)->where('tq_active','YES')->orderBy('tq_sort','asc')->get();
    	foreach ($question as $v) {
    		if( isset($request->answer[$v->tq_id]) )
    		{
		      	DB::table('interview_test')->updateOrInsert( 
		      		array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
		      		array('it_answer' => $request->answer[$v->tq_id] )
		      	);
		    }
		    else {
		    	DB::table('interview_test')->updateOrInsert( 
		      		array('it_talent_id'=>$id, 'it_tq_id'=>$v->tq_id ),
		      		array('it_answer' => 'No-Set' )
		      	);
		    }
      }
      return redirect()->back();
    }

    public function portfoliodetailya($id){
        $data = DB::table('portfolio')
                ->join('talent','talent_id','=','portfolio_talent_id')
                ->where('portfolio_id', '=', $id)
                ->first();
        return response()->json($data);
    }

    public function portfolio(Request $request){
      $data = DB::table('portfolio')
                ->where('portfolio_talent_id', '=', $request->id)
                ->orderBy('portfolio_name','asc')->get();

      return Datatables::of($data)

      ->addColumn('action', function($data){
        return '<center>
        <a href="#talent-portfolio" data-idport="'.$data->portfolio_id.'" type="button" data-toggle="modal" data-target="#mymodal" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top"  type="button" class="btn btn-primary btn-xs cobamodal"><i class="fa fa-eye"></i></a>
        <a href="#edit-portfolio" data-idportfol="'.$data->portfolio_id.'" type="button" data-toggle="modal" data-target="#editportfolio" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i></a>
        <a href="'.route('portfolio.delete').'?id='.$data->portfolio_id.'" type="button" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i></a></center>';
      })
      ->addColumn('portfolio_desc', function($data){
        if(strlen(strip_tags($data->portfolio_desc))>75){ $status_desc = substr(strip_tags($data->portfolio_desc), 0,75).'...'; }
        else{ $status_desc = strip_tags($data->portfolio_desc); }

        return $status_desc;
      })
      ->addColumn('portfolio_date_created', function($data){
        return substr($data->portfolio_date_created, 0,16);
      })

      ->rawColumns(['portfolio_desc', 'portfolio_date_created', 'action'])
      ->make(true);
    }

    public function portfolioInsert(Request $request)
    {
      $bulanend = $request->bulanaddportend;
      $tahunend = $request->tahunaddportend;      
      $bulan = $request->bulanaddport;
      $tahun = $request->tahunaddport;   
      $now=Carbon::now('Asia/Jakarta');
      if($request->file('portfolio_image')==null){
        DB::table('portfolio')->insert(array (
          'portfolio_name'      => $request->name,
          'portfolio_desc'      => $request->desc,
          'portfolio_tipe_project'=>$request->typeproject,
          'portfolio_namacompany'=>$request->office,
          'portfolio_startdate'=>$bulan.' '.$tahun,
          'portfolio_enddate'=>$bulanend.' '.$tahunend,
          'portfolio_tech'      => $request->tech,
          'portfolio_talent_id' => $request->talent_id,
          'portfolio_date_created'=>$now
        ));
      }else{
        $talent = DB::table('talent')->where('talent_id',$request->talent_id)->first();    
        $format= Carbon::today('Asia/Jakarta')->format('dmY');
        $image = $request->file('portfolio_image');
        $namegambar = 'Image_Project_Portfolio_'.$talent->talent_name.'_'.$format.'.'.$image->getClientOriginalExtension();
        $path = $image->storeAs('public/Project Portfolio',$namegambar);
          DB::table('portfolio')->insert(array (
            'portfolio_name'      => $request->name,
            'portfolio_desc'      => $request->desc,
            'portfolio_tipe_project'=>$request->typeproject,
            'portfolio_namacompany'=>$request->office,
            'portfolio_startdate'=>$bulan.' '.$tahun,
            'portfolio_enddate'=>$bulanend.' '.$tahunend,
            'portfolio_tech'      => $request->tech,
            'portfolio_talent_id' => $request->talent_id,
            'portfolio_image'     => $namegambar,
            'portfolio_date_created'=>$now
          ));          
      }    
      return redirect()->back();
    }

    public function portfolioUpdate(Request $req){
        $bulanend = $req->bulanaddportend;
        $tahunend = $req->tahunaddportend;      
        $bulan = $req->bulanaddport;
        $tahun = $req->tahunaddport; 
        $talent = DB::table('talent')->where('talent_id',$req->talent_id)->first();
        $today = Carbon::now('Asia/Jakarta');
        $format= Carbon::today('Asia/Jakarta')->format('dmY');
        if($req->portfolio_image!=NULL){
            $image = $req->file('portfolio_image');
            $namegambar = 'Image_Project_Portfolio_'.$talent->talent_name.'_'.$format.'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/Project Portfolio/Update Porject Portfolio',$namegambar);
            $update = DB::table('portfolio')->where('portfolio_id',$req->portfol_id)->update([
                'portfolio_name'=>$req->name,
                'portfolio_desc'=>$req->desc,
                'portfolio_tech'=>$req->tech,
                'portfolio_tipe_project'=>$req->typeproject,
                'portfolio_namacompany'=>$req->office,
                'portfolio_startdate'=>$bulan.' '.$tahun,
                'portfolio_enddate'=>$bulanend.' '.$tahunend,
                'portfolio_date_updated'=>$today,
                'portfolio_image'=>$namegambar
            ]);
        }else{
            $update = DB::table('portfolio')->where('portfolio_id',$req->portfol_id)->update([
                'portfolio_name'=>$req->name,
                'portfolio_desc'=>$req->desc,
                'portfolio_tipe_project'=>$req->typeproject,
                'portfolio_namacompany'=>$req->office,
                'portfolio_startdate'=>$bulan.' '.$tahun,
                'portfolio_enddate'=>$bulanend.' '.$tahunend,
                'portfolio_tech'=>$req->tech,
                'portfolio_date_updated'=>$today
            ]);
        }
        return redirect()->back();
    }

    public function portfolioDelete(Request $request)
    {
      DB::table('portfolio')->where('portfolio_id', '=', $request->id)->delete();
      return redirect()->back();
    }


    public function workex(Request $request){
      $data = DB::table('work_experience')
                ->where('workex_talent_id', '=', $request->id)
                ->get();
      $data2 = DB::table('work_experience')
                ->where('workex_talent_id', '=', $request->id)
                ->first();

      return Datatables::of($data)

      ->addColumn('action', function($data){
        return '<center>
        <a href="#talent-workex" data-workex="'.$data->workex_id.'" type="button" data-toggle="modal" data-target="#workexdetail" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top"  type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
        <a href="#edit-workex" data-workexedit="'.$data->workex_id.'" type="button" data-toggle="modal" data-target="#editworkex" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i></a>
        <a href="#delete-workex" data-workexdel="'.$data->workex_id.'" type="button" data-toggle="modal" class="btn btn-danger btn-xs delete-workex" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>

        </center>'
        ;
      })
      ->addColumn('workex_desc', function($data){
        if(strlen(strip_tags($data->workex_desc))>50){
             $status_desc = substr(strip_tags($data->workex_desc), 0,50).'...';
        }
        else{ $status_desc = strip_tags($data->workex_desc); }

        return $status_desc;
      })
    //   ->addColumn('workex_handle_project', function($data){
    //     if(strlen(strip_tags($data->workex_handle_project))>50){
    //          $status_desc = substr(strip_tags($data->workex_handle_project), 0,50).'...';
    //     }
    //     else{ $status_desc = strip_tags($data->workex_handle_project); }

    //     return $status_desc;
    //   })
      ->addColumn('workex_startdate', function($data){
        // $pisah = explode(" ",$data->workex_startdate);
        // $nupenting = array($pisah[1],$pisah[2]);
        // if($pisah[0]==0){
        //     $implode = implode(" ",$nupenting);
        //     return $implode;
        // }else{
        //     $mulai = $data->workex_startdate;
        //     return $mulai;
        // }
        return $data->workex_startdate;
      })
      ->addColumn('workex_enddate', function($data){
        // $pisah = explode(" ",$data->workex_enddate);
        // $nupenting = array($pisah[1],$pisah[2]);
        // if($pisah[0]==0){
        //     $implode = implode(" ",$nupenting);
        //     return $implode;
        // }else{
        //     $akhir = $data->workex_enddate;
        //     return $akhir;
        // }
        return $data->workex_enddate;
      })
      ->rawColumns(['workex_desc','workex_startdate','workex_enddate', 'action'])
      ->make(true);
    }

    public function workexInsert(Request $request){
        // $this->validate($request,[
        //     'office'  =>'required',
        //     'position'=>'required',
        //     'desc'    =>'required',
        //     'handle'  =>'required',
        // ],[
        //     'required'=>':attribute Tidak Boleh Kosong'
        // ]);
        // $file = $request->file('workex_file');
        // if ($file==NULL) {
            $start = $request->tanggal." ".$request->bulan." ".$request->tahun;
            $end = $request->tanggalend." ".$request->bulanend." ".$request->tahunend;
            $now=Carbon::now('Asia/Jakarta');                        
            DB::table('work_experience')->insert(array (
                'workex_office'        =>$request->office,
                'workex_position'      =>$request->position,
                'workex_talent_id'     =>$request->talent_id,
                'workex_desc'          =>$request->desc,
                'workex_handle_project'=>$request->handle,                
                'workex_startdate'     =>$start,
                'workex_enddate'       =>$end,
                'workex_created_date'  =>$now
            ));
        // }else{
        //   $start = $request->tanggal." ".$request->bulan." ".$request->tahun;
        //   $end = $request->tanggalend." ".$request->bulanend." ".$request->tahunend;
        //   $talent = DB::table('talent')->where('talent_id',$request->talent_id)->first();
        //   $now=Carbon::now('Asia/Jakarta');
        //   $format= Carbon::today('Asia/Jakarta')->format('dmY');            
        //   $namefile = 'Work_Experience_'.$talent->talent_name.'_'.$format.'.'.$file->getClientOriginalExtension();
        //   $path = $file->storeAs('public/Work Experience',$namefile);
        //     DB::table('work_experience')->insert(array (
        //       'workex_office'=>$request->office,
        //       'workex_position'=>$request->position,
        //       'workex_talent_id'=>$request->talent_id,
        //       'workex_desc'=>$request->desc,
        //       'workex_handle_project'=>$request->handle,
        //       'workex_file'=>$namefile,
        //       'workex_startdate'=>$start,
        //       'workex_enddate'=>$end,
        //       'workex_created_date'=>$now
        //     ));
        // }        
        return redirect()->back();
        // return "success";
    }

    public function workexupdate(Request $request){
        // if($request->tanggal!=0&&$request->tanggalend!=0){

        // }else{
        //     $start =$request->bulan." ".$request->tahun;
        //     $end = $request->bulanend." ".$request->tahunend;
        //     $talent = DB::table('talent')->where('talent_id',$request->talent_id)->first();
        //     $now=Carbon::now('Asia/Jakarta');
        //     $format= Carbon::today('Asia/Jakarta')->format('dmY');
        //     $file = $request->file('workex_file');
        //     $namefile = 'Work_Experience_'.$talent->talent_name.'_'.$format.'.'.$file->getClientOriginalExtension();
        //     $path = $file->storeAs('public/Work Experience',$namefile);
        //     DB::table('work_experience')->insert(array (
        //         'workex_office'=>$request->office,
        //         'workex_position'=>$request->position,
        //         'workex_talent_id'=>$request->talent_id,
        //         'workex_desc'=>$request->desc,
        //         'workex_handle_project'=>$request->handle,
        //         'workex_file'=>$namefile,
        //         'workex_startdate'=>$start,
        //         'workex_enddate'=>$end,
        //         'workex_created_date'=>$now
        //     ));
        //     return redirect()->back();
        // }
        if($request->workex_file!==NULL){
            $start = $request->tanggal." ".$request->bulan." ".$request->tahun;
            $end = $request->tanggalend." ".$request->bulanend." ".$request->tahunend;
            $talent = DB::table('talent')->where('talent_id',$request->talent_id)->first();
            $now=Carbon::now('Asia/Jakarta');
            $format= Carbon::today('Asia/Jakarta')->format('dmY');
            $file = $request->file('workex_file');
            $namefile = 'Work_Experience_'.$talent->talent_name.'_'.$format.'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/Work Experience/Update Work Experience',$namefile);
              DB::table('work_experience')
              ->where('workex_id',$request->workex_id)->update(array (
                'workex_office'=>$request->office,
                'workex_position'=>$request->position,
                'workex_desc'=>$request->desc,
                'workex_handle_project'=>$request->handle,
                'workex_file'=>$namefile,
                'workex_startdate'=>$start,
                'workex_enddate'=>$end,
                'workex_updated_date'=>$now
              ));
              return redirect()->back()->with('Success','Sukses, Work Experience telah di update');
        }else{
            $start = $request->tanggal." ".$request->bulan." ".$request->tahun;
            $end = $request->tanggalend." ".$request->bulanend." ".$request->tahunend;
            $talent = DB::table('talent')->where('talent_id',$request->talent_id)->first();
            $now=Carbon::now('Asia/Jakarta');
              DB::table('work_experience')
              ->where('workex_id',$request->workex_id)->update(array (
                'workex_office'=>$request->office,
                'workex_position'=>$request->position,
                'workex_desc'=>$request->desc,
                'workex_handle_project'=>$request->handle,
                'workex_startdate'=>$start,
                'workex_enddate'=>$end,
                'workex_updated_date'=>$now
              ));
              return redirect()->back()->with('Success','Sukses, Work Experience telah di update');
        }
    }

    public function workexdetail($id){
        $data = DB::table('work_experience')
                ->join('talent','workex_talent_id','=','talent_id')
                ->where('workex_id', '=', $id)
                ->first();
        return response()->json($data);
    }

    public function workexdelete($id){
        DB::table('work_experience')->where('workex_id', '=', $id)->delete();
        return redirect()->back()->with('Success','Suksess, Data telah di hapus');
    }
    
    public function workex_delete(Request $request)
    {
      $all = DB::table('work_experience')->where('workex_id', '=', $request->input('id'));
      if($all->delete()){
        return response()->json(['message'=>'deleted']);
      }
    }

    public function moveQuarantine()
    {
      $id_array     = $request->input('id');
      // $status_array = $request->input('status');
      // for($i = 0; $i < count($id_array); $i++){
      //   if($request->input('data') == 'interview'){
      //     DB::table('quarantine')->insert(
      //       ['email' => 'john@example.com', 'votes' => 0]
      //     );
      //   }
      // }
      $data = DB::table('talent')->whereIn('talent_id', $id_array);

      if(
      $data->update([ 'talent_condition' => "quarantine"])){
        return 'success';
      }
    }

    public function moveunQuarantine(Request $request)
    {
      $id_array     = $request->input('id');
      // $status_array = $request->input('status');
      // for($i = 0; $i < count($id_array); $i++){
      //   if($request->input('data') == 'interview'){
      //     DB::table('quarantine')->insert(
      //       ['email' => 'john@example.com', 'votes' => 0]
      //     );
      //   }
      // }
      $data = DB::table('talent')->whereIn('talent_id', $id_array);

      if(
      $data->update([ 'talent_condition' => "unprocess"])){
        return 'success';
      }
    }

    public function getreminder(Request $request)
    {
      // dd($request->all());
      $all = DB::table('quarantine')->where('quarantine_talent_id', $request->input('id'))
                                  ->get();
      echo json_encode($all);
    }
  
      public function editreminder(Request $request){
        $data=DB::table('quarantine')->where('quarantine_talent_id','=',$request->input('talent_id'))->update([
            'quarantine_reminder_date'=>$request->input('reminder_date')
        ]);
  
        return redirect()->back()->with('Success','Data Quarantine Reminder Berhasil dirubah');
  
      }

    public function moveStatus(Request $request){
      $id_array     = $request->input('id');
      $request_id_array = $request->input('request_id');

      for($i = 0; $i < count($id_array); $i++){
      $assign=DB::table('assign_request')->where('assign_request_id','=',$request_id_array[$i])->update(['assign_request_status'=>"done"]);
      }

      $data=$request->input('data');

      if($request->input('data') == 'ready'){
        for($i = 0; $i < count($id_array); $i++){
          $cekfile=DB::table('talent')->select('talent_condition')->where('talent_id','=',$id_array[$i])->first();
          if($cekfile == $request->input('data')){
            
          }
          else{
              $quarantine=DB::table('talent')->where('talent_id','=',$id_array[$i])->update([
                'talent_condition'=>"quarantine"
              ]);
              }       
          } 
        }
       if($request->input('data') == 'keep'){
        for($i = 0; $i < count($id_array); $i++ ){
          $cekfile=DB::table('talent')->select('talent_condition')->where('talent_id','=',$id_array[$i])->first();
          if($cekfile == $request->input('data')){

          }
          else{
          $quarantine=DB::table('talent')->where('talent_id','=',$id_array[$i])->update([
            'talent_condition'=>"unprocess"
          ]);  
          }     
        }
       } 
     else{}
       
      
        $jobs = Job_apply::whereIn('jobs_apply_id', $id_array);   

        if(
          $jobs->update([ 'jobs_apply_status' => $data])){
            return 'success';
          }
          else{return'gagal';}
      
        
    }
    

    public function  addeducation(Request $request){      
      $bulanend = $request->bulanaddeduend;
      $tahunend = $request->tahunaddeduend;      
      $bulan = $request->bulanaddedu;
      $tahun = $request->tahunaddedu;      
      if ($request->file('edu_file')==NULL) {
        if($request->edu_level_other==NULL){
          $edu = DB::table('education')->insert([
              'edu_talent_id'=>$request->talent_id,
              'edu_level'=>$request->edu_level,
              'edu_name' =>$request->edu_name,
              'edu_datestart'=>$bulan.' '.$tahun,
              'edu_dateend'=>$bulanend.' '.$tahunend,
              'edu_value'=>$request->edu_value,
              'edu_field'=>$request->edu_field,             
          ]);
        }else{
            $edu = DB::table('education')->insert([
              'edu_talent_id'=>$request->talent_id,
              'edu_level'=>$request->edu_level,
              'edu_name' =>$request->edu_name,
              'edu_datestart'=>$bulan.' '.$tahun,
              'edu_dateend'=>$bulanend.' '.$tahunend,
              'edu_value'=>$request->edu_value,
              'edu_field'=>$request->edu_field,              
              'edu_level_other'=>$request->edu_level_other
          ]);
        }
      }else{
        $file = $request->file('edu_file');
        $name = 'Education_'.$request->talent.'_'.Carbon::now()->format('dmY').'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/Education',$name);
        // dd($path);
        if($request->edu_level_other==NULL){
          $edu = DB::table('education')->insert([
              'edu_talent_id'=>$request->talent_id,
              'edu_level'=>$request->edu_level,
              'edu_name' =>$request->edu_name,
              'edu_datestart'=>$bulan.' '.$tahun,
              'edu_dateend'=>$bulanend.' '.$tahunend,
              'edu_value'=>$request->edu_value,
              'edu_field'=>$request->edu_field,
              'edu_file'=>$name
          ]);
        }else{
            $edu = DB::table('education')->insert([
              'edu_talent_id'=>$request->talent_id,
              'edu_level'=>$request->edu_level,
              'edu_name' =>$request->edu_name,
              'edu_datestart'=>$bulan.' '.$tahun,
              'edu_dateend'=>$bulanend.' '.$tahunend,
              'edu_value'=>$request->edu_value,
              'edu_field'=>$request->edu_field,
              'edu_file'=>$name,
              'edu_level_other'=>$request->edu_level_other
          ]);
        }
      }     
      return redirect()->back();
    }

    public function detaileducation($id){
        $edu = DB::table('education')->where('edu_id',$id)->first();

        return response()->json($edu);
    }

    public function  addcertification(Request $request){
      $bulan = $request->bulancertifex;
      $tahun = $request->tahuncertifex;      
      $file = $request->file('certif_file');
      if ($file==NULL) {
        if ($bulan==NULL&&$tahun==NULL) {
          $certif = DB::table('certification')->insert([
            'certif_talent_id'=>$request->talent_id,
            'certif_name' =>$request->certif_name,
            'certif_years'=>$request->certif_years,
            'certif_company'=>$request->certif_company,
            'certif_desc'=>$request->certif_desc,
            'certif_number'=>$request->certif_number,
            'certif_expired'=>'No Expiration Date'            
          ]); 
        }else{
          $certif = DB::table('certification')->insert([
            'certif_talent_id'=>$request->talent_id,
            'certif_name' =>$request->certif_name,
            'certif_years'=>$request->certif_years,
            'certif_company'=>$request->certif_company,
            'certif_desc'=>$request->certif_desc,
            'certif_number'=>$request->certif_number,
            'certif_expired'=>$bulan.' '.$tahun            
          ]);
        }        
      }else{
        $name = 'Certification_'.$request->talent.'_'.Carbon::now()->format('dmY').'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/Certification',$name);
        if ($bulan==NULL&&$tahun==NULL) {
          $certif = DB::table('certification')->insert([
            'certif_talent_id'=>$request->talent_id,
            'certif_name' =>$request->certif_name,
            'certif_years'=>$request->certif_years,
            'certif_company'=>$request->certif_company,
            'certif_desc'=>$request->certif_desc,
            'certif_number'=>$request->certif_number,
            'certif_expired'=>'No Expiration Date',            
            'certif_file'=>$name
          ]); 
        }else{
          $certif = DB::table('certification')->insert([
            'certif_talent_id'=>$request->talent_id,
            'certif_name' =>$request->certif_name,
            'certif_years'=>$request->certif_years,
            'certif_company'=>$request->certif_company,
            'certif_desc'=>$request->certif_desc,
            'certif_number'=>$request->certif_number,
            'certif_expired'=>$bulan.' '.$tahun,
            'certif_file'=>$name
        ]);  
        }          
      }      
      return redirect()->back();
    }

    public function detailcertification($id){
        $edu = DB::table('certification')->where('certif_id',$id)->first();

        return response()->json($edu);
    }

    public function updateeducation(Request $request,$id){
      $getdata = DB::table('education')->where('edu_id',$id)->first();
      $getnamatalent = DB::table('talent')->where('talent_id',$getdata->edu_talent_id)->first();
      $bulanend = $request->bulanaddeduend;
      $tahunend = $request->tahunaddeduend;      
      $bulan = $request->bulanaddedu;
      $tahun = $request->tahunaddedu;
      $updateeducation = DB::table('education')->where('edu_id',$id)->update([
              'edu_level'=>$request->edu_level,
              'edu_name' =>$request->edu_name,
              'edu_datestart'=>$bulan.' '.$tahun,
              'edu_dateend'=>$bulanend.' '.$tahunend,
              'edu_value'=>$request->edu_value,
              'edu_field'=>$request->edu_field
            ]);      
      if($request->edu_file!=NULL){
          $deletefile = unlink(storage_path('app/public/Education/'.$getdata->edu_file));
          $file = $request->file('edu_file');
          $name = 'Education_'.$getnamatalent->talent_name.'_'.Carbon::now()->format('dmY').'.'.$file->getClientOriginalExtension();
          $path = $file->storeAs('public/Education',$name);

          $updateedu = DB::table('education')->where('edu_id',$id)->update([
            'edu_file'=>$name,
            ]);
          }
      else{}
        
        if ($request->edu_level_other!=NULL) {

            $updateedu = DB::table('education')->where('edu_id',$id)->update([
  
              'edu_level_other'=>$request->edu_level_other
            ]);

        }else{}
      
      
      return redirect()->back();
    }

     public function updatecertification(Request $request,$id){
      $bulan = $request->bulancertifex;
      $tahun = $request->tahuncertifex; 
       if($request->certif_file!=NULL){
            $getdata = DB::table('certification')->where('certif_id',$id)->first();
            $deletefile = unlink(storage_path('app/public/Certification/'.$getdata->certif_file));
            $getnamatalent = DB::table('talent')->where('talent_id',$getdata->certif_talent_id)->first();
            $file = $request->file('certif_file');
            $name = 'Certification_'.$getnamatalent->talent_name.'_'.Carbon::now()->format('dmY').'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/Certification',$name);
            $certif = DB::table('certification')->where('certif_id',$id)->update([
                'certif_name' =>$request->certif_name,
                'certif_years'=>$request->certif_years,
                'certif_company'=>$request->certif_company,
                'certif_desc'=>$request->certif_desc,
                'certif_number'=>$request->certif_number,
                // if($bulan=NULL && $tahun=NULL){
                //     'certif_expired' => 'No Expiration Date'
                // } else{
                //     'certif_expired'=>$bulan.' '.$tahun,
                // }
                 'certif_expired'=>$bulan.' '.$tahun,
                'certif_file'=>$name
            ]);
       }else{
        $certif = DB::table('certification')->where('certif_id',$id)->update([
                'certif_name' =>$request->certif_name,
                'certif_years'=>$request->certif_years,
                'certif_company'=>$request->certif_company,
                'certif_desc'=>$request->certif_desc,
                'certif_number'=>$request->certif_number,
                'certif_expired'=>$bulan.' '.$tahun,
            ]);
       }
       return redirect()->back();
     }

     public function viewedu($id){
        $viewedu = DB::table('education')->where('edu_id',$id)->first();
        return response()->json($viewedu);
     }
     public function viewcertif($id){
        $viewcertif = DB::table('certification')->where('certif_id',$id)->first();
        return response()->json($viewcertif);
     }

     public function deletecertification(Request $req,$id){
      $now=Carbon::now('Asia/Jakarta');
        // Hapus Filenya belum
        $hapus = DB::table('certification')->where('certif_id',$id)->update(['certif_delete_date'=>$now]);
        return redirect()->back();
     }

     public function deleteeducation(Request $request,$id){
        $now=Carbon::now('Asia/Jakarta');

        // Hapus Filenya belum
        $hapus = DB::table('education')->where('edu_id',$id)->update(['edu_deleted_date'=>$now]);
        return redirect()->back();
     }

     public function storenote(Request $req,$id){
        $simpan = DB::table('talent')->where('talent_id',$req->talentid)->updateOrInsert(
            ['talent_id'=>$req->talentid],
            ['talent_notes_report_talent'=>$req->notes,]);
        return redirect()->back();
     }


     
     public function detailtalent($id){
      // $this ->validate($request, [
      //   'talent_name' => 'required',
      //   'talent_foto' => 'max:500|sometimes|mimes:jpeg,png,jpg,JPG,JPEG',
      //   'talent_email' => 'required',
      //   'talent_martial_status' => 'required',
      //   'talent_phone' => 'required|numeric|min:11',
      //   'talent_gender' => 'required',
      // ]);

      // $update = Talent::find($talent->talent_id); 
      // $photo = $request->file('photo');
      //   if ($photo)
      //   {
      //       $extension = $photo->getClientOriginalExtension(); 
      //       $filename = 'profile-'.$id.'.'.$extension;

      //       $image_resize = Image::make($photo->getRealPath());              
      //       $image_resize->resize(600, 600, function ($constraint) {
      //           $constraint->aspectRatio();
      //       })->save(public_path('/storage/photo/' .$filename));

      //       $update['talent_foto'] = $filename ; 
      //   }

      // $talent = Talent::create([
      //   'talent_name' => $request->talent_name,
      //   'talent_foto' => $request->talent_foto,
      //   'talent_email' => $request->talent_email,
      //   'talent_martial_status' => $request->talent_martial_status,
      //   'talent_phone' => $request->talent_phone,
      //   'talent_gender' => $request->talent_gender,
      // ]);


      //   $update['talent_name'] = $request->name ; 
      //   $update['talent_profile_desc'] = $request->profile_desc ; 
      //   $update['talent_salary'] = preg_replace('/[^0-9]/', '', $request->salary) ; 
      //   $update['talent_salary_jogja'] = preg_replace('/[^0-9]/', '', $request->salary_jogja) ; 
      //   $update['talent_salary_jakarta'] = preg_replace('/[^0-9]/', '', $request->salary_jakarta) ; 
      //   $update['talent_prefered_city'] = $request->prefered_city ; 
      //   $update['talent_focus'] = $request->focus ; 
      //   $update['talent_level'] = $request->level ; 
      //   $update['talent_phone'] = $request->phone ; 
      //   $update['talent_address'] = $request->address; 
      //   $update['talent_gender'] = $request->gender; 
      //   $update['talent_phone'] = $request->phone; 
      //   $update['talent_luar_kota'] = $request->luar_kota; 
      //   $update['talent_onsite_jakarta'] = $request->onsite_jakarta; 
      //   $update['talent_onsite_jogja'] = $request->onsite_jogja; 
      //   $update['talent_remote'] = $request->remote; 
      //   $update['talent_international'] = $request->international; 
      //   $update['talent_current_work'] = $request->current_work; 
      //   $update['talent_isa'] = $request->isa; 
      //   $update['talent_web'] = $request->website ; 
      //   $update['talent_linkedin'] = $request->linkedin ; 
      //   $update['talent_facebook'] = $request->facebook ; 
      //   $update['talent_instagram'] = $request->instagram ; 
      //   $update['talent_twitter'] = $request->twitter ; 
      //   $update['talent_freelance_hour'] = preg_replace('/[^0-9]/', '', $request->freelance_hour) ; 
      //   $update['talent_project_min'] = preg_replace('/[^0-9]/', '', $request->project_min) ; 
      //   $update['talent_project_max'] = preg_replace('/[^0-9]/', '', $request->project_max) ; 
      //   $update['talent_konsultasi_rate'] = preg_replace('/[^0-9]/', '', $request->konsultasi_rate) ; 
      //   $update['talent_ngajar_rate'] = preg_replace('/[^0-9]/', '', $request->ngajar_rate) ; 
      //   $update->save(); 



      // return back()->with('success', 'save successful');


        $talent = DB::table('talent')  
            ->join('campus','campus.campus_id','=','talent.talent_campus')          
            ->where('talent_id',$id)->first();
       return response()->json($talent);


     }

    public function notify(){
      Mail::to('elvron.indonesia@gmail.com')->send(new progressMail);
      dd(Mail::failures());
    }
    
    
    
    
    public function tofile() {
        ini_set("memory_limit", -1);
        $talent    = DB::table('talent')->select('talent_id', 'talent_name', 'talent_created_date', 'talent_cv')
                    ->whereNull('talent_cv_update')->whereNotNull('talent_cv')->orderBy('talent_id', 'ASC')->get();
        echo count($talent); die('b');
        $no = 1;
        foreach ($talent as $v) {
            if(!is_null($v->talent_cv) || $v->talent_cv!=''){
                $inputfile  = $v->talent_cv;
                $tanggal    = date('dmy', strtotime($v->talent_created_date))."_".date('his', strtotime($v->talent_created_date));
                $outputfile = "Applier_CV_".$v->talent_name."_".$tanggal.".pdf";
                // $path       = "cv/".$outputfile;
                $path       = "storage/app/public/Curriculum Vitae/".$outputfile;
        
                $ifp = fopen( $path, "wb" );
                fwrite( $ifp, base64_decode( $inputfile ) );
                fclose( $ifp );
                
                // update to db
                $talent = Talent::where('talent_id', '=', $v->talent_id)->first();
                $talent->talent_cv_update = $outputfile;
                $talent->update();
                
                echo $no." - ".$v->talent_id."<br>";
                $no++;
            }
        }
    }
    
    public function cek_import_talent() {
        $data = DB::table('talent_temp')->select('talent_id')->where('status','NO')->orderBy('talent_id', 'ASC')->get();
        foreach($data as $v) {
            $cek = DB::table('talent')->select('talent_id')->where('talent_id',$v->talent_id)->get();
            if( count($cek)>0 ) {
                DB::table('talent_temp')->where('talent_id',$v->talent_id)->update(['status'=>'ADA']);
            }
        }
        echo '<h1>DONE</h1>';
    }
    public function cek_import_jobsapply() {
        $data = DB::table('jobs_apply_temp')->select('jobs_apply_id')->where('status','NO')->orderBy('jobs_apply_id', 'ASC')->get();
        foreach($data as $v) {
            $cek = DB::table('jobs_apply')->select('jobs_apply_id')->where('jobs_apply_id',$v->jobs_apply_id)->get();
            if( count($cek)>0 ) {
                DB::table('jobs_apply_temp')->where('jobs_apply_id',$v->jobs_apply_id)->update(['status'=>'ADA']);
            }
        }
        echo '<h1>DONE</h1>';
    }




}