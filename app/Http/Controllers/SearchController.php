<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;

class SearchController extends Controller
{
    public function index()
    {
        $books = Book::with(['reviews', 'authors'])->withCount('reviews');
        if (request()->has('q')) {
            $categories = Category::whereHas('books', function ($query) {
                $query->where('title', 'like', request()->q . '%');
            });
            $books = $books->where('title', 'like', request()->q . '%');
        }
        if (request()->has('category_id')) {
            $categories = Category::where('id', request()->category_id);
            $books = $books->where('category_id', request()->category_id);
        }
        if (request()->has('rating')) {
            $books = $books->whereHas('reviews', function ($query) {
                $query->havingRaw('SUM(rating) >= ' . request()->rating);
            });
        }
        $books = $books->get();
        $categories = $categories->get();
        return view('search.index', compact('books', 'categories'));
    }
}
