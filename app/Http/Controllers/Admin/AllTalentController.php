<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Talent;
use Illuminate\Support\Facades\DB;

class AllTalentController extends Controller
{
    public function index()
    {
        $total  = DB::table('talent')->count();
        $member  = DB::table('talent')->where("user_id", ">", "0")->count();
        $nonmember  = DB::table('talent')->where("user_id", "0")->count();
        $invitation  = DB::table('talent')->where("talent_mail_invitation", ">", "0")->count();
        return view('admin.all-talent.index', compact('total', 'member', 'nonmember', 'invitation'));
    }

    public function paginate_data(Request $request)
    {
        //DB::enableQueryLog();

        // if ($request->ajax()) {

        //SELECT BUILDER START
        $default_query = "*,users.id as user_id, users.email as member_email, users.created_at as member_date, DATEDIFF(talent_start_career, now()) as pengalaman";

        if ($request->jumlah_apply_jobs) {
            $default_query .= ", COUNT(jobs_apply_id) as jumlah_apply_jobs";
        } else {
            $default_query .= ", '-' as jumlah_apply_jobs";
        }
        $data = Talent::select(DB::raw($default_query));
        //SELECT BUILDER END 

        //JOIN BUILDER START
        $data->join("users", "talent.user_id", "=", "users.id", "LEFT");
        if ($request->jumlah_apply_jobs || $request->apply == 'yes') {
            $data->join('jobs_apply', 'jobs_apply.jobs_apply_talent_id', '=', 'talent.talent_id', "LEFT");
        }
        //JOIN BULDER END 

        if ($request->talent_id) {
            $data->where("talent_id", "LIKE", "%" . $request->talent_id . "%");
        }
        if ($request->talent_name) {
            $data->where("talent_name", "LIKE", "%" . $request->talent_name . "%");
        }
        if ($request->talent_phone) {
            $data->where("talent_phone", "LIKE", "%" . $request->talent_phone . "%");
        }
        if ($request->talent_email) {
            $data->where("talent_email", "LIKE", "%" . $request->talent_email . "%");
        }
        if ($request->talent_address) {
            $data->where("talent_address", "LIKE", "%" . $request->talent_address . "%");
        }
        if ($request->talent_onsite_jogja) {
            $data->where("talent_onsite_jogja", $request->talent_onsite_jogja);
        }
        if ($request->talent_onsite_jakarta) {
            $data->where("talent_onsite_jakarta", $request->talent_onsite_jakarta);
        }
        if ($request->talent_isa) {
            $data->where("talent_isa", $request->talent_isa);
        }
        if ($request->talent_focus) {
            $data->where("talent_focus", "LIKE", "%" . $request->talent_focus . "%");
        }

        if ($request->min_pengalaman) {
            $data->where("pengalaman", ">", $request->pengalaman);
        }
        if ($request->max_pengalaman) {
            $data->where("pengalaman", "<", $request->pengalaman);
        }

        if ($request->min_gaji_jogja) {
            $data->where("talent_salary_jogja", ">=", $request->min_gaji_jogja);
        }
        if ($request->max_gaji_jogja) {
            $data->where("talent_salary_jogja", "<=", $request->max_gaji_jogja);
        }

        if ($request->status_member == "member") {
            $data->where("users.email", "!=", "");
        }

        if ($request->status_member == "non-member") {
            $data->where("users.email", "=", null);
        }

        if ($request->cv == 'yes') {
            $data->where("talent_cv_update", "!=", null);
        }

        if ($request->apply == 'yes') {
            $data->having(DB::raw('COUNT(jobs_apply_id)'), '>', 0);
        }

        if ($request->order != '') {
            $ar = explode(",", $request->order);
            foreach ($ar as $row) {
                $data->orderBy($row, "DESC");
            }
        } else {
            $data->orderBy("talent_id", "DESC");
        }
        $data->groupBy("talent_id");
        $data = $data->paginate(5);

        //$query = DB::getQueryLog(); dd($query);

        return view('admin.all-talent.table', compact('data'))->render();
        // }
    }
}
