<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Models\Jobca;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;    
use App\Models\Bootcamp;
use Yajra\Datatables\Datatables;
use App\Models\Job_apply;
use App\Models\Interview;
use App\Models\Exp;
use App\Models\Skills;
use App\Models\InterviewReport;
use Carbon\Carbon;
use PDF;

class InterviewController extends Controller
{
    public function __construct()
    {
      if(session('level') != 'admin') {
        Auth::logout();
        return redirect('/');
      }
        $this->middleware('auth');
    }
    public function index($id){
        $all = DB::table('jobs_apply')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->where('jobs_apply_id', '=', $id)->first();
        $interview = Interview::join('location', 'location.location_id', '=', 'interview.interview_location_id' )->where('interview_jobs_apply_id', '=', $id)->first();
        // PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // $pdf = PDF::loadView('admin.report', compact('all', 'interview'));
        // return $pdf->download('invoice.pdf');
        return view('admin.interview', compact('all', 'interview'));
    }

    public function downloadReport($id){
        $all = DB::table('jobs_apply')
                    ->join('jobs', 'jobs_apply.jobs_apply_jobs_id', '=', 'jobs.jobs_id' )
                    ->where('jobs_apply_id', '=', $id)->first();
        $interview = Interview::join('location', 'location.location_id', '=', 'interview.interview_location_id' )->where('interview_jobs_apply_id', '=', $id)->first();
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'roboto']);
        $pdf = PDF::loadView('admin.report', compact('all', 'interview'));
        return $pdf->download('Interview Report - '.$all->jobs_apply_name.'.pdf');
    }
    public function add(Request $request){
        $cek_data = Interview::where('interview_jobs_apply_id', '=', $request->interview_jobs_apply_id)->first();
        if($cek_data == null){
            $interview = new Interview();
            $interview->interview_jobs_apply_id = $request->interview_jobs_apply_id;
            $interview->interview_location_id = $request->interview_location_id;
            $interview->interview_schedule_status = "scheduled";
            $interview->interview_schedule = Carbon::createFromFormat('d/m/Y H.i', $request->interview_schedule);
            $interview->created_at = Carbon::now();
            $interview->updated_at = Carbon::now();
            if($interview->save()){
                if(Job_apply::where('jobs_apply_id', '=', $request->interview_jobs_apply_id)->update([ 'jobs_apply_status' => 'interview'])){
                    return "berhasil";
                } else {
                    return "gagal";
                }
            } else {
                return "gagal";
            }
        } else {
            if(Interview::where('interview_jobs_apply_id', '=', $request->interview_jobs_apply_id)->update(['interview_schedule_status' => 'scheduled', 'interview_schedule' => Carbon::createFromFormat('d/m/Y H.i', $request->interview_schedule), 'interview_location_id' => $request->interview_location_id,  'updated_at' => Carbon::now()])){
                return "berhasil";
            } else {
                return "gagal";
            }
        }
    }

    public function reschedule(Request $request){
        $interview_location_id = $request->interview_location_id;
        $interview_schedule = Carbon::createFromFormat('d/m/Y H.i', $request->interview_schedule);
        if(Interview::where('interview_id', '=', $request->interview_id)->update(['interview_location_id' => $interview_location_id, 'interview_schedule' => $interview_schedule, 'updated_at' => Carbon::now()])){
            return "berhasil";
        } else {
            return "gagal";
        }
    }

    public function batalkan(Request $request){
        if(Interview::where('interview_id', '=', $request->interview_id)->delete()){
            Job_apply::where('jobs_apply_id', '=', $request->interview_jobs_apply_id)->update([ 'jobs_apply_status' => 'unprocess']);   
            return "berhasil";
        } else {
            return "gagal";
        }
    }

    public function simpanReport(Request $request){
        $interview_report = new interviewReport();
        $interview_report->interview_id = $request->interview_id;
        $interview_report->interview_marriage_status = $request->interview_marriage_status;
        $interview_report->interview_character_desc = $request->interview_character_desc;
        $interview_report->created_at = Carbon::now();
        $interview_report->updated_at = Carbon::now();
        if($interview_report->save()){
            for($i = 0; $i < count($request->interview_experience_names); $i++ ){
                $interview_experience = new Exp();
                $interview_experience->interview_id = $request->interview_id;
                $interview_experience->interview_experience_name = $request->interview_experience_names[$i];
                $interview_experience->interview_experience_pos = $request->interview_experience_poses[$i];
                $interview_experience->interview_experience_year = $request->interview_experience_years[$i];
                $interview_experience->interview_experience_desc = $request->interview_experience_descs[$i];
                $interview_experience->created_at = Carbon::now();
                $interview_experience->updated_at = Carbon::now();
                $interview_experience->save();
            }
            for($i = 0; $i < count($request->interview_skill_names); $i++ ){
                $interview_skills = new Skills();
                $interview_skills->interview_id = $request->interview_id;
                $interview_skills->interview_skill_name = $request->interview_skill_names[$i];
                $interview_skills->created_at = Carbon::now();
                $interview_skills->updated_at = Carbon::now();
                $interview_skills->save();
            }
            Job_apply::where('jobs_apply_id', '=', $request->jobs_apply_id)->update([ 'jobs_apply_status' => 'offered']);
            $request->session()->flash('alert-success', 'Data Report Interview Berhasil Dimasukan');
            return redirect()->route("jobsapply");
        } else {
            $request->session()->flash('status', 'Data Report Interview Gagal Dimasukan');
            return redirect()->route("jobsapply");
        }
    }

    public function exportReport(Request $request){
        
    }

    public function uploadrt($id)
    {
        $cv     = Input::file('rt');
        $filecv = base64_encode(file_get_contents($cv->getRealPath()));
        // $filecv = $cv->getRealPath();
        // echo "<iframe src=''></iframe>";
        // echo $filecv;
        // die();
        
        // $data   = Job_apply::find($id)->first();
          
        // $data->jobs_apply_report_talent = $filecv;
        // $data->update();

        Job_apply::where('jobs_apply_id', '=', $id)->update([ 'jobs_apply_report_talent' => $filecv]);

        return redirect('admin/jobsapply/detail?id='.$id);
    }

    public function downloadrt($id){
        $all = DB::table('jobs_apply')->where('jobs_apply_id', '=', $id)->first();
        // PDF::setOptions(['dpi' => 150, 'defaultFont' => 'roboto']);
        // $pdf = PDF::loadView('admin.report', compact('all'));
        // return $pdf->download('Report Talent - '.$all->jobs_apply_name.'.pptx');

        //PDF file is stored under project/public/download/info.pdf
        // $file= public_path(). "/download/info.pdf";
        $file= $all->jobs_apply_report_talent;

        $headers = array('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation','base64');

        return Response::download($file, 'Report Talent - '.$all->jobs_apply_name.'.pptx', $headers);
    }
}
