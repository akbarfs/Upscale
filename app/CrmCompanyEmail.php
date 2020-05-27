<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrmCompanyEmail extends Model
{
    protected $table = 't_company_emails';
    protected $connection = 'upscale_crm';
    //protected static $tablename = 't_event';
    protected $primaryKey = 'email_id';
    protected $fillable = [ 'email_last_response',
                            'email_last_req_inquiry',
                            'email_last_source'
                        ];
	public $timestamps = false;
    protected $dates = ['created_date'];
}
