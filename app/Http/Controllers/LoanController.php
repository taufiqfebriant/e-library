<?php

namespace App\Http\Controllers;

use App\Book;
use App\Loan;
use App\Transaction;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (auth()->user()->subscribed()) {
            if (auth()->user()->loans()->active()->count() === 2) {
                return back()->with(['type' => 'danger', 'message' => 'Gagal meminjam buku. Jumlah peminjaman buku telah mencapai angka maksimal']);
            }
            $validatedData = request()->validate(['book_id' => 'required']);
            $loan = Loan::create(array_merge($validatedData, [
                'user_id' => auth()->user()->id,
                'ends_at' => Carbon::now()->addDays(7)
            ]));
            auth()->user()->categories()->syncWithoutDetaching([$loan->book->id]);
            \Cart::session(auth()->user()->id)->remove($loan->book->id);
            return redirect()->route('books.read', ['book' => $loan->book]);
        } else {
            $paidTransactions = Transaction::whereNotNull(['paid_at', 'receipt'])->where('user_id', auth()->user()->id)->first();
            if ($paidTransactions) {
                return back()->with(['type' => 'danger', 'message' => 'Admin belum mengonfirmasi pembayaran Anda.']);
            }
            return redirect()->route('plans.index');
        }
    }

    public function storeFromCart()
    {
        $bookIds = \Cart::session(auth()->user()->id)->getContent()->pluck('attributes')->pluck('book_id');
        foreach ($bookIds as $id) {
            if (auth()->user()->loans()->active()->count() < 2) {
                Loan::create([
                    'book_id' => $id,
                    'user_id' => auth()->user()->id,
                    'ends_at' => Carbon::now()->addDays(7)
                ]);
            } else {
                return redirect()->route('cart.index')->with(['type' => 'danger', 'message' => 'Gagal meminjam buku. Jumlah peminjaman buku telah mencapai angka maksimal']);
            }
        }
        \Cart::session(auth()->user()->id)->clear();
        return redirect()->route('users.loans', auth()->user()->id)->with(['type' => 'success', 'message' => 'Berhasil meminjam buku']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Loan $loan)
    {
        $loan->update(['returned_at' => Carbon::now()]);
        return back()->with(['type' => 'success', 'message' => 'Berhasil mengembalikan buku.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function authUser()
    {
        if (request()->ajax()) {
            $loan = Loan::where([
                ['book_id', '=', request()->book_id],
                ['user_id', '=', auth()->user()->id],
            ])->whereNull('returned_at')->first();
            return response()->json($loan);
        }
    }
}
