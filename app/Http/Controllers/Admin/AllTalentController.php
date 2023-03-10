<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyReqLog;
use App\Models\CompanyRequest;
use App\Models\Talent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AllTalentController extends Controller
{
    public function index()
    {
        $total  = DB::table('talent')->count();
        $member  = DB::table('talent')->where("user_id", ">", "0")->count();
        $nonmember  = DB::table('talent')->where("user_id", "0")->count();
        $invitation  = DB::table('talent')->where("talent_mail_invitation", ">", "0")->count();

        $talentpool['unprocess'] = Talent::where('talent_process_status', 'unprocess')->count();
        $talentpool['interview'] = Talent::where('talent_process_status', 'interview')->count();
        $talentpool['verified'] = Talent::where('talent_process_status', 'verified')->count();


        return view('admin.all-talent.index', compact('total', 'member', 'nonmember', 'invitation', 'talentpool'));
    }

    public function paginate_data(Request $request)
    {
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

        $data->where('talent_process_status', $request->process_status)->groupBy("talent_id");
        $data = $data->paginate(5);


        return view('admin.all-talent.table', compact('data'))->render();
    }



    // company data on add to client
    public function company_request_list(Request $request)
    {
        $company_request = CompanyRequest::join('company', 'company_request.company_id', 'company.company_id')
            ->select('company_request.company_request_id as id', 'company_request.name_request as text', 'company_request.name_request as value', 'company.company_id', 'company.company_name')->get();

        return response()->json($company_request);
    }

    public function add_to_client(Request $request)
    {
        $request->validate([
            'name_request' => 'required',
        ]);


        $request_id = $request->name_request;
        $talent = $request->talent_id;
        $check = CompanyReqLog::where([
            'company_request_id' => $request_id,
            'talent_id' => $talent
        ])->count();

        if ($check) {
            Alert::info('Info', 'Talent sudah ada di list request');
            return redirect()->route('all-talent.index')->with([
                'message' => 'Talent sudah ada di list request'
            ]);
        } else {
            CompanyReqLog::create([
                'company_request_id' => $request_id,
                'talent_id' => $talent,
                'status' => 'unprocess',
                'bookmark' => 'false'
            ]);

            Alert::success('Success', 'Talent berhasil ditambahkan di request');
            return redirect()->route('all-talent.index')->with([
                'message' => 'Talent berhasil ditambahkan di request'
            ]);
        }
    }

    public function change_status(Request $request)
    {
        $talent = Talent::find($request->id_talent);

        if ($talent) {
            $talent->talent_process_status = $request->status;
            $talent->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status talent telah diubah'
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'Talent tidak valid'
        ]);
    }
}
