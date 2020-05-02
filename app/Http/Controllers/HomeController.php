<?php

namespace App\Http\Controllers;
use App\Book;
use App\Review;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Book $book)
    {
        $latestBooks = Book::latest()->take(10)->get();
        $likedBooks = auth()->check() ? Book::whereIn('category_id', auth()->user()->categories)->get() : [];
        return view('home.index', compact('latestBooks', 'likedBooks'));
    }
}
