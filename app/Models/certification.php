<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certification extends Model
{
    protected $table = 'certification';
	protected $primaryKey = 'certif_id';
	protected $fillable = [ 'certif_id', 'certif_talent_id', 'certif_name', 'certif years', 'certif_company', 'certif_desc','certif_number','certif_expired'];
	public $timestamps = false;

    public function certifications() {
		return $this->belongsTo('App\Models\certification');
	}

	public function certification()
	{
		return $this->hasMany('App\Models\certification', 'certif_talent_id');
	}

}
