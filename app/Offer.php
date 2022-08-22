<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table      = 'offer';
	protected $primaryKey = 'offer_id';

    public function company()
	{	
		return $this->belongsTo('App\Models\Company');
	}

}
