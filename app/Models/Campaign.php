<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaign';
	protected $primaryKey = 'campaign_id';
	protected $fillable = ['campaign_name', 'campaign_status'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at', 'campaign_end', 'campaign_start'];

}
