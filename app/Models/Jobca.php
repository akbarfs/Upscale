<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobca extends Model
{
	protected $table = 'jobca';
	protected $primaryKey = 'jobca_id';
	public $timestamps = false;
    public function job()
	{
	return $this->belongsTo('App\Models\job');
	}

	public function category()
	{
	return $this->belongsTo('App\Models\Category', 'jobca_category_id', 'categories_id');
	}
}
