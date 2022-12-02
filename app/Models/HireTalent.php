<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HireTalent extends Model
{
	protected $table      = 'hire_talent';
	protected $primaryKey = 'hire_talent_id';
	protected $fillable   = ['hire_talent_talent_id', 'hire_talent_company_id', 'hire_talent_company_request_id', 'hire_talent_status_notif'];
	public $timestamps    = true;

	public function talent()
	{
		return $this->belongsTo(Talent::class, 'hire_talent_talent_id', 'talent_id');
	}

	public function company()
	{
		return $this->belongsTo(Company::class, 'hire_talent_company_id', 'company_id');
	}

	public function company_request()
	{
		return $this->belongsTo(CompanyRequest::class, 'hire_talent_company_request_id', 'company_request_id');
	}
}
