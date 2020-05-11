<?php

namespace App\DataTables\Admin;

use App\Subscription;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubscriptionsDataTable extends DataTable
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
            ->editColumn('created_at', function (Subscription $subscription) {
                return $subscription->created_at ? with(new Carbon($subscription->created_at))->format('Y-m-d H:i:s') : '';
            })
            ->editColumn('updated_at', function (Subscription $subscription) {
                return $subscription->updated_at ? with(new Carbon($subscription->updated_at))->format('Y-m-d H:i:s') : '';
            })
            ->editColumn('ends_at', function (Subscription $subscription) {
                return $subscription->ends_at ? with(new Carbon($subscription->ends_at))->format('Y-m-d H:i:s') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            })
            ->filterColumn('ends_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(ends_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Subscription $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subscription $model)
    {
        return $model->newQuery()->with(['user'])->select('subscriptions.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('subscriptions-table')
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
                    );
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
            Column::make('user.name')->title('Nama'),
            Column::make('created_at')->title('Terdaftar'),
            Column::make('updated_at')->title('Diperbarui pada'),
            Column::make('ends_at')->title('Berakhir pada')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Subscriptions_' . date('YmdHis');
    }
}
