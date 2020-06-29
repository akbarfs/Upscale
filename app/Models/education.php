<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    protected $table = 'education';
	protected $primaryKey = 'edu_talent_id';
	protected $fillable = ['edu_level', 'edu_name','edu_datestart', 'edu_dateend', 'edu_value', 'edu_field'];


public function education()
{
	return $this->belongsTo('App\Models\education');
}

}