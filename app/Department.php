<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    public function user()
    {
        return $this->hasMany('App\DepartmentUser');
    }

    public function tickets()
    {
        return $this->hasMany('App\Tickets');
    }

    public function status()
    {
        switch ($this->status) {
            case 0:
                return __('chiuso');
                break;
            case 1:
                return __('Operativo');
                break;
        }
    }

    public function pipe()
    {
        return $this->hasOne('App\Pipe', 'mail_id');
    }
}
