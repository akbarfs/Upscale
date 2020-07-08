<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talent_log extends Model
{
    protected $table = 'talent_logs';
    protected $primaryKey = "tl_talent_id";
    protected $fillable = ['id','tl_type','tl_name','tl_phone','tl_email','tl_email_status','tl_decs'];

    public function log(){
    return $this->belongsTo("App\Models\Talent_log");
    }
}
