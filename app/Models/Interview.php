<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $table = 'interview';
	protected $primaryKey = 'interview_id';
	protected $fillable = ['interview_jobs_apply_id', 'interview_location_id', 'interview_schedule', 'interview_schedule_status'];
	public $timestamps = true;
	protected $dates = ['interview_schedule', 'created_at', 'updated_at'];


 
	public function jobs_apply()
	{
		return $this->hasOne('App\Models\Job_apply', 'jobs_apply_jobs_id', 'interview_jobs_apply_id');
	}

	public function interview()
	{
		return $this->hasOne('App\Models\InterviewReport', 'interview_id', 'interview_id');
	}
	

}
