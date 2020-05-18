<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

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
    
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function loans()
    {
        return $this->hasMany('App\Loan');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
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
        if (auth()->user()->subscription && auth()->user()->subscription->ends_at >= Carbon::now()) {
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

    public function initials()
    {
        $words = Str::of($this->name)->explode(' ');
        if (count($words) >= 2) {
            return Str::upper(Str::substr($words[0], 0, 1) . Str::substr(end($words)[0], 0, 1));
        }
        return $this->initialsFromSingleWord();
    }

    protected function initialsFromSingleWord()
    {
        preg_match_all('#([A-Z]+)#', $this->name, $capitals);
        if (count($capitals[1]) >= 2) {
            return Str::substr(implode('', $capitals[1]), 0, 2);
        }
        return Str::upper(Str::substr($this->name, 0, 1));
    }
    
    public function isAdministrator() {
        return $this->roles()->where('name', 'admin')->exists();
    }

    public function isMember() {
        return $this->roles()->where('name', 'member')->exists();
    }
}
