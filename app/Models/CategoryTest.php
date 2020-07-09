<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTest extends Model
{
    protected $table = 'category_test';
	protected $primaryKey = 'ct_id';

	protected $fillable = ['categories_name'];
	public $timestamps = false;

}
