<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function authors()
    {
        return $this->belongsToMany('App\Author')
                    ->using('App\AuthorBook');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function countPages($path) {
        $pdftext = Storage::get($path);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }

    public function hasUser()
    {
        return $this->users()->where('user_id', auth()->user()->id)->wherePivot('returned_at', NULL)->exists();
    }

    public function getCommaSeparatedAuthors()
    {
        return $this->authors()->pluck('name')->implode(', ');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('returned_at');
    }
}
