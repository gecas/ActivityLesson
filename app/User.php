<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Eloquent;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activity()
    {
        return $this->hasMany('App\Activity')->with('user', 'subject')->latest()->get();
    }

    public function recordActivity($name, $related)
    {
        Eloquent::unguard();

        return $related->recordActivity($name);
    }
}
