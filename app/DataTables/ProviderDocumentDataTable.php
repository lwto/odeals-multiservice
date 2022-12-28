<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\ProviderDocument;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProviderDocumentDataTable extends DataTable
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
            ->editColumn('is_verified' , function ($provider_document){
                $disabled = $provider_document->trashed() ? 'disabled': '';
                if(auth()->user()->hasAnyRole(['provider','demo_provider'])){
                    if($provider_document->is_verified == 0){
                        $status = '<span class="badge badge-danger">'.__('messages.unverified').'</span>';
                    }else{
                        $status = '<span class="badge badge-success">'.__('messages.verified').'</span>';
                    }
                    return $status;
                }
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="provider_is_verified" data-name="provider_is_verified" '.($provider_document->is_verified ? "checked" : "").' '.$disabled.'  value="'.$provider_document->id.'" id="'.$provider_document->id.'" data-id="'.$provider_document->id.'">
                        <label class="custom-control-label" for="'.$provider_document->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';

            })
            ->editColumn('provider_id' , function ($provider_document){
                return ($provider_document->provider_id != null && isset($provider_document->providers)) ? $provider_document->providers->display_name : '';
            })
            ->editColumn('document_id' , function ($provider_document){
                return ($provider_document->document_id != null && isset($provider_document->document)) ? $provider_document->document->name : '';
            })
            ->filterColumn('provider_id',function($query,$keyword){
                $query->whereHas('providers',function ($q) use($keyword){
                    $q->where('display_name','like','%'.$keyword.'%');
                });
            })
            ->addColumn('action', function($provider_document){
                return view('providerdocument.action',compact('provider_document'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','is_verified']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProviderDocument $model)
    {
        if(auth()->user()->hasAnyRole(['admin'])){
            $model = $model->withTrashed();
        }
        return $model->newQuery()->myDocument();
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
            Column::make('provider_id')
                ->title(__('messages.provider')),
            Column::make('document_id')
                ->title(__('messages.document')),
            Column::make('is_verified'),
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
        return 'Document_' . date('YmdHis');
    }
}
