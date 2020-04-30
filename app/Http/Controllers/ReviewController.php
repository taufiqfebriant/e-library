<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Review;
use App\Book;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $user_id = auth()->user()->id;
        $review = Review::create(array_merge(compact('user_id'), $request->validated()));
        return back()->with(['type' => 'success', 'message' => 'Penilaian buku terkirim. Terima kasih!']);
    }
}
