@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="order_detail" width="100%" cellspacing="0">
                            {{-- Thông tin khách hàng --}}
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Hình thức thanh toán</th>
                                </tr>
                            </thead>

                            <tbody>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->note }},{{ $order->address }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->note }}</td>
                                <td>{{ $order->payment->method }}</td>
                            </tbody>
                        </table>
                        {{-- Thong tin sản phẩm --}}
                        <table class="table table-bordered" id="order" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu,Kích cỡ</th>
                                    <th>Số lượng</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order->detail_order as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    @php
                                        $totalPrice = 0; // Khởi tạo biến tổng tiền
                                    @endphp
                                    @foreach ($detail->variants as $variant)
                                        <td>{{ $variant->product->name }}</td>
                                        <th>{{ $variant->colors->color }}, {{ $variant->sizes->size }}</th>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $variant->product->price_reduced }}<span>.đ</span></td>
                                        @php
                                            $totalPrice += $variant->product->price_reduced * $detail->quantity; // Tính tổng tiền
                                        @endphp
                                    @endforeach
                                    <td>{{ $totalPrice }}<span>.đ</span></td> <!-- Hiển thị tổng tiền -->
                                </tr>
                                
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th colspan="4" rowspan="3"></th>
                                    <th colspan="2">Tổng tạm tính: 
                                        @php
                                            $totalTemp = 0; // Khởi tạo biến tổng tạm tính
                                        @endphp
                                        @foreach ($order->detail_order as $detail)
                                            @foreach ($detail->variants as $variant)
                                                @php
                                                    $totalTemp += $variant->product->price_reduced * $detail->quantity; // Tính tổng tạm tính
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        {{ $totalTemp }}<span>.đ</span>
                                    </th>
                                </tr>
                                
                                <tr>
                                    <th colspan="2">Giảm giá: 
                                        @php
                                            $discount = $totalTemp - $order->total; // Tính giảm giá
                                        @endphp
                                        {{ $discount }}<span>.đ</span>
                                    </th>
                                </tr>
                                
                                <tr>
                                    <th colspan="2">Tổng cộng: 
                                        <span>{{ $order->total }}đ</span>
                                    </th>
                                </tr>
                                
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
