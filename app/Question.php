<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'type_question',
        'question',
        'description',
        'type'
    ];
    protected $primaryKey = 'question_id';
}
