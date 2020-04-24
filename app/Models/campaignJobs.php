<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campaignJobs extends Model
{
    protected $table = 'campaign_jobs';
	protected $primaryKey = 'campaign_jobs_id';
	protected $fillable = ['jobs_id', 'campaign_id', 'campaign_jobs_checked'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
}
