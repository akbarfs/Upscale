<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
   	protected $table = 'talent';
    protected static $tablename = 'talent';
	protected $primaryKey = 'talent_id';
	protected $fillable = [	'talent_name', 
							'talent_phone', 
							'talent_email',
							'talent_gender', 
							'talent_place_of_birth', 
							'talent_birth_date', 
							'talent_addres', 
							'talent_salary', 
							'talent_cv', 
							'talent_portfolio', 
							'talent_portofolio_file', 
							'talent_campus',
							'talent_skill',
							'talent_status', 
							'talent_location_id',
							'cv_talent_update',
							'portofolio_update'];
	public $timestamps = false;

	protected $dates = ['talent_created_date'];

	 public function talent_skill()
	{	
		return $this->hasMany('App\Models\SkillTalent', 'id_talent');
	}

	 	public function jobs_apply()
	{	
		return $this->hasMany('App\Models\Job_apply', 'jobs_apply_talent_id', 'talent_id');
	}

}
