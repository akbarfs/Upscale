<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InquiryQOption extends Model
{
    protected $fillable = ['question_id','option'];
}
