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
        $rivi = Review::where('book_id',$book->id)->paginate(5);
        $existsInCart = auth()->check() ? in_array($book->id, \Cart::session(auth()->user()->id)->getContent()->pluck('id')->toArray()) : [];
        return view('book.show', compact('book', 'rivi', 'existsInCart'));
    }

    public function update(Book $book)
    {
        if (auth()->user()->subscribed()) {
            if (auth()->user()->loans->active()->count() === 2) {
                return back()->with(['type' => 'danger', 'message' => 'Gagal meminjam buku. Jumlah peminjaman buku telah mencapai angka maksimal']);
            }
            $book->users()->attach([auth()->user()->id => ['ends_at' => Carbon::now()->addDays(7)]]);
            return redirect()->route('books.read', compact('book'));
        } else {
            $paidTransactions = Transaction::whereNotNull(['paid_at', 'receipt'])->where('user_id', auth()->user()->id)->first();
            if ($paidTransactions) {
                return back()->with(['type' => 'danger', 'message' => 'Admin belum mengonfirmasi pembayaran Anda.']);
            }
            return redirect()->route('plans.index');
        }
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
