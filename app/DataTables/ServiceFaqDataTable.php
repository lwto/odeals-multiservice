<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\ServiceFaq;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceFaqDataTable extends DataTable
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
            ->editColumn('status' , function ($servicefaq){
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="servicefaq_status" '.($servicefaq->status ? "checked" : "").'  value="'.$servicefaq->id.'" id="'.$servicefaq->id.'" data-id="'.$servicefaq->id.'">
                        <label class="custom-control-label" for="'.$servicefaq->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->editColumn('service_id' , function ($servicefaq){
                return optional($servicefaq->service)->name;
            })
            ->addColumn('action', function($servicefaq){
                return view('servicefaq.action',compact('servicefaq'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceFaq $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceFaq $model)
    {
        return $model->where('service_id',$this->id)->newQuery();
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
            Column::make('title'),
            Column::make('service_id')
                    ->title(__('messages.service')),
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
        return 'Category_' . date('YmdHis');
    }
}
