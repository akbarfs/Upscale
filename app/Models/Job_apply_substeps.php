<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_apply_substeps extends Model
{
    protected $table = 'jobs_apply_substeps';
	protected $primaryKey = 'jobs_apply_substeps_id';
	protected $fillable = ['jobs_apply_id', 'substeps_id', 'jobs_apply_comment', 'jobs_apply_substeps_checked'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
    
    public function jobs_apply()
	{
		return $this->hasMany('App\Models\Job_apply', 'jobs_apply_id', 'jobs_apply_substeps_idp');
	}
    public function jobs_apply_substeps()
	{
		return $this->hasMany('App\Models\Job_apply_substeps', 'substeps_id', 'substeps_id');
	}
}
