<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 't_alumni';
    protected $connection = 'erpo_bootcamp';
    //protected static $tablename = 't_event';
    protected $primaryKey = 'alumni_id';
    protected $fillable = [ 'alumni_email',
                            'alumni_name',
                            'alumni_wa',
                            'alumni_address',
                            'alumni_job',
                            'alumni_work',
                            'alumni_testimoni',
                            'alumni_bootcamp',
                            'alumni_photo',
                            'alumni_status'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function eventBootcamp()
    {
        return $this->hasOne('App\Models\Bootcamp');
    }
}
