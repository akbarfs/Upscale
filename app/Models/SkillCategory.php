<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $table = 'skill_category';
	protected $primaryKey = 'sc_id';
	protected $fillable = ['sc_name', 'sc_name','sc_desc','sc_type'];
	public $timestamps = false;
	// protected $dates = ['created_at', 'updated_at'];


	public function skill()
	{
		return $this->hasMany('App\Models\Skill');
	}

}
