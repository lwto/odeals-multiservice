<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\HandymanPayout;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HandymanPayoutHistoryDataTable extends DataTable
{
    use DataTableTrait;
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
            ->editColumn('method', function($payout) {
                return !empty($payout->method) ? $payout->method : 'Cash';
            })
            ->editColumn('description', function($payout) {
                return !empty($payout->description) ? $payout->description : '-';
            })
            ->editColumn('handyman_id', function($payout) {
                return ($payout->handymans != null && isset($payout->handymans)) ? $payout->handymans->display_name : '-';
            })
            ->editColumn('amount', function($payout) {
                return ($payout->amount != null && isset($payout->amount)) ? getPriceFormat($payout->amount) : '-';
            })
            ->editColumn('created_at', function($payout) {
                return $payout->created_at;
            })
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProviderPayout $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HandymanPayout $model)
    {
        return $model->newQuery()->myPayout();
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->title(__('messages.no'))
                ->orderable(false),
            Column::make('handyman_id')
                    ->title(__('messages.handyman')),
            Column::make('method'),
            Column::make('description')
                ->title(__('messages.description')),
            Column::make('amount'),
            Column::make('created_at')
                ->title(__('messages.paid_date')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Category_' . date('YmdHis');
    }
}
