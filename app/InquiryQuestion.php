<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InquiryQuestion extends Model
{
    protected $fillable = ['inquiry_id','type_question','question','description','type_option','sort'];

    function get_options()
    {
        return $this->hasMany("App\InquiryQOption",'question_id');
    }
}

