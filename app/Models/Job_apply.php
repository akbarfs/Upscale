<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_apply extends Model
{
	protected $table = 'jobs_apply';
    protected static $tablename = 'jobs_apply';
	protected $primaryKey = 'jobs_apply_id';
	protected $fillable = ['jobs_apply_type_time', 'jobs_apply_status', 'jobs_apply_name','jobs_apply_place_of_birth', 'jobs_apply_gender', 'jobs_apply_phone', 'jobs_apply_birth_date', 'jobs_apply_current_address', 'jobs_apply_location', 'jobs_apply_cv', 'jobs_apply_portofolio', 'jobs_apply_portofolio_file', 'jobs_apply_information','jobs_apply_campus','jobs_apply_skill','jobs_apply_periode', 'jobs_apply_expected_salary', 'jobs_apply_note', 'jobs_apply_label'];
	public $timestamps = false;

	protected $dates = ['jobs_apply_created_date'];

    public function job()
	{
	return $this->belongsTo('App\Models\Job');
	}

	public  function job_apply()
	{
		return $this->hasMany('App\models\Job', 'jobs_id', 'jobs_apply_jobs_id');
    }
}
