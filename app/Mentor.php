<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bootcamp;

class Mentor extends Model
{
    //
    protected $table = 't_mentor';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'mentor_id';
    protected $fillable = ['mentor_name', 
                            'mentor_work',
                            'mentor_desc',
                            'mentor_photo',
                            'mentor_skill'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function bootcamp()
    {
        return $this->belongsToMany(Bootcamp::class)->withTimestamps();
    }
}