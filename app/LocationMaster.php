<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationMaster extends Model
{
    //
    protected $table = 't_location';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'loc_id';
    protected $fillable = ['loc_city',
                            'loc_address',
                            'loc_maps'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function event()
    {
        return $this->hasMany('App\Models\Bootcamp', 'loc_id');
    }
}
