<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentUser extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
