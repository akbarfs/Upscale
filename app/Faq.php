<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 't_faq';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'faq_id';
    protected $fillable = ['quest', 'answ'];
	public $timestamps = false;

    protected $dates = ['created_date'];
}
