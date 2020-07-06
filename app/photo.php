<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    

    protected $table = 'photo';
	protected $primaryKey = 'photo_id';
	protected $fillable = ['photo_name', 'photo_desc', 'photo_desc', 'photo_image' ];
	public $timestamps = false;

    public function photo()
    {
        return $this->belongsTo('App\Models\photo');
    }

}
