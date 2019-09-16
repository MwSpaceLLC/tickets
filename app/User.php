<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tickets()
    {
        return $this->hasMany('App\Tickets');
    }

    public function role()
    {
        switch ($this->role) {
            case 1:
                return __('admin');
                break;
            case 2:
                return __('user');
                break;
            case 3:
                return __('viewer');
                break;
        }
    }

    public function active()
    {
        switch ($this->active) {
            case 0:
                return __('disattivo');
                break;
            case 1:
                return __('attivo');
                break;
        }
    }
}
