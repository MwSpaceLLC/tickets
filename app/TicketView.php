<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketView extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Tickets');
    }

}
