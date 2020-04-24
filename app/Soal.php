<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    //
    protected $table = 't_soal';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'soal_id';
    protected $fillable = ['id_materi',
                            'file_name',
                            'file_soal'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function materi()
    {
        return $this->belongsTo('App\Materi');
    }

    public function event()
    {
        return $this->hasMany('App\Models\Bootcamp', 'soal_id');
    }
}
