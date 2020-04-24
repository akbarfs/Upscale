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
use App\Models\mediaModel;
use App\Models\campaignMedia;
use App\Models\campaignJobs;
use Yajra\Datatables\Datatables;
use Validator;
use Carbon\Carbon;

class CampaignController extends Controller
{
    public function __construct()
    {
      if(session('level') != 'admin') {
        Auth::logout();
        return redirect('/');
      }
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.mediacampaign.index');
    }
    public function delete(Request $request)
    {
      $data = Campaign::find($request->campaign_id);

      if($data->delete()){
        return 'berhasil';
      }
      else{
        return 'gagal';
      }
      
    }
    public function all(){
        setlocale (LC_TIME, 'id_ID');
        $campaign = Campaign::all();
    
        return Datatables::of($campaign)
        ->addColumn('action',function($campaign){
                return '
                    <center>
                    <a href="'.route('campaign.assign').'?campaign_id='.$campaign->campaign_id.'" class="btn btn-info btn-sm assignCam"><i class="fa fa-tasks"> Assign Media/Jobs</i></a>
                    <a href="#"  data-campaign-start="'.$campaign->campaign_start.'" data-campaign-end="'.$campaign->campaign_end.'" data-id="'.$campaign->campaign_id.'" data-name="'.$campaign->campaign_name.'" data-status="'.$campaign->campaign_status.'" data-toggle="modal" data-target="#campaignEdit" class="btn btn-warning btn-sm editCam"><i class="fa fa-edit"> Edit</i></a>
                    <a href="#" id="'.$campaign->campaign_id.'" class="btn btn-danger btn-sm deleteCam"><i class="fa fa-trash"></i> Delete</a>
                    </center>
                ';  
                                
            })
            ->addColumn('campaign_status', function($campaign){
                if($campaign->campaign_status == 'active'){
                return '<center><span class="badge badge-success">Aktif</span></center>';
                } else{
                return '<center><span class="badge badge-danger">Nonaktif</span></center>';
                }
            })
        ->addColumn('campaign_name', function($campaign){
            return '<strong>'.$campaign->campaign_name.'</strong>';
        })
        ->addColumn('campaign_start',function($campaign){
            return date('d F Y', strtotime($campaign->campaign_start));  
                            
        })
        ->addColumn('campaign_end',function($campaign){
            return date('d F Y', strtotime($campaign->campaign_end));  
                            
        })
        ->rawColumns(['action', 'campaign_name', 'campaign_status','campaign_start','campaign_end'])
        ->make(true);
    }

    public function assign(Request $request)
    {
      $campaign = Campaign::where('campaign_id', '=', $request->campaign_id)->first();
      return view('admin.mediacampaign.assign', compact('campaign'));
      
    }
    public function getMedia(Request $request){
        $media = mediaModel::all();
    
        return Datatables::of($media)
        ->addColumn('action',function($media){
                return '
                <center><input type="checkbox" id="media-checkbox-'.$media->media_id.'" class="media-checked"></center>
                ';  
                                
            })
        ->addColumn('media_name', function($media){
            return "<span id='media-name-".$media->media_id."'>".$media->media_name."</span>";
        })

        ->rawColumns(['action', 'media_name'])
        ->make(true);
    }

    public function mediaChecked(Request $request){
        $data = campaignMedia::where('campaign_id', '=', $request->campaign_id)->join('media', 'campaign_media.media_id', '=', 'media.media_id' )->get();
        if(isset($data)){
            return json_encode($data);
        } else {
            return false;
        }
    }

    public function getJobs(Request $request){
        $jobs = Job::all();
    
        return Datatables::of($jobs)
        ->addColumn('action',function($jobs){
                return '
                    <center><input type="checkbox" id="jobs-checkbox-'.$jobs->jobs_id.'" class="jobs-checked"></center>
                ';  
                                
            })
        ->addColumn('jobs_title', function($jobs){
            return "<span id='jobs-name-".$jobs->jobs_id."'>".$jobs->jobs_title."</span>";
        })
        ->addColumn('jobs_category', function($jobs){
            return "<span id='jobs-category-".$jobs->jobs_id."'>".$jobs->jobca->category->categories_name."</span>";
        })

        ->rawColumns(['action', 'jobs_title', 'jobs_category'])
        ->make(true);
    }

    public function jobsChecked(Request $request){
        $data = campaignJobs::where('campaign_id', '=', $request->campaign_id)->join('jobs', 'campaign_jobs.jobs_id', '=', 'jobs.jobs_id' )->get();
        if(isset($data)){
            return json_encode($data);
        } else {
            return false;
        }
    }

    public function checked(Request $request){
       
        if($request->campaign_media_id != 'baru'){
            $data = campaignMedia::where('campaign_media_id', '=', $request->campaign_media_id)->update(['campaign_media_checked' => 'checked', 'updated_at' => Carbon::now()]);
            $last_id = 'update';
            $hasil = 'update';
        } else if($request->campaign_media_id == 'baru'){
            $data = new  campaignMedia();
            $data->campaign_media_checked = 'checked';
            $data->media_id = $request->media_id;
            $data->campaign_id = $request->campaign_id;
            $hasil = $data->save();
            $last_id = $data->campaign_media_id;
        }
        return json_encode(array('last_id' => $last_id, 'data' => $hasil));
    }

    public function unchecked(Request $request){
       
        campaignMedia::where('campaign_media_id', '=', $request->campaign_media_id)->update(['campaign_media_checked' => 'not-checked', 'updated_at' => Carbon::now()]);
        $last_id = 'update';
        $data = 'update';

        return json_encode(array('last_id' => $last_id, 'data' => $data));
    }

    public function jobs_checked(Request $request){
       
        if($request->campaign_jobs_id != 'baru'){
            $data = campaignjobs::where('campaign_jobs_id', '=', $request->campaign_jobs_id)->update(['campaign_jobs_checked' => 'checked', 'updated_at' => Carbon::now()]);
            $last_id = 'update';
            $hasil = 'update';
        } else if($request->campaign_jobs_id == 'baru'){
            $data = new  campaignjobs();
            $data->campaign_jobs_checked = 'checked';
            $data->jobs_id = $request->jobs_id;
            $data->campaign_id = $request->campaign_id;
            $hasil = $data->save();
            $last_id = $data->campaign_jobs_id;
        }
        return json_encode(array('last_id' => $last_id, 'data' => $hasil));
    }

    public function jobs_unchecked(Request $request){
       
        campaignjobs::where('campaign_jobs_id', '=', $request->campaign_jobs_id)->update(['campaign_jobs_checked' => 'not-checked', 'updated_at' => Carbon::now()]);
        $last_id = 'update';
        $data = 'update';

        return json_encode(array('last_id' => $last_id, 'data' => $data));
    }

    public function getAll(){
        return json_encode(Campaign::all());
    }
    public function get(Request $request){
        $data = Job_campaign::where('jobs_campaign.jobs_id', '=', $request->jobs_id)->join('campaign', 'jobs_campaign.campaign_id', '=', 'campaign.campaign_id' )->leftjoin('jobs_media', 'jobs_campaign.jobs_media_id', '=', 'jobs_media.jobs_media_id' )->leftjoin('media', 'media.media_id', '=', 'jobs_media.media_id' )->get();
        if(isset($data)){
            return json_encode($data);
        } else {
            return false;
        }
    }
    public function campaignAdd(Request $request)
    {
        $campaign = new Campaign();
        $campaign->campaign_name = $request->campaign_name;
        $campaign->campaign_status = $request->campaign_status;
        $campaign->campaign_start = Carbon::createFromFormat('d/m/Y H.i', $request->campaign_start);
        $campaign->campaign_end = Carbon::createFromFormat('d/m/Y H.i', $request->campaign_end);
        $sukses = $campaign->save();
        if($sukses) return 'berhasil';
        else return 'gagal';
    }

    
  
    public function campaign(){
        setlocale(LC_TIME, 'INDONESIA');
        $campaign = Campaign::all();
    
        return Datatables::of($campaign)
        ->addColumn('action',function($campaign){
                return '
                    <center>
                    <a href="#"  data-campaign-start="'.$campaign->campaign_start.'" data-campaign-end="'.$campaign->campaign_end.'" data-id="'.$campaign->campaign_id.'" data-name="'.$campaign->campaign_name.'" data-status="'.$campaign->campaign_status.'" data-toggle="modal" data-target="#campaignEdit" class="btn btn-warning btn-sm editCam"><i class="fa fa-edit"></i></a>
                    <a href="#" id="'.$campaign->campaign_id.'" class="btn btn-danger btn-sm deleteCam"><i class="fa fa-trash"></i></a>
                    </center>
                ';  
                                
            })
        ->addColumn('campaign_name', function($campaign){
            if($campaign->campaign_status == 'active'){
            return '<strong>'.$campaign->campaign_name.'</strong>&nbsp;-&nbsp;<span class="badge badge-success">Aktif</span>';
            } else{
            return '<strong>'.$campaign->campaign_name.'</strong>&nbsp;-&nbsp;<span class="badge badge-danger">Nonaktif</span>';
            }
        })
        ->addColumn('campaign_start_end',function($campaign){
            return date('Y M d', strtotime($campaign->campaign_start))." - ".date('Y M d', strtotime($campaign->campaign_end));  
                            
        })
        ->rawColumns(['action', 'campaign_name', 'campaign_start_end'])
        ->make(true);
    }
    public function campaignEdit(Request $request)
    {
        // dd($request);
      $data = Campaign::find($request->campaign_id);
      $data->campaign_name = $request->campaign_name;
      $data->campaign_status = $request->campaign_status;
      $data->campaign_start = Carbon::createFromFormat('d/m/Y H.i', $request->campaign_start);
      $data->campaign_end = Carbon::createFromFormat('d/m/Y H.i', $request->campaign_end);
      if($data->update())
        return 'berhasil';
      else 
        return 'gagal';
    }

   
    public function note(Request $request){
        $note = Job_campaign::where('jobs_campaign_id', '=', $request->jobs_campaign_id)->update(['jobs_campaign_note' => $request->jobs_campaign_note, 'updated_at' => Carbon::now()]);
        return json_encode(array('note' => $note));
    }
    public function url(Request $request){
        $url = Job_campaign::where('jobs_campaign_id', '=', $request->jobs_campaign_id)->update(['jobs_campaign_url' => $request->jobs_campaign_url, 'updated_at' => Carbon::now()]);
        return json_encode(array('note' => $url));
    }
}
