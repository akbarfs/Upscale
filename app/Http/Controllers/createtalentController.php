<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Talent;

class createtalentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listkota = $this->city();
        return view('admin.createtalent', compact('listkota'));
    }


    public function jobsid(Request $request)
    {
        $data = explode('Nama:', $request->data);
        $name = explode('Telp:', $data[1]);
        $name = trim(strip_tags($name[0]));
        
        $telp = explode('Telp:', $request->data);
        $telp = explode('Email:', $telp[1]);
        $telp = trim(strip_tags($telp[0]));
        if(substr($telp, 0,3)=='+62'){$telp=str_replace('+62','',$telp);} elseif(substr($telp, 0,2)=='62'){$telp=substr($telp,2,12);} elseif(substr($telp, 0,1)=='0'){$telp=substr($telp,1,12);}
        
        $email = explode('Email:', $request->data);
        $email = explode('Alamat:', $email[1]);
        $email = trim(strip_tags($email[0]));
        
        $gender    = explode('Umur / Gender / Status', $request->data);
        $gender    = explode('Pengalaman Kerja', $gender[1]);
        $gender    = trim(strip_tags($gender[0]));
        $gender    = explode('/', $gender);
        $status    = trim($gender[2]);
        $birthdate = trim(str_replace(' tahun', '', trim($gender[0])));
        $birthdate = '01/01/'.date('Y', strtotime('-'.$birthdate.' year', time()));
        $gender    = trim($gender[1]);
        if($gender=='Laki-laki'){ $gender='male'; } else { $gender='female'; }
        if($status=='Lajang'){ $status='single'; } elseif($status=='Menikah'){ $status='married';} else { $status='single'; }
        
        $salary = explode('Gaji Diharapkan', $request->data);
        $salary = explode('<i class="fa fa-briefcase fa-inverse">', $salary[1]);
        $salary = trim(strip_tags($salary[0]));
        $salary = str_replace(array('IDR', ' ', '.'), '', $salary);
        if($salary=='Sesuaiekpektasi'){$salary='';}
        
        $exp = explode('<i class="fa fa-briefcase fa-inverse">', $request->data);
        $exp = explode('<i class="fa fa-graduation-cap fa-inverse">', $exp[1]);
        $exp = explode('<div class="view-detail">', $exp[0]);
        for($i=1; $i<count($exp); $i++) {
            $exp_comp = explode('<h4>', $exp[$i]);
            $exp_comp = explode('</h4>', $exp_comp[1]);
            $exp_comp = trim(strip_tags($exp_comp[0]));
            
            $exp_position = explode('<p class="small">', $exp[$i]);
            $exp_position = explode('</h4>', $exp_position[0]);
            $exp_position = trim(strip_tags($exp_position[1]));
            
            $exp_date = explode('<p class="small">', $exp[$i]);
            $exp_date = explode('</p>', $exp_date[1]);
            $exp_date = trim(strip_tags($exp_date[0]));
            $exp_date = explode(' - ', $exp_date);
            
            $exp_desc = explode('<div class="media-right">', $exp[$i]);
            $exp_desc = explode('</div>', $exp_desc[1]);
            $exp_desc = trim(strip_tags($exp_desc[2]));
            
            $exp_fix[] = array('comp'=>$exp_comp, 'position'=>$exp_position, 'desc'=>$exp_desc, 'start'=>$exp_date[0], 'end'=>$exp_date[1]);
        }
        // echo count($exp); //print_r($exp);
        // die();
        $exp = trim(strip_tags($exp[0]));
        $exp = str_replace(array('IDR', ' ', '.'), '', $exp);
        if($exp=='Sesuaiekpektasi'){$exp='';}
        
        
        // echo $name.' | '.$telp.' | '.$email.' | '.$gender.' | '.$status.' | '.$birthdate.' | '.$salary.' | '.$request->location;
        // print_r($name);
        
        $input_talent = DB::table('talent')->select('talent_id')->where('talent_email', '=' ,$email)->orWhere('talent_phone', 'like', '%'.$telp)->first();
        if(!isset($input_talent->talent_id)) {
            $talent                         = new Talent;
            $talent->talent_name            = $name;
            $talent->talent_martial_status  = $status;
            $talent->talent_condition       = 'quarantine';
            $talent->talent_phone           = $telp;
            $talent->talent_email           = $email;
            $talent->talent_gender          = $gender;
            $talent->talent_place_of_birth  = $request->location;
            $talent->talent_birth_date      = $birthdate;
            $talent->talent_address         = $request->location;
            $talent->talent_current_address = '';
            $talent->talent_salary          = $salary;
            // $talent->talent_cv              = $filecv;
            // $talent->talent_portfolio       = $request->input('pp');
            // $talent->talent_portofolio_file = $filepp;
            $talent->portfolio_update       = '';
            $talent->talent_status          = 'worker';
            $talent->talent_location_id     = 12;
            $talent->save();
            $id = $talent->talent_id;
            
            DB::table('quarantine')->insert(array (
                'quarantine_talent_id'    => $id,
                'quarantine_status'       => 'nothing',
                'quarantine_note'         => $request->position
            ));
            
            for($i=0; $i<count($exp_fix); $i++) {
                DB::table('work_experience')->insert(array (
                    'workex_talent_id'    => $id,
                    'workex_office'       => $exp_fix[$i]['comp'],
                    'workex_position'     => $exp_fix[$i]['position'],
                    'workex_startdate'    => $exp_fix[$i]['start'],
                    'workex_enddate'      => $exp_fix[$i]['end'],
                    'workex_desc'         => $exp_fix[$i]['desc'],
                    'workex_file'         => ''
                ));
            }
            
            return redirect()->back()->with('Success','Sukses, Input new talent - '.$name);
        }
        else {
            return redirect()->back()->with('Error','Talent ['.$name.'] sudah ada di DB');
        }
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
    
    
    
    public function city() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array( "key: b050d0f5a3517467fe28db19556bcc86" ), //b319d10f3c8258f34a2ad6890144f994
        ));
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        curl_close($curl);
        
        $listKota      = array();

        if (!$response){
            $response = config('app.json_city');
        }   
        
        $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
        $tempListKota  = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja

        //looping array temporary untuk masukin object yang kita butuhin
        foreach ($tempListKota as $value) {
            //bikin object baru
            $kota = new \stdClass();
            $kota->id = $value['city_id']; //id kotanya
            $kota->type= $value['type'];
            $kota->nama = $value['city_name']; //nama kotanya

            array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota
        }
        
        return $listKota;
    }
}
