<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
class ReportTalentPDF extends Controller
{
    public function generatePdf(Request $req){    
        $posisi   = $req->position;
        $all      = DB::table('talent')->where('talent_id',$req->talentidnih)->first();
        $preferloc= DB::table('talent')->leftjoin('location','location.location_id','=','talent_prefered_location')->where('talent_id',$req->talentidnih)->first();
        $edu      = DB::table('education')->where('edu_deleted_date','=',NULL)->where('edu_talent_id',$req->talentidnih)->get();
        $certif   = DB::table('certification')->where('certif_deleted_date','=',NULL)->where('certif_talent_id',$req->talentidnih)->get();
        $skill    = DB::table('skill_talent')->join('skill','skill.skill_id','=','skill_talent.st_skill_id')->where('st_talent_id',$req->talentidnih)->get();
        // var_dump($certif); die();
        // dd($req->all());
    	$pdf = PDF::loadview('coba',[
            'all'      =>$all,
            'edu'      =>$edu,
            'certif'   =>$certif,
            'skill'    =>$skill,
            'posisi'   =>$posisi,
            'preferloc'=>$preferloc
        ]);
    	return $pdf->download('Report Talent '.$all->talent_name.'.pdf');
    }
}
