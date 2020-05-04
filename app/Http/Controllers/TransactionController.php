<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function store(TransactionRequest $request)
    {
        $transaction = Transaction::create(array_merge([
            'user_id' => auth()->user()->id
        ], $request->validated()));
        return redirect()->route('transactions.show', compact('transaction'));
    }

    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->update([
            'paid_at' => Carbon::now(),
            'receipt' => $request->receipt->store('uploads/transaction/receipts')
        ]);
        return redirect()->route('users.show', auth()->user()->id);
    }
}
