<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'interview_skills';
	protected $primaryKey = 'skill_id';
	protected $fillable = ['interview_id', 'interview_skill_name'];
	public $timestamps = true;
	protected $dates = ['created_at', 'updated_at'];


 
	public function interview()
	{
		return $this->hasOne('App\Models\Interview', 'interview_id', 'interview_id');
	}
}
