<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BootFas extends Model
{
    //
    public $table = 't_bootfas';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'fas_id';
    protected $fillable = ['main_event',
                            'main_fas'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function bootcamp()
	{
		return $this->hasMany('App\Models\Bootcamp');
    }
    
    public function fasilitas()
    {
        return $this->hasMany('App\Fasilitas');
    }

}

