<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\TransactionDataTable;
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
}
