<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function tickets()
    {
        return $this->hasMany('App\Tickets');
    }

    public function status()
    {
        switch ($this->status) {
            case 0:
                return __('Bozza');
                break;
            case 1:
                return __('Operativo');
                break;
            case 2:
                return __('Chiuso');
                break;
        }
    }
}
