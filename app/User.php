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
        'name', 'email', 'password', 'username', 'country_id', 'featured_image', 'role_id'
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

    public static $_ROLE_ADMIN = 1;
    public static $_ROLE_USER = 2;

    public static function getUserRoles(){
        return [
            self::$_USER_GROUP_ADMIN => 'Admin',
            self::$_USER_GROUP_USER => 'User',
        ];
    }

    public function getUserRole(){
        return self::getUserRoles()[$this->role_id];
    }

    public function blogs(){
        return $this->hasMany('App\Blog');
    }

    public function news(){
        return $this->hasMany('App\News');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
