<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\ProviderAddressMapping;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProviderAddressDataTable extends DataTable
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
            ->editColumn('status' , function ($provideraddress){
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="provideraddress_status" '.($provideraddress->status ? "checked" : "").' value="'.$provideraddress->id.'" id="'.$provideraddress->id.'" data-id="'.$provideraddress->id.'">
                        <label class="custom-control-label" for="'.$provideraddress->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->editColumn('provider_id', function($provideraddress) {
                return ($provideraddress->provider_id != null && isset($provideraddress->providers)) ? $provideraddress->providers->display_name : '-';
            })
            ->addColumn('action', function($provideraddress){
                return view('provideraddress.action',compact('provideraddress'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProviderAddressMapping $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProviderAddressMapping $model)
    {
        $model = $model->orderBy('id','desc');
        return $model->newQuery()->myAddress();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */

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
                ->title(__('messages.srno'))
                ->orderable(false),
            Column::make('provider_id')
            ->title(__('messages.provider')),
            Column::make('address'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Provider_' . date('YmdHis');
    }
}
