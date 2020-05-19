<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\LoansDataTable;
use App\Http\Controllers\Controller;

class LoanController extends Controller
{
    public function index(LoansDataTable $dataTable)
    {
        return $dataTable->render('admin.loan.index');
    }
}
