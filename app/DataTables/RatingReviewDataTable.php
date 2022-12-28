<?php
namespace App\DataTables;
use App\Traits\DataTableTrait;
use App\Models\BookingRating;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RatingReviewDataTable extends DataTable {
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
        ->editColumn('customer_id' , function ($rating_review){
            return ($rating_review->customer_id != null && isset($rating_review->customer)) ? $rating_review->customer->display_name : '';
        })
        ->filterColumn('customer_id',function($query,$keyword){
            $query->whereHas('customer',function ($q) use($keyword){
                $q->where('display_name','like','%'.$keyword.'%');
            });
        })
        ->editColumn('service_id' , function ($rating_review){
            return ($rating_review->service_id != null && isset($rating_review->service)) ? $rating_review->service->name : '';
        })
        ->filterColumn('service_id',function($query,$keyword){
            $query->whereHas('service',function ($q) use($keyword){
                $q->where('name','like','%'.$keyword.'%');
            });
        })
        ->editColumn('rating' , function ($rating_review){
            return $rating_review->rating .' <i class="ri-star-line"></i>';
        })
        ->addColumn('action', function($rating_review){
            return view('ratingreview.action',compact('rating_review'))->render();
        })
        ->addIndexColumn()
        ->rawColumns(['action','rating']);
    }
      /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BookingRating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BookingRating $model)
    {
        if(auth()->user()->hasAnyRole(['admin'])){
            $model = $model->withTrashed();
        }
        return $model->newQuery()->orderBy('id','DESC')->myRating();
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
            Column::make('service_id')
                ->title(__('messages.service')),
            Column::make('customer_id')
                ->title(__('messages.customer')),
            Column::make('rating'),
            Column::make('review')
                ->width(350),
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
        return 'Booking_' . date('YmdHis');
    }
}