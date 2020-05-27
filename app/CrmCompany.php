<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrmCompany extends Model
{
    protected $table = 't_companies';
    protected $connection = 'upscale_crm';
    //protected static $tablename = 't_event';
    protected $primaryKey = 'company_id';
    protected $fillable = [ 'company_name',
                            'company_telpon_office',
                            'updated_by',
                            'created_at'
                        ];
	public $timestamps = false;
    protected $dates = ['created_date'];

    public function email()
    {
    	return $this->hasOne('App\CrmCompanyEmail','company_id');
    }

}
