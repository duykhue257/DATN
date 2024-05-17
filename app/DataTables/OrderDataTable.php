<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $status = session('status_data'); 
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($order) {
                return '
                    <a class=" btn btn-dark flex px-2" href="' .  route('order_detail', $order->id) . '"><i class="fa-solid fa-circle-info" title="Thông tin chi tiểt"></i></a>
                ';
            })
            ->addColumn('count', function ($order) {
                return count($order->detail_order);
            })
            ->rawColumns(['action', 'status'])
            ->addColumn('status', function ($order) use ($status) {
                $currentStatusId = $order->status->id;
                $currentStatus = htmlspecialchars($order->status->status);
    
                $options = '<select name="status_id">';
                foreach ($status as $stt) {
                    $sttId = htmlspecialchars($stt->id);
                    $sttStatus = htmlspecialchars($stt->status);
    
                    // Tạo option cho mỗi trạng thái
                    $options .= '<option value="' . $sttId . '"' . ($sttId == $currentStatusId ? ' selected' : '') . '>' . $sttStatus . '</option>';
                }
            
                $options .= '</select>';
                $options .= '<button class="btn btn-success" type="submit">Cập nhật</button>';
            
                return $options;
            })
            
            // ->addColumn('status', function ($order, $status) {
            //     $firstOptionId = $order->status->id;
            //     $firstOptionStatus = htmlspecialchars($order->status->status);

            //     $options = '<select name="status_id">';
            //     $options .= '<option hidden value="' . $firstOptionId . '">' . $firstOptionStatus . '</option>';

            //     foreach ($status as $stt) {
            //         $sttId = htmlspecialchars($stt->id);
            //         $sttStatus = htmlspecialchars($stt->status);

            //         $options .= '<option value="' . $sttId . '" ' . ($sttId < $firstOptionId ? 'hidden' : '') . '>' . $sttStatus . '</option>';
            //     }

            //     $options .= '</select>';
            //     $options .= '<button class="btn btn-success" type="submit">Cập nhật"></button>';

            //     return $options;
            // })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('order-table')
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
            Column::make('order_code')->title('Mã đơn hàng'),
            Column::make('name')->title('Tên khách hàng'),
            Column::make('phone')->title('Số điện thoại'),
            Column::make('count')->title('Số lượng'),
            Column::computed('status')->title('Trạng thái'),
            Column::make('created_at')->title('	thời gian đặt hàng'),
            Column::computed('action')->title('Hành động')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
