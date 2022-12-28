<?php

namespace App\DataTables;
use App\Traits\DataTableTrait;

use App\Models\SubCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
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
            ->editColumn('status' , function ($subcategory){
                $disabled = $subcategory->trashed() ? 'disabled': '';
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="subcategory_status" '.($subcategory->status ? "checked" : "").'  '.$disabled.' value="'.$subcategory->id.'" id="'.$subcategory->id.'" data-id="'.$subcategory->id.'">
                        <label class="custom-control-label" for="'.$subcategory->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->editColumn('category_id' , function ($subcategory){
                return ($subcategory->category_id != null && isset($subcategory->category)) ? $subcategory->category->name : '-';
            })
            ->filterColumn('category_id',function($query,$keyword){
                $query->whereHas('category',function ($q) use($keyword){
                    $q->where('name','like','%'.$keyword.'%');
                });
            })
            ->editColumn('is_featured' , function ($subcategory){
                $disabled = $subcategory->trashed() ? 'disabled': '';

                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="subcategory_featured" data-name="is_featured" '.($subcategory->is_featured ? "checked" : "").'  '.  $disabled.' value="'.$subcategory->id.'" id="f'.$subcategory->id.'" data-id="'.$subcategory->id.'">
                        <label class="custom-control-label" for="f'.$subcategory->id.'" data-on-label="'.__("messages.yes").'" data-off-label="'.__("messages.no").'"></label>
                    </div>
                </div>';
            })
            ->addColumn('action', function($subcategory){
                return view('subcategory.action',compact('subcategory'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status','is_featured']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubCategory $model)
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
            Column::make('category_id')
                    ->title(__('messages.category')),
            Column::make('is_featured')
                ->title(__('messages.featured')),
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
