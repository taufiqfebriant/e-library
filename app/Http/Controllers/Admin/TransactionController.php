<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\TransactionDataTable;
use App\Http\Requests\TransactionRequest;
use App\Transaction;

class TransactionController extends Controller
{
    public function index(TransactionDataTable $dataTable)
    {
        return $dataTable->render('admin.transaction.index');
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }

    public function update(Transaction $transaction)
    {
        $transaction->update([
            'confirmed_by' => auth()->user()->id,
            'confirmed_at' => now()
        ]);
        return redirect()->route('admin.transactions.index');
    }

    public function receipt($id)
    {
        $transaction = Transaction::where('id', $id)->firstOrFail();
        $path = storage_path("app/{$transaction->receipt}");
        return response()->file($path);
    }
}
