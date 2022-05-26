<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlurMaster extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'response', 'next', 'prev'
    ];

    public function group() {
        return $this->belongsTo('App\AlurGroup', 'alur_group_id');
    }
}
