<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    /*
    *Defines that ADMIN_TYPE is 99 rest is other user (99 is the user_type)
    *Checks for admin panel
    */
    const ADMIN_TYPE = 99;
    const DEFAULT_TYPE = 1;
    public function isAdmin() {  
        return $this->user_type === self::ADMIN_TYPE;    
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
