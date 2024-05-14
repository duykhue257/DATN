<?php
namespace App\DataTables;

use App\Models\ProductVariants;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductVariansDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
      
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($prd) {
                Log::info("abc",[$prd->product_id]);
                return '
                <form class="d-flex" action="' . route('productVariant.destroy', $prd->id) . '" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <a class="btn btn-warning mx-2" href="' . route('productVariant.edit', $prd->id) . '"><i class="fa-solid fa-wrench" title="Cập nhật"></i></a>
                    <button onclick="return confirm(\'are you sure?\')" class="btn btn-danger" type="submit" title="Xóa"><i class="fa-solid fa-trash" title="Xóa"></i></button>
                </form>
                ';
            })
            ->addColumn('name', function ($prd) {
                return $prd->product->name;
            })
            ->addColumn('image', function ($prd) {
                $url = Storage::url($prd->image);
                return '<img style="width:100%" src="' . $url . '" alt="">';
            })
            ->addColumn('color', function ($prd) {
                return $prd->colors->color;
            })
            ->addColumn('size', function ($prd) {
                return $prd->sizes->size;
            })
            ->escapeColumns([]) // This ensures that the image column is not escaped
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariants $model ): QueryBuilder
    {
        Log::info("abc",[$this->id]);
        return $model->newQuery()->where('product_id',$this->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('productvarians-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->language([
                'search' => 'Tìm kiếm:',
                'zeroRecords' => 'Không tìm thấy bản ghi phù hợp',
                'info' => 'Hiển thị từ _START_ đến _END_ trong tổng số _TOTAL_ bản ghi',
                'infoEmpty' => 'Hiển thị từ 0 đến 0 trong tổng số 0 bản ghi',
                'infoFiltered' => '(được lọc từ tổng số _MAX_ bản ghi)',
                'lengthMenu' => 'Hiển thị _MENU_ bản ghi mỗi trang',
            ])
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name')->title('Tên'),
            Column::make('image')->title('Ảnh'),
            Column::make('color')->title('Màu'),
            Column::make('size')->title('Kích cỡ'),
            Column::computed('action')->title('Hành động'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVarians_' . date('YmdHis');
    }
}
