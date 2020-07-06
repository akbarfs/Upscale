<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    //
    protected $table = 'campus';
	protected $primaryKey = 'campus_id';
    protected $fillable = [
    	'tipe','provinsi','nama'
    ];
    public $timestamps = false;

    
    public function campus()
    {
        return $this->belongsTo('App\Campus');
    }

}
