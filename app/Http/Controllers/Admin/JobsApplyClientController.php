<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyReqLog;
use App\Models\CompanyRequest;
use App\Models\Job_apply;
use App\Models\SubstepsModel;

class JobsApplyClientController extends Controller
{
    // index page
    public function index2()
    {
        $company_req = CompanyRequest::all();

        $talentpool['unprocess'] = CompanyReqLog::where('status', 'unprocess')->count();
        $talentpool['interview'] = CompanyReqLog::where('status', 'interview')->count();
        $talentpool['prospek'] = CompanyReqLog::where('status', 'prospek')->count();
        $talentpool['offered'] = CompanyReqLog::where('status', 'offered')->count();
        $talentpool['hired'] = CompanyReqLog::where('status', 'hired')->count();
        $talentpool['reject'] = CompanyReqLog::where('status', 'reject')->count();
        $talentpool['bookmark'] = CompanyReqLog::where('bookmark', 'true')->count();

        return view('admin.jobs-apply-client.index', [
            'active' => 'active',
            'company_req' => $company_req,
            'count' => $talentpool,
        ]);
    }

    // table talent request
    public function table_talent_request(Request $request)
    {
        $data = CompanyReqLog::where('status', $request->status);

        // dd($request->all());


        // filter client
        if ($request->client) {
            $data->whereHas('company_request.company', function ($query) use ($request) {
                $query->where('company_name', 'like', '%' . $request->client . '%');
            });
        }

        // filter talent
        if ($request->talent) {
            $data->whereHas('talent', function ($query) use ($request) {
                $query->where('talent_name', 'like',  '%' . $request->talent . '%');
            });
        }


        // filter company request
        if ($request->company_request) {
            $data->where('company_request_id', $request->company_request);
        }

        // filter status requested (hire)
        if ($request->is_hire_requested != 'all') {
            if ($request->is_hire_requested == 1) {
                $data->where('is_hire_requested', 1);
            } else {
                $data->where('is_hire_requested', NULL);
            }
        }

        $data = $data->latest()->paginate(10);
        return view('admin.jobs-apply-client.table', ['request_log' => $data])->render();
    }


    // public function paginate_data(Request $request)
    // {



    //     // filter domisili
    //     if ($request->domisili != 'Domisili') {
    //         $data = $data->where(function ($q) use ($request) {
    //             $q->where('talent_address', 'like', '%' . $request->domisili . '%')->orWhere('talent_current_address', 'like', '%' . $request->domisili . '%')->orWhere('talent_prefered_city', 'like', '%' . $request->domisili . '%');
    //         });
    //     }
    //     // end filter domisili

    //     // filter ready kerja
    //     if ($request->readykerja != "Ready Kerja") {
    //         if ($request->readykerja == 'yes') {
    //             $data = $data->whereIn('talent_available', ['yes', 'asap']);
    //         } else {
    //             $data = $data->whereNotIn('talent_available', ['yes', 'asap']);
    //         }
    //     }
    //     // End Filter ready kerja

    //     // Filter experience in years
    //     if ($request->experience != "Experience In Years") {
    //         // return 'This Filter Still Development';

    //         switch ($request->experience) {
    //             case '1':
    //                 $data = $data->whereRaw('FLOOR(DATEDIFF(CURDATE(), talent_start_career) / 365) <= 1');
    //                 break;

    //             case '1 - 3':
    //                 $data = $data->whereRaw('FLOOR(DATEDIFF(CURDATE(), talent_start_career) / 365) BETWEEN 1 AND 3');
    //                 break;

    //             case '3 - 5':
    //                 $data = $data->whereRaw('FLOOR(DATEDIFF(CURDATE(), talent_start_career) / 365) BETWEEN 3 AND 5');
    //                 break;

    //             case '5 - 10':
    //                 $data = $data->whereRaw('FLOOR(DATEDIFF(CURDATE(), talent_start_career) / 365) BETWEEN 5 AND 10');
    //                 break;

    //             case '10':
    //                 $data = $data->whereRaw('FLOOR(DATEDIFF(CURDATE(), talent_start_career) / 365) >= 10');
    //                 break;

    //             default:
    //                 $data = $data->whereNotNull('talent_start_career');
    //                 break;
    //         }
    //     }
    //     // End Filter experience in years

    //     // Filter Education
    //     if ($request->education != "Education") {
    //         $data = $data->with(['talent_education'])->whereHas('talent_education', function ($q) use ($request) {
    //             $q->where('edu_level', 'like', '%' . $request->education . '%')->groupBy('edu_talent_id');
    //         });
    //     }
    //     // End Filter Education

    //     // Filter Gaji Sekarang
    //     if ($request->currsalary != null) {
    //         $currSalary = (int)preg_replace('/[^0-9]/', '', $request->currsalary);
    //         $data = $data->where(function ($q) use ($request, $currSalary) {
    //             $q->where('talent_lastest_salary', $currSalary)->orWhere('talent_lastest_salary', $request->currsalary);
    //         });
    //     }
    //     // End Filter Gaji Sekarang

    //     // Filter Expetasi Gaji
    //     if ($request->expsalary != null) {
    //         $expSalary = (int)preg_replace('/[^0-9]/', '', $request->expsalary);
    //         $data = $data->where(function ($k) use ($request, $expSalary) {
    //             $k->where('talent_salary', $expSalary)->orWhere('talent_salary', $request->expsalary);
    //         });
    //     }
    //     // End Filter Expetasi Gaji

    //     // Filter Ready Kerja
    //     if ($request->readyluarkota != "Ready Luar Kota") {
    //         $data = $data->where('talent_luar_kota', $request->readyluarkota);
    //     }
    //     // End Filter Ready Kerja

    //     // Filter Skill
    //     if ($request->skills) {
    //         $data = $data->whereHas('talent_skill', function ($o) use ($request) {
    //             $o->whereIn('st_skill_id', $request->skills);
    //         });
    //     }
    //     // End Filter Skill

    //     // Filter User terupdate
    //     if ($request->userupdate == 'yes') {
    //         $data = $data->orderBy('tupdated_date', 'DESC');
    //     } else {
    //         $data = $data->orderBy('talent_id', "DESC");
    //     }
    //     // End filter user terupdate

    //     // End Request
    //     $data = $data->groupBy("talent_id");
    //     $data = $data->paginate(10);

    //     return view('admin.jobs-apply-client.table', ['request_log' => $data])->render();
    // }
}
