<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobca;
use App\Models\Job;
use App\Models\Joblo;
use App\Models\Category;
use App\Models\Location;
use App\Models\Bootcamp;
use Route ; 
use App\Mail\progressMail;
use Illuminate\Support\Facades\Mail;
use App\CrmCompany ;
use App\CrmCompanyEmail ;


class homeController extends Controller
{

    public function debug()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array( "key: b319d10f3c8258f34a2ad6890144f994" ),
        ));
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        curl_close($curl);
        
       
        $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
        var_dump($arrayResponse); 
    }
    public function index(Request $request)
    {
        $categories = "";

        //check email 
        if ( isset($request->email) )
        {
            $email = CrmCompanyEmail::where('email_name',$request->email);
            if ($email->count())
            {
                //update email 
                $email = $email->first() ; 
                $email->email_validation = 1; 
                $email->email_last_response = date("Y-m-d H:i:s"); 
                $email->email_last_req_inquiry = date("Y-m-d H:i:s"); 
                $email->email_last_source = "email ".$request->utm_content;
                $email->save() ;  
            }
        }

        // return view('homebase', compact('categories'));
        return view('front.home3');
    }
    
    public function ecosystem() {return view("front.ecosystem") ; }
    public function dedicated() {return view("front.service.dedicated") ; }
    public function headhunter() {return view("front.service.headhunter") ; }
    public function helpBusiness() {return view("front.help.business"); }
    public function helpTalent() {return view("front.help.talent"); }
    public function faq() {return view("front.other.faq"); }

    public function contact()
    {
        $categories = "";

        return view('homecontact', compact('categories'));
    }

    public function jobs()
    {
        $categories = ""; 
        return view("home1",compact('categories'));
    }
    
    public function apply()
    {
        $categories = Category::all();
        $locations  = Location::all();
        // $bootcamps  = Bootcamp::all(); 
        $jobs       = Job::orderBy('jobs_active','asc')
                      ->orderBy('jobs_urgent', 'asc')
                      ->orderBy('jobs_title','asc')
                      ->paginate(20);

        return view('career.home-new', compact('jobs', 'categories', 'locations'));
    }

    public function applyOld()
    {
        $categories = Category::all();
        $locations  = Location::all();
        $bootcamps  = Bootcamp::all(); 
        $jobs       = Job::orderBy('jobs_active','asc')
                      ->orderBy('jobs_urgent', 'asc')
                      ->orderBy('jobs_created_date','asc')
                      ->paginate(6);

        return view('career.home', compact('bootcamps', 'jobs', 'categories', 'locations'));
    }

    public function detailLP(Request $request)
    {
        // if(isset($request) & $request!='') {
            // echo 'ada'.' - '.$request;die();
        // }
        $bootcamps  = Bootcamp::all(); 
        return view('detail', compact('bootcamps'));
    }

    public function search(Request $request) 
    {
        $bootcamps = Bootcamp::when($request->keyword, function($query) use($request)
            {
                $query->where('bootcamp_title', 'like', "%{$request->keyword}%")->where('bootcamp_active', '=', 'Y');
            })
            ->get();

        return view('bootcamp/index', compact('bootcamps'));
    }

    public function filter(Request $request)
    {
        $categories = Category::all();
        $locations  = Location::all();
        $bootcamps  = Bootcamp::all(); 
        
        $cat = $request->input('cat');
        $loc= $request->input('loc');
        $type= $request->input('type');
        $job = Job::all();
        $jobca = Jobca::all();
        $jobs = Job::whereHas('jobca', function($q) use($cat)
        {
            return $q->where('jobca_category_id', $cat);
        })
        ->orWhereHas('joblo', function($q) use($loc)
        {
            return $q->where('joblo_location_id', $loc);
        })
        ->orWhere('jobs_type_time', $type)->paginate(10);
        

        return view('home', compact('jobs','categories', 'locations', 'bootcamps'));
    }

    public function detail($id)
    {
        // $bootcamps  = Bootcamp::all(); 
        $job = Job::where('jobs_id','=', $id)->first();
        $date = $job->jobs_created_date->diffForHumans();

        return view('career/detail', compact('job','date','id'));
    }

    public function info()
    {
        $bootcamps  = Bootcamp::all();

        return view('info', compact('bootcamps'));
    }

    public function lp()
    {
        $data      = "";
        $bootcamps = Bootcamp::all();
        return view('lp', compact('data', 'bootcamps'));
    }

    public function move()
    {
        $data = DB::table('jobs_apply')->select('jobs_apply_name', 'jobs_apply_phone', 'jobs_apply_email', 'jobs_apply_gender', 'jobs_apply_place_of_birth', 'jobs_apply_birth_date', 'jobs_apply_expected_salary')->where('jobs_apply_id', '>', 0)->get();
        // print_r($data);
        foreach ($data as $v) {
            echo "<br>".$v->jobs_apply_name;
            echo " | ".$v->jobs_apply_phone;
            echo " | ".$v->jobs_apply_email;
            echo " | ".$v->jobs_apply_gender;
            echo " | ".$v->jobs_apply_place_of_birth.", ".$v->jobs_apply_birth_date;
            echo " | ".$v->jobs_apply_expected_salary;
        }
        // echo "<br>a";
    }

    public function startProject()
    {
        return view('front.project');
    }

    public function sendInquiry(Request $request)
    {
        //dd($request->all());
        // $data['data'] = 'testing'; 
        // Mail::to($data)->send(new progressMail($data));
        $message = array() ; 

        $jenis_skill = $request->position ; 
        $message = implode(", ",$jenis_skill);
        $message = "Position : ".$message."\r\n\r\n";
        foreach ( $request->all() as $k=>$v)
        {
            if ( !is_array($v))
            {
                $message = $message."".$k." : ".$v."\r\n\r\n" ;
            }
            
        }


        $name = $request->company_name; 
        $email = $request->company_name; 
        $message = $message; 
        $phone = $request->phone ; 
        $to_email = 'sales@upscale.id';
        $subject = 'Contact '.$name.' email '.$email;
        $message = $message ; 
        $headers = 'From: noreply@upscale.id'; //optional
        mail($to_email,$subject,$message,$headers);
    }

    public function loadInquiry()
    {

        return view("front.req_inquiry");
    }
}
