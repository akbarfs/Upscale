<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historyApply extends Model
{
    protected $table = 'jobs_apply';
	protected $primaryKey = 'jobs_apply_id';
	protected $fillable = ['jobs_apply_jobs_id', 'jobs_apply_status', 'jobs_apply_type_time', 'jobs_apply_name','certif_number','certif_expired'];

    public function historyApply() {
		return $this->belongsTo('App\Models\historyApply');
	}

}
