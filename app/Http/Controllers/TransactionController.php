<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plan_id' => 'required',
        ]);
        $transaction = Transaction::create(array_merge([
            'user_id' => auth()->user()->id
        ], $validatedData));
        return redirect()->route('transactions.show', compact('transaction'));
    }

    public function show(Transaction $transaction)
    {
        $this->authorize('update-transaction', $transaction);
        if ($transaction->paid_at && $transaction->receipt) abort(404);
        return view('transaction.show', compact('transaction'));
    }
    
    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('update-transaction', $transaction);
        $validatedData = $request->validate([
            'receipt' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $transaction->update([
            'paid_at' => Carbon::now(),
            'receipt' => request()->receipt->store('uploads/transaction/receipts')
        ], $validatedData);
        return redirect()->route('users.transactions', auth()->user()->id);
    }
}
