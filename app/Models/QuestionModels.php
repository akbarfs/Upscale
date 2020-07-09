<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionModels extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'question_id';
    protected $fillable = [
        'question_id',
        'question_text',
        'question_desc',
        'question_updated_date',
        'question_type',
        'q_talent_id'
    ];
    public $timestamps = false;

    function talent()
    {
        return $this->hasOne("App\Models\Talent");
    }

    public function question()
	{	
		return $this->belongsTo('App\Models\Talent' ,'talent_id', 'q_talent_id');
    }

    public function interviewquestion()
    {
        return $this->belongsTo('App\Models\interview_test');
    }

    public function katagori()
    {
        // return $this->belongsTo('App\Models\');
    }



}
