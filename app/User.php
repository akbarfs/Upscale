<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
	protected $primarykey = 'id';
	protected $fillable = ['id, name, email, username, password, level'];
}
