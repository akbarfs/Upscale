<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table ="talent";

    protected $fillable = ['talent_name', 'talent_email', 'talent_address', 'talent_gender', 'talent_birth_date', 'talent_phone'];

}
