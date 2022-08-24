<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferLog extends Model
{
    protected $table      = 'offer_log';
	protected $primaryKey = 'offer_log_id';

	protected $guarded = ['offer_log_id'];

    public function offer()
	{	
		return $this->hasMany('App\Models\Offer' ,'offer_id');
	}

    public function talent()
	{	
		return $this->hasMany('App\Models\Talent' ,'talent_id');
	}

}
