<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 't_register';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'reg_id';
    protected $fillable = ['main_event_id',
                           'reg_name_f',
                           'reg_name_b',
                           'reg_email',
                           'reg_birthdate',
                           'reg_sex',
                           'reg_alamatnow',
                           'reg_alamatktp',
                           'reg_phone',
                           'reg_job',
                           'reg_education',
                           'reg_info',
                           'reg_motivasi',
                           'reg_skill',
                           'reg_project',
                           'reg_portfolio_file'];
    public $timestamps = false;
    protected $dates = ['created_date'];    

    public function event()
    {
        return $this->hasOne('App\Models\Bootcamp');
    }

}
    
