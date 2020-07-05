<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Talent;

class Talent_log extends Model
{
    protected $table = 'talent_logs';

    public function log($type,$talent_id,$data)
    {
    	$talent = Talent::find($talent_id);

    	$insert['tl_talent_id'] = $talent->talent_id ; 
        $insert['tl_type'] = $type; 
        $insert['tl_name'] = isset($data['name']) ? $data['name'] : $talent->talent_name; 
        $insert['tl_phone'] = isset($data['phone'])  ? $data['phone'] : '' ; 
        $insert['tl_email'] = isset($data['email']) ? $data['email'] : $talent->talent_email; 
        $insert['tl_desc'] = isset($data['desc']) ? $data['desc'] : '' ;
        $insert['tl_email_status'] = isset($data['status']) ? $data['status'] : '' ;
        $insert['created_at'] = date("Y-m-d H:i:s");
        $insert['updated_at'] = date("Y-m-d H:i:s");
        DB::table("talent_logs")->insert($insert); 

        //update last log talent
        if ( $type == 'invitation')
        {
        	$jumlah = DB::table("talent_logs")->select(DB::raw("COUNT(id) as jumlah"))->where(array("tl_type"=>'invitation',"tl_talent_id"=>$talent->talent_id))->first()->jumlah ; 

        	$talent->talent_mail_invitation = $jumlah;
        	$talent->save(); 
        }
        else if ($type == 'regular')
        {
        	$jumlah = DB::table("talent_logs")->select(DB::raw("COUNT(id) as jumlah"))->where(array("tl_type"=>'regular',"tl_talent_id"=>$talent->talent_id))->first()->jumlah ; 

        	$talent->talent_mail_regular = $jumlah;
        	$talent->save(); 
        }
    }

}
