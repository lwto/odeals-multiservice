<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\Documents;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DocumentDataTable extends DataTable
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
            ->editColumn('status' , function ($document){
                $disabled = $document->trashed() ? 'disabled': '';
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="document_status" '.($document->status ? "checked" : "").' '.$disabled.'  value="'.$document->id.'" id="'.$document->id.'" data-id="'.$document->id.'">
                        <label class="custom-control-label" for="'.$document->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->editColumn('is_required' , function ($document){
                $disabled = $document->trashed() ? 'disabled': '';
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="document_required" data-name="is_required" '.($document->is_required ? "checked" : "").' '.$disabled.'  value="'.$document->id.'" id="f'.$document->id.'" data-id="'.$document->id.'">
                        <label class="custom-control-label" for="f'.$document->id.'" data-on-label="'.__("messages.yes").'" data-off-label="'.__("messages.no").'"></label>
                    </div>
                </div>';
            })
            ->addColumn('action', function($document){
                return view('document.action',compact('document'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status','is_required']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Documents $model)
    {
        if(auth()->user()->hasAnyRole(['admin'])){
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
                ->title(__('messages.no'))
                ->orderable(false),
            Column::make('name'),
            Column::make('is_required')
            ->title(__('messages.is_required')),
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
        return 'Docu    ment_' . date('YmdHis');
    }
}
