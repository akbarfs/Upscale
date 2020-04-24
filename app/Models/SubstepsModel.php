<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubstepsModel extends Model
{
    protected $table = 'substeps';
	protected $primaryKey = 'substeps_id';
	protected $fillable = ['substeps_name', 'substeps_order', 'substeps_jobs_apply_status', 'substeps_email_status', 'substeps_email_text'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
    
    public function jobs_apply()
	{
		return $this->hasMany('App\Models\Job_apply', 'jobs_apply_status', 'substeps_jobs_apply_status');
	}
    public function jobs_apply_substeps()
	{
		return $this->hasMany('App\Models\Job_apply_substeps', 'substeps_id', 'substeps_id');
	}
}
