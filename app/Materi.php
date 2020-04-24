<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Materi extends Model
{
    public $table = 't_materi';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'materi_id';
    protected $fillable = ['materi_main'];
	public $timestamps = false;

    protected $dates = ['created_date'];
    
    public function submateri()
	{
		return $this->hasMany('App\SubMateri');
    }

    public function soal()
    {
        return $this->hasMany('App\Soal');
    }
}
