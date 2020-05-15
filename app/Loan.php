<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = [];
    
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    
    public function scopeActive($query)
    {
        return $query->whereNull('returned_at');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Book');
    }
}
