<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    public $table = 't_submateri';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'submateri_id';
    protected $fillable = ['submateri', 'main_materi_id'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function main_materi()
	{
	return $this->belongsTo('App\Materi');
	}
}
