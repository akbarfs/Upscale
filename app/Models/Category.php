<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'categories_id';

	protected $fillable = ['categories_name'];
	public $timestamps = false;

    public function jobca()
	{
	return $this->hasMany('App\Models\Jobca');
	}
}
