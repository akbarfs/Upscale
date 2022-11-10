<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HireTalent extends Model
{
    protected $table      = 'hire_talent';
	protected $primaryKey = 'hire_talent_id';
	protected $fillable   = ['hire_talent_talent_id','hire_talent_company_id', 'hire_talent_company_request_id', 'hire_talent_status_notif'];
	public $timestamps    = true;
}
