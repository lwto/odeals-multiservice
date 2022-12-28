<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\WalletHistory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WalletHistoryDataTable extends DataTable
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
            ->editColumn('user_id' , function ($history){
                return ($history->user_id != null && isset($history->providers)) ? $history->providers->display_name : '-';
            })
            ->editColumn('activity_type' , function ($history){
                return $history->activity_type ? str_replace("_"," ",ucfirst($history->activity_type)) : '-';
            })
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProviderPayout $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(WalletHistory $model)
    {
        return $model->where('user_id',$this->id)->newQuery();
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
            Column::make('user_id')
                    ->title(__('messages.provider')),
            Column::make('datetime')
                    ->title(__('messages.date')),
            Column::make('activity_type')
                    ->title(__('messages.type')),
            Column::make('activity_message')
                    ->title(__('messages.messages')),
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
