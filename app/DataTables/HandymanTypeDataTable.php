<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\HandymanType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HandymanTypeDataTable extends DataTable
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
            ->editColumn('status' , function ($handymantype){
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="handymantype_status" '.($handymantype->status ? "checked" : "").' value="'.$handymantype->id.'" id="'.$handymantype->id.'" data-id="'.$handymantype->id.'">
                        <label class="custom-control-label" for="'.$handymantype->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->addColumn('action', function($handymantype){
                return view('handymantype.action',compact('handymantype'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HandymanType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HandymanType $model)
    {
        $model = $model->orderBy('id','desc');
        if(auth()->user()->hasAnyRole(['provider'])){
            $model = $model->withTrashed();
        }
        return $model->newQuery();
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
                  ->title(__('messages.srno'))
                  ->orderable(false),
              Column::make('name'),
              Column::make('commission'),
              Column::make('type'),
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
        return 'HandymanType' . date('YmdHis');
    }
}
