<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $book = $book->withCount('loans')->get()->find($book->id);
        $reviews = Review::where('book_id', $book->id)->orderBy('id', 'desc');
        $existsInCart = [];
        $authUserReview = [];
        if (auth()->check()) {
            $reviews = $reviews->where('user_id', '!=', auth()->user()->id);
            $existsInCart = in_array($book->id, \Cart::session(auth()->user()->id)->getContent()->pluck('id')->toArray());
            $authUserReview = $book->reviews()->with('user')->where('user_id', auth()->user()->id)->first();
        }
        $reviews = $reviews->paginate(5);
        return view('book.show', compact('book', 'reviews', 'existsInCart', 'authUserReview'));
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
