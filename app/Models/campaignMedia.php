<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campaignMedia extends Model
{
    protected $table = 'campaign_media';
	protected $primaryKey = 'campaign_media_id';
	protected $fillable = ['media_id', 'campaign_id', 'campaign_media_checked'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
}
