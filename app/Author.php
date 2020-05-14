<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany('App\Book')->using('App\AuthorBook');
    }
}
