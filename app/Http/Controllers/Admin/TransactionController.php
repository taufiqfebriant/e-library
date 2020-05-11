<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\TransactionsDataTable;
use App\Http\Requests\TransactionRequest;
use App\Transaction;
use App\Subscription;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(TransactionsDataTable $dataTable)
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
            'confirmed_at' => Carbon::now()
        ]);
        if ($transaction->user->subscription()->exists()) {
            $transaction->user->subscription()->update([
                'updated_at' => $transaction->confirmed_at,
                'ends_at' => (new Carbon($transaction->user->subscription->ends_at))->addDays($transaction->plan->months * 30)
            ]);
        } else {
            Subscription::create([
                'user_id' => $transaction->user_id,
                'created_at' => $transaction->confirmed_at,
                'updated_at' => $transaction->confirmed_at,
                'ends_at' => (new Carbon($transaction->confirmed_at))->addDays($transaction->plan->months * 30)
            ]);
        }
        return redirect()->route('admin.transactions.index');
    }

    public function receipt($id)
    {
        $transaction = Transaction::where('id', $id)->firstOrFail();
        $path = storage_path("app/{$transaction->receipt}");
        return response()->file($path);
    }
}
