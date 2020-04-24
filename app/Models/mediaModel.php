<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mediaModel extends Model
{
    protected $table = 'media';
	protected $primaryKey = 'media_id';
	protected $fillable = ['media_name', 'media_status'];
	public $timestamps = true;
	protected $dates = ['created_at', 'updated_at'];
}
