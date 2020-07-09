<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class work_experience extends Model
{
    protected $table = 'work_experience';
	protected $primaryKey = 'workex_id';
	protected $fillable = ['workex_id', 'workex_office','workex_position', 'workex_startdate', 'workex_endate', 'workex_desc'];
	public $timestamps = false;


public function education()
{
	return $this->belongsTo('App\Models\work_experience');
}
}
