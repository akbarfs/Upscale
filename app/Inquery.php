<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquery extends Model
{
    protected $fillable = ['type_question','question','description','type_answer','sort'];
}
