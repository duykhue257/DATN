@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                </div>

                <div class="card-body">
                    <button class="btn btn-primary"><a class="text-white text-decoration-none" href="">Thêm
                            mới</a></button>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="order" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>sdt</th>
                                    <th>số lượng</th>
                                    <th>trạng thái</th>
                                    <th>thời gian đặt hàng</th>
                                    <th>Hoạt Động</th>
                                </tr>
                            </thead>
                            <tfoot>
                                @foreach ($order as $order)
                                    <tr>
                                        <th>{{ $order->id }}</th>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ count($order->detail_order) }} sản phẩm</td>
                                        <td>{{ $order->status->status }}</td>
                                        <td>{{ $order->created_at->diffForHumans() }}</td>
                                    
                                        <td>
                                            <a class=" btn btn-primary px-2" href="/admin/order_detail">Chi Tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row (main row) -->
@endsection
