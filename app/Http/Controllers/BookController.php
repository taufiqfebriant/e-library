<?php

namespace App\Http\Controllers;

use App\Book;
use Carbon\Carbon;

class BookController extends Controller
{
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function update(Book $book)
    {
        if (!auth()->user()->subscription) return redirect()->route('plans.index');
        $book->users()->sync([auth()->user()->id => ['ends_at' => (new Carbon($book->updated_at))->addDays(7)]]);
        return redirect()->route('books.read', compact('book'));
    }

    public function read(Book $book)
    {
        return view('book.read', compact('book'));
    }
}
