<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['ends_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
