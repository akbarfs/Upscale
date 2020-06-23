<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\UpscaleEmail;
use App\Models\Talent;

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

    function mailSend()
    {
        $recipients = [
            "dodi@upscale.id",
            "upscale.campaign13@gmail.com",
			"upscale.campaign14@gmail.com",
			"upscale.campaign15@gmail.com",
			"upscale.campaign16@gmail.com",
			"upscale.campaign17@gmail.com",
			"upscale.campaign18@gmail.com",
			"upscale.campaign19@gmail.com",
			"upscale.campaign20@gmail.com",
			"upscale.campaign21@gmail.com",
			"upscale.campaign22@gmail.com",
			"upscale.campaign23@gmail.com",
			"upscale.campaign24@gmail.com",
			"upscale.campaign25@gmail.com",
			"upscale.campaign26@gmail.com",
			"upscale.campaign27@gmail.com",
			"upscale.campaign28@gmail.com",
			"upscale.campaign29@gmail.com",
			"upscale.campaign30@gmail.com",
			"upscale.campaign31@gmail.com",
			"upscale.campaign32@gmail.com",
			"upscale.campaign33@gmail.com"
        ];
        Mail::to($recipients)->send(new UpscaleEmail());

        echo "coba send email lewat sini"; 
    }

    public function paginate_data(Request $request)
    {
        // if ($request->ajax()) {

            $data = Talent::select(DB::raw("*, users.email as member_email"));

            $data->join("users","talent.user_id","=","users.id","LEFT");

            if ( $request->talent_name ) {$data->where("talent_name","LIKE","%".$request->talent_name."%"); }
            if ( $request->talent_phone ) {$data->where("talent_phone","LIKE","%".$request->talent_phone."%"); }
            if ( $request->talent_email ) {$data->where("talent_email","LIKE","%".$request->talent_email."%"); }
            if ( $request->talent_address ) {$data->where("talent_address","LIKE","%".$request->talent_address."%"); }

            if ( $request->status_member == "member" )
            {
                $data->where("users.email","!=","");
            }

            if ( $request->status_member == "non-member" )
            {
                $data->where("users.email","=",null);
            }

            

            $data->orderBy("talent_id","DESC");

            $data = $data->paginate(10);

            return view('admin.talent.table',compact('data'))->render();
        // }
    }

}
