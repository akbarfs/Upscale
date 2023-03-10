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
use App\Models\Talent;
use App\Models\Talent_log;
use Route ; 
use App\Mail\progressMail;
use Illuminate\Support\Facades\Mail;
use App\CrmCompany ;
use App\CrmCompanyEmail ;
use Illuminate\Support\Facades\Crypt;
use Session; 
use Input ; 


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
    function log(Request $request)
    {
        $id = $request->id ; 
        if ( $id > 0 )
        {   
            $log = Talent_log::findOrFail($id); 
            $log->tl_last_respon = date("Y-m-d H:i:s");
            $log->save();             
        }

    }

    //tracking email , load di email pake <img src='https://upscale.id/track?email={{Email Address}}'
    function track(Request $request)
    {
        if ( isset($request->email) && $request->email != "{{Email Address}}")
        {
            $array = array_map('trim', explode(',', $request->email));
           
           foreach ($array as $row )
           {
                $mail_add = $row ;
                $row = date("D d-m-Y H:i:s")." open mail : ".$row."
";
                if( !file_put_contents("openmail.txt", $row, FILE_APPEND)){
                    die('tidak ada file');
                }

                //update email company
                if ( $request->type == 'client')
                {
                    $email = CrmCompanyEmail::where('email_name',$row);
                    if ($email->count() == 1)
                    {
                        //update email 
                        $email = $email->first() ; 
                        $email->email_validation = 1; 
                        $email->email_last_response = date("Y-m-d H:i:s"); 
                        $email->email_last_source = "email ".$request->utm_content;
                        $email->save() ;  
                    }
                }
                
                //update email talent
                if ( $request->type == 'talent')
                {
                    $talent = Talent::where('talent_email',$mail_add);
                    if ($talent->count() == 1)
                    {
                        //update email 
                        $talent = $talent->first() ; 
                        $talent->talent_la_type = 'buka email'; 
                        $talent->talent_last_active = date("Y-m-d H:i:s"); 
                        $talent->save() ;  

                    }
                    else if ( $talent->count() == 0 )
                    {
                        // die("insert talent");
                        $talent = new Talent ; 
                        $talent->talent_name = $request->name ? $request->name : "-" ;
                        $talent->talent_phone = "-" ; 
                        $talent->talent_email = $mail_add ; 
                        $talent->talent_last_active = date("Y-m-d H:i:s");
                        $talent->talent_la_type = 'open email' ; 
                        $talent->save() ; 
                        //save di log
                        $talent_log = new Talent_log ; 
                        $talent_log->tl_talent_id = $talent->talent_id; 
                        $talent_log->tl_name = $request->name ; 
                        $talent_log->tl_type = "open email" ; 
                        $talent_log->tl_email = $mail_add ; 
                        $talent_log->tl_email_status = 'valid' ; 
                        $talent_log->tl_desc = 'membuka email' ;
                        $talent_log->save()  ;  
                    }
                }
                
           }
            
        }
    }

    public function index(Request $request)
    {
        $categories = "";

        //check email 
        if ( isset($request->email) )
        {
            $array = array_map('trim', explode(',', $request->email));
           
           foreach ($array as $row )
           {

                $mail_add = $row ;
                $row = date("D d-m-Y H:i:s")." open Form : ".$row."
";

                if( !file_put_contents("openmail.txt", $row, FILE_APPEND)){
                    die('tidak ada file');
                }
                $email = CrmCompanyEmail::where('email_name',$row);
                if ($email->count())
                {
                    //update email 
                    $email = $email->first() ; 
                    $email->email_validation = 1; 
                    $email->email_last_req_inquiry = date("Y-m-d H:i:s"); 
                    $email->email_last_source = "email ".$request->utm_content;
                    $email->save() ;  
                }

                //update email talent
                $talent = Talent::where('talent_email',$mail_add);
                if ($talent->count())
                {
                    //update email 
                    $talent = $talent->first() ; 
                    $talent->talent_last_active = date("Y-m-d H:i:s");
                    $talent->talent_la_type = 'open form register';  
                    $talent->save() ;  
                }
                else if ( $talent->count() == 0 && $request->reg == 'open')
                {
                    // die("insert talent");
                    $talent = new Talent ; 
                    $talent->talent_name = $request->name ? $request->name : "-" ;
                    $talent->talent_phone = "-" ; 
                    $talent->talent_email = $mail_add ; 
                    $talent->talent_last_active = date("Y-m-d H:i:s");
                    $talent->talent_la_type = 'open form register' ; 
                    $talent->save() ; 
                    //save di log
                    $talent_log = new Talent_log ; 
                    $talent_log->tl_talent_id = $talent->talent_id; 
                    $talent_log->tl_name = $request->name ; 
                    $talent_log->tl_type = "open form register" ; 
                    $talent_log->tl_email = $mail_add ; 
                    $talent_log->tl_email_status = 'valid' ; 
                    $talent_log->tl_desc = 'membuka form register dari email' ;
                    $talent_log->save()  ;  
                }
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
                      ->whereJobs_active('Y')
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

    public function detailUsingSlug($id,$slug) {
        // return dd($id);
        $job = Job::where('jobs_id','=', $id)->whereJobs_title(str_replace('-', ' ', $slug))->firstOrFail();
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
        $email = $request->company_email; 
        $message = $message; 
        $phone = $request->phone ; 
        $to_email = 'dodi@upscale.id';
        $subject = 'Upscale Client Request '.request('company_name');
        $message = $message ; 
        $headers = 'From: lead@uspcale.id'; //optional
        mail($to_email,$subject,$message,$headers);

        $name = $request->company_name; 
        $email = $request->company_email; 
        $message = $message; 
        $phone = $request->phone ; 
        $to_email = 'bayu@upscale.id';
        $subject = 'Upscale Client Request '.request('company_name');
        $message = $message ; 
        $headers = 'From: lead@uspcale.id'; //optional
        mail($to_email,$subject,$message,$headers);
    }

    public function loadInquiry()
    {

        return view("front.req_inquiry");
    }

    public function loginas($code)
    {
        $redirect = Input::get('redirect');
        $talent_id = (int) decrypt_custom($code);
        $talent = Talent::find($talent_id); 

        $user = $talent->user()->firstOrFail();
        
        Session::put('user_id',$user->id);
        Session::put('username',$user->username);
        Session::put('email',$user->email);
        Session::put('login',TRUE);

        if ( isset($redirect))
        {
            return redirect(url($redirect));
        }
        else
        {
            return redirect("profile");
        }
    }

    
}
