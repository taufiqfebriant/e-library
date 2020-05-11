<?php

namespace App\DataTables;

use App\Book;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class BooksDataTable extends DataTable
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
            ->addColumn('action', function (Book $book) {
                return view('user.partials.actions.books', compact('book'));
            })
            ->editColumn('created_at', function (Book $book) {
                return $book->created_at ? with(new Carbon($book->created_at))->format('Y-m-d H:i:s') : '';
            })
            ->editColumn('ends_at', function (Book $book) {
                return $book->ends_at ? with(new Carbon($book->ends_at))->format('Y-m-d H:i:s') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            })
            ->filterColumn('ends_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(ends_at, '%Y-%m-%d') like ?", ["%$keyword%"]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Book $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return auth()->user()->books();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('books-table')
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
            Column::make('title')->title('Judul buku'),
            Column::make('created_at')->title('Tanggal pinjam'),
            Column::make('ends_at')->title('Tanggal berakhir'),
            Column::make('returned_at')->title('Tanggal pengembalian'),
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
        return 'Books_' . date('YmdHis');
    }
}
