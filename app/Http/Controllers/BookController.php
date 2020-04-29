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
        if (!auth()->user()->subscription) {
            return redirect()->route('plans.index');
        } else {
            if (auth()->user()->books->count() === 2) {
                return back()->with(['type' => 'danger', 'message' => 'Gagal meminjam buku. Jumlah peminjaman buku telah mencapai angka maksimal']);
            }
            $book->users()->sync([auth()->user()->id => ['ends_at' => (new Carbon($book->updated_at))->addDays(7)]]);
            return redirect()->route('books.read', compact('book'));
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
