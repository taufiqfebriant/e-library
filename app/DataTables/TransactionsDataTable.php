<?php

namespace App\DataTables;

use App\Transaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class TransactionsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('status', function (Transaction $transaction) {
                if ($transaction->confirmed_by && $transaction->confirmed_at) {
                    return 'Terkonfirmasi';
                } else {
                    if ($transaction->paid_at && $transaction->receipt) {
                        return 'Menunggu konfirmasi';
                    }
                }
                return 'Belum membayar';
            })
            ->addColumn('action', function (Transaction $transaction) {
                return view('user.partials.actions.transactions', compact('transaction'));
            })
            ->editColumn('created_at', function (Transaction $transaction) {
                return $transaction->created_at ? with(new Carbon($transaction->created_at))->format('Y-m-d H:i:s') : '';
            })
            ->editColumn('paid_at', function (Transaction $transaction) {
                return $transaction->paid_at ? with(new Carbon($transaction->paid_at))->format('Y-m-d H:i:s') : '';
            })
            ->editColumn('confirmed_at', function (Transaction $transaction) {
                return $transaction->confirmed_at ? with(new Carbon($transaction->confirmed_at))->format('Y-m-d H:i:s') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            })
            ->filterColumn('paid_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(paid_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            })
            ->filterColumn('confirmed_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(confirmed_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Transaction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return auth()->user()->transactions()->with(['plan'])->select('transactions.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('transactions-table')
                    ->addTableClass('table-bordered table-hover w-100')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    )->parameters([
                        'responsive' => true
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('plan.name')->title('Paket'),
            Column::make('created_at')->title('Tanggal beli'),
            Column::make('paid_at')->title('Tanggal bayar'),
            Column::make('confirmed_at')->title('Tanggal konfirmasi'),
            Column::computed('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
                  ->title('Opsi')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Transactions_' . date('YmdHis');
    }
}
