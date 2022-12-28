<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\Plans;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PlanDataTable extends DataTable
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
            ->editColumn('status' , function ($plan){
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status"  data-type="plan_status" '.($plan->status ? "checked" : "").' value="'.$plan->id.'" id="'.$plan->id.'" data-id="'.$plan->id.'" >
                        <label class="custom-control-label" for="'.$plan->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->editColumn('amount' , function ($plan){
                return getPriceFormat($plan->amount);
            })
            ->addColumn('action', function($plan){
                return view('plan.action',compact('plan'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Plans $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Plans $model)
    {
        $model = $model->orderBy('id','desc');
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
                ->title(__('messages.no'))
                ->orderable(false),
            Column::make('title'),
            Column::make('type'),
            Column::make('amount'),
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
        return 'Plan_' . date('YmdHis');
    }
}
