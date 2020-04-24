<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_campaign extends Model
{
    protected $table = 'jobs_campaign';
	protected $primaryKey = 'jobs_campaign_id';
	protected $fillable = ['jobs_id', 'campaign_id', 'jobs_media_id', 'jobs_campaign_url', 'jobs_campaign_note', 'jobs_campaign_checked'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    public function Campaign()
	{
		return $this->hasOne('App\Models\Campaign', 'campaign_id', 'campaign_id');
	}
}
