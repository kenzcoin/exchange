<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function askTrades()
    {
        return $this->hasMany(Trade::class, 'asker_id');
    }

    public function bidTrades()
    {
        return $this->hasMany(Trade::class, 'bidder_id');
    }
}
