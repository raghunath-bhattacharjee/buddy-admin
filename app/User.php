<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public const USER_TYPE_SUPER_USER = 1;
    public const USER_TYPE_NORMAL_USER = 2;

    public function isSuperUser()
    {
        return $this->user_type === self::USER_TYPE_SUPER_USER;
    }

    public function isNormalUser()
    {
        return $this->user_type === self::USER_TYPE_NORMAL_USER;
    }
}
