<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Tickets', 'ticket_id');
    }

    protected $fillable = [
        'created_at'
    ];
}
