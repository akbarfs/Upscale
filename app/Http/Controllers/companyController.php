<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Models\Company;
use App\Models\Requestt;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;


class companyController extends Controller
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
    $company = DB::table('company')->orderBy('company_name', 'asc')->get();
    $skill = DB::table('skill')->get();
    $jobs = DB::table('jobs')->get();
    return view('admin.company.list',compact('skill','jobs','company'));
  }

  public function request($id)
  {
    $a =DB::table('company')->where('company_id',$id)->get();
    $all = DB::table('request')->join('company','request_company_id','company_id')->where('request_company_id',$id)->get();
    return view('admin.company.request',compact('all','a'));
  }

  public function detail($id)
  {

    $all=DB::table('company')->where('company_id',$id)->get();
    return view('admin.company.detailcompany',compact('all'));

  }

  public function all()
  {
    $all = DB::table('company')->orderBy('company_name', 'asc')->get();
    return Datatables::of($all)
      ->addIndexColumn()
      ->addColumn('category_name', function($all){
        return $all->company_name ;
      })
      ->addColumn('category_address', function($all){
        return $all->company_address ;
      })
      ->addColumn('category_email', function($all){
        return $all->company_email ;
      })
      ->addColumn('category_phone', function($all){
        return $all->company_phone ;
      })
      ->addColumn('qty', function($all){
        $qty = DB::table('request')->where([['request_company_id', '=', $all->company_id], ['request_status', '!=', 'done']])->count();
        return $qty ;
      })
      ->addColumn('action', function($all){
        return '<center>
        <a href="'.route('company.detail',$all->company_id).'" type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>&nbsp;
        <a href="#" data-toggle="modal" data-target="#requestAdd" data-id="'.$all->company_id.'" data-name="'.$all->company_name.'" type="button" class="btn btn-success btn-xs addReq"><i class="fa fa-list-alt"></i></a>&nbsp;
        <a href="'.route('company.request',$all->company_id).'" type="button" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a>&nbsp;
        <a href="'.route('company.request',$all->company_id).'" type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a></center>';
      })
      ->rawColumns(['category_name', 'action', 'category_address', 'category_email', 'category_phone', 'qty'])
      ->make(true);
  }

  public function allRequest()
  {
    $all = DB::table('request')->orderBy('request_name', 'asc')->get();
    return Datatables::of($all)
      ->addIndexColumn()
      ->addColumn('company_name', function($all){
        $company = DB::table('company')->select('company_name')->where('company_id', $all->request_company_id)->first();
        return $company->company_name ;
      })
      ->addColumn('request_name', function($all){
        return $all->request_name ;
      })
      ->addColumn('request_qty', function($all){
        return $all->request_qty ;
      })
      ->addColumn('request_location', function($all){
        return $all->request_location ;
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

  public function Requesttest(Request $request)
  {
    return view('admin.company.requesttest');
  }

  public function add(Request $request)
  {
    $data                      = new Company();
    $data->company_name        = $request->input('com-name');
    $data->company_username    = $request->input('com-username');
    $data->company_password    = hash::make($request->com_password);
    $data->company_pic         = $request->input('com-pic');
    $data->company_address     = $request->input('com-address');
    $data->company_description = $request->input('com-desc');
    $data->company_email       = $request->input('com-email');
    $data->company_phone       = $request->input('com-phone');
    $data->save();
    return redirect(route('company.index'))->with(['success' => 'Company successfully added.']);
  }

  public function editReq(Request $request)
  {
    $all = DB::table('request')->where('request_id', $request->input('request_id'))->first();
    echo json_encode($all);
  }

  public function getReq(Request $request)
  {
    $all = DB::table('request')->where('request_id', $request->input('request_id'))->first();
    echo json_encode($all);
  }

  public function addReq(Request $request)
  {
    // dd($request->all());
    $skill = $request->input('skill');
    $data                     = new Requestt();
    $data->request_name       = $request->input('name');
    $data->request_company_id = $request->input('company_id');
    $data->request_detail     = $request->input('detail');
    $data->request_date       = $request->input('start-date');
    $data->request_long       = $request->input('long');
    $data->request_qty        = $request->input('qty');
    $data->request_status     = $request->input('status');
    $data->request_location   = $request->input('location');
    $data->save();
    foreach ($skill as $s){
        $simpan = DB::table('company_position')->insert([
            'cp_request_id'=>$data->request_id,
            'cp_company_id'=>$request->input('company_id'),
            'cp_skill_id'=>$s,
            'cp_jobs_id'=>$request->input('posisi')
        ]);
    }
    return redirect(route('company.index'))->with(['success' => 'Request successfully added.']);
  }


}
