<?php

namespace App\Http\Controllers;
use App\Book;

class HomeController extends Controller
{
    public function index(Book $book)
    {
        $books = Book::latest()->take(10)->get();

        $bestBooks = Book::find(3)->get();
        return view('home.index', compact('books','bestBooks'));
    }
}
