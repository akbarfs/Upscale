<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\UpscaleEmail;
use App\Models\Talent;

use App\Exports\TalentExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Builder;

class TalentNewController extends Controller
{

    public function show()
    {

        return view('admin.talent.home');
    }

    function mail($id)
    {
        return view("admin.talent.mail");
    }

    function createTypeEmail()
    {
        return view("admin.talent.createTypeEmail");
    }

    function mailBackup($id)
    {
        return view("admin.talent.mail-backup");
    }

    function mailSend()
    {
        $recipients = [
            ['email' => 'upscale.campaign34@gmail.com'], 
            ['email' => 'upscale.campaign13@gmail.com'], 
            ['email' => 'upscale.asia.id@gmail.com'],
            ['email' => 'grady.sianturi13@gmail.com']
        ];
        Mail::to($recipients)->send(new UpscaleEmail());

        echo "coba send email lewat sini";
    }

    public function paginate_data(Request $request)
    {
        // if ($request->ajax()) {

            $data = Talent::select(DB::raw("*, users.email as member_email, users.created_at as member_date"));

            $data->join("users","talent.user_id","=","users.id","LEFT");

            if ( $request->talent_name ) {$data->where("talent_name","LIKE","%".$request->talent_name."%"); }
            if ( $request->talent_phone ) {$data->where("talent_phone","LIKE","%".$request->talent_phone."%"); }
            if ( $request->talent_email ) {$data->where("talent_email","LIKE","%".$request->talent_email."%"); }
            if ( $request->talent_address ) {$data->where("talent_address","LIKE","%".$request->talent_address."%"); }
            if ( $request->talent_onsite_jogja ) {$data->where("talent_onsite_jogja",$request->talent_onsite_jogja); }
            if ( $request->talent_onsite_jakarta ) {$data->where("talent_onsite_jakarta",$request->talent_onsite_jakarta); }
            if ( $request->talent_isa ) {$data->where("talent_isa",$request->talent_isa); }

            if ( $request->status_member == "member" )
            {
                $data->where("users.email","!=","");
            }

            if ( $request->status_member == "non-member" )
            {
                $data->where("users.email","=",null);
            }
            if ( $request->order != '' )
            {
                $ar = explode(",",$request->order);
                foreach ( $ar as $row)
                {
                    $data->orderBy($row,"DESC");
                }
            }
            else
            {
                $data->orderBy("talent_id","DESC");
            }

            $data = $data->paginate(10);

            return view('admin.talent.table',compact('data'))->render();
        // }
    }

    public function export_excel()
    {
        return Excel::download(new TalentExport, 'talent.xlsx');
    }

    // SEMENTARA DI HIDE DULU 
    // public function delete($id){
    //     Talent::find($id)->delete();
    //     return back()->with('success', 'Selected Talent has been deleted successfully');
    // }

    public function del(Request $request)
    {
        $delid = $request->input('delid');
        Talent::whereIn('talent_id', $delid)->delete();
        return back()->with('success', 'Selected Talent has been deleted successfully');
    }
    
    public function insert(){
        return view('admin.talent.insert');
    }

public function insertData(Request $request){



        $validation = $request->validate([
            'nama'=>'required|string|max:150',
            'email'=>'required|string|email|max:100|unique:users',
            'gender'=>'required',
            'alamat'=>'required',
            'phone'=>'required|string|max:30',
            'birthdate'=>'required',
            'birthplace'=>'required',
            'martialstatus'=>'required',
            'currentaddress'=>'required|string',
            'condition'=>'required',
            'skill'=>'required',
            'salary'=>'required|string',
            'focus'=>'required|string',
            'startcareer'=>'required|string',
            'level'=>'required',
            'latestsalary'=>'required|string',
            'preflocation'=>'required|string',
            'status'=>'required',
            'onsite'=>'required',
            'remote'=>'required',
            'available'=>'required',
            'apply'=>'required',
            'international'=>'required',
            'freelancehour'=>'required',
            'projectmin'=>'required',
            'projectmax'=>'required',
            'konsulrate'=>'required',
            'tutorrate'=>'required',

        ]);


        DB::table('talent')->insert([
            'talent_name' => $request->nama,
            'talent_email' => $request->email,
            'talent_gender' => $request->gender,
            'talent_address' => $request->alamat,
            'talent_phone' => $request->phone,
            'talent_birth_date' => $request->birthdate,
            'talent_place_of_birth' => $request->birthplace,
            'talent_martial_status' => $request->martialstatus,
            'talent_current_address' => $request->currentaddress,
            'talent_condition' => $request->condition,
            'talent_skill' => $request->skill,
            'talent_salary' => $request->salary,
            'talent_focus' => $request->focus,
            'talent_start_career' => $request->startcareer,
            'talent_level' => $request->level,
            'talent_latest_salary' => $request->latestsalary,
            'talent_prefered_location' => $request->preflocation,
            'talent_status' => $request->status,
            'talent_onsite_jakarta' => $request->onsite,
            'talent_remote' => $request->remote,
            'talent_available' => $request->available,
            'talent_apply' => $request->apply,
            'talent_international' => $request->international,
            'talent_location_id' => '12',
            'talent_freelance_hour' => $request->freelancehour,
            'talent_project_min' => $request->projectmin,
            'talent_project_max' => $request->projectmax,
            'talent_konsultasi_rate' => $request->konsulrate,
            'talent_ngajar_rate' => $request->tutorrate,
        ]);


        return redirect('/list');

       
    }

}
