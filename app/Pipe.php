<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pipe extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Department', 'mail_id');
    }
}
