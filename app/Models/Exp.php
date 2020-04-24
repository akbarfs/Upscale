<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exp extends Model
{
    protected $table = 'interview_experience';
	protected $primaryKey = 'experience_id';
	protected $fillable = ['interview_id', 'interview_experience_name', 'interview_experience_pos', 'interview_experience_year', 'interview_experience_desc'];
	public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];
    
    public function interview()
	{
		return $this->hasOne('App\Models\Interview', 'interview_id', 'interview_id');
	}
}
