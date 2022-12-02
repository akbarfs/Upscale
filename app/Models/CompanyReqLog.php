<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyReqLog extends Model
{
    protected $table = 'company_req_log';
    protected $primaryKey = 'company_req_log_id';
    protected $fillable   = ['company_request_id', 'talent_id', 'status', 'bookmark', 'hire_status', 'work_start_date', 'note', 'is_hire_requested', 'is_read_notif'];

    public function talent()
    {
        return $this->belongsTo(Talent::class, 'talent_id', 'talent_id');
    }

    public function company_request()
    {
        return $this->belongsTo(CompanyRequest::class, 'company_request_id', 'company_request_id');
    }
}
