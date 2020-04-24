<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pra_talent extends Model
{
    //
    protected $table = 'pra_talent';
    protected $fillable =[
        'pt_id',
        'pt_linkedin_id',
        'pt_profile_url',
        'pt_fullname',
        'pt_email',
        'pt_phone1',
        'pt_title',
        'pt_avatar',
        'pt_location',
        'pt_birthday',
        'pt_organization1',
        'pt_organization_position1',
        'pt_organization_start1',
        'pt_organization_end1',
        'pt_organization2',
        'pt_organization_position2',
        'pt_organization_start2',
        'pt_organization_end2',
        'pt_education',
        'pt_education_degree',
        'pt_education_major',
        'pt_education_start',
        'pt_education_end',
        'pt_skill',
        'pt_pic',
        'pt_note',
        'pt_status',
        'pt_created_date',
        
    ];

}
