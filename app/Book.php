<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    // field yang tidak boleh di isi
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

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function countPages($path) {
        $pdftext = Storage::get($path);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }
}
