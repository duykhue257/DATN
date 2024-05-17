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

class OrderHistoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($order) {
                $actionHtml = '
                    <a class="btn btn-dark px-2" href="' . route('orderDetailHome', $order->id) . '"><i class="fa-solid fa-circle-info"></i></a>
                ';
            
                if ($order->status_id == 1 || $order->status_id == 2) {
                    $actionHtml .= '
                        <form action="' . route('orders.cancel', $order->id) . '" method="POST" style="display: inline;">
                            ' . csrf_field() . '
                            <button type="submit" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn hàng này không?\')">Hủy</button>
                        </form>
                    ';
                }
            
                return $actionHtml;
            })
            ->addColumn('name', function ($order) {
                $detailHtml = '';
            
                foreach ($order->detail_order as $detail) {
                    foreach ($detail->variants as $variant) {
                        $detailHtml .= '
                            <a class="text-dark fw-bold" href="' . route('detail_product', ['id' => $variant->product_id]) . '">' . $detail->name . '</a><br>
                        ';
                    }
                }
            
                return $detailHtml;
            })
            
            ->addColumn('status', function ($order) {
                return $order->status->status;
            })
            ->addColumn('method', function ($order) {
                return $order->payment->method ;
            })
            ->rawColumns(['action', 'name'])
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
                    ->setTableId('orderhistory-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0, 'desc')
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
            Column::make('order_code')->title('Mã đơn#'),
            Column::make('name')->title('Tên sản phẩm'),
            Column::make('created_at')->title('Ngày mua'),
            Column::make('status')->title('Trạng thái'),
            Column::make('method')->title('Tình trạng thanh toán'),
            Column::computed('action')->title('Thao tác')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'OrderHistory_' . date('YmdHis');
    }
}
