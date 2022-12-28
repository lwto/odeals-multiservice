<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\Slider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
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
            ->editColumn('status' , function ($slider){
                $disabled = $slider->deleted_at ? 'disabled': '';
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" '.$disabled.' data-type="slider_status" '.($slider->status ? "checked" : "").' value="'.$slider->id.'" id="'.$slider->id.'" data-id="'.$slider->id.'">
                        <label class="custom-control-label" for="'.$slider->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->editColumn('type_id' , function ($slider){
                return ($slider->type_id != null && isset($slider->service)) ? $slider->service->name : '';
            })
            ->filterColumn('type_id',function($query,$keyword){
                $query->whereHas('service',function ($q) use($keyword){
                    $q->where('name','like','%'.$keyword.'%');
                });
            })
            ->addColumn('action', function($slider){
                return view('slider.action',compact('slider'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Slider $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slider $model)
    {
        if(auth()->user()->hasAnyRole(['admin'])){
            $model = $model->withTrashed();
        }
        return $model->newQuery();
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
                  ->orderable(false)
                  ->width(60),
            Column::make('title'),
            // Column::make('type'),
            Column::make('type_id')
                ->title(__('messages.title_name',['title' => __('messages.service')])),
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
        return 'Slider_' . date('YmdHis');
    }
}
