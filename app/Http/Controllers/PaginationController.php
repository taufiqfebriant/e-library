<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function reviews(Request $request)
    {
        if ($request->ajax()) {
            $reviews = Review::where('book_id', request()->book_id)->orderBy('id', 'desc')->paginate(5);
            return view('book.partials.reviews', compact('reviews'))->render();
        }
    }
}
