<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Models\Company;
use App\Models\Requestt;
use App\Models\Location;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = DB::table('company')->orderBy('company_name', 'asc')->get();
        $skill = DB::table('skill')->get();
        $jobs = DB::table('jobs')->get();
        $location =DB::table('location')->get();
        $nocomp=1;
        return view('admin.companies.company',compact('skill','jobs','company','location','nocomp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cekdataname=DB::table('company')->where('company_name','=',$request->company_name)->count();
      $cekdatausername=DB::table('company')->where('company_username','=',$request->company_username)->count();
      
      if($cekdataname!=0){
        $pesan='Failed';
        $isipesan='Company Name Already Exists! Try Again!';
      }
      elseif($cekdatausername!=0){
        $pesan='Failed';
        $isipesan='Company Username Already Exists! Try Again!';
      }
      else{

         $data                      = new Company();
         $data->company_name        = $request->company_name;
         $data->company_username    = $request->company_username;
         $data->company_password    = hash::make($request->company_password);
         $data->company_pic         = $request->company_pic;
         $data->company_address     = $request->company_address;
         $data->company_description = $request->company_desc;
         $data->company_email       = $request->company_mail;
         $data->company_phone       = $request->company_phone;
         $data->company_status      = $request->company_status;
         $data->company_level       ="user";
         $data->save();

        $user=DB::table('users')->insert([
            'name'=>$request->company_name,
            'username'=>$request->company_username,
            'password'=>hash::make($request->company_password),
            'level'=>"user",
            'level_user_id'=>$data->company_id
        ]);

        $pesan='Success';
        $isipesan='Data Company Berhasil di tambahkan';

         }
        

         return redirect()->back()->with($pesan,$isipesan);
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    public function getdetail(Request $request)
    {
        //
        $company = DB::table('company')->where('company_id',$request->input('company_id'))->first();
        
        echo json_encode($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = DB::table('company')->where('company_id',$id)->first();
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      $cekdataname=DB::table('company')->where('company_name','=',$request->company_name)->count();
      $cekdatausername=DB::table('company')->where('company_username','=',$request->company_username)->count();
      
      if($cekdataname!=0){
        $pesan='Failed';
        $isipesan='Company Name Already Exists! Try Again!';
      }
      elseif($cekdatausername!=0){
        $pesan='Failed';
        $isipesan='Company Username Already Exists! Try Again!';
      }
      else{

        $data=Company::find($id);     
         $data->company_name        = $request->company_name;
         $data->company_username    = $request->company_username;
         if($request->company_password == NUll){

         }
         else{
            $data->company_password    = hash::make($request->company_password);
         }
         $data->company_pic         = $request->company_pic;
         $data->company_address     = $request->company_address;
         $data->company_description = $request->company_desc;
         $data->company_email       = $request->company_mail;
         $data->company_phone       = $request->company_phone;
         $data->company_status      = $request->company_status;
         $data->update();

         $user=DB::table('users')->where('level_user_id','=',$data->company_id)->update([
            'name'=>$request->company_name,
            'username'=>$request->company_username,
            'password'=>hash::make($request->company_password)
        ]);

        
        $pesan='Success';
        $isipesan='Data Company Berhasil di tambahkan';

         }
        
         
        return redirect()->back()->with($pesan,$isipesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = DB::table('company')->where('company_id',$id)->delete();
        $user = DB::table('users')->where('level_user_id',$id)->delete();
    return redirect()->back()->with('Success','Data berhasil di Hapus');
    }

    public function request($id)
  {
    $location =DB::table('location')->get();
    $a =DB::table('company')->where('company_id',$id)->get();
    $skill = DB::table('skill')->get();
    $skill2 = DB::table('skill')->get();
    $jobs = DB::table('jobs')->where('jobs_active','=','Y')->get();
    $jobs2 = DB::table('jobs')->where('jobs_active','=','Y')->get();
    $noreq=1;
    $all = DB::table('request')->join('company','request_company_id','company_id')->join('location','request.request_location','location.location_id')->where('request_company_id',$id)->get();
    return view('admin.companies.request',compact('all','a','location','jobs','jobs2','skill','skill2','noreq'));
 }

  public function addReq(Request $request)
  {
    $hariini = Carbon::now()->format('dmY');

    if(!empty($request->cv))
    {
      $cv = $request->file('cv');
      $namecv = 'Question_'.$request->input('name')."_".$hariini.'.'.$cv->getClientOriginalExtension();
      $path = $cv->storeAs('public/Question',$namecv);

    }
    else{
      $namecv=null;
    }

    $skill = $request->input('skill');
    $data                     = new Requestt();
    $data->request_name       = $request->input('name');
    $data->request_company_id = $request->input('company_id');
    $data->request_detail     = $request->input('detail');
    $data->request_question   = $request->input('question');
    $data->request_date       = $request->input('start-date');
    $data->request_long       = $request->input('long');
    $data->request_qty        = $request->input('qty');
    $data->request_status     = $request->input('status');
    $data->request_skill_prio = $request->input('priority');
    $data->request_location   = $request->input('location');
    $data->request_file       = $namecv;
    $data->save();
    foreach ($skill as $s){
        $simpan = DB::table('company_position')->insert([
            'cp_request'=>$data->request_id,
            'cp_company_id'=>$request->input('company_id'),
            'cp_skill_id'=>$s,
            'cp_jobs_id'=>$request->input('posisi')
        ]);
    }

    $datacprequest=DB::table('company_position')->join('jobs','jobs_id','cp_jobs_id')
    ->where('cp_request','=',$data->request_id)
    ->get();

    foreach($datacprequest as $cp)
    $datarequest=DB::table('request')->where('request_id','=',$data->request_id)->update([
          'request_posisi'  =>$cp->jobs_title
    ]);

    return redirect(route('companies.request',$request->input('company_id')))->with(['success' => 'Request successfully added.']);
  }

  public function addReq2(Request $request)
  {
    $hariini = Carbon::now()->format('dmY');

    if(!empty($request->cv))
    {
      $cv = $request->file('cv');
      $namecv = 'Question_'.$request->input('name')."_".$hariini.'.'.$cv->getClientOriginalExtension();
      $path = $cv->storeAs('public/Question',$namecv);

    }
    else{
      $namecv=null;
    }

    $skill = $request->input('skill');
    $data                     = new Requestt();
    $data->request_name       = $request->input('name');
    $data->request_company_id = $request->input('company_id');
    $data->request_detail     = $request->input('detail');
    $data->request_question   = $request->input('question');
    $data->request_date       = $request->input('start-date');
    $data->request_long       = $request->input('long');
    $data->request_qty        = $request->input('qty');
    $data->request_status     = $request->input('status');
    $data->request_skill_prio = $request->input('priority');
    $data->request_location   = $request->input('location');
    $data->request_file       = $namecv;
    $data->save();
    foreach ($skill as $s){
        $simpan = DB::table('company_position')->insert([
            'cp_request'=>$data->request_id,
            'cp_company_id'=>$request->input('company_id'),
            'cp_skill_id'=>$s,
            'cp_jobs_id'=>$request->input('posisi')
        ]);
    }

    $datacprequest=DB::table('company_position')->join('jobs','jobs_id','cp_jobs_id')
    ->where('cp_request','=',$data->request_id)
    ->get();

    foreach($datacprequest as $cp)
    $datarequest=DB::table('request')->where('request_id','=',$data->request_id)->update([
          'request_posisi'  =>$cp->jobs_title
    ]);

    return redirect()->back()->with(['success' => 'Request successfully added.']);
  }

  public function delReq($id)
  {
    $company = DB::table('request')->where('request_id',$id)->delete();
    $company_position=DB::table('company_position')->where('cp_request',$id)->delete();
    return redirect()->back()->with('Success','Data berhasil di Hapus');
  }

  public function getReq(Request $request)
  {
     // dd($request->all());
     $all = DB::table('request') ->join('company','request_company_id','company_id')
                                  ->leftjoin('company_position','cp_request','=','request.request_id')
                                  ->leftjoin('jobs','jobs.jobs_id','=','cp_jobs_id')
                                  ->leftjoin('skill','skill.skill_id','=','cp_skill_id')
                                  ->leftjoin('location','location.location_id','=','request_location')
                                  ->where('request_id', $request->input('request_id'))
                                  ->groupby('request_id','skill_name')->get();
      echo json_encode($all);
  }

  public function editReq(Request $request)
  {
    $hariini = Carbon::now()->format('dmY');

    if(!empty($request->cv))
    {
      $cv = $request->file('cv');
      $namecv = 'Question_'.$request->input('name')."_".$hariini.'.'.$cv->getClientOriginalExtension();
      $path = $cv->storeAs('public/Question',$namecv);

    }
    else{
      $namecv=null;
    }
    $skill = $request->input('skill');
    $data=DB::table('request')->where('request_id','=',$request->input('request_id'))->update([
    'request_name'       => $request->input('name'),
    'request_company_id' => $request->input('company_id'),
    'request_detail'     => $request->input('detail'),
    'request_question'   => $request->input('question'),
    'request_date'       => $request->input('start-date'),
    'request_long'       => $request->input('long'),
    'request_qty'        => $request->input('qty'),
    'request_skill_prio' => $request->input('priority'),
    'request_status'     => $request->input('status'),
    'request_location'   => $request->input('location'),
    'request_file'       => $namecv
    ]);
    $delete = DB::table('company_position')->where('cp_request','=',$request->request_id)->delete();
    foreach ($skill as $s){
      $simpan = DB::table('company_position')->insert([
          'cp_request'=>$request->request_id,
          'cp_company_id'=>$request->input('company_id'),
          'cp_skill_id'=>$s,
          'cp_jobs_id'=>$request->input('posisi')
      ]);
    }

    $datacprequest=DB::table('company_position')->join('jobs','jobs_id','cp_jobs_id')
    ->where('cp_request','=',$request->request_id)
    ->get();

    foreach($datacprequest as $cp)
    $datarequest=DB::table('request')->where('request_id','=',$request->request_id)->update([
          'request_posisi'  =>$cp->jobs_title
    ]);


    return redirect(route('companies.request',$request->input('company_id')))->with(['success' => 'Company successfully added.']);
  }

  public function editReq2(Request $request)
  {
    // dd($request->all());
    $hariini = Carbon::now()->format('dmY');

    if(!empty($request->cv))
    {
      $cv = $request->file('cv');
      $namecv = 'Question_'.$request->input('name')."_".$hariini.'.'.$cv->getClientOriginalExtension();
      $path = $cv->storeAs('public/Question',$namecv);

    }
    else{
      $namecv=null;
    }
    $skill = $request->input('skill');
    $data=DB::table('request')->where('request_id','=',$request->input('request_id'))->update([
    'request_name'       => $request->input('name'),
    'request_company_id' => $request->input('company_id'),
    'request_detail'     => $request->input('detail'),
    'request_question'   => $request->input('question'),
    'request_date'       => $request->input('start-date'),
    'request_long'       => $request->input('long'),
    'request_qty'        => $request->input('qty'),
    'request_skill_prio' => $request->input('priority'),
    'request_status'     => $request->input('status'),
    'request_location'   => $request->input('location'),
    'request_file'       => $namecv
    ]);
    $delete = DB::table('company_position')->where('cp_request','=',$request->request_id)->delete();
    foreach ($skill as $s){
      $simpan = DB::table('company_position')->insert([
          'cp_request'=>$request->request_id,
          'cp_company_id'=>$request->input('company_id'),
          'cp_skill_id'=>$s,
          'cp_jobs_id'=>$request->input('posisi')
      ]);
    }

    $datacprequest=DB::table('company_position')->join('jobs','jobs_id','cp_jobs_id')
    ->where('cp_request','=',$request->request_id)
    ->get();

    foreach($datacprequest as $cp)
    $datarequest=DB::table('request')->where('request_id','=',$request->request_id)->update([
          'request_posisi'  =>$cp->jobs_title
    ]);


    return redirect()->back()->with('Success','Data Request Berhasil dirubah');
  }

  public function companyassign($id){

    $location =DB::table('location')->get();
    $a =DB::table('company')->where('company_id',$id)->get();
    $noassign=1;
    $all = DB::table('assign_request')->join('request','assign_request.request_id','=','request.request_id')
                              ->join('company','request.request_company_id','=','company.company_id')
                              ->join('location','assign_request.location_id','=','location.location_id')
                              ->join('company_position','request.request_id','=','company_position.cp_request')
                              ->join('jobs','company_position.cp_jobs_id','=','jobs.jobs_id')
                              ->join('talent','assign_request.talent_id','=','talent.talent_id') 
                              ->where('request_company_id',$id)
                              ->groupby('jobs_title')->get();

    return view('admin.companies.companyassign',compact('a','location','noassign','all'));

  }
  public function companyrequest()
  {
    $skill = DB::table('skill')->get();
    $skill2 = DB::table('skill')->get();
    $jobs = DB::table('jobs')->where('jobs_active','=','Y')->get();
    $jobs2 = DB::table('jobs')->where('jobs_active','=','Y')->get();
    $company = DB::table('company')->get();
    $location = DB::table('location')->get();
    return view('admin.companies.companyrequest',compact('company','location','jobs','jobs2','skill2','skill'));
  }

  public function datarequest(){

    $all = DB::table('request')->join('company','company_id','=','request_company_id')
                                ->join('location','location_id','=','request_location')
                                ->orderBy('request_name', 'asc')
                                ->get();
    return Datatables::of($all)
      ->addIndexColumn()
      ->addColumn('company_name', function($all){
        return $all->company_name ;
      })
      ->addColumn('request_name', function($all){
        return $all->request_name ;
      })
      ->addColumn('request_qty', function($all){
        return $all->request_qty ;
      })
      ->addColumn('request_location', function($all){
        return $all->location_name ;
      })
      ->addColumn('request_long', function($all){
        return $all->request_long ;
      })
      ->addColumn('request_date', function($all){
        return $all->request_date ;
      })
      ->addColumn('request_status', function($all){
        if($all->request_status=='active') {
          return '<span class"badge badge-success">'.ucfirst($all->request_status).'</span>';
        } elseif($all->request_status=='done') {
          return '<span class"badge badge-default">'.ucfirst($all->request_status).'</span>';
        } else {
          return '<span class"badge badge-warning">'.ucfirst($all->request_status).'</span>';
        }
      })
      ->addColumn('action', function($all){
        $company = DB::table('company')->select('company_name')->where('company_id', $all->request_company_id)->first()->company_name;
        return '<center>
        <a href="#" data-id="'.$all->request_id.'" data-comp="'.$company.'" type="button" class="btn btn-primary btn-xs detail-req"><i class="fa fa-eye"></i></a>&nbsp;<a href="#" data-id="'.$all->request_id.'" type="button" class="btn btn-warning btn-xs edit-req"><i class="fa fa-edit"></i></a></center>';
      })
      ->rawColumns(['company_name', 'action', 'request_name', 'request_status', 'request_qty', 'request_date', 'request_long', 'request_location', 'request_qty'])
      ->make(true);
  }
 
}
