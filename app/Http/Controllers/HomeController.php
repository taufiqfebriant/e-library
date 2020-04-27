<?php

namespace App\Http\Controllers;
use App\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::latest()->take(10)->get();
        return view('home.index', compact('books'));
    }
}
