<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class User extends Model implements Authenticatable, CanResetPassword
{
    use AuthenticableTrait, \Illuminate\Auth\Passwords\CanResetPassword, Notifiable;



    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    protected $guarded = [];

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }

    public function isAdmin()    {
        return $this->type === self::ADMIN_TYPE;
    }
}
