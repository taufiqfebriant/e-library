<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;

class SearchController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Book::select('books.id', 'books.title', 'books.cover')
            ->selectRaw('ROUND(SUM(reviews.rating) / COUNT(reviews.rating)) AS ratings')
            ->leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
            ->join('author_book', 'books.id', '=', 'author_book.book_id')
            ->join('authors', 'author_book.author_id', '=', 'authors.id')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->groupBy('books.id', 'books.title', 'books.cover');
        if (request()->has('q')) {
            $books = $books->where('title', 'like', '%' . request()->q . '%')
                ->orWhere('authors.name', 'like', '%' . request()->q . '%')
                ->orWhere('categories.name', 'like', '%' . request()->q . '%')
                ->orWhere('publishers.name', 'like', '%' . request()->q . '%');
        }
        if (request()->has('rating')) {
            $books = $books->havingRaw('ROUND(SUM(reviews.rating) / COUNT(reviews.rating)) >= ?', [request()->rating]);
        }
        if (request()->has('category')) {
            $books = $books->where('categories.name', request()->category);
        }
        $books = $books->paginate(9);
        return view('search.index', compact('books', 'categories'));
    }
}
