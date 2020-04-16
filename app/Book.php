<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }
    
    public function file($type)
    {
        if ($this->{$type}) return asset("storage/{$this->{$type}}");
    }
}
