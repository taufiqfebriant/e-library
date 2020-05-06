<?php

namespace App\Http\Controllers;
use App\Book;
use App\Review;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $top10Books = Book::withCount('users')->has('users', '>', 0)->get();
        $latestBooks = Book::latest()->take(10)->get();
        return view('home.index', compact('latestBooks', 'top10Books'));
    }
}
