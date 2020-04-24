<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joblo extends Model
{
	protected $table = 'joblo';
	protected $primaryKey = 'joblo_id';
	protected $fillable = [
		'location_name',
		'location_active'
	];
	public $timestamps = false;
    public function location()
	{
	return $this->belongsTo('App\Models\Location', 'joblo_location_id', 'location_id');
	}

	public function jobs()
	{
	return $this->belongsTo('App\Models\Job');
	}
}
