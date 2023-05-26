<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'picture', 'email', 'university', 'address', 'city', 'country', 'password','jenis_user'
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

    public function team() {
        return $this->hasMany('App\Team','users_id');
    }
    public function paper() {
        return $this->hasOne('App\Paper','users_id');
    }
    public function message() {
        return $this->hasMany('App\Message', 'users_id');
    }
    public function webinar() {
        return $this->hasMany('App\Webinar','users_id');
    }

}
