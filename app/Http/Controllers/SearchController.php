<?php

namespace App\Http\Controllers;

class SearchController extends Controller
{
    public function show($keyword)
    {
        return view('search.show');
    }
}
