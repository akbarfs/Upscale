<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewReport extends Model
{
    protected $table = 'interview_report';
	protected $primaryKey = 'interview_report_id';
	protected $fillable = ['interview_id', 'interview_marriage_status', 'interview_character_desc'];
	public $timestamps = true;
	protected $dates = ['created_at', 'updated_at'];


 
	public function interview()
	{
		return $this->hasOne('App\Models\Interview', 'interview_id', 'interview_id');
	}
}

