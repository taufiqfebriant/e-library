<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\SubscriptionsDataTable;
class SubscriptionController extends Controller
{
    public function index(SubscriptionsDataTable $dataTable)
    {
        return $dataTable->render('admin.subscription.index');
    }
}
