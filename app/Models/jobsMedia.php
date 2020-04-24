<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobsMedia extends Model
{
    protected $table = 'jobs_media';
	protected $primaryKey = 'jobs_media_id';
	protected $fillable = ['media_id', 'jobs_id', 'jobs_media_checked'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
    
}
