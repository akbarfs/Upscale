<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    protected static $tablename = 'users';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'name', 'username', 'password','email','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function talent()
    {
        return $this->hasOne("App\Models\Talent");
    }

    public function talent_data()
	{	
		return $this->hasMany('App\Models\Talent' ,'talent_id', 'id');
    }
    
    public function talent_education()
    {
        return $this->hasMany('App\Models\Education', 'edu_talent_id', 'id');
    }
}
