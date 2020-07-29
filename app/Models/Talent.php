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
							'talent_foto',
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
							'talent_rt_status',
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
							'talent_luar_kota',							
							'talent_remote',
							'talent_salary_jogja',
							'talent_salary_jakarta',
							'talent_current_work',
							'talent_last_active',
							'talent_mail_invitation',
							'talent_mail_regular',
							'talent_mail_isa',
							'talent_la_type',
							'talent_note',
							'talent_web',
							'talent_linkedin',
							'talent_facebook',
							'talent_instagram',
							'talent_twitter'
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

	public function Talent_log()
	{
		return $this->hasMany("App\Models\Talent_log","tl_talent_id","talent_id");
	}

	public function talent_education()
	{	
		return $this->hasMany('App\Models\education' ,'edu_talent_id','talent_id');
	}

	public function talent_portfolio()
	{	
		return $this->hasMany('App\Models\portfolio' ,'portfolio_talent_id','talent_id');
	}

	public function talent_workex()
	{	
		return $this->hasMany('App\Models\work_experience' ,'workex_talent_id','talent_id');
	}

	public function talent_certification()
	{	
		return $this->hasMany('App\Models\certification' ,'certif_talent_id','talent_id');
	}

	public function talent_interview()
	{	
		return $this->hasMany('App\Models\Interview' ,'interview_id','talent_id');
	}

   /* public  function talent_question()
	{
		return $this->hasMany('App\Models\QuestionModels', 'it_talent_id', 'talent_id');
	}
	*/


	public function talent_interviewtest()
	{
		return $this->hasMany('App\Models\interview_test', 'it_talent_id', 'talent_id');
	}

	public function talent_historyApply()
	{	
		return $this->hasMany('App\Models\historyApply' ,'jobs_apply_talent_id','talent_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User','user_id','id');
	}

}
