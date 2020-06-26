<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
   	protected $table = 'talent';
    protected static $tablename = 'talent';
	protected $primaryKey = 'talent_id';
	protected $fillable = [	
							'user_id',
							'talent_name', 
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
							'talent_freelance_hour',
			                'talent_project_min',
			                'talent_project_max',
			                'talent_konsultasi_rate',
			                'talent_ngajar_rate',
							'portofolio_update',
							'talent_address',
			                'talent_prefered_location',
			                'talent_prefered_city',
			                'talent_date_ready',
			                'talent_available',
			                'talent_focus',
							'talent_start_career',
							'talent_english',
							'talent_level',
							'talent_international',
							'talent_onsite_jakarta',
							'talent_onsite_jogja',
							'talent_isa',
							'talent_remote',
							'talent_salary_jogja',
							'talent_salary_jakarta',
							'talent_current_work',
							'talent_last_active',
						];
	public $timestamps = false;

	protected $dates = ['talent_created_date'];

	public function talent_skill()
	{	
		return $this->hasMany('App\Models\SkillTalent' ,'st_talent_id','talent_id');
	}

	public function jobs_apply()
	{	
		return $this->hasMany('App\Models\Job_apply', 'jobs_apply_talent_id', 'talent_id');
	}

}
