<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorEvent extends Model
{
    //
    protected $table = 't_mentor_event';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'id';
    protected $fillable = ['ment_id', 
                            'event_id'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function bootcamp()
	{
		return $this->hasMany('App\Models\Bootcamp');
	}
}
