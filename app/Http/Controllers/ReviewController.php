<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Review;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $user_id = auth()->user()->id;
        $review = Review::create(array_merge(compact('user_id'), $request->validated()));
        return back()->with(['type' => 'success', 'message' => 'Penilaian buku terkirim. Terima kasih!']);
    }

    public function update(Review $review)
    {
        $review->update(request()->validate([
            'rating' => 'required|min:1|max:5',
            'comment' => 'present'
        ]));
        return back()->with(['type' => 'success', 'message' => 'Berhasil mengubah penilaian.']);
    }

    public function apiGet()
    {
        $review = Review::where([
            ['book_id', '=', request()->book_id],
            ['user_id', '=', auth()->user()->id]
        ])->first();
        return response()->json($review);
    }
}
