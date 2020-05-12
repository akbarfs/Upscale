<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Jobca;
use App\Models\Joblo;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
// use App\Models\Bootcamp;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Image;


class jobsController extends Controller
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
      $jobs = Job::all();
      $locations = Location::all();
      $all = DB::table('jobs')
      ->join('joblo','joblo.joblo_jobs_id','=','jobs.jobs_id')
      ->join('jobca','jobca.jobca_jobs_id','=','jobs.jobs_id')
      ->join('location','joblo.joblo_location_id','=','location.location_id')
      ->join('categories','jobca.jobca_category_id','=','categories.categories_id')->get();
      return view('admin.jobs.jobs', compact('jobs', 'locations','all'));
    }

    public function all() {

      $all = Job::orderBy('jobs_created_date', 'desc')->get();
    
      return Datatables::of($all)
      ->addIndexColumn()
      ->addColumn('status', function($all){
        if($all->jobs_active === 'Y'){
          return '<center><span class="badge badge-success">Active</span></center>';
        } else{
          return '<center><span class="badge badge-danger">Not active</span></center>';
        }
      })
      ->addColumn('location_name', function($all){
        return $all->location_name ;
      })
      ->addColumn('category_name', function($all){
        return $all->categories_name ;
      })
      ->addColumn('jobs_created_date', function($all){
        return $all->jobs_created_date->format('d M Y');
      })
      ->addColumn('checkbox', '<center><input type="checkbox" name="all_checkbox[]" class="checkbox" value="{{$jobs_id}}"/></center')
      ->addColumn('action', function($all){
        return '<center>
        <a href="'.route('edit.job').'?id='.$all->jobs_id.'" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;</center>';
      })
      ->rawColumns(['checkbox', 'action', 'status'])
      ->make(true);
    }



    public function deleteJobs(Request $request)
    {
      
      $all_id_array = $request->input('id');
      $all = Job::whereIn('jobs_id', $all_id_array);
      if($all->delete()){      
        return 'deleted';
      }
      else{
        return 'error';
      }
      
    }
    
    
    public function create()
    {
      $locations = Location::all();
      $categories= Category::all();
      return view('admin.jobs.create', compact('locations', 'categories'));
    }

    public function store(Request $request)
    {
      
      if($request->hasFile('job_image'))
        {
          $image= $request->file('job_image');
          $imageName= 'erporate_'.time().'.'.$image->getClientOriginalExtension();
          $imageType = $image->getClientOriginalExtension();
          $imageStr = (string)Image::make($image)->resize(350, null, function($constraint)
                      {
                        $constraint->aspectRatio();
                      })->encode($imageType);
          $job_image = base64_encode($imageStr);
        }
        else
        {
          $job_image = '';
        }

      $jobs = new Job;
      $jobs->jobs_title = $request->jobs_title;
      $jobs->jobs_type_time= $request->jobs_type_time;
      $jobs->jobs_urgent= $request->jobs_urgent;
      $jobs->jobs_active= 'Y';
      $jobs->jobs_desc_center= $request->center;
      $jobs->jobs_desc_short= $request->short;
      $jobs->jobs_desc_left= $request->left;
      $jobs->jobs_desc_right= $request->right;
      $jobs->jobs_created_date= Carbon::now();
      $jobs->jobs_image = $job_image;
      $jobs->save();

      $joblo = new Joblo;
      $joblo->joblo_jobs_id = $jobs->jobs_id;
      $joblo->joblo_location_id= $request->joblo_location_id;
      $joblo->joblo_created_date = Carbon::now();
      $joblo->save();

      $jobca = new Jobca;
      $jobca->jobca_jobs_id = $jobs->jobs_id;
      $jobca->jobca_category_id= $request->jobca_category_id;
      $jobca->jobca_created_date = Carbon::now();
      $jobca->save();

      return redirect('/admin/jobs');

    }

    public function edit(Request $request)
    {
      $locations = Location::all();
      $categories= Category::all();
      $job = Job::where('jobs_id', '=', $request->id)->first();
      return view('admin.jobs.edit', compact('job', 'locations', 'categories'));
      
    }


    public function update(Request $request, $id)
    {
      

      $jobs = Job::where('jobs_id', '=', $id)->first();
      
      if($request->hasFile('job_image'))
        {
          $image= $request->file('job_image');
          $imageName= 'erporate_'.time().'.'.$image->getClientOriginalExtension();
          $imageType = $image->getClientOriginalExtension();
          $imageStr = (string)Image::make($image)->resize(300, null, function($constraint)
                      {
                        $constraint->aspectRatio();
                      })->encode($imageType);
          $job_image = base64_encode($imageStr);
        }
        else
        {
          $job_image = $jobs->jobs_image;
        }

      $jobs->jobs_title = $request->jobs_title;
      $jobs->jobs_type_time= $request->jobs_type_time;
      $jobs->jobs_urgent= $request->jobs_urgent;
      $jobs->jobs_active= $request->status;
      $jobs->jobs_desc_center= $request->center;
      $jobs->jobs_desc_short= $request->short;
      $jobs->jobs_desc_left= $request->left;
      $jobs->jobs_desc_right= $request->right;
      $jobs->jobs_image = $job_image;
      $jobs->update();

      $joblo = Joblo::where('joblo_jobs_id', '=', $jobs->jobs_id)->first();
      $joblo->joblo_location_id= $request->joblo_location_id;
      $joblo->update();

      $jobca = Jobca::where('jobca_jobs_id', '=', $jobs->jobs_id)->first();
      $jobca->jobca_category_id= $request->jobca_category_id;
      $jobca->update();

      return back();

    }

}
