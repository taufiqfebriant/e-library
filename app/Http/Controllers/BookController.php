<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function show( Book $book )
    {
        return view('book.show',compact('book'));
    }
}
