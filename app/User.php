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

    public function books()
    {
        return $this->belongsToMany('App\Book')->withTimestamps()->withPivot('returned_at');
    }

    // public function book_users()
    // {
    //     return $this->belongsToMany('App\Book')->withTimestamps();
    // }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function subscribed()
    {
        if (auth()->user()->subscription && auth()->user()->subscription->ends_at >= date('Y-m-d H:i:s')) {
            return true;
        }
        return false;
    }

    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        } 
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        } 
        return false;
    }

    public function isAdministrator() {
        return $this->roles()->where('name', 'admin')->exists();
    }

    public function isMember() {
        return $this->roles()->where('name', 'member')->exists();
    }
}
