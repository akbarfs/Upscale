<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Talent;

class TalentNewController extends Controller
{

    public function show()
    {
    	
    	return view('admin.talent.home');
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
