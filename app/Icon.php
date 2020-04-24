<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bootcamp;

class Icon extends Model
{
    protected $table = 't_icon_software';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'icon_id';
    protected $fillable = ['icon_name', 
                            'icon_image'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function bootcamp()
    {
        return $this->belongsToMany(Bootcamp::class)->withTimestamps();
    }
}
