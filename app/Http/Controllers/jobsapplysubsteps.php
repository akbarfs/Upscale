<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobca;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;
use Yajra\Datatables\Datatables;
use App\Models\Job_apply;
use App\Models\Job_apply_substeps;
use App\Models\Interview;
use App\Models\SubstepsModel;
use Carbon\Carbon;
use App\Mail\progressMail;


class jobsapplysubsteps extends Controller
{

    public function getSubsteps(Request $request){
        $jobs_apply_status = Job_apply::select('jobs_apply_status')->where('jobs_apply_id', '=', $request->jobs_apply_id)->first();
        $data = SubstepsModel::where('substeps_jobs_apply_status', '=', $jobs_apply_status->jobs_apply_status)->orderBy('substeps.substeps_order', 'desc')->get();
        if(isset($data)){
            return json_encode($data);
        } else {
            return false;
        }
    }
    public function get(Request $request){
        $data = Job_apply_substeps::where('jobs_apply_id', '=', $request->jobs_apply_id)->join('substeps', 'jobs_apply_substeps.substeps_id', '=', 'substeps.substeps_id' )->get();
        if(isset($data)){
            return json_encode($data);
        } else {
            return false;
        }
    }

    public function checked(Request $request){
       
        if($request->jobs_apply_substeps_id != null){
            $data = Job_apply_substeps::where('jobs_apply_substeps_id', '=', $request->jobs_apply_substeps_id)->update(['jobs_apply_substeps_checked' => 'checked', 'updated_at' => Carbon::now()]);
            $last_id = 'update';
            $data = 'update';
        } else if($request->jobs_apply_substeps_id == null){
            $substeps = new  Job_apply_substeps();
            $substeps->jobs_apply_substeps_checked = 'checked';
            $substeps->jobs_apply_id = $request->jobs_apply_id;
            $substeps->substeps_id = $request->substeps_id;
            $substeps->jobs_apply_substeps_comment = '';
            $substeps->created_at = Carbon::now();
            $substeps->updated_at = Carbon::now();
            $data = $substeps->save();
            $last_id = $substeps->jobs_apply_substeps_id;
        }
        $kirim_email = SubstepsModel::select('substeps_email_status', 'substeps_email_text')->where('substeps_id', '=', $request->substeps_id)->first();
        if($kirim_email->substeps_email_status == 'yes'){
            $to = Job_apply::select('jobs_apply_email')->where('jobs_apply_id', '=', $request->jobs_apply_id)->first();
            // Mail::to($to->jobs_apply_email)->send(new progressMail($kirim_email->substeps_email_text));
            $data = array(
                'html' => $kirim_email->substeps_email_text,
                'to' => $to->jobs_apply_email
            );
            Mail::send(array(), array(), function ($message) use ($data) {
                $message->to($data['to'])
                  ->subject('Progress Lamaran Kerja - Erporate')
                  ->setBody($data['html'], 'text/html');
              });
        }
        return json_encode(array('last_id' => $last_id, 'data' => $data));
    }
    public function unchecked(Request $request){
       
        Job_apply_substeps::where('jobs_apply_substeps_id', '=', $request->jobs_apply_substeps_id)->update(['jobs_apply_substeps_checked' => 'not-checked', 'updated_at' => Carbon::now()]);
        $last_id = 'update';
        $data = 'update';

        return json_encode(array('last_id' => $last_id, 'data' => $data));
    }

    public function note(Request $request){
        $note = Job_apply_substeps::where('jobs_apply_substeps_id', '=', $request->jobs_apply_substeps_id)->update(['jobs_apply_substeps_comment' => $request->jobs_apply_substeps_comment, 'updated_at' => Carbon::now()]);
        return json_encode(array('note' => $note));
    }
}
