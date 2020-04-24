<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bootcamp;

class Calendar extends Model
{
    protected $table = 't_calendar';
    protected $connection = 'erpo_bootcamp';
    //protected static $tablename = 't_event';
    protected $primaryKey = 'calendar_id';
    protected $fillable = ['main_event_id',
                            'calendar_name',
                            'calendar_date',
                            'url',
                            'file',
                            'calendar_text'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class)->withTimestamps();
    }
}
