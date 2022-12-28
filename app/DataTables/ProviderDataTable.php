<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProviderDataTable extends DataTable
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
            ->editColumn('status', function($provider) {
                if($provider->status == '0'){
                    $status = '<span class="badge badge-danger">'.__('messages.inactive').'</span>';
                }else{
                    $status = '<span class="badge badge-success">'.__('messages.active').'</span>';
                }
                return $status;
            })
            ->editColumn('providertype_id', function($provider) {
                return ($provider->providertype_id != null && isset($provider->providertype)) ? $provider->providertype->name : '-';
            })
            ->editColumn('address', function($provider) {
                return ($provider->address != null && isset($provider->address)) ? $provider->address : '-';
            })
            ->filterColumn('providertype_id',function($query,$keyword){
                $query->whereHas('providertype',function ($q) use($keyword){
                    $q->where('name','like','%'.$keyword.'%');
                });
            })
            ->addColumn('action', function($provider){
                return view('provider.action',compact('provider'))->render();
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
        $model = $model->orderBy('id','desc');
        $model = $model->where('user_type','provider');
        if(auth()->user()->hasAnyRole(['admin'])){
            $model = $model->withTrashed();
        }
        if($this->list_status == 'pending'){
            $model = $model->where('status',0);
        }else{
            $model = $model->where('status',1);
        }
        if($this->list_status == 'subscribe'){
            $model = $model->where('status',1)->where('is_subscribe',1);
        } 
        return $model;
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
            Column::make('display_name')
                ->title(__('messages.name')),
            Column::make('providertype_id')
                ->title(__('messages.providertype')),
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
