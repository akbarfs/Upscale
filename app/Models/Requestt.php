<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requestt extends Model
{
	protected $table      = 'request';
	protected $primaryKey = 'request_id';
	protected $fillable   = ['request_name', 'request_detail', 'request_location'];
	public $timestamps    = false;

}
