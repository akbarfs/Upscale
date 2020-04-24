<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bootcamp;

class Fasilitas extends Model
{
    protected $table = 't_bootcamp_fasilitas';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'id';
    protected $fillable = ['fasilitas_name', 
                            'fasilitas_icon'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function bootcamp()
    {
        return $this->belongsToMany(Bootcamp::class)->withTimestamps();
    }
}
