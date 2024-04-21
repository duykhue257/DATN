@extends('layouts.client.layout_account')
@section('content')
    <div class="">
        <div class="">
            <div class="">
                <h1>Thông tin đơn hàng</h1>



                <div id="order-details">
                    <p><strong>Mã đơn hàng:</strong> {{ $orders->order_code }}</p>
                    <p><strong>Tên người nhận:</strong> {{ $orders->name }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $orders->phone }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $orders->detail }},{{ $orders->address }}</p>

                    <p><strong>Phương thức thanh toán:</strong> {{ $orders->payment->method }}</p>
                </div>

            </div>
            <hr>
            {{-- <div class="suport">
            <div>
                <p>Cần hỗ trợ ? <a href="#">Liên hệ với chúng tôi</a></p>
            </div>
            <input type="button" value="Tiếp tục mua hàng" class="continue-shopping">
        </div> --}}
        </div>
        {{-- <div class="vertical-line"></div> --}}

        <div class="">
            @foreach ($orders->detail_order as $detail)
                @foreach ($detail->variants as $variant)
                    <div id="right-child">
                        <div>
                            <img style="max-width: 100px" src="{{ $variant->image ? Storage::url($variant->image) : '' }}"
                                alt="">
                        </div>
                        <div id="product">
                            <p id="p">Tên sản phẩm:{{ $variant->product->name }}<br>
                                <span>Kích cỡ:{{ $variant->sizes->size }} </span><br>
                                <span>Màu:{{ $variant->colors->color }}</span><br>
                                <span>số lượng:{{ $detail->quantity }}</span>
                            </p>

                            {{-- <p id="price">{{ $detail->price }}</p> --}}
                        </div>
                        <p></p>
                    </div><br>
                @endforeach
            @endforeach
            {{-- <hr />
            <div id="bill">
                <div class="left-column">
                    <p>Tạm tính</p>
                    <p>1.500.000&#8363</p>
                </div>
                <div class="right-column">
                    <p>Phí vận chuyển</p>
                    <p>Miễn phí</p>
                </div>
            </div> --}}
            <hr />
            <div class="total-all">
                <div class="-total">
                    <p>Tổng tiền thanh toán:
                        <span class="total-total">{{ intval($orders->total) }} VNĐ</span>
                    </p>

                </div>

            </div>

        </div>

    </div>
    <a href="{{ route('order_history') }}" class="btn btn-success">trở về</a>
    </div>
@endsection
