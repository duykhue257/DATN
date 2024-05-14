<?php

namespace App\DataTables;

use App\Models\Size;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SizeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($ct) {
                return '
                <form action="'. route('size.destroy', $ct->id) .'" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <a class="btn btn-warning"
                        href="'. route('size.edit', $ct->id) .'"><i class="fa-solid fa-wrench" title="Cập nhật"></i></a>
                    <button onclick="return confirm(\'are you sure?\')" class="btn btn-danger" type="submit"><i class="fa-solid fa-trash" title="Xóa"></i></button>
                </form>
                ';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Size $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('size-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0, 'asc')
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
            Column::make('size')->title('Kích cỡ'),
            Column::computed('action')->title('Hành động')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Size_' . date('YmdHis');
    }
}
