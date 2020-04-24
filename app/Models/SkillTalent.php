<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillTalent extends Model
{
    protected $table = 'skill_talent';
	protected $primaryKey = 'st_id';
	protected $fillable = [	'st_talent_id', 
							'st_skill_id',
							'st_skill_verified',
							'st_skill_verified_date',
							'st_score',
							'st_input_admin'];
	public $timestamps = true;
	protected $dates = ['created_at','updated_at'];

	public function talent()
	{
	return $this->belongsTo('App\Models\Talent');
	}


}
