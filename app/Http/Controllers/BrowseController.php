<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobca;
use App\Models\Job;
use App\Models\Joblo;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;

class BrowseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $locations  = Location::all();
        $bootcamps  = Bootcamp::all(); 
        $jobs       = Job::orderBy('jobs_active','asc')
                      ->orderBy('jobs_urgent', 'asc')
                      ->orderBy('jobs_created_date','asc')
                      
                      ->paginate(9);

        return view('browse', compact('bootcamps', 'jobs', 'categories', 'locations'));
    }

    public function filterbrowse(Request $request)
    {
    	$categories = Category::all();
        $locations  = Location::all();
        $bootcamps  = Bootcamp::all(); 
        
    	$cat = $request->input('cat');
    	$loc= $request->input('loc');
        $type= $request->input('type');
    	$job = Job::all();
        $jobca = Jobca::all();
    	$jobs = Job::whereHas('jobca', function($q) use($cat)
        {
            return $q->where('jobca_category_id', $cat);
        })
        ->orWhereHas('joblo', function($q) use($loc)
        {
            return $q->where('joblo_location_id', $loc);
        })
        ->orWhere('jobs_type_time', $type)->paginate(9);
        

    	return view('browse', compact('jobs','categories', 'locations', 'bootcamps'));
    }
    
    public function detail($id)
    {
        $bootcamps  = Bootcamp::all(); 
        $job = Job::where('jobs_id','=', $id)->first();
        $date = $job->jobs_created_date->diffForHumans();

        return view('career/detail', compact('job','bootcamps', 'date'));
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
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
