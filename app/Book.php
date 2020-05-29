<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function getCommaSeparatedAuthors()
    {
        return $this->authors()->pluck('name')->implode(', ');
    }

    public function inTheLoanPeriod()
    {
        return $this->loans()->where('user_id', auth()->user()->id)->whereNull('returned_at')->exists();
    }

    public function loans()
    {
        return $this->hasMany('App\Loan');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function readPath()
    {
        return route('books.read', ['book' => $this, 'slug' => Str::slug($this->title)]);
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function showPath()
    {
        return route('books.show', ['book' => $this, 'slug' => Str::slug($this->title)]);
    }
}
