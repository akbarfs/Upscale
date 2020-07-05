<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certification extends Model
{
    protected $table = 'certification';
	protected $primaryKey = 'certif_talent_id';
	protected $fillable = ['certif_name','edu_datestart', 'certif years', 'certif_company', 'certif_desc','certif_number','certif_expired'];

    public function certification() {
		return $this->belongsTo('App\Models\certification');
	}

}
