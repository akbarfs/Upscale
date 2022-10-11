<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyReqLog extends Model
{
    protected $table = 'company_req_log';
	protected $primaryKey = 'company_req_log_id';
    protected $fillable   = ['company_request_id','talent_id','status','bookmark'];
}
