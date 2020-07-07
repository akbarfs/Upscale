<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class interview_test extends Model
{
    protected $table = 'interview_test';
	protected $primaryKey = 'it_id';
	protected $fillable = ['it_id', 'it_tq_id','it_talent_id', 'it_answer'];
    public $timestamps = false;
    
    function talent()
    {
        return $this->hasOne("App\Models\Talent");
    }

    public function interviewtest()
	{	
		return $this->hasMany('App\Models\Talent' ,'talent_id', 'it_tq_id');
    }


    public  function interview_question()
	{
		return $this->hasMany('App\models\QuestionModels', 'question_id', 'it_tq_id');
    }
    
    public function interview_test()
{
	return $this->belongsTo('App\Models\interview_test');
}


}
