<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignRequest extends Model
{

	protected $table      = 'assign_request';
	protected $primaryKey = 'assign_request_id';
	protected $fillable = ['talent_id', 'request_id'];
	public $timestamps    = false;
    protected $dates = ['created_at', 'updated_at'];

    public function talent()
	{
	return $this->belongsTo('App\Models\Talent');
	}

	public function requestt()
	{
	return $this->belongsTo('App\Models\Requestt');
	}
}
