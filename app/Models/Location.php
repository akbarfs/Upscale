<?php

namespace App\Models;
use App\Models\Joblo;
use App\Models\Jobca;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

	protected $primaryKey = 'location_id';
    protected $fillable = ['location_name', 'location_active'];
    public $timestamps = false;

	public function joblo()
	{
	return $this->hasMany('App\Models\Joblo');
	}

	public function jobca()
	{
		return $this->hasMany('App\Models\Jobca');
	}
}
