<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobca;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;
use App\Mentor;
use App\Materi;
use App\MentorEvent;
use App\Calendar;
use App\Soal;
use App\Fasilitas;
use App\BootFas;
use App\Icon;
use App\Register;
use App\ClassEvent;
use App\LocationMaster;
use Yajra\Datatables\Datatables;
use App\Models\Job_apply;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//use Image;
use Charts;



class adminController extends Controller
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
    $fullAll = DB::table('jobs_apply')
                ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                ->where('jobs_apply_type_time', '=', 'fulltime')->count();
    $fullU   = DB::table('jobs_apply')
                      ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                      ->where([
                          ['jobs_apply_type_time', '=', 'fulltime'],
                          ['jobs_apply_status', '=', 'unprocess']
                        ])->count();
    $fullI   = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'fulltime'],
                      ['jobs_apply_status', '=', 'interview']
                    ])->count();
    $fullH  = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'fulltime'],
                      ['jobs_apply_status', '=', 'hired']
                    ])->count();
    $fullR   = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'fulltime'],
                      ['jobs_apply_status', '=', 'rejected']
                    ])->count();
    $partU   = DB::table('jobs_apply')
                      ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                      ->where([
                          ['jobs_apply_type_time', '=', 'parttime'],
                          ['jobs_apply_status', '=', 'unprocess']
                        ])->count();
    $inpInt  = DB::table('jobs_apply')
                      ->select('jobs_apply_id')
                      ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                      ->where([
                          ['jobs_apply_internal', '=', 'YES']
                        ])->count();
    $inpApp  = DB::table('jobs_apply')
                      ->select('jobs_apply_id')
                      ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                      ->where([
                          ['jobs_apply_internal', '=', 'NO']
                        ])->count();
    $partI   = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'parttime'],
                      ['jobs_apply_status', '=', 'interview']
                    ])->count();
    $partH  = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'parttime'],
                      ['jobs_apply_status', '=', 'hired']
                    ])->count();
    $partR   = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'parttime'],
                      ['jobs_apply_status', '=', 'rejected']
                    ])->count();
    $intU   = DB::table('jobs_apply')
                      ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                      ->where([
                          ['jobs_apply_type_time', '=', 'internship'],
                          ['jobs_apply_status', '=', 'unprocess']
                        ])->count();
    $intI   = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'internship'],
                      ['jobs_apply_status', '=', 'interview']
                    ])->count();
    $intH  = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'internship'],
                      ['jobs_apply_status', '=', 'hired']
                    ])->count();
    $intR   = DB::table('jobs_apply')
                  ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                  ->where([
                      ['jobs_apply_type_time', '=', 'internship'],
                      ['jobs_apply_status', '=', 'rejected']
                    ])->count();
    $jobsA             = DB::table('jobs')->where('jobs_active', '=', 'Y')->count();
    $jobsN             = DB::table('jobs')->where('jobs_active', '=', 'N')->count();
    $pra_talent        = DB::table('pra_talent')->select('pt_id')->count();
    $pra_talent_status = DB::table('pra_talent_status')->select('pts_id')->count();
    $jobs              = Job::all();
    $talent            = DB::table('talent')->count();    
    $talentSkill       = DB::table('talent')->select('talent_id')
                        ->join('skill_talent', 'skill_talent.st_talent_id', '=', 'talent.talent_id' )
                        ->groupBy('talent.talent_id')
                        ->get();
    $talentSkill = count($talentSkill);
    // dd($talentSkill);
    $tsPersen = round($talentSkill/$talent*100, 2);
    $tgl1 = date('Y-m-d');
    $tgl2 = date('Y-m-d', strtotime($tgl1 . '-1 day'));
    $tgl3 = date('Y-m-d', strtotime($tgl2 . '-1 day'));
    $tgl4 = date('Y-m-d', strtotime($tgl3 . '-1 day'));
    $tgl5 = date('Y-m-d', strtotime($tgl4 . '-1 day'));
    $tgl6 = date('Y-m-d', strtotime($tgl5 . '-1 day'));
    $tgl7 = date('Y-m-d', strtotime($tgl6 . '-1 day'));
    $tgl8 = date('Y-m-d', strtotime($tgl7 . '-1 day'));
    $tgl9 = date('Y-m-d', strtotime($tgl8 . '-1 day'));
    $tgl10 = date('Y-m-d', strtotime($tgl9 . '-1 day'));
    $tgl = array (
      date('d')   => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl1.'%')->count(),
      date('d', strtotime($tgl1.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl2.'%')->count(),
      date('d', strtotime($tgl2.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl3.'%')->count(),
      date('d', strtotime($tgl3.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl4.'%')->count(),
      date('d', strtotime($tgl4.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl5.'%')->count(),
      date('d', strtotime($tgl5.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl6.'%')->count(),
      date('d', strtotime($tgl6.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl7.'%')->count(),
      date('d', strtotime($tgl7.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl8.'%')->count(),
      date('d', strtotime($tgl8.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl9.'%')->count(),
      date('d', strtotime($tgl9.'-1 day')) => DB::table('jobs_apply')->where('jobs_apply_created_date', 'like', $tgl10.'%')->count()
    );


    $requestcompany=DB::table('request')        
                      ->join('company','request_company_id','company_id')
                      ->where('request_status','=','active')
                      ->orderBy('company_name','asc')
                      ->orderBy('request_posisi','asc')
                      ->get();

    // $requestcompany=DB::table('request')->join('company_position','cp_request','request.request_id')
    //                                     ->join('jobs','jobs_id','cp_jobs_id')
    //                                     ->join('company','request_company_id','company_id')
    //                                     ->join('location','location_id','request_location')
    //                                     ->orderBy('company_name','asc')
    //                                     ->orderBy('jobs_title','asc')
    //                                     ->get();
                                        // ->groupBy('cp_jobs_id','cp_company_id','cp_request')

     return view('admin.dashboard', compact('fullAll', 'fullU', 'fullI', 'fullH', 'fullR', 'partU', 'talent', 'talentSkill', 'pra_talent', 'pra_talent_status', 
     'tsPersen', 
      'partI',
      'partH',
      'partR',
      'intU',
      'intI',
      'intH',
      'intR',
      'jobsA',
      'jobsN',
      'tgl',
      'inpInt',
      'inpApp',
      'jobs',
      'requestcompany'));
  }

  public function count(Request $request){
    $data = $request->array;
    $json = array();
    for($i = 0; $i < count($data); $i++){
      $param   = explode('-', $data[$i]);
      $status  = $param[0];
      $jobs_id = $param[1];
      $count   = array('id' => $data[$i],
                     'count' => Job_apply::where('jobs_apply_jobs_id', '=', $jobs_id)->where('jobs_apply_status', '=', $status)->count());
      array_push($json, $count);
    }
    
    return json_encode($json); 
  }

  public function bootcamp()
  {
      return view('admin.bootcamp.index');
  }

  public function allBootcamp()
  {
      $all = Bootcamp::orderBy('event_id', 'desc')->get();

    return Datatables::of($all)
    ->addIndexColumn()
    ->addColumn('created_date', function($all){
      return $all->created_date->format('d M Y');
    })
    ->addColumn('event_title', function($all){
      if(Carbon::now()->gte($all->event_enddate))
      {
        $status = '<span class="badge badge-secondary">Closed</span>';
      }
      else
      {
        $status = '<span class="badge badge-primary">Active</span>';
      }

      return $all->event_title.' '.$status;
    })
    ->addColumn('event_fee', function($all){
      if($all->event_fee == 'paid'){
        return '<center><span class="badge badge-info">Paid</span></center>';
      } else{
        return '<center><span class="badge badge-success">Free</span></center>';
      }
    })
    ->addColumn('action', function($all){
      return '<center>
      <a href="'.route('bootcamp.edit').'?id='.$all->event_id.'" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      <a href="#detail-bootcamp" data-detail="'.$all->event_id.'" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-preview" data-placement="top" title="See Event Details" target="_blank"><i class="fa fa-share-square-o"></i></a>
      <a href="#" id="'.$all->event_id.'" class="btn btn-danger btn-sm deleteBootcamp"><i class="fa fa-trash"></i></a>
      </center>';
    })
    ->rawColumns(['event_title','action','event_fee'])
    ->make(true);
  }

  public function createBootcamp()
  {
      $fas = Fasilitas::all();
      $mentor = Mentor::all();
      $soal = Soal::all();
      $icon = Icon::all();
      $loc = LocationMaster::all();
      $class = ClassEvent::where('parent_id','=',0)->get();

      return view('admin.bootcamp.create', compact('fas','mentor','soal','icon','loc','class'));
  }

  public function storeBootcamp(Request $request)
  {
    dd($request->all());
  

  return view('admin.bootcamp.index');
    

  }

  public function editBootcamp(Request $request)
  {
    $bootcamp = Bootcamp::where('event_id', '=', $request->id)->first();
    $class = ClassEvent::where('parent_id','=',0)->get();
    $cal = Calendar::where('main_event_id','=', $request->id)->get();
    $loc = LocationMaster::all();

    return view('admin.bootcamp.edit', compact('bootcamp','class','cal','loc'))->with('fas', Fasilitas::all())->with('mentor', Mentor::all())->with('soal', Soal::all())->with('icon', Icon::all());
    // dd($cal);
  }

  public function detail(Request $request)
    {
    	$bootcamp = Bootcamp::where('event_id','=', $request->id)->first();

    return response()->json($bootcamp);
    }
  
  public function editKalender(Request $request)
  {
    $kalender = Calendar::where('calendar_id','=', $request->id)->first();
    return response()->json($kalender);
  }

  public function updateKalender(Request $request, $id)
  {
    // dd($request->all());
    $kalender = Calendar::find($id)->first();
    $kalender->calendar_name = $request->calendar_name;
    $kalender->calendar_date = $request->calendar_date;
    $kalender->url = $request->url;
    $kalender->update();

    return redirect()->back()->with('Success', 'Data sudah diupdate');
  }

  public function deleteKalender(Request $request)
  {
    // dd($request->all($calendar_id));
    // $kalender = DB::connection('erpo_bootcamp')->table('t_calendar')->where('calendar_id', $request->calendar_id)->delete();
    $kalender = Calendar::where('calendar_id','=', $request->id);
    
    if($kalender->delete())
      {
        return 'success';
      }
      else
      {
      return 'error';
      }
  }

  public function eventlocation(Request $request)
    {
        // dd($request->all());
        $bootcamp = DB::connection('erpo_bootcamp')->table('t_event')->where('event_id', $request->event_id)->update([
            'event_location' => $request->event_location
        ]);

        return redirect()->back()->with('Success','Location sudah ditambahkan');
    }

  public function mentorEvent(Request $request)
  {
    $mentor = $request->input('mentor');
    $data             = new MentorEvent();
    $data->event_id   = $request->input('event_id');
    $data->save();
    foreach ($mentor as $m)
    {
      $simpan = DB::connection('erpo_bootcamp')->table('t_mentor_event')->insert([
        'event_id' => $request->input('event_id'),
        'ment_id' => $m
      ]);
    }

    return redirect()->back();
  }

  public function materiEvent(Request $request)
  {
    //dd($request->all());
    $bootcamp = DB::connection('erpo_bootcamp')->table('t_event')->where('event_id', $request->event_id)->update([
      'event_materi' => $request->event_materi
    ]);

    return redirect()->back()->with('Success','Berhasil ditambahkan');
  }

  public function soalEvent(Request $request)
  {
    //dd($request->all());
    $bootcamp = DB::connection('erpo_bootcamp')->table('t_event')->where('event_id', $request->event_id)->update([
      'event_soal' => $request->event_soal
    ]);

    return redirect()->back()->with('Success','Berhasil ditambahkan');
  }

  public function deleteBootcamp(Request $request)
  {
    $data = Bootcamp::where('event_id', '=', $request->id);
    // $data->fasilitas()->detach($request->id);
    // $data->mentor()->detach($request->id);

    if($data->delete())
      {
        $icon = DB::connection('erpo_bootcamp')->table('t_bootico')->where('main_event','=', $request->id)->delete();
        $fas = DB::connection('erpo_bootcamp')->table('t_bootfas')->where('main_event','=', $request->id)->delete();
        $mentor = DB::connection('erpo_bootcamp')->table('t_mentor_event')->where('ev_id','=', $request->id)->delete();
        $cal = DB::connection('erpo_bootcamp')->table('t_calendar')->where('main_event_id','=', $request->id)->delete();
        return 'success';
      }
      else
      {
      return 'error';
      }

  }

  public function updateBootcamp(Request $request, $id)
  {

    $event = Bootcamp::find($id);

    if(!empty($request->event_image)) {
        $image= $request->file('event_image');
        $imageName = 'Image_Event_'.$event->event_title.'.'.$image->getClientOriginalExtension();
        $path = public_path().'/event';
        $upload = $image->move($path,$imageName);
      } 
      else 
      {
        $imageName= $event->event_image;
      }

    $event->event_title = $request->event_title;
    $event->event_fee = $request->event_fee;
    $event->event_class = $request->event_class;
    $event->event_desclass = $request->event_desclass;
    $event->event_image = $imageName;
    $event->event_date = $request->event_date;
    $event->event_enddate = $request->event_enddate;
    $event->event_location = $request->event_location;
    $event->event_soal = $request->soal;
    $event->slug_title = Str::slug($request->get('event_title'));
    $event->update();

    $event->fasilitas()->sync($request->fasilitas);
    $event->mentor()->sync($request->mentor);

    $waks = Calendar::where('main_event_id', '=', $id)->delete();
  if($request->input('id') == null)
  {
  return redirect('admin/bootcamp/');
  }
  else 
  {
    foreach($request->input('id') as $key => $value) {
      $kalender  = new Calendar;
      $kalender->main_event_id = $event->event_id;
      $kalender->calendar_name = $request->calendar_name[$key];
      $kalender->calendar_date = $request->calendar_date[$key];
      $kalender->url = $request->url[$key];
      $kalender->calendar_text = $request->text[$key];
      $kalender->save();
    }
    return redirect('admin/bootcamp/');
  }
  }

  public function eventlist()
  {
    $bootcamp = DB::connection('erpo_bootcamp')->table('t_event')->join('t_location','loc_id','=','t_event.event_location')->get();
    $no = 1;

    return view('admin.bootcamp.eventlist', compact('bootcamp','no'));
  }

  public function applicant($id)
  {
      $all = Register::where('main_event_id',$id)->get();
      $test = Register::where('reg_step','send_soal')->where('main_event_id',$id)->get();
      $lolos = Register::where('reg_step','lulus')->where('main_event_id',$id)->get();
      $title = Bootcamp::where('event_id',$id)->first();
      $bootcamp = Bootcamp::all();
      $bootcamps = Bootcamp::all(); 
      $count = DB::connection('erpo_bootcamp')->table('t_register')->where('reg_step', '=', 'lolos')->where('main_event_id', $id)->get()->count();
      $viscount = Register::where('reg_step','send_soal')->where('main_event_id', $id)->get()->count();
      $rcount = Register::where('reg_step','recruit')->where('main_event_id', $id)->get()->count();

      return view('admin.bootcamp.applicant', compact('all','test','lolos','title','bootcamp','bootcamps','count','viscount','rcount'));
      // dd($bootcamp);
  }

  public function allApplicant(Request $request)
  {
    $all = Register::orderBy('reg_id', 'asc')->where('main_event_id',$request->id)->get();
    // $event = DB::connection('erpo_bootcamp')->table('t_register')->join('t_event','event_id','=','t_register.main_event_id')->get();

    return Datatables::of($all)
    ->addColumn('checkbox', '<center><input type="checkbox" name="applicant_checkbox[]" class="checkbox" value="{{$reg_id}}"/></center>')
    ->addIndexColumn()
    ->addColumn('created_date', function($all){
      return $all->created_date->format('d M Y');
    })
    ->addColumn('reg_name_f', function($all){
      return $all->reg_name_f.' '.$all->reg_name_b;
    })
    ->addColumn('Email', function($all){
      return $all->reg_email;
    })
    ->addColumn('Job', function($all){
      return $all->reg_job;
    })
    ->addColumn('reg_step', function($all){
      if($all->reg_step == 'new'){
        $ready = '<span class="badge badge-info">New</span>';
      }
      elseif($all->reg_step == 'lolos'){
        $ready = '<span class="badge badge-success">Lolos</span>';
      }
      elseif($all->reg_step == 'send_soal'){
        $ready = '<span class="badge badge-warning">Test</span>';
      }
      elseif($all->reg_step == 'reviewsoal'){
        $ready = '<span class="badge badge-warning">Review Soal</span>';
      }
      elseif($all->reg_step == 'tolak'){
        $ready = '<span class="badge badge-danger">Ditolak</span>';
      }
      elseif($all->reg_step == 'recruit'){
        $ready = '<span class="badge badge-success">Recruited</span>';
      }
      return $ready;
    })
    ->addColumn('reg_status', function($all){
      if($all->reg_status == 'beginner'){
        $stat = '<span class="badge badge-success">Beginner</span>';
      }
      return $stat;
    })
    ->addColumn('action', function($all){
      return '<center>
      <a href="#edit-applicant" data-editid="'.$all->reg_id.'" type="button" data-toggle="modal" data-target="#modal-edit-applicant" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      <a href="" id="'.$all->reg_id.'" data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-info btn-sm tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class=" fa fa-check"></i></a>
      <a href="#" id="'.$all->reg_id.'" class="btn btn-danger btn-sm deleteApplicant"><i class="fa fa-trash"></i></a>
      </center>';
    })
    ->rawColumns(['checkbox','reg_name_f','reg_step','reg_status','action'])
    ->make(true);
  }

  public function move(Request $request)
  {
    $id_array = $request->input('id');
    // $step = $request->input('pindah');

    $data = Register::whereIn('reg_id', $id_array);

    if($data->update(['reg_step' => 'lolos']))
    {
      return 'success';
    }
  }

  public function moverec(Request $request)
  {
    $id_array = $request->input('id');
    // $step = $request->input('pindah');

    $data = Register::whereIn('reg_id', $id_array);

    if($data->update(['reg_step' => 'recruit']))
    {
      return 'success';
    }
  }

  public function movesend(Request $request)
  {
    $id_array = $request->input('id');
    // $step = $request->input('pindah');

    $data = Register::whereIn('reg_id', $id_array);

    if($data->update(['reg_step' => 'send_soal']))
    {
      return 'success';
    }
  }

  public function linkAdd(Request $request){
    if(isset($request->reg_jawabantes_link)){
      if(Register::where('reg_id', '=', $request->reg_id)->update([ 'reg_jawabantes_link' => $request->reg_jawabantes_link])){
          return "berhasil";
      } else {
          return "gagal"; 
      }
    }else{
      if(Register::where('reg_id', '=', $request->reg_id)->update([ 'reg_jawabantes_link' => ''])){
          return "berhasil";
      } else {
          return "gagal";
      }
    }
  }

  public function linkGet(Request $request){
    $data = DB::connection('erpo_bootcamp')->table('t-register')->select('reg_jawabantes_link')->where('reg_id', '=' ,$request->reg_id)->get();
    if(isset($data)){
      return json_encode($data);
    } else {
      return false;
    }
  }

  public function allLolos(Request $request)
  {
    $all = Register::where('reg_step','lolos')->where('main_event_id', $request->id)->orderBy('reg_id', 'asc')->get();

    return Datatables::of($all)
    ->addColumn('checkbox', '<center><input type="checkbox" name="applicant_checkbox[]" class="checkbox" value="{{$reg_id}}"/></center')
    ->addIndexColumn()
    ->addColumn('created_date', function($all){
      return $all->created_date->format('d M Y');
    })
    ->addColumn('reg_name_f', function($all){
      return $all->reg_name_f.' '.$all->reg_name_b;
    })
    ->addColumn('Email', function($all){
      return $all->reg_email;
    })
    ->addColumn('Job', function($all){
      return $all->reg_job;
    })
    ->addColumn('reg_step', function($all){
      if($all->reg_step == 'lolos'){
        $ready = '<span class="badge badge-success">Lolos</span>';
      }
      return $ready;
    })
    ->addColumn('reg_status', function($all){
      if($all->reg_status == 'beginner'){
        $stat = '<span class="badge badge-success">Beginner</span>';
      }
      return $stat;
    })
    ->addColumn('action', function($all){
      return '<center>
      <a href="#edit-applicant" data-editid="'.$all->reg_id.'" type="button" data-toggle="modal" data-target="#modal-edit-applicant" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      <a href="" id="'.$all->reg_id.'" data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-info btn-sm tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class=" fa fa-check"></i></a>
      <a href="#" id="'.$all->reg_id.'" class="btn btn-danger btn-sm deleteApplicant"><i class="fa fa-trash"></i></a>
      </center>';
    })
    ->rawColumns(['checkbox','reg_name_f','reg_step','reg_status','action'])
    ->make(true);
  }

  public function allSend(Request $request)
  {
    $all = Register::where('reg_step','send_soal')->where('main_event_id', $request->id)->orderBy('reg_id', 'asc')->get();

    return Datatables::of($all)
    ->addColumn('checkbox', '<center><input type="checkbox" name="applicant_checkbox[]" class="checkbox" value="{{$reg_id}}"/></center')
    ->addIndexColumn()
    ->addColumn('created_date', function($all){
      return $all->created_date->format('d M Y');
    })
    ->addColumn('reg_name_f', function($all){
      return $all->reg_name_f.' '.$all->reg_name_b;
    })
    ->addColumn('Email', function($all){
      return $all->reg_email;
    })
    ->addColumn('Job', function($all){
      return $all->reg_job;
    })
    ->addColumn('reg_step', function($all){
      if($all->reg_step == 'send_soal'){
        $ready = '<span class="badge badge-warning">Test</span>';
      }
      return $ready;
    })
    ->addColumn('reg_status', function($all){
      if($all->reg_status == 'beginner'){
        $stat = '<span class="badge badge-success">Beginner</span>';
      }
      return $stat;
    })
    ->addColumn('action', function($all){
      return '<center>
      <a href="#edit-applicant" data-editid="'.$all->reg_id.'" type="button" data-toggle="modal" data-target="#modal-edit-applicant" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      <a href="" id="'.$all->reg_id.'" data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-info btn-sm tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class=" fa fa-check"></i></a>
      <a href="#" id="'.$all->reg_id.'" class="btn btn-danger btn-sm deleteApplicant"><i class="fa fa-trash"></i></a>
      </center>';
    })
    ->rawColumns(['checkbox','reg_name_f','reg_step','reg_status','action'])
    ->make(true);
  }

  public function allRec(Request $request)
  {
    $all = Register::where('reg_step','recruit')->where('main_event_id', $request->id)->orderBy('reg_id', 'asc')->get();

    return Datatables::of($all)
    ->addColumn('checkbox', '<center><input type="checkbox" name="applicant_checkbox[]" class="checkbox" value="{{$reg_id}}"/></center')
    ->addIndexColumn()
    ->addColumn('created_date', function($all){
      return $all->created_date->format('d M Y');
    })
    ->addColumn('reg_name_f', function($all){
      return $all->reg_name_f.' '.$all->reg_name_b;
    })
    ->addColumn('Email', function($all){
      return $all->reg_email;
    })
    ->addColumn('Job', function($all){
      return $all->reg_job;
    })
    ->addColumn('reg_step', function($all){
      if($all->reg_step == 'recruit'){
        $ready = '<span class="badge badge-success">Recruited</span>';
      }
      return $ready;
    })
    ->addColumn('reg_status', function($all){
      if($all->reg_status == 'beginner'){
        $stat = '<span class="badge badge-success">Beginner</span>';
      }
      return $stat;
    })
    ->addColumn('action', function($all){
      return '<center>
      <a href="#edit-applicant" data-editid="'.$all->reg_id.'" type="button" data-toggle="modal" data-target="#modal-edit-applicant" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
      <a href="" id="'.$all->reg_id.'" data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-info btn-sm tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class=" fa fa-check"></i></a>
      <a href="#" id="'.$all->reg_id.'" class="btn btn-danger btn-sm deleteApplicant"><i class="fa fa-trash"></i></a>
      </center>';
    })
    ->rawColumns(['checkbox','reg_name_f','reg_step','reg_status','action'])
    ->make(true);
  }

  public function storeApplicant(Request $request)
  {
    $this->validate($request,[
      'event_id' => 'required',
          'reg_name_f' => 'required',
          'reg_name_b' => 'required',
          'reg_email' => 'required',
          'reg_birthdate' => 'required',
          'reg_sex' => 'required',
          'reg_alamatnow' => 'required',
          'reg_alamatktp' => 'required',
          'reg_phone' => 'required',
          'reg_job' => 'required',
          'reg_education' => 'required',
          'reg_info' => 'required',
          'reg_motivasi' => 'required',
          'reg_skill' => 'required',
          'reg_project' => 'required',
      ]);
      
      $reg = new Register;

      $reg->main_event_id = $request->event_id;
      $reg->reg_name_f = $request->reg_name_f;
      $reg->reg_name_b= $request->reg_name_b;
      $reg->reg_email = $request->reg_email;
      $reg->reg_birthdate = $request->reg_birthdate;
      $reg->reg_sex = $request->reg_sex;
      $reg->reg_alamatnow = $request->reg_alamatnow;
      $reg->reg_alamatktp = $request->reg_alamatktp;
      $reg->reg_phone = $request->reg_phone;
      $reg->reg_job = $request->reg_job;
      $reg->reg_education = $request->reg_education;
      $reg->reg_info = $request->reg_info;
      $reg->reg_motivasi = $request->reg_motivasi;
      $reg->reg_skill = $request->reg_skill;
      $reg->reg_project = $request->reg_project;

      $port= $request->file('reg_portfolio_file');
      $daftar = 'Portofolio_'.$reg->reg_name_f.'.'.$port->getClientOriginalExtension();
      $path = $port->storeAs('public/portofoliopendaftar/',$daftar);

      $reg->reg_portfolio_file = $daftar;
      
      $reg->save();
      // dd($request->all());

      // return response()->json(['return' => 'success']);
      return redirect()->back()->with('Success','success');
  }

  public function editApplicant(Request $request)
  {
    $reg = Register::where('reg_id','=',$request->id)->first();
    return response()->json($reg);
  }

  public function updateApplicant(Request $request, $id)
  {
    $reg = Register::find($id);

    $reg->main_event_id = $request->bootcamp;
    $reg->reg_name_f = $request->reg_namef;
    $reg->reg_name_b= $request->reg_nam_b;
    $reg->reg_email = $request->regemail;
    $reg->reg_birthdate = $request->regbirthdate;
    $reg->reg_sex = $request->regsex;
    $reg->reg_alamatnow = $request->regalamatnow;
    $reg->reg_alamatktp = $request->regalamatktp;
    $reg->reg_phone = $request->regphone;
    $reg->reg_job = $request->regjob;
    $reg->reg_education = $request->regeducation;
    $reg->reg_info = $request->reginfo;
    $reg->reg_motivasi = $request->regmotivasi;
    $reg->reg_skill = $request->regskill;
    $reg->reg_project = $request->regproject;
    
    $reg->update();

    return redirect('admin/bootcamp/applicant');
    // dd($request->all());
  }

}
