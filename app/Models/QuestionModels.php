<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'question';
    protected $fillable = [
        'question_text',
        'question_desc',
        'question_updated_date',
        'question_type'
    ];
    public $timestamps = false;
    protected $primaryKey = 'question_id';

    public function question()
    {
        return $this->belongsTo('App\Models\QuestionModels');
    }
}
