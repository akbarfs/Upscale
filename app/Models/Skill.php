<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';
	protected $primaryKey = 'skill_id';
	protected $fillable = ['skill_name', 'skill_sc_id','skill_desc'];
	public $timestamps = true;
	protected $dates = ['created_at','updated_at'];

	public function skill_category()
	{
	return $this->belongsTo('App\Models\SkillCategory');
	}


}
