<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HandymanDataTable extends DataTable
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
            ->editColumn('status', function($handyman) {
                if($handyman->status == '0'){
                    $status = '<span class="badge badge-danger">'.__('messages.inactive').'</span>';
                }else{
                    $status = '<span class="badge badge-success">'.__('messages.active').'</span>';
                }
                return $status;
            })
            ->editColumn('provider_id', function($handyman) {
                return ($handyman->provider_id != null && isset($handyman->providers)) ? $handyman->providers->display_name : '-';
            })
            ->editColumn('address', function($handyman) {
                return ($handyman->address != null && isset($handyman->address)) ? $handyman->address : '-';
            })
            ->filterColumn('provider_id',function($query,$keyword){
                $query->whereHas('providers',function ($q) use($keyword){
                    $q->where('display_name','like','%'.$keyword.'%');
                });
            })
            ->addColumn('action', function($handyman){
                return view('handyman.action',compact('handyman'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        
        $model = $model->where('user_type','handyman');
        $model = $model->orderBy('id','desc');
        if(auth()->user()->hasRole('provider')) {
            $model->where('provider_id', auth()->user()->id);
        }
        if(auth()->user()->hasAnyRole(['admin'])){
            $model = $model->withTrashed();
        }
        if($this->list_status != null){
            $model = $model->where('status',0)->where('provider_id',NULL);
        } else {
            $model = $model->whereNotNull('provider_id');
        }
        return $model;
       
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
                ->orderable(false)
                ->width(60),
            Column::make('display_name')
                ->title(__('messages.name')),
            Column::make('provider_id')
                ->title(__('messages.provider')),
            Column::make('contact_number'),
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
