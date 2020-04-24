<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobca;
use App\Models\Joblo;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;
use App\Models\Campaign;
use App\Models\Job_campaign;
use Yajra\Datatables\Datatables;
use Validator;


class othersController extends Controller
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

      return view('admin.others.index');
    }

  public function locations(){

      $locations = Location::all();

      return Datatables::of($locations)
      ->addColumn('action',function($locations){
            return '
                <center>
                 <a href="#" data-id="'.$locations->location_id.'" data-name="'.$locations->location_name.'" data-status="'.$locations->location_active.'" data-toggle="modal" data-target="#locationsEdit" class="btn btn-warning btn-sm editLoc"><i class="fa fa-edit"></i></a>
                 <a href="#" id="'.$locations->location_id.'" class="btn btn-danger btn-sm deleteLoc"><i class="fa fa-trash"></i></a>
                </center>
             ';  
                              
         })
      ->addColumn('status', function($locations){
        if($locations->location_active == 'Y'){
          return '<center><span class="badge badge-success">Aktif</span></center>';
        } else{
          return '<center><span class="badge badge-danger">Nonaktif</span></center>';
        }
      })
      ->rawColumns(['action', 'status'])
      ->make(true);
  }    

  

  public function locationsAdd(Request $request)
  {
              $locations = new Location;
              $locations->location_name = $request->input('name');
              $locations->location_active = $request->input('status');
              $locations->location_created_date = date('Y-m-d');
              $locations->save();
              return 'success';
  }



  public function locationsDelete(Request $request)
    {
      $data = Location::find($request->input('id'));
      if($data->delete()){
        return 'deleted';
      }
      else{
        return 'error';
      }
    }

  public function locationsEdit(Request $request)
  {
    $data = Location::find($request->input('id'));
    $data->location_name = $request->input('name');
    $data->location_active = $request->input('status');
    $data->update();
    return 'success';
  }

  public function categories(){

      $categories = Category::all();

      return Datatables::of($categories)
      ->addColumn('action',function($categories){
            return '
                <center>
                 <a href="#" data-id="'.$categories->categories_id.'" data-name="'.$categories->categories_name.'" class="btn btn-warning btn-sm editCat" data-toggle="modal" data-target="#categoriesEdit"><i class="fa fa-edit"></i></a>
                 <a href="#" id="'.$categories->categories_id.'" class="btn btn-danger btn-sm deleteCat"><i class="fa fa-trash"></i></a>
                </center>
             ';  
                              
         })
      ->rawColumns(['action'])
      ->make(true);
  }   

  public function categoriesAdd(Request $request){
    $categories = new Category;
    $categories->categories_name = $request->input('name');
    $categories->categories_created_date = date('Y-m-d');
    $categories->save();
    return 'success';
  }

  public function categoriesDelete(Request $request)
    {
      $data = Category::find($request->input('id'));

      if($data->delete()){
        return 'deleted';
      }
      else{
        return 'error';
      }
      
    }

  public function categoriesEdit(Request $request)
  {
    $data = Category::find($request->input('id'));
    $data->categories_name = $request->input('name');
    $data->update();
    return 'success';
  }

}
