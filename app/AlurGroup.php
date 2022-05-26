<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlurGroup extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name',
    ];

    public function alurMasters() {
        return $this->hasMany('App\AlurMaster', 'alur_group_id');
    }
}
