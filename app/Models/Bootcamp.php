<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Fasilitas;

class Bootcamp extends Model
{
    protected $table = 't_event';
    protected $connection = 'erpo_bootcamp';
    //protected static $tablename = 't_event';
    protected $primaryKey = 'event_id';
    protected $fillable = ['event_title',
                            'event_fee',
                            'event_desclass',
                            'event_image',
                            'event_location',
                            'event_date',
                            'event_enddate',
                            'event_soal',
                            'event_class',
                            'slug_title' ];
	public $timestamps = false;

    protected $dates = ['event_date','event_enddate','created_date'];
    
    public function hasMen($menId) {
        return in_array($menId, $this->mentor->pluck('mentor_id')->toArray());
      }

    public function mentor()
	{
		return $this->belongsToMany('App\Mentor','t_mentor_event','ev_id','ment_id');
    }

    public function hasTag($fasId) {
        return in_array($fasId, $this->fasilitas->pluck('id')->toArray());
      }

    public function fasilitas()
    {
        return $this->belongsToMany('App\Fasilitas','t_bootfas','main_event','main_fas');
    }

    public function hasIco($icoId) {
        return in_array($icoId, $this->icon->pluck('icon_id')->toArray());
      }

    public function icon()
    {
        return $this->belongsToMany('App\Icon','t_bootico','main_event','main_icon');
    }
    
    public function calendar()
    {
        return $this->belongsToMany('App\Calendar');
    }

    public function soal()
    {
        return $this->belongsTo('App\Soal');
    }
}
