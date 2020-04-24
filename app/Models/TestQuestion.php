<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $table = 'test_question';
    protected $fillable = [
        'tq_question_id',
        'tq_ct_id',
        'tq_sort',
        'tq_updated_date',
        'tq_active'
    ];
    public $timestamps = false;
    protected $primaryKey = 'tq_id';
}
