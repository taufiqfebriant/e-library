<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use App\Transaction;
use Carbon\Carbon;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $book = $book->withCount('loans')->get()->find($book->id);

        // pagination review
        $reviews = Review::where('book_id', $book->id)->orderBy('id', 'desc')->paginate(5);
        $existsInCart = auth()->check() ? in_array($book->id, \Cart::session(auth()->user()->id)->getContent()->pluck('id')->toArray()) : [];
        return view('book.show', compact('book', 'reviews', 'existsInCart'));
    }

    public function read(Book $book)
    {
        return view('book.read', compact('book'));
    }

    public function file($id)
    {
        $book = Book::find($id)->firstOrFail();
        return response()->file(storage_path("app/{$book->file}"));
    }
}
