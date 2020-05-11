<?php

namespace App\Http\Controllers;
use App\Book;

class HomeController extends Controller
{
    public function index()
    {
        $top10Books = Book::withCount('users')->has('users', '>', 0)->take(10)->get();
        $latestBooks = Book::latest()->take(10)->get();

        $bukucategori =  auth()->check() && auth()->user()->books()->exists () ? Book::where('category_id',auth()->user()->books->pluck('category_id')->toArray())->whereNotIn('id', auth()->user()->books->pluck('id')->toArray())->take(5)->get() : [];
        
        return view('home.index', compact('latestBooks', 'top10Books','bukucategori'));
    }
}
