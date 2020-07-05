<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    protected $table = 'portfolio';
	protected $primaryKey = 'portfolio_id';
	protected $fillable = ['portfolio_name', 'portfolio_desc','portfolio_tech', 'portfolio_image', 'portfolio_tipe_project','portfolio_nama_company', 'portfolio_startdate', 'portfolio_endate' ];
	public $timestamps = false;

    public function portfolio()
    {
        return $this->belongsTo('App\Models\portfolio');
    }
    

}
