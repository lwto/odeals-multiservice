<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NotificationDataTable extends DataTable
{
    use DataTableTrait;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable()
    {
        return datatables($this->query())
            ->editColumn('type', function ($row) {
                return '<a href="'.route('booking.show',$row->data['id']) .'" ># '.$row->data['id'].' '.str_replace("_"," ",ucfirst($row->data['type'])).'</a>';
            })
            ->editColumn('message', function ($row) {
                return $row->data['message'];
            })
            ->editColumn('created_at', function ($row) {
                return dateAgoFormate($row->created_at,true);
            })

            ->setRowClass(function ($user) {
                return $user->read_at == null ? 'iq-bg-primary' : '';
            })

            ->editColumn('updated_at', function ($row) {
                return dateAgoFormate($row->updated_at,true);
            })
            ->editColumn('action', function ($row) {
                return '<a href="'.route('booking.show',$row->data['id']) .'"><span class="iq-bg-info mr-2"><i class="far fa-eye text-secondary"></i></span></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['type','action','thread']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Notification $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $userdata = \Auth::user();
        $notifications =  $userdata->notifications ;

        return $this->applyScopes($notifications);
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
            Column::make('type'),
            Column::make('message'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'notification_' . date('YmdHis');
    }
}
