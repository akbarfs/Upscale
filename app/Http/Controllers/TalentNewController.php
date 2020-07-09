<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Mail\UpscaleEmail;
use App\Models\Talent;
use App\Models\Skill;
use App\Models\Talent_log;
use App\User;

use App\Exports\TalentExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Crypt;

class TalentNewController extends Controller
{

    public function show()
    {

        return view('admin.talent.home');
    }

    function mail($talent_id)
    {
        $talent = Talent::findOrFail($talent_id);
        return view("admin.talent.mail",compact('talent'));
    }

    function createTypeEmail($id)
    {
        $talent = Talent::find($id);
        return view("admin.talent.createTypeEmail",compact('talent'));
    }

    function mailBackup($id)
    {
        $talent = Talent::find($id); 
        return view("admin.talent.mail-backup",compact('talent'));

    }

    public function mailSend(Request $request)
    {
        ini_set('max_execution_time', 120);

        $talent_id = $request->input('id') ;
        $talent = Talent::find($talent_id); 
        
        $data['talent'] = $talent ; 
        $data['sender'] = $request->sender ;    
        // Mail::to($email)->send(new UpscaleEmail($email));

        if ( $request->type == 'invitation')
        {
            $view = 'mail.invitation';
        }
        else
        {
            $view ='mail.regular';
        }

        $judul = $request->judul ; 
        //ganti nama di judul
        $judul = str_replace("#name#",$talent->talent_name,$judul); 
        $judul = str_replace("#nama#",$talent->talent_name,$judul); 
        //ganti content 
        $content = str_replace("#name#",$talent->talent_name, $request->content); 
        $data['content'] = str_replace("#nama#",$talent->talent_name, $content); 

        Mail::send($view, $data, function ($message) use ($talent,$request,$judul) {
            $message->from('dodi@upscale.id', $request->sender);
            $message->to($talent->talent_email); 
            $message->subject($judul);
        });

        $insert = new Talent_log; 
        $insert->log($request->type,$talent_id,['desc'=>'dikirim dari new list talent']); 

        return response()->json(['status'=>1,'email'=>$talent->talent_email,'message'=>'send berhasil']);
        
        // Mail::to($email)->send(new UpscaleEmail($email))->delay(60);
        // return back()->withError('Masih gagal ' . $request->input('id'));
    }

    public function viewMail($view)
    {
        //dummy database 
        $talent = (object) [
            'talent_name' => 'Dodi Prakoso Wibowo',
            'talent_email' => 'dodi@gmail.com',
        ];
        return view('mail.'.$view,compact('talent'));
    }

    public function paginate_data(Request $request)
    {
        // if ($request->ajax()) {

            //SELECT BUILDER START
            $default_query = "*,users.id as user_id, users.email as member_email, users.created_at as member_date";
            $data = Talent::select(DB::raw($default_query));
            //SELECT BUILDER END 

            //JOIN BUILDER START
            $data->join("users","talent.user_id","=","users.id","LEFT");
            //JOIN BULDER END 

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

    public function export_excel ()
    {
        return Excel::download(new TalentExport, 'talent.xlsx');
    }

    // SEMENTARA DI HIDE DULU 
    public function delete($id){
        Talent::find($id)->delete();
        return back()->with('success', 'Selected Talent has been deleted successfully');
    }

    public function del(Request $request)
    {
        $delid = $request->input('delid');
        foreach ( $delid as $row )
        {
            $talent = Talent::find($row);
            
            //menghapus semua data di table user yg berelasi
            if ( $user = User::find($talent->user_id) ) 
            {

                $user->delete() ; 
            } 

            //delete 
            Talent::where('talent_id', $row)->delete();
        }
        return back()->with('success', 'Selected Talent has been deleted successfully');
    }
    
    public function insert(){
        return view('admin.talent.insert');
    }

    public function insertData(Request $request){



        $validation = $request->validate([
            'nama'=>'required|string|max:150',
            'email'=>'required|string|email|max:100|unique:users',
            // 'gender'=>'required',
            // 'alamat'=>'required',
            // 'phone'=>'required|string|max:30',
            // 'birthdate'=>'required',
            // 'birthplace'=>'required',
            // 'martialstatus'=>'required',
            // 'currentaddress'=>'required|string',
            // 'condition'=>'required',
            // 'skill'=>'required',
            // 'salary'=>'required|string',
            // 'focus'=>'required|string',
            // 'startcareer'=>'required|string',
            // 'level'=>'required',
            // 'latestsalary'=>'required|string',
            // 'preflocation'=>'required|string',
            // 'status'=>'required',
            // 'onsite'=>'required',
            // 'remote'=>'required',
            // 'available'=>'required',
            // 'apply'=>'required',
            // 'international'=>'required',
            // 'freelancehour'=>'required',
            // 'projectmin'=>'required',
            // 'projectmax'=>'required',
            // 'konsulrate'=>'required',
            // 'tutorrate'=>'required',

        ]);


        

        DB::table('talent')->insert([
            'talent_name' => $request->nama,
            'talent_email' => $request->email,
            'talent_gender' => $request->gender,
            'talent_address' => $request->alamat,
            'talent_phone' => isset($request->phone) ? $request->phone : '',
            'talent_birth_date' => $request->birthdate,
            'talent_place_of_birth' => $request->birthplace,
            'talent_martial_status' => $request->martialstatus,
            'talent_current_address' => isset($request->currentaddress)?$request->currentaddress:'',
            'talent_condition' => $request->condition,
            'talent_salary' => $request->salary,
            'talent_focus' => $request->focus,
            'talent_start_career' => $request->startcareer,
            'talent_level' => isset($request->level)?$request->level:"undefined",
            'talent_lastest_salary' => $request->latestsalary,
            'talent_prefered_location' => $request->preflocation,
            'talent_status' => $request->status,
            'talent_onsite_jakarta' => $request->onsite,
            'talent_remote' => $request->remote,
            'talent_available' => $request->available,
            'talent_apply' => $request->apply,
            'talent_international' => $request->international,
            'talent_location_id' => '12',
            'talent_freelance_hour' => isset($request->freelancehour)?$request->freelancehour:'',
            'talent_project_min' => isset($request->projectmin)? $request->projectmin: '' ,
            'talent_project_max' => isset($request->projectmax)? $request->projectmax: '' ,
            'talent_konsultasi_rate' => isset($request->konsulrate)? $request->konsulrate: '' ,
            'talent_ngajar_rate' => isset($request->tutorrate)? $request->tutorrate: '' ,
        ]);

        $idTalent = DB::table('talent')->insertGetId([ 'talent_name' => $request->nama ]);



        if ( $request->skill != '' )
        {
            $InsertSkill = explode(",",$request->skill);
            foreach ( $InsertSkill as $skill)
            {
                $idSkill[] = Skill::where("skill_name",$skill)->first()->skill_id;
            }
            foreach($idSkill as $insert)
            {

                DB::table('skill_talent')->insert([
                'st_talent_id' => $idTalent,
                'st_skill_id' => $insert,
                'st_skill_verified' => 'NO',
                ]);
            
            }

        }

        

        return redirect('admin/talent/list/insert')->with('success', 'Data Talent Berhasil dimasukkan.');
       
    }

}
