<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const ROLE_MANAGER = 1;     // male = User::GENDER_MALE
    const ROLE_STAFF = 2;
    const PAGINATE = 5;

//    public function getLastNameAttribute($last_name)
//    {
//        return strtolower($last_name);
//    }
//    public function getFirstNameAttribute($first_name)
//    {
//        return ucfirst($first_name);
//    }
    public function getFullNameAttribute()
    {
        return $this->first_name . $this->last_name;  //$user->getFullNameAttribute; or $user->full_name
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','gender','birthday','avatar','address',
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
}
