<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillRequest extends Model
{
    protected $table = 'skill_request';
	protected $primaryKey = 'skill_request_id';
    protected $fillable   = ['company_request_id', 'skill_id', 'experience'];
}
