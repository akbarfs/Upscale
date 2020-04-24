<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $table = 'jobs';
	protected $primaryKey = 'jobs_id';
    protected $fillable = ['jobs_title', 'jobs_image', 'jobs_active', 'job_desc_center', 'job_desc_left', 'job_desc_right', 'jobs_type_time', 'jobs_urgent', 'jobs_desc_short'];
	public $timestamps = false;
	protected $dates = ['jobs_created_date'];


    public function joblo()
	{
		return $this->hasOne('App\Models\Joblo', 'joblo_jobs_id', 'jobs_id');
	}

	public function jobca()
	{
		return $this->hasOne('App\Models\Jobca', 'jobca_jobs_id', 'jobs_id');
	}

	public function jobs_apply()
	{	
		return $this->hasMany('App\Models\Job_apply', 'jobs_apply_jobs_id', 'jobs_id');
	}
}
