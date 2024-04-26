@extends('layouts.client.layout_account')
@section('title', 'Lịch sử mua hàng')
@section('content')
    <section>
        <div class="pt-4">
            <h6 style="font-weight: 500;">Lịch sử mua hàng</h6>
            <p>Bạn có thể xem lịch sử mua hàng và trạng thái đơn hàng trực tuyến của ClassicMan tại đây.</p>
        </div>
        <hr>
        <div class="mb-4 d-flex flex-row-reverse">

            <form action="">
                <select class="form-select pl-1 pr-4" aria-label="Default select example">
                    <option value="1">Tất cả</option>

                </select>
            </form>
            <h6 class="pr-2">Đơn hàng: </h6>
        </div>

        <table class="table">
            <thead>
                <tr class="">
                    <th scope="col" style="font-weight: 500; font-size: 14px">Mã đơn</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Tên sản phẩm</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Ngày mua</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Số lượng</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Màu sắc</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Kích cỡ</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Trạng thái</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Tình trạng thanh toán</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td style="font-weight: 500;font-size: 12px;">{{ $order->order_code }}</td>
                        <td style="font-size: 12px;">
                            @foreach ($order->detail_order as $detail)
                                @foreach ($detail->variants as $variant)
                                    <a
                                        href="{{ route('detail_product', ['id' => $variant->product_id]) }}">{{ $detail->name }}</a><br>
                                @endforeach
                            @endforeach
                        </td>



                        <td style="font-size: 14px">{{ $order->created_at }}</td>
                        <td style="font-size: 14px">
                            @foreach ($order->detail_order as $detail)
                                <fieldset disabled>
                                    {{ $detail->quantity }}
                                </fieldset><br>
                            @endforeach
                        </td>
                        <td style="font-size: 14px">
                            @foreach ($order->detail_order as $detail)
                                @foreach ($detail->variants as $variant)
                                    {{ $variant->colors->color }}<br>
                                @endforeach
                            @endforeach
                        </td>
                        <td style="font-size: 14px">
                            @foreach ($order->detail_order as $detail)
                                @foreach ($detail->variants as $variant)
                                    {{ $variant->sizes->size }}<br>
                                @endforeach
                            @endforeach
                        </td>
                        <td style="font-size: 14px">{{ $order->status->status }}</td>
                        <td style="font-size: 14px">{{ $order->payment->method }}</td>
                        <td class="">
                            <a class="btn btn-primary px-2" href="{{ route('orderDetailHome', $order->id) }}">Chi tiết</a>
                            @if ($order->status_id == 1 || $order->status_id == 2)
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger px-2"
                                        onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')">Hủy
                                        đơn</button>
                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>


        </table>
    </section>
@endsection
