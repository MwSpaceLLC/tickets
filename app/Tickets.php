<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'created_at'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function views()
    {
        return $this->hasMany('App\TicketView', 'ticket_id');
    }

    public function replies()
    {
        return $this->hasMany('App\TicketReply', 'ticket_id');
    }

    public function status()
    {
        switch ($this->status) {
            case 0:
                return __('Bozza');
                break;
            case 1:
                return __('Aperto');
                break;
            case 2:
                return __('Chiuso');
                break;
        }
    }
}
