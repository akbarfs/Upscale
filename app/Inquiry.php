<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['package_inquiry'];

    function get_questions()
    {
        return $this->hasMany("App\InquiryQuestion");
    }
}
