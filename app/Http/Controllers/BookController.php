<?php

namespace App\Http\Controllers;

use App\Book;
use App\Transaction;
use Carbon\Carbon;

class BookController extends Controller
{
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function update(Book $book)
    {
        if (auth()->user()->subscribed()) {
            if (auth()->user()->books->count() === 2) {
                return back()->with(['type' => 'danger', 'message' => 'Gagal meminjam buku. Jumlah peminjaman buku telah mencapai angka maksimal']);
            }
            $book->users()->sync([auth()->user()->id => ['ends_at' => (new Carbon($book->updated_at))->addDays(7)]]);
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
        $book->has_file = in_array($book->id, auth()->user()->books->pluck('id')->toArray());
        return view('book.read', compact('book'));
    }

    public function file($id)
    {
        $book = Book::find($id)->firstOrFail();
        return response()->file(storage_path("app/{$book->file}"));
    }
}
