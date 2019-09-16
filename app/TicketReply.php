<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'created_at'
    ];
}
