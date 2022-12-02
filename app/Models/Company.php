<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table      = 'company';
	protected $primaryKey = 'company_id';
	protected $fillable   = ['company_name', 'company_email', 'company_phone', 'company_pic'];
	public $timestamps    = false;

	public function company_request_log()
	{
		return $this->hasManyThrough(CompanyReqLog::class, CompanyRequest::class, 'company_id', 'company_request_id', 'company_id', 'company_id');
	}
}
