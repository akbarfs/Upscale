<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRequest extends Model
{
    protected $table = 'company_request';
	protected $primaryKey = 'company_request_id';
    protected $fillable   = ['name_request', 'type_work', 'benefit', 'min_salary', 'max_salary','skills', 'person_needed','company_id'];
}
