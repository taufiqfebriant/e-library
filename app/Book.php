<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
    public function fileUrl($type)
    {
        if ($this->{$type}) return asset("storage/{$this->{$type}}");
    }

    public function countPages($path) {
        $pdftext = file_get_contents($path);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }
}
