<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRequest extends Model
{
    protected $table = 'company_request';
    protected $primaryKey = 'company_request_id';
    protected $fillable   = ['name_request', 'type_work', 'benefit', 'min_salary', 'max_salary', 'person_needed', 'deadline', 'status_request', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function company_request_log()
    {
        return $this->hasMany(CompanyReqLog::class, 'company_request_id', 'company_request_id');
    }

    public function hire_talent()
    {
        return $this->hasMany(HireTalent::class, 'hire_talent_company_request_id', 'company_request_id');
    }
}
